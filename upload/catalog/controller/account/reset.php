<?php
// *	@copyright	OPENCART.PRO 2011 - 2022.
// *	@forum		https://forum.opencart.pro
// *	@source		See SOURCE.txt for source and other copyright.
// *	@license	GNU General Public License version 3; see LICENSE.txt

class ControllerAccountReset extends Controller {
	private $error = array();

	public function index() {
		if ($this->customer->isLogged()) {
			$this->response->redirect($this->url->link('account/account', '', true));
		}

		$this->document->setRobots('nocache,noarchive,noindex,nofollow');

		if (isset($this->request->get['code'])) {
			$code = $this->request->get['code'];
		} else {
			$code = '';
		}

		if ($code) {
			$this->load->model('account/customer');

			$customer_info = $this->model_account_customer->getCustomerByCode($code);
		} else {
			$customer_info = array();
		}

		if ($customer_info && !isset($this->session->data['forgotten_code']) || $customer_info && $this->session->data['forgotten_code'] != $code) {
			$this->model_account_customer->editCode($customer_info['email'], '');

			$customer_info = array();
		}

		if ($customer_info) {
			$this->load->language('account/reset');

			$this->document->setTitle($this->language->get('heading_title'));

			if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
				unset($this->session->data['forgotten_code']);

				$this->model_account_customer->editPassword($customer_info['email'], $this->request->post['password']);

				if ($this->config->get('config_customer_activity')) {
					$this->load->model('account/activity');

					$activity_data = array(
						'customer_id' => $customer_info['customer_id'],
						'name'        => $customer_info['firstname'] . ' ' . $customer_info['lastname']
					);

					$this->model_account_activity->addActivity('reset', $activity_data);
				}

				$this->session->data['success'] = $this->language->get('text_success');

				$this->response->redirect($this->url->link('account/login', '', true));
			}

			$data['heading_title'] = $this->language->get('heading_title');

			$data['text_password'] = $this->language->get('text_password');

			$data['entry_password'] = $this->language->get('entry_password');
			$data['entry_confirm'] = $this->language->get('entry_confirm');

			$data['button_continue'] = $this->language->get('button_continue');
			$data['button_back'] = $this->language->get('button_back');

			$data['breadcrumbs'] = array();

			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_home'),
				'href' => $this->url->link('common/home')
			);

			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_account'),
				'href' => $this->url->link('account/account', '', true)
			);

			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('account/reset', '', true)
			);

			if (isset($this->error['password'])) {
				$data['error_password'] = $this->error['password'];
			} else {
				$data['error_password'] = '';
			}

			if (isset($this->error['confirm'])) {
				$data['error_confirm'] = $this->error['confirm'];
			} else {
				$data['error_confirm'] = '';
			}

			$data['action'] = $this->url->link('account/reset', 'code=' . $code, true);

			$data['back'] = $this->url->link('account/login', '', true);

			if (isset($this->request->post['password'])) {
				$data['password'] = $this->request->post['password'];
			} else {
				$data['password'] = '';
			}

			if (isset($this->request->post['confirm'])) {
				$data['confirm'] = $this->request->post['confirm'];
			} else {
				$data['confirm'] = '';
			}

			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');

			$this->response->setOutput($this->load->view('account/reset', $data));
		} else {
			$this->load->language('account/reset');

			$this->session->data['error'] = $this->language->get('error_code');

			return new Action('account/login');
		}
	}

	protected function validate() {
		if (!isset($this->request->post['password']) || (utf8_strlen($this->request->post['password']) < 4) || (utf8_strlen($this->request->post['password']) > 20)) {
			$this->error['password'] = $this->language->get('error_password');
		}

		if (isset($this->request->post['confirm']) && isset($this->request->post['password']) && $this->request->post['confirm'] != $this->request->post['password']) {
			$this->error['confirm'] = $this->language->get('error_confirm');
		}

		return !$this->error;
	}
}