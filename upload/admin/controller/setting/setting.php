<?php
// *	@copyright	OPENCART.PRO 2011 - 2022.
// *	@forum		https://forum.opencart.pro
// *	@source		See SOURCE.txt for source and other copyright.
// *	@license	GNU General Public License version 3; see LICENSE.txt

class ControllerSettingSetting extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('setting/setting');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			if (isset($this->request->post['config_debug_pro'])) {
				$this->load->model('extension/event'); 

				if ($this->request->post['config_debug_pro']) {
					$code = $this->model_extension_event->getEvent('config_debug_pro', 'catalog/controller/*/before', 'event/debug/before');

					if (!$code) {
						$this->model_extension_event->addEvent('config_debug_pro', 'catalog/controller/*/before', 'event/debug/before', 1, 0);
					}

					$code = $this->model_extension_event->getEvent('config_debug_pro', 'catalog/controller/*/after', 'event/debug/after');

					if (!$code) {
						$this->model_extension_event->addEvent('config_debug_pro', 'catalog/controller/*/after', 'event/debug/after', 1, 9999);
					}
				} else {
					$this->model_extension_event->deleteEvent('config_debug_pro');
				}
			}

			$this->model_setting_setting->editSetting('config', $this->request->post);

			if ($this->config->get('config_currency_auto')) {
				$this->load->model('localisation/currency');

				$this->model_localisation_currency->refresh();
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('setting/store', 'token=' . $this->session->data['token'], true));
		}

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_select'] = $this->language->get('text_select');
		$data['text_none'] = $this->language->get('text_none');
		$data['text_yes'] = $this->language->get('text_yes');
		$data['text_no'] = $this->language->get('text_no');
		$data['text_product'] = $this->language->get('text_product');
		$data['text_review'] = $this->language->get('text_review');
		$data['text_voucher'] = $this->language->get('text_voucher');
		$data['text_tax'] = $this->language->get('text_tax');
		$data['text_account'] = $this->language->get('text_account');
		$data['text_checkout'] = $this->language->get('text_checkout');
		$data['text_stock'] = $this->language->get('text_stock');
		$data['text_affiliate'] = $this->language->get('text_affiliate');
		$data['text_return'] = $this->language->get('text_return');
		$data['text_captcha'] = $this->language->get('text_captcha');
		$data['text_register'] = $this->language->get('text_register');
		$data['text_shipping'] = $this->language->get('text_shipping');
		$data['text_payment'] = $this->language->get('text_payment');
		$data['text_mail'] = $this->language->get('text_mail');
		$data['text_smtp'] = $this->language->get('text_smtp');
		$data['text_mail_alert'] = $this->language->get('text_mail_alert');
		$data['text_mail_account'] = $this->language->get('text_mail_account');
		$data['text_mail_affiliate'] = $this->language->get('text_mail_affiliate');
		$data['text_mail_order']  = $this->language->get('text_mail_order');
		$data['text_mail_review'] = $this->language->get('text_mail_review');
		$data['text_session'] = $this->language->get('text_session');
		$data['text_general'] = $this->language->get('text_general');
		$data['text_security'] = $this->language->get('text_security');
		$data['text_upload'] = $this->language->get('text_upload');
		$data['text_error'] = $this->language->get('text_error');

		$data['entry_name'] = $this->language->get('entry_name');
		$data['entry_owner'] = $this->language->get('entry_owner');
		$data['entry_address'] = $this->language->get('entry_address');
		$data['entry_geocode'] = $this->language->get('entry_geocode');
		$data['entry_email'] = $this->language->get('entry_email');
		$data['entry_telephone'] = $this->language->get('entry_telephone');
		$data['entry_fax'] = $this->language->get('entry_fax');
		$data['entry_image'] = $this->language->get('entry_image');
		$data['entry_open'] = $this->language->get('entry_open');
		$data['entry_comment'] = $this->language->get('entry_comment');
		$data['entry_location'] = $this->language->get('entry_location');
		$data['entry_meta_title'] = $this->language->get('entry_meta_title');
		$data['entry_meta_description'] = $this->language->get('entry_meta_description');
		$data['entry_meta_keyword'] = $this->language->get('entry_meta_keyword');
		$data['entry_theme'] = $this->language->get('entry_theme');
		$data['entry_layout'] = $this->language->get('entry_layout');
		$data['entry_country'] = $this->language->get('entry_country');
		$data['entry_zone'] = $this->language->get('entry_zone');
		$data['entry_language'] = $this->language->get('entry_language');
		$data['entry_admin_language'] = $this->language->get('entry_admin_language');
		$data['entry_currency'] = $this->language->get('entry_currency');
		$data['entry_currency_auto'] = $this->language->get('entry_currency_auto');
		$data['entry_length_class'] = $this->language->get('entry_length_class');
		$data['entry_weight_class'] = $this->language->get('entry_weight_class');
		$data['entry_limit_admin'] = $this->language->get('entry_limit_admin');
		$data['entry_product_count'] = $this->language->get('entry_product_count');
		$data['entry_review'] = $this->language->get('entry_review');
		$data['entry_review_guest'] = $this->language->get('entry_review_guest');
		$data['entry_voucher_min'] = $this->language->get('entry_voucher_min');
		$data['entry_voucher_max'] = $this->language->get('entry_voucher_max');
		$data['entry_tax'] = $this->language->get('entry_tax');
		$data['entry_tax_default'] = $this->language->get('entry_tax_default');
		$data['entry_tax_customer'] = $this->language->get('entry_tax_customer');
		$data['entry_customer_online'] = $this->language->get('entry_customer_online');
		$data['entry_customer_activity'] = $this->language->get('entry_customer_activity');
		$data['entry_customer_search'] = $this->language->get('entry_customer_search');
		$data['entry_customer_group'] = $this->language->get('entry_customer_group');
		$data['entry_customer_group_display'] = $this->language->get('entry_customer_group_display');
		$data['entry_customer_price'] = $this->language->get('entry_customer_price');
		$data['entry_login_attempts'] = $this->language->get('entry_login_attempts');
		$data['entry_account'] = $this->language->get('entry_account');
		$data['entry_invoice_prefix'] = $this->language->get('entry_invoice_prefix');
		$data['entry_cart_weight'] = $this->language->get('entry_cart_weight');
		$data['entry_checkout_guest'] = $this->language->get('entry_checkout_guest');
		$data['entry_checkout'] = $this->language->get('entry_checkout');
		$data['entry_order_status'] = $this->language->get('entry_order_status');
		$data['entry_processing_status'] = $this->language->get('entry_processing_status');
		$data['entry_complete_status'] = $this->language->get('entry_complete_status');
		$data['entry_fraud_status'] = $this->language->get('entry_fraud_status');
		$data['entry_api'] = $this->language->get('entry_api');
		$data['entry_stock_display'] = $this->language->get('entry_stock_display');
		$data['entry_stock_warning'] = $this->language->get('entry_stock_warning');
		$data['entry_stock_checkout'] = $this->language->get('entry_stock_checkout');
		$data['entry_affiliate_approval'] = $this->language->get('entry_affiliate_approval');
		$data['entry_affiliate_auto'] = $this->language->get('entry_affiliate_auto');
		$data['entry_affiliate_commission'] = $this->language->get('entry_affiliate_commission');
		$data['entry_affiliate'] = $this->language->get('entry_affiliate');
		$data['entry_return'] = $this->language->get('entry_return');
		$data['entry_return_status'] = $this->language->get('entry_return_status');
		$data['entry_captcha'] = $this->language->get('entry_captcha');
		$data['entry_captcha_page'] = $this->language->get('entry_captcha_page');
		$data['entry_logo'] = $this->language->get('entry_logo');
		$data['entry_icon'] = $this->language->get('entry_icon');
		$data['entry_ftp_hostname'] = $this->language->get('entry_ftp_hostname');
		$data['entry_ftp_port'] = $this->language->get('entry_ftp_port');
		$data['entry_ftp_username'] = $this->language->get('entry_ftp_username');
		$data['entry_ftp_password'] = $this->language->get('entry_ftp_password');
		$data['entry_ftp_root'] = $this->language->get('entry_ftp_root');
		$data['entry_ftp_status'] = $this->language->get('entry_ftp_status');
		$data['entry_mail_protocol'] = $this->language->get('entry_mail_protocol');
		$data['entry_mail_parameter'] = $this->language->get('entry_mail_parameter');
		$data['entry_mail_smtp_hostname'] = $this->language->get('entry_mail_smtp_hostname');
		$data['entry_mail_smtp_username'] = $this->language->get('entry_mail_smtp_username');
		$data['entry_mail_smtp_password'] = $this->language->get('entry_mail_smtp_password');
		$data['entry_mail_smtp_port'] = $this->language->get('entry_mail_smtp_port');
		$data['entry_mail_smtp_timeout'] = $this->language->get('entry_mail_smtp_timeout');
		$data['entry_mail_alert'] = $this->language->get('entry_mail_alert');
		$data['entry_mail_alert_email'] = $this->language->get('entry_mail_alert_email');
		$data['entry_alert_email'] = $this->language->get('entry_alert_email');
		$data['entry_action_not_found'] = $this->language->get('entry_action_not_found');
		$data['entry_secure'] = $this->language->get('entry_secure');
		$data['entry_shared'] = $this->language->get('entry_shared');
		$data['entry_session_engine'] = $this->language->get('entry_session_engine');
		$data['entry_session_count'] = $this->language->get('entry_session_count');
		$data['entry_session_name'] = $this->language->get('entry_session_name');
		$data['entry_session_prefix'] = $this->language->get('entry_session_prefix');
		$data['entry_session_bits_per_char'] = $this->language->get('entry_session_bits_per_char');
		$data['entry_session_length'] = $this->language->get('entry_session_length');
		$data['entry_session_lifetime'] = $this->language->get('entry_session_lifetime');
		$data['entry_session_maxlifetime'] = $this->language->get('entry_session_maxlifetime');
		$data['entry_session_other_lifetime'] = $this->language->get('entry_session_other_lifetime');
		$data['entry_session_probability'] = $this->language->get('entry_session_probability');
		$data['entry_session_divisor'] = $this->language->get('entry_session_divisor');
		$data['entry_session_samesite'] = $this->language->get('entry_session_samesite');
		$data['entry_session_other_samesite'] = $this->language->get('entry_session_other_samesite');
		$data['entry_session_sameparty'] = $this->language->get('entry_session_sameparty');
		$data['entry_session_other_sameparty'] = $this->language->get('entry_session_other_sameparty');
		$data['entry_robots'] = $this->language->get('entry_robots');
		$data['entry_file_max_size'] = $this->language->get('entry_file_max_size');
		$data['entry_file_ext_allowed'] = $this->language->get('entry_file_ext_allowed');
		$data['entry_file_mime_allowed'] = $this->language->get('entry_file_mime_allowed');
		$data['entry_maintenance'] = $this->language->get('entry_maintenance');
		$data['entry_password'] = $this->language->get('entry_password');
		$data['entry_encryption'] = $this->language->get('entry_encryption');
		$data['entry_seo_url'] = $this->language->get('entry_seo_url');
		$data['entry_seo_url_cache'] = $this->language->get('entry_seo_url_cache');
		$data['entry_seo_url_include_path'] = $this->language->get('entry_seo_url_include_path');
		$data['entry_blog_full_path'] = $this->language->get('entry_blog_full_path');
		$data['entry_manufacturers_full_path'] = $this->language->get('entry_manufacturers_full_path');
		$data['entry_seo_url_postfix'] = $this->language->get('entry_seo_url_postfix');
		$data['entry_seo_url_break_routes'] = $this->language->get('entry_seo_url_break_routes');
		$data['entry_seo_url_get_params_status'] = $this->language->get('entry_seo_url_get_params_status');
		$data['entry_seo_url_get_params'] = $this->language->get('entry_seo_url_get_params');
		$data['entry_compression'] = $this->language->get('entry_compression');
		$data['entry_error_display'] = $this->language->get('entry_error_display');
		$data['entry_error_log'] = $this->language->get('entry_error_log');
		$data['entry_error_filename'] = $this->language->get('entry_error_filename');
		$data['entry_debug_pro'] = $this->language->get('entry_debug_pro');
		$data['entry_status'] = $this->language->get('entry_status');

		$data['help_geocode'] = $this->language->get('help_geocode');
		$data['help_open'] = $this->language->get('help_open');
		$data['help_comment'] = $this->language->get('help_comment');
		$data['help_location'] = $this->language->get('help_location');
		$data['help_currency'] = $this->language->get('help_currency');
		$data['help_currency_auto'] = $this->language->get('help_currency_auto');
		$data['help_limit_admin'] = $this->language->get('help_limit_admin');
		$data['help_product_count'] = $this->language->get('help_product_count');
		$data['help_review'] = $this->language->get('help_review');
		$data['help_review_guest'] = $this->language->get('help_review_guest');
		$data['help_voucher_min'] = $this->language->get('help_voucher_min');
		$data['help_voucher_max'] = $this->language->get('help_voucher_max');
		$data['help_tax_default'] = $this->language->get('help_tax_default');
		$data['help_tax_customer'] = $this->language->get('help_tax_customer');
		$data['help_customer_online'] = $this->language->get('help_customer_online');
		$data['help_customer_activity'] = $this->language->get('help_customer_activity');
		$data['help_customer_group'] = $this->language->get('help_customer_group');
		$data['help_customer_group_display'] = $this->language->get('help_customer_group_display');
		$data['help_customer_price'] = $this->language->get('help_customer_price');
		$data['help_login_attempts'] = $this->language->get('help_login_attempts');
		$data['help_account'] = $this->language->get('help_account');
		$data['help_cart_weight'] = $this->language->get('help_cart_weight');
		$data['help_checkout_guest'] = $this->language->get('help_checkout_guest');
		$data['help_checkout'] = $this->language->get('help_checkout');
		$data['help_invoice_prefix'] = $this->language->get('help_invoice_prefix');
		$data['help_order_status'] = $this->language->get('help_order_status');
		$data['help_processing_status'] = $this->language->get('help_processing_status');
		$data['help_complete_status'] = $this->language->get('help_complete_status');
		$data['help_fraud_status'] = $this->language->get('help_fraud_status');
		$data['help_api'] = $this->language->get('help_api');
		$data['help_stock_display'] = $this->language->get('help_stock_display');
		$data['help_stock_warning'] = $this->language->get('help_stock_warning');
		$data['help_stock_checkout'] = $this->language->get('help_stock_checkout');
		$data['help_affiliate_approval'] = $this->language->get('help_affiliate_approval');
		$data['help_affiliate_auto'] = $this->language->get('help_affiliate_auto');
		$data['help_affiliate_commission'] = $this->language->get('help_affiliate_commission');
		$data['help_affiliate'] = $this->language->get('help_affiliate');
		$data['help_commission'] = $this->language->get('help_commission');
		$data['help_return'] = $this->language->get('help_return');
		$data['help_return_status'] = $this->language->get('help_return_status');
		$data['help_captcha'] = $this->language->get('help_captcha');
		$data['help_icon'] = $this->language->get('help_icon');
		$data['help_ftp_root'] = $this->language->get('help_ftp_root');
		$data['help_mail_protocol'] = $this->language->get('help_mail_protocol');
		$data['help_mail_parameter'] = $this->language->get('help_mail_parameter');
		$data['help_mail_smtp_hostname'] = $this->language->get('help_mail_smtp_hostname');
		$data['help_mail_smtp_password'] = $this->language->get('help_mail_smtp_password');
		$data['help_mail_alert'] = $this->language->get('help_mail_alert');
		$data['help_mail_alert_email'] = $this->language->get('help_mail_alert_email');
		$data['help_action_not_found'] = $this->language->get('help_action_not_found');
		$data['help_secure'] = $this->language->get('help_secure');
		$data['help_shared'] = $this->language->get('help_shared');
		$data['help_session_engine'] = $this->language->get('help_session_engine');
		$data['help_session_name'] = $this->language->get('help_session_name');
		$data['help_session_prefix'] = $this->language->get('help_session_prefix');
		$data['help_session_bits_per_char'] = $this->language->get('help_session_bits_per_char');
		$data['help_session_length'] = $this->language->get('help_session_length');
		$data['help_session_lifetime'] = $this->language->get('help_session_lifetime');
		$data['help_session_maxlifetime'] = $this->language->get('help_session_maxlifetime');
		$data['help_session_other_lifetime'] = $this->language->get('help_session_other_lifetime');
		$data['help_session_probability'] = $this->language->get('help_session_probability');
		$data['help_session_divisor'] = $this->language->get('help_session_divisor');
		$data['help_session_samesite'] = $this->language->get('help_session_samesite');
		$data['help_session_other_samesite'] = $this->language->get('help_session_other_samesite');
		$data['help_session_sameparty'] = $this->language->get('help_session_sameparty');
		$data['help_session_other_sameparty'] = $this->language->get('help_session_other_sameparty');
		$data['help_robots'] = $this->language->get('help_robots');
		$data['help_seo_url'] = $this->language->get('help_seo_url');
		$data['help_seo_url_cache'] = $this->language->get('help_seo_url_cache');
		$data['help_seo_url_include_path'] = $this->language->get('help_seo_url_include_path');
		$data['help_blog_full_path'] = $this->language->get('help_blog_full_path');
		$data['help_manufacturers_full_path'] = $this->language->get('help_manufacturers_full_path');
		$data['help_seo_url_postfix'] = $this->language->get('help_seo_url_postfix');
		$data['help_seo_url_break_routes'] = $this->language->get('help_seo_url_break_routes');
		$data['help_seo_url_get_params_status'] = $this->language->get('help_seo_url_get_params_status');
		$data['help_seo_url_get_params'] = $this->language->get('help_seo_url_get_params');
		$data['help_file_max_size'] = $this->language->get('help_file_max_size');
		$data['help_file_ext_allowed'] = $this->language->get('help_file_ext_allowed');
		$data['help_file_mime_allowed'] = $this->language->get('help_file_mime_allowed');
		$data['help_maintenance'] = $this->language->get('help_maintenance');
		$data['help_password'] = $this->language->get('help_password');
		$data['help_encryption'] = $this->language->get('help_encryption');
		$data['help_compression'] = $this->language->get('help_compression');
		$data['help_debug_pro'] = $this->language->get('help_debug_pro');

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

		$data['tab_general'] = $this->language->get('tab_general');
		$data['tab_store'] = $this->language->get('tab_store');
		$data['tab_local'] = $this->language->get('tab_local');
		$data['tab_option'] = $this->language->get('tab_option');
		$data['tab_image'] = $this->language->get('tab_image');
		$data['tab_ftp'] = $this->language->get('tab_ftp');
		$data['tab_mail'] = $this->language->get('tab_mail');
		$data['tab_server'] = $this->language->get('tab_server');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['name'])) {
			$data['error_name'] = $this->error['name'];
		} else {
			$data['error_name'] = '';
		}

		if (isset($this->error['owner'])) {
			$data['error_owner'] = $this->error['owner'];
		} else {
			$data['error_owner'] = '';
		}

		if (isset($this->error['address'])) {
			$data['error_address'] = $this->error['address'];
		} else {
			$data['error_address'] = '';
		}

		if (isset($this->error['email'])) {
			$data['error_email'] = $this->error['email'];
		} else {
			$data['error_email'] = '';
		}

		if (isset($this->error['telephone'])) {
			$data['error_telephone'] = $this->error['telephone'];
		} else {
			$data['error_telephone'] = '';
		}

		if (isset($this->error['meta_title'])) {
			$data['error_meta_title'] = $this->error['meta_title'];
		} else {
			$data['error_meta_title'] = '';
		}

		if (isset($this->error['country'])) {
			$data['error_country'] = $this->error['country'];
		} else {
			$data['error_country'] = '';
		}

		if (isset($this->error['zone'])) {
			$data['error_zone'] = $this->error['zone'];
		} else {
			$data['error_zone'] = '';
		}

		if (isset($this->error['customer_group_display'])) {
			$data['error_customer_group_display'] = $this->error['customer_group_display'];
		} else {
			$data['error_customer_group_display'] = '';
		}

		if (isset($this->error['login_attempts'])) {
			$data['error_login_attempts'] = $this->error['login_attempts'];
		} else {
			$data['error_login_attempts'] = '';
		}

		if (isset($this->error['voucher_min'])) {
			$data['error_voucher_min'] = $this->error['voucher_min'];
		} else {
			$data['error_voucher_min'] = '';
		}

		if (isset($this->error['voucher_max'])) {
			$data['error_voucher_max'] = $this->error['voucher_max'];
		} else {
			$data['error_voucher_max'] = '';
		}

		if (isset($this->error['processing_status'])) {
			$data['error_processing_status'] = $this->error['processing_status'];
		} else {
			$data['error_processing_status'] = '';
		}

		if (isset($this->error['complete_status'])) {
			$data['error_complete_status'] = $this->error['complete_status'];
		} else {
			$data['error_complete_status'] = '';
		}

		if (isset($this->error['ftp_hostname'])) {
			$data['error_ftp_hostname'] = $this->error['ftp_hostname'];
		} else {
			$data['error_ftp_hostname'] = '';
		}

		if (isset($this->error['ftp_port'])) {
			$data['error_ftp_port'] = $this->error['ftp_port'];
		} else {
			$data['error_ftp_port'] = '';
		}

		if (isset($this->error['ftp_username'])) {
			$data['error_ftp_username'] = $this->error['ftp_username'];
		} else {
			$data['error_ftp_username'] = '';
		}

		if (isset($this->error['ftp_password'])) {
			$data['error_ftp_password'] = $this->error['ftp_password'];
		} else {
			$data['error_ftp_password'] = '';
		}

		if (isset($this->error['error_filename'])) {
			$data['error_error_filename'] = $this->error['error_filename'];
		} else {
			$data['error_error_filename'] = '';
		}

		if (isset($this->error['limit_admin'])) {
			$data['error_limit_admin'] = $this->error['limit_admin'];
		} else {
			$data['error_limit_admin'] = '';
		}

		if (isset($this->error['encryption'])) {
			$data['error_encryption'] = $this->error['encryption'];
		} else {
			$data['error_encryption'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_stores'),
			'href' => $this->url->link('setting/store', 'token=' . $this->session->data['token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('setting/setting', 'token=' . $this->session->data['token'], true)
		);

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];

			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

		$data['action'] = $this->url->link('setting/setting', 'token=' . $this->session->data['token'], true);

		$data['cancel'] = $this->url->link('setting/store', 'token=' . $this->session->data['token'], true);

		$data['token'] = $this->session->data['token'];

		if (isset($this->request->post['config_meta_title'])) {
			$data['config_meta_title'] = $this->request->post['config_meta_title'];
		} else {
			$data['config_meta_title'] = $this->config->get('config_meta_title');
		}

		if (isset($this->request->post['config_meta_description'])) {
			$data['config_meta_description'] = $this->request->post['config_meta_description'];
		} else {
			$data['config_meta_description'] = $this->config->get('config_meta_description');
		}

		if (isset($this->request->post['config_meta_keyword'])) {
			$data['config_meta_keyword'] = $this->request->post['config_meta_keyword'];
		} else {
			$data['config_meta_keyword'] = $this->config->get('config_meta_keyword');
		}

		if (isset($this->request->post['config_theme'])) {
			$data['config_theme'] = $this->request->post['config_theme'];
		} else {
			$data['config_theme'] = $this->config->get('config_theme');
		}

		if ($this->request->server['HTTPS']) {
			$data['store_url'] = HTTPS_CATALOG;
		} else {
			$data['store_url'] = HTTP_CATALOG;
		}

		$data['themes'] = array();

		$this->load->model('extension/extension');

		$extensions = $this->model_extension_extension->getInstalled('theme');

		foreach ($extensions as $code) {
			$this->load->language('extension/theme/' . $code);

			$data['themes'][] = array(
				'text'  => $this->language->get('heading_title'),
				'value' => $code
			);
		}

		if (isset($this->request->post['config_layout_id'])) {
			$data['config_layout_id'] = $this->request->post['config_layout_id'];
		} else {
			$data['config_layout_id'] = $this->config->get('config_layout_id');
		}

		$this->load->model('design/layout');

		$data['layouts'] = $this->model_design_layout->getLayouts();

		if (isset($this->request->post['config_name'])) {
			$data['config_name'] = $this->request->post['config_name'];
		} else {
			$data['config_name'] = $this->config->get('config_name');
		}

		if (isset($this->request->post['config_owner'])) {
			$data['config_owner'] = $this->request->post['config_owner'];
		} else {
			$data['config_owner'] = $this->config->get('config_owner');
		}

		if (isset($this->request->post['config_address'])) {
			$data['config_address'] = $this->request->post['config_address'];
		} else {
			$data['config_address'] = $this->config->get('config_address');
		}

		if (isset($this->request->post['config_geocode'])) {
			$data['config_geocode'] = $this->request->post['config_geocode'];
		} else {
			$data['config_geocode'] = $this->config->get('config_geocode');
		}

		if (isset($this->request->post['config_email'])) {
			$data['config_email'] = $this->request->post['config_email'];
		} else {
			$data['config_email'] = $this->config->get('config_email');
		}

		if (isset($this->request->post['config_telephone'])) {
			$data['config_telephone'] = $this->request->post['config_telephone'];
		} else {
			$data['config_telephone'] = $this->config->get('config_telephone');
		}

		if (isset($this->request->post['config_fax'])) {
			$data['config_fax'] = $this->request->post['config_fax'];
		} else {
			$data['config_fax'] = $this->config->get('config_fax');
		}

		if (isset($this->request->post['config_image'])) {
			$data['config_image'] = $this->request->post['config_image'];
		} else {
			$data['config_image'] = $this->config->get('config_image');
		}

		$this->load->model('tool/image');

		if (isset($this->request->post['config_image']) && is_file(DIR_IMAGE . $this->request->post['config_image'])) {
			$data['thumb'] = $this->model_tool_image->resize($this->request->post['config_image'], 100, 100);
		} elseif ($this->config->get('config_image') && is_file(DIR_IMAGE . $this->config->get('config_image'))) {
			$data['thumb'] = $this->model_tool_image->resize($this->config->get('config_image'), 100, 100);
		} else {
			$data['thumb'] = $this->model_tool_image->resize('no_image.png', 100, 100);
		}

		$data['placeholder'] = $this->model_tool_image->resize('no_image.png', 100, 100);

		if (isset($this->request->post['config_open'])) {
			$data['config_open'] = $this->request->post['config_open'];
		} else {
			$data['config_open'] = $this->config->get('config_open');
		}

		if (isset($this->request->post['config_comment'])) {
			$data['config_comment'] = $this->request->post['config_comment'];
		} else {
			$data['config_comment'] = $this->config->get('config_comment');
		}

		$this->load->model('localisation/location');

		$data['locations'] = $this->model_localisation_location->getLocations();

		if (isset($this->request->post['config_location'])) {
			$data['config_location'] = $this->request->post['config_location'];
		} elseif ($this->config->get('config_location')) {
			$data['config_location'] = $this->config->get('config_location');
		} else {
			$data['config_location'] = array();
		}

		if (isset($this->request->post['config_country_id'])) {
			$data['config_country_id'] = $this->request->post['config_country_id'];
		} else {
			$data['config_country_id'] = $this->config->get('config_country_id');
		}

		$this->load->model('localisation/country');

		$data['countries'] = $this->model_localisation_country->getCountries();

		if (isset($this->request->post['config_zone_id'])) {
			$data['config_zone_id'] = $this->request->post['config_zone_id'];
		} else {
			$data['config_zone_id'] = $this->config->get('config_zone_id');
		}

		if (isset($this->request->post['config_language'])) {
			$data['config_language'] = $this->request->post['config_language'];
		} else {
			$data['config_language'] = $this->config->get('config_language');
		}

		$this->load->model('localisation/language');

		$data['languages'] = $this->model_localisation_language->getLanguages();

		if (isset($this->request->post['config_admin_language'])) {
			$data['config_admin_language'] = $this->request->post['config_admin_language'];
		} else {
			$data['config_admin_language'] = $this->config->get('config_admin_language');
		}

		if (isset($this->request->post['config_currency'])) {
			$data['config_currency'] = $this->request->post['config_currency'];
		} else {
			$data['config_currency'] = $this->config->get('config_currency');
		}

		if (isset($this->request->post['config_currency_auto'])) {
			$data['config_currency_auto'] = $this->request->post['config_currency_auto'];
		} else {
			$data['config_currency_auto'] = $this->config->get('config_currency_auto');
		}

		$this->load->model('localisation/currency');

		$data['currencies'] = $this->model_localisation_currency->getCurrencies();

		if (isset($this->request->post['config_length_class_id'])) {
			$data['config_length_class_id'] = $this->request->post['config_length_class_id'];
		} else {
			$data['config_length_class_id'] = $this->config->get('config_length_class_id');
		}

		$this->load->model('localisation/length_class');

		$data['length_classes'] = $this->model_localisation_length_class->getLengthClasses();

		if (isset($this->request->post['config_weight_class_id'])) {
			$data['config_weight_class_id'] = $this->request->post['config_weight_class_id'];
		} else {
			$data['config_weight_class_id'] = $this->config->get('config_weight_class_id');
		}

		$this->load->model('localisation/weight_class');

		$data['weight_classes'] = $this->model_localisation_weight_class->getWeightClasses();

		if (isset($this->request->post['config_limit_admin'])) {
			$data['config_limit_admin'] = $this->request->post['config_limit_admin'];
		} else {
			$data['config_limit_admin'] = $this->config->get('config_limit_admin');
		}

		if (isset($this->request->post['config_product_count'])) {
			$data['config_product_count'] = $this->request->post['config_product_count'];
		} else {
			$data['config_product_count'] = $this->config->get('config_product_count');
		}

		if (isset($this->request->post['config_review_status'])) {
			$data['config_review_status'] = $this->request->post['config_review_status'];
		} else {
			$data['config_review_status'] = $this->config->get('config_review_status');
		}

		if (isset($this->request->post['config_review_guest'])) {
			$data['config_review_guest'] = $this->request->post['config_review_guest'];
		} else {
			$data['config_review_guest'] = $this->config->get('config_review_guest');
		}

		if (isset($this->request->post['config_voucher_min'])) {
			$data['config_voucher_min'] = $this->request->post['config_voucher_min'];
		} else {
			$data['config_voucher_min'] = $this->config->get('config_voucher_min');
		}

		if (isset($this->request->post['config_voucher_max'])) {
			$data['config_voucher_max'] = $this->request->post['config_voucher_max'];
		} else {
			$data['config_voucher_max'] = $this->config->get('config_voucher_max');
		}

		if (isset($this->request->post['config_tax'])) {
			$data['config_tax'] = $this->request->post['config_tax'];
		} else {
			$data['config_tax'] = $this->config->get('config_tax');
		}

		if (isset($this->request->post['config_tax_default'])) {
			$data['config_tax_default'] = $this->request->post['config_tax_default'];
		} else {
			$data['config_tax_default'] = $this->config->get('config_tax_default');
		}

		if (isset($this->request->post['config_tax_customer'])) {
			$data['config_tax_customer'] = $this->request->post['config_tax_customer'];
		} else {
			$data['config_tax_customer'] = $this->config->get('config_tax_customer');
		}

		if (isset($this->request->post['config_customer_online'])) {
			$data['config_customer_online'] = $this->request->post['config_customer_online'];
		} else {
			$data['config_customer_online'] = $this->config->get('config_customer_online');
		}

		if (isset($this->request->post['config_customer_activity'])) {
			$data['config_customer_activity'] = $this->request->post['config_customer_activity'];
		} else {
			$data['config_customer_activity'] = $this->config->get('config_customer_activity');
		}

		if (isset($this->request->post['config_customer_search'])) {
			$data['config_customer_search'] = $this->request->post['config_customer_search'];
		} else {
			$data['config_customer_search'] = $this->config->get('config_customer_search');
		}

		if (isset($this->request->post['config_customer_group_id'])) {
			$data['config_customer_group_id'] = $this->request->post['config_customer_group_id'];
		} else {
			$data['config_customer_group_id'] = $this->config->get('config_customer_group_id');
		}

		$this->load->model('customer/customer_group');

		$data['customer_groups'] = $this->model_customer_customer_group->getCustomerGroups();

		if (isset($this->request->post['config_customer_group_display'])) {
			$data['config_customer_group_display'] = $this->request->post['config_customer_group_display'];
		} elseif ($this->config->get('config_customer_group_display')) {
			$data['config_customer_group_display'] = $this->config->get('config_customer_group_display');
		} else {
			$data['config_customer_group_display'] = array();
		}

		if (isset($this->request->post['config_customer_price'])) {
			$data['config_customer_price'] = $this->request->post['config_customer_price'];
		} else {
			$data['config_customer_price'] = $this->config->get('config_customer_price');
		}

		if (isset($this->request->post['config_login_attempts'])) {
			$data['config_login_attempts'] = $this->request->post['config_login_attempts'];
		} elseif ($this->config->has('config_login_attempts')) {
			$data['config_login_attempts'] = $this->config->get('config_login_attempts');
		} else {
			$data['config_login_attempts'] = 5;
		}

		if (isset($this->request->post['config_account_id'])) {
			$data['config_account_id'] = $this->request->post['config_account_id'];
		} else {
			$data['config_account_id'] = $this->config->get('config_account_id');
		}

		$this->load->model('catalog/information');

		$data['informations'] = $this->model_catalog_information->getInformations();

		if (isset($this->request->post['config_cart_weight'])) {
			$data['config_cart_weight'] = $this->request->post['config_cart_weight'];
		} else {
			$data['config_cart_weight'] = $this->config->get('config_cart_weight');
		}

		if (isset($this->request->post['config_checkout_guest'])) {
			$data['config_checkout_guest'] = $this->request->post['config_checkout_guest'];
		} else {
			$data['config_checkout_guest'] = $this->config->get('config_checkout_guest');
		}

		if (isset($this->request->post['config_checkout_id'])) {
			$data['config_checkout_id'] = $this->request->post['config_checkout_id'];
		} else {
			$data['config_checkout_id'] = $this->config->get('config_checkout_id');
		}

		if (isset($this->request->post['config_invoice_prefix'])) {
			$data['config_invoice_prefix'] = $this->request->post['config_invoice_prefix'];
		} elseif ($this->config->get('config_invoice_prefix')) {
			$data['config_invoice_prefix'] = $this->config->get('config_invoice_prefix');
		} else {
			$data['config_invoice_prefix'] = 'INV-' . date('Y') . '-00';
		}

		if (isset($this->request->post['config_order_status_id'])) {
			$data['config_order_status_id'] = $this->request->post['config_order_status_id'];
		} else {
			$data['config_order_status_id'] = $this->config->get('config_order_status_id');
		}

		if (isset($this->request->post['config_processing_status'])) {
			$data['config_processing_status'] = $this->request->post['config_processing_status'];
		} elseif ($this->config->get('config_processing_status')) {
			$data['config_processing_status'] = $this->config->get('config_processing_status');
		} else {
			$data['config_processing_status'] = array();
		}

		if (isset($this->request->post['config_complete_status'])) {
			$data['config_complete_status'] = $this->request->post['config_complete_status'];
		} elseif ($this->config->get('config_complete_status')) {
			$data['config_complete_status'] = $this->config->get('config_complete_status');
		} else {
			$data['config_complete_status'] = array();
		}

		if (isset($this->request->post['config_fraud_status_id'])) {
			$data['config_fraud_status_id'] = $this->request->post['config_fraud_status_id'];
		} else {
			$data['config_fraud_status_id'] = $this->config->get('config_fraud_status_id');
		}

		$this->load->model('localisation/order_status');

		$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

		if (isset($this->request->post['config_api_id'])) {
			$data['config_api_id'] = $this->request->post['config_api_id'];
		} else {
			$data['config_api_id'] = $this->config->get('config_api_id');
		}

		$this->load->model('user/api');

		$data['apis'] = $this->model_user_api->getApis();

		if (isset($this->request->post['config_stock_display'])) {
			$data['config_stock_display'] = $this->request->post['config_stock_display'];
		} else {
			$data['config_stock_display'] = $this->config->get('config_stock_display');
		}

		if (isset($this->request->post['config_stock_warning'])) {
			$data['config_stock_warning'] = $this->request->post['config_stock_warning'];
		} else {
			$data['config_stock_warning'] = $this->config->get('config_stock_warning');
		}

		if (isset($this->request->post['config_stock_checkout'])) {
			$data['config_stock_checkout'] = $this->request->post['config_stock_checkout'];
		} else {
			$data['config_stock_checkout'] = $this->config->get('config_stock_checkout');
		}

		if (isset($this->request->post['config_affiliate_approval'])) {
			$data['config_affiliate_approval'] = $this->request->post['config_affiliate_approval'];
		} elseif ($this->config->has('config_affiliate_approval')) {
			$data['config_affiliate_approval'] = $this->config->get('config_affiliate_approval');
		} else {
			$data['config_affiliate_approval'] = '';
		}

		if (isset($this->request->post['config_affiliate_auto'])) {
			$data['config_affiliate_auto'] = $this->request->post['config_affiliate_auto'];
		} elseif ($this->config->has('config_affiliate_auto')) {
			$data['config_affiliate_auto'] = $this->config->get('config_affiliate_auto');
		} else {
			$data['config_affiliate_auto'] = '';
		}

		if (isset($this->request->post['config_affiliate_commission'])) {
			$data['config_affiliate_commission'] = $this->request->post['config_affiliate_commission'];
		} elseif ($this->config->has('config_affiliate_commission')) {
			$data['config_affiliate_commission'] = $this->config->get('config_affiliate_commission');
		} else {
			$data['config_affiliate_commission'] = '5.00';
		}

		if (isset($this->request->post['config_affiliate_id'])) {
			$data['config_affiliate_id'] = $this->request->post['config_affiliate_id'];
		} else {
			$data['config_affiliate_id'] = $this->config->get('config_affiliate_id');
		}

		if (isset($this->request->post['config_return_id'])) {
			$data['config_return_id'] = $this->request->post['config_return_id'];
		} else {
			$data['config_return_id'] = $this->config->get('config_return_id');
		}

		if (isset($this->request->post['config_return_status_id'])) {
			$data['config_return_status_id'] = $this->request->post['config_return_status_id'];
		} else {
			$data['config_return_status_id'] = $this->config->get('config_return_status_id');
		}

		$this->load->model('localisation/return_status');

		$data['return_statuses'] = $this->model_localisation_return_status->getReturnStatuses();

		if (isset($this->request->post['config_captcha'])) {
			$data['config_captcha'] = $this->request->post['config_captcha'];
		} else {
			$data['config_captcha'] = $this->config->get('config_captcha');
		}

		$this->load->model('extension/extension');

		$data['captchas'] = array();

		// Get a list of installed captchas
		$extensions = $this->model_extension_extension->getInstalled('captcha');

		foreach ($extensions as $code) {
			$this->load->language('extension/captcha/' . $code);

			if ($this->config->get($code . '_status')) {
				$data['captchas'][] = array(
					'text'  => $this->language->get('heading_title'),
					'value' => $code
				);
			}
		}

		if (isset($this->request->post['config_captcha_page'])) {
			$data['config_captcha_page'] = $this->request->post['config_captcha_page'];
		} elseif ($this->config->has('config_captcha_page')) {
		   	$data['config_captcha_page'] = $this->config->get('config_captcha_page');
		} else {
			$data['config_captcha_page'] = array();
		}

		$data['captcha_pages'] = array();

		$data['captcha_pages'][] = array(
			'text'  => $this->language->get('text_register'),
			'value' => 'register'
		);

		$data['captcha_pages'][] = array(
			'text'  => $this->language->get('text_guest'),
			'value' => 'guest'
		);

		$data['captcha_pages'][] = array(
			'text'  => $this->language->get('text_review'),
			'value' => 'review'
		);

		$data['captcha_pages'][] = array(
			'text'  => $this->language->get('text_return'),
			'value' => 'return'
		);

		$data['captcha_pages'][] = array(
			'text'  => $this->language->get('text_contact'),
			'value' => 'contact'
		);

		if (isset($this->request->post['config_logo'])) {
			$data['config_logo'] = $this->request->post['config_logo'];
		} else {
			$data['config_logo'] = $this->config->get('config_logo');
		}

		if (isset($this->request->post['config_logo']) && is_file(DIR_IMAGE . $this->request->post['config_logo'])) {
			$data['logo'] = $this->model_tool_image->resize($this->request->post['config_logo'], 100, 100);
		} elseif ($this->config->get('config_logo') && is_file(DIR_IMAGE . $this->config->get('config_logo'))) {
			$data['logo'] = $this->model_tool_image->resize($this->config->get('config_logo'), 100, 100);
		} else {
			$data['logo'] = $this->model_tool_image->resize('no_image.png', 100, 100);
		}

		if (isset($this->request->post['config_icon'])) {
			$data['config_icon'] = $this->request->post['config_icon'];
		} else {
			$data['config_icon'] = $this->config->get('config_icon');
		}

		if (isset($this->request->post['config_icon']) && is_file(DIR_IMAGE . $this->request->post['config_icon'])) {
			$data['icon'] = $this->model_tool_image->resize($this->request->post['config_icon'], 100, 100);
		} elseif ($this->config->get('config_icon') && is_file(DIR_IMAGE . $this->config->get('config_icon'))) {
			$data['icon'] = $this->model_tool_image->resize($this->config->get('config_icon'), 100, 100);
		} else {
			$data['icon'] = $this->model_tool_image->resize('no_image.png', 100, 100);
		}

		if (isset($this->request->post['config_ftp_hostname'])) {
			$data['config_ftp_hostname'] = $this->request->post['config_ftp_hostname'];
		} elseif ($this->config->get('config_ftp_hostname')) {
			$data['config_ftp_hostname'] = $this->config->get('config_ftp_hostname');
		} else {
			$data['config_ftp_hostname'] = str_replace('www.', '', $this->request->server['HTTP_HOST']);
		}

		if (isset($this->request->post['config_ftp_port'])) {
			$data['config_ftp_port'] = $this->request->post['config_ftp_port'];
		} elseif ($this->config->get('config_ftp_port')) {
			$data['config_ftp_port'] = $this->config->get('config_ftp_port');
		} else {
			$data['config_ftp_port'] = 21;
		}

		if (isset($this->request->post['config_ftp_username'])) {
			$data['config_ftp_username'] = $this->request->post['config_ftp_username'];
		} else {
			$data['config_ftp_username'] = $this->config->get('config_ftp_username');
		}

		if (isset($this->request->post['config_ftp_password'])) {
			$data['config_ftp_password'] = $this->request->post['config_ftp_password'];
		} else {
			$data['config_ftp_password'] = $this->config->get('config_ftp_password');
		}

		if (isset($this->request->post['config_ftp_root'])) {
			$data['config_ftp_root'] = $this->request->post['config_ftp_root'];
		} else {
			$data['config_ftp_root'] = $this->config->get('config_ftp_root');
		}

		if (isset($this->request->post['config_ftp_status'])) {
			$data['config_ftp_status'] = $this->request->post['config_ftp_status'];
		} else {
			$data['config_ftp_status'] = $this->config->get('config_ftp_status');
		}

		if (isset($this->request->post['config_mail_protocol'])) {
			$data['config_mail_protocol'] = $this->request->post['config_mail_protocol'];
		} else {
			$data['config_mail_protocol'] = $this->config->get('config_mail_protocol');
		}

		if (isset($this->request->post['config_mail_parameter'])) {
			$data['config_mail_parameter'] = $this->request->post['config_mail_parameter'];
		} else {
			$data['config_mail_parameter'] = $this->config->get('config_mail_parameter');
		}

		if (isset($this->request->post['config_mail_smtp_hostname'])) {
			$data['config_mail_smtp_hostname'] = $this->request->post['config_mail_smtp_hostname'];
		} else {
			$data['config_mail_smtp_hostname'] = $this->config->get('config_mail_smtp_hostname');
		}

		if (isset($this->request->post['config_mail_smtp_username'])) {
			$data['config_mail_smtp_username'] = $this->request->post['config_mail_smtp_username'];
		} else {
			$data['config_mail_smtp_username'] = $this->config->get('config_mail_smtp_username');
		}

		if (isset($this->request->post['config_mail_smtp_password'])) {
			$data['config_mail_smtp_password'] = $this->request->post['config_mail_smtp_password'];
		} else {
			$data['config_mail_smtp_password'] = $this->config->get('config_mail_smtp_password');
		}

		if (isset($this->request->post['config_mail_smtp_port'])) {
			$data['config_mail_smtp_port'] = $this->request->post['config_mail_smtp_port'];
		} elseif ($this->config->has('config_mail_smtp_port')) {
			$data['config_mail_smtp_port'] = $this->config->get('config_mail_smtp_port');
		} else {
			$data['config_mail_smtp_port'] = 25;
		}

		if (isset($this->request->post['config_mail_smtp_timeout'])) {
			$data['config_mail_smtp_timeout'] = $this->request->post['config_mail_smtp_timeout'];
		} elseif ($this->config->has('config_mail_smtp_timeout')) {
			$data['config_mail_smtp_timeout'] = $this->config->get('config_mail_smtp_timeout');
		} else {
			$data['config_mail_smtp_timeout'] = 5;
		}

		if (isset($this->request->post['config_mail_alert'])) {
			$data['config_mail_alert'] = $this->request->post['config_mail_alert'];
		} elseif ($this->config->has('config_mail_alert')) {
		   	$data['config_mail_alert'] = $this->config->get('config_mail_alert');
		} else {
			$data['config_mail_alert'] = array();
		}

		$data['mail_alerts'] = array();

		$data['mail_alerts'][] = array(
			'text'  => $this->language->get('text_mail_account'),
			'value' => 'account'
		);

		$data['mail_alerts'][] = array(
			'text'  => $this->language->get('text_mail_affiliate'),
			'value' => 'affiliate'
		);

		$data['mail_alerts'][] = array(
			'text'  => $this->language->get('text_mail_order'),
			'value' => 'order'
		);

		$data['mail_alerts'][] = array(
			'text'  => $this->language->get('text_mail_review'),
			'value' => 'review'
		);

		if (isset($this->request->post['config_alert_email'])) {
			$data['config_alert_email'] = $this->request->post['config_alert_email'];
		} else {
			$data['config_alert_email'] = $this->config->get('config_alert_email');
		}

		if (isset($this->request->post['config_seo_url'])) {
			$data['config_seo_url'] = $this->request->post['config_seo_url'];
		} else {
			$data['config_seo_url'] = $this->config->get('config_seo_url');
		}

		if (isset($this->request->post['config_seo_url_cache'])) {
			$data['config_seo_url_cache'] = $this->request->post['config_seo_url_cache'];
		} else {
			$data['config_seo_url_cache'] = $this->config->get('config_seo_url_cache');
		}

		if (isset($this->request->post['config_seo_url_include_path'])) {
			$data['config_seo_url_include_path'] = $this->request->post['config_seo_url_include_path'];
		} else {
			$data['config_seo_url_include_path'] = $this->config->get('config_seo_url_include_path');
		}

		if (isset($this->request->post['config_blog_full_path'])) {
			$data['config_blog_full_path'] = $this->request->post['config_blog_full_path'];
		} else {
			$data['config_blog_full_path'] = $this->config->get('config_blog_full_path');
		}

		if (isset($this->request->post['config_manufacturers_full_path'])) {
			$data['config_manufacturers_full_path'] = $this->request->post['config_manufacturers_full_path'];
		} else {
			$data['config_manufacturers_full_path'] = $this->config->get('config_manufacturers_full_path');
		}

		if (isset($this->request->post['config_seo_url_postfix'])) {
			$data['config_seo_url_postfix'] = $this->request->post['config_seo_url_postfix'];
		} else {
			$data['config_seo_url_postfix'] = $this->config->get('config_seo_url_postfix');
		}

		if (isset($this->request->post['config_seo_url_break_routes'])) {
			$data['config_seo_url_break_routes'] = $this->request->post['config_seo_url_break_routes'];
		} elseif ($this->config->has('config_seo_url_break_routes')) {
			$data['config_seo_url_break_routes'] = $this->config->get('config_seo_url_break_routes');
		} else {
			$data['config_seo_url_break_routes'] = "error/not_found\r\nextension/feed/google_sitemap\r\nextension/feed/google_base\r\nextension/feed/sitemap_pro\r\nextension/feed/yandex_feed";
		}

		if (isset($this->request->post['config_seo_url_get_params_status'])) {
			$data['config_seo_url_get_params_status'] = $this->request->post['config_seo_url_get_params_status'];
		} elseif ($this->config->has('config_valide_get_params_status')) {
			$data['config_seo_url_get_params_status'] = $this->config->get('config_seo_url_get_params_status');
		} else {
			$data['config_seo_url_get_params_status'] = 1;
		}

		if (isset($this->request->post['config_seo_url_get_params'])) {
			$data['config_seo_url_get_params'] = $this->request->post['config_seo_url_get_params'];
		} elseif ($this->config->has('config_valide_get_params')) {
			$data['config_seo_url_get_params'] = $this->config->get('config_valide_get_params');
		} elseif ($this->config->has('config_seo_url_get_params')) {
			$data['config_seo_url_get_params'] = $this->config->get('config_seo_url_get_params');
		} else {
			$data['config_seo_url_get_params'] = "tracking\r\nutm_source\r\nutm_campaign\r\nutm_medium\r\ntype\r\nsource\r\nblock\r\nposition\r\nkeyword\r\nyclid\r\ngclid";
		}

		if (isset($this->request->post['config_action_not_found'])) {
			$data['config_action_not_found'] = $this->request->post['config_action_not_found'];
		} else {
			$data['config_action_not_found'] = $this->config->get('config_action_not_found');
		}

		if (isset($this->request->post['config_secure'])) {
			$data['config_secure'] = $this->request->post['config_secure'];
		} else {
			$data['config_secure'] = $this->config->get('config_secure');
		}

		if (isset($this->request->post['config_shared'])) {
			$data['config_shared'] = $this->request->post['config_shared'];
		} else {
			$data['config_shared'] = $this->config->get('config_shared');
		}

		if (isset($this->request->post['config_session_engine'])) {
			$data['config_session_engine'] = $this->request->post['config_session_engine'];
		} elseif ($this->config->has('config_session_engine')) {
			$data['config_session_engine'] = $this->config->get('config_session_engine');
		} else {
			$data['config_session_engine'] = 'native';
		}

		$data['config_session_engine'] = strtolower($data['config_session_engine']);

		if ($data['config_session_engine'] == 'native' || $data['config_session_engine'] == 'file') {
			$data['config_session_count'] = (is_dir(DIR_SESSION) ? count(glob(DIR_SESSION . '*', GLOB_NOSORT)) : 0);
		} elseif ($data['config_session_engine'] == 'db') {
			$data['config_session_count'] = $this->db->query("SELECT COUNT(session_id) AS total FROM `" . DB_PREFIX . "session`")->row['total'];
		} else {
			$data['config_session_count'] = 0;
		}

		if (isset($this->request->post['config_session_name'])) {
			$data['config_session_name'] = $this->request->post['config_session_name'];
		} elseif ($this->config->has('config_session_name')) {
			$data['config_session_name'] = $this->config->get('config_session_name');
		} else {
			$data['config_session_name'] = 'PHPSESSID';
		}

		if (isset($this->request->post['config_session_prefix'])) {
			$data['config_session_prefix'] = $this->request->post['config_session_prefix'];
		} elseif ($this->config->has('config_session_prefix')) {
			$data['config_session_prefix'] = $this->config->get('config_session_prefix');
		} else {
			$data['config_session_prefix'] = 'sess_';
		}

		if (isset($this->request->post['config_session_bits_per_char'])) {
			$data['config_session_bits_per_char'] = $this->request->post['config_session_bits_per_char'];
		} elseif ($this->config->has('config_session_bits_per_char')) {
			$data['config_session_bits_per_char'] = $this->config->get('config_session_bits_per_char');
		} else {
			$data['config_session_bits_per_char'] = 4;
		}

		if (isset($this->request->post['config_session_length'])) {
			$data['config_session_length'] = $this->request->post['config_session_length'];
		} elseif ($this->config->has('config_session_length')) {
			$data['config_session_length'] = $this->config->get('config_session_length');
		} else {
			$data['config_session_length'] = 32;
		}

		if (isset($this->request->post['config_session_lifetime'])) {
			$data['config_session_lifetime'] = $this->request->post['config_session_lifetime'];
		} elseif ($this->config->has('config_session_lifetime')) {
			$data['config_session_lifetime'] = $this->config->get('config_session_lifetime');
		} else {
			$data['config_session_lifetime'] = 0;
		}

		if (isset($this->request->post['config_session_maxlifetime'])) {
			$data['config_session_maxlifetime'] = $this->request->post['config_session_maxlifetime'];
		} elseif ($this->config->has('config_session_maxlifetime')) {
			$data['config_session_maxlifetime'] = $this->config->get('config_session_maxlifetime');
		} else {
			$data['config_session_maxlifetime'] = 1440;
		}

		if (isset($this->request->post['config_session_other_lifetime'])) {
			$data['config_session_other_lifetime'] = $this->request->post['config_session_other_lifetime'];
		} elseif ($this->config->has('config_session_other_lifetime')) {
			$data['config_session_other_lifetime'] = $this->config->get('config_session_other_lifetime');
		} else {
			$data['config_session_other_lifetime'] = 2592000;
		}

		if (isset($this->request->post['config_session_probability'])) {
			$data['config_session_probability'] = $this->request->post['config_session_probability'];
		} elseif ($this->config->has('config_session_probability')) {
			$data['config_session_probability'] = $this->config->get('config_session_probability');
		} else {
			$data['config_session_probability'] = 1;
		}

		if (isset($this->request->post['config_session_divisor'])) {
			$data['config_session_divisor'] = $this->request->post['config_session_divisor'];
		} elseif ($this->config->has('config_session_divisor')) {
			$data['config_session_divisor'] = $this->config->get('config_session_divisor');
		} else {
			$data['config_session_divisor'] = 1000;
		}

		if (isset($this->request->post['config_session_samesite'])) {
			$data['config_session_samesite'] = $this->request->post['config_session_samesite'];
		} elseif ($this->config->has('config_session_samesite')) {
			$data['config_session_samesite'] = $this->config->get('config_session_samesite');
		} else {
			$data['config_session_samesite'] = 'Strict';
		}

		if (isset($this->request->post['config_session_other_samesite'])) {
			$data['config_session_other_samesite'] = $this->request->post['config_session_other_samesite'];
		} elseif ($this->config->has('config_session_other_samesite')) {
			$data['config_session_other_samesite'] = $this->config->get('config_session_other_samesite');
		} else {
			$data['config_session_other_samesite'] = 'Lax';
		}

		if (isset($this->request->post['config_session_sameparty'])) {
			$data['config_session_sameparty'] = $this->request->post['config_session_sameparty'];
		} elseif ($this->config->has('config_session_sameparty')) {
			$data['config_session_sameparty'] = $this->config->get('config_session_sameparty');
		} else {
			$data['config_session_sameparty'] = true;
		}

		if (isset($this->request->post['config_session_other_sameparty'])) {
			$data['config_session_other_sameparty'] = $this->request->post['config_session_other_sameparty'];
		} elseif ($this->config->has('config_session_other_sameparty')) {
			$data['config_session_other_sameparty'] = $this->config->get('config_session_other_sameparty');
		} else {
			$data['config_session_other_sameparty'] = true;
		}

		if (isset($this->request->post['config_robots'])) {
			$data['config_robots'] = $this->request->post['config_robots'];
		} else {
			$data['config_robots'] = $this->config->get('config_robots');
		}

		if (isset($this->request->post['config_file_max_size'])) {
			$data['config_file_max_size'] = $this->request->post['config_file_max_size'];
		} elseif ($this->config->get('config_file_max_size')) {
			$data['config_file_max_size'] = $this->config->get('config_file_max_size');
		} else {
			$data['config_file_max_size'] = 300000;
		}

		if (isset($this->request->post['config_file_ext_allowed'])) {
			$data['config_file_ext_allowed'] = $this->request->post['config_file_ext_allowed'];
		} else {
			$data['config_file_ext_allowed'] = $this->config->get('config_file_ext_allowed');
		}

		if (isset($this->request->post['config_file_mime_allowed'])) {
			$data['config_file_mime_allowed'] = $this->request->post['config_file_mime_allowed'];
		} else {
			$data['config_file_mime_allowed'] = $this->config->get('config_file_mime_allowed');
		}

		if (isset($this->request->post['config_maintenance'])) {
			$data['config_maintenance'] = $this->request->post['config_maintenance'];
		} else {
			$data['config_maintenance'] = $this->config->get('config_maintenance');
		}

		if (isset($this->request->post['config_password'])) {
			$data['config_password'] = $this->request->post['config_password'];
		} else {
			$data['config_password'] = $this->config->get('config_password');
		}

		if (isset($this->request->post['config_encryption'])) {
			$data['config_encryption'] = $this->request->post['config_encryption'];
		} else {
			$data['config_encryption'] = $this->config->get('config_encryption');
		}

		if (isset($this->request->post['config_compression'])) {
			$data['config_compression'] = $this->request->post['config_compression'];
		} else {
			$data['config_compression'] = $this->config->get('config_compression');
		}

		if (isset($this->request->post['config_error_display'])) {
			$data['config_error_display'] = $this->request->post['config_error_display'];
		} else {
			$data['config_error_display'] = $this->config->get('config_error_display');
		}

		if (isset($this->request->post['config_error_log'])) {
			$data['config_error_log'] = $this->request->post['config_error_log'];
		} else {
			$data['config_error_log'] = $this->config->get('config_error_log');
		}

		if (isset($this->request->post['config_error_filename'])) {
			$data['config_error_filename'] = $this->request->post['config_error_filename'];
		} else {
			$data['config_error_filename'] = $this->config->get('config_error_filename');
		}

		if (isset($this->request->post['config_debug_pro'])) {
			$data['config_debug_pro'] = $this->request->post['config_debug_pro'];
		} else {
			$data['config_debug_pro'] = $this->config->get('config_debug_pro');
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('setting/setting', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'setting/setting')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->request->post['config_meta_title']) {
			$this->error['meta_title'] = $this->language->get('error_meta_title');
		}

		if (!$this->request->post['config_name']) {
			$this->error['name'] = $this->language->get('error_name');
		}

		if ((utf8_strlen($this->request->post['config_owner']) < 3) || (utf8_strlen($this->request->post['config_owner']) > 64)) {
			$this->error['owner'] = $this->language->get('error_owner');
		}

		if ((utf8_strlen($this->request->post['config_address']) < 3) || (utf8_strlen($this->request->post['config_address']) > 256)) {
			$this->error['address'] = $this->language->get('error_address');
		}

		if ((utf8_strlen($this->request->post['config_email']) > 96) || !filter_var($this->request->post['config_email'], FILTER_VALIDATE_EMAIL)) {
			$this->error['email'] = $this->language->get('error_email');
		}

		if ((utf8_strlen($this->request->post['config_telephone']) < 3) || (utf8_strlen($this->request->post['config_telephone']) > 32)) {
			$this->error['telephone'] = $this->language->get('error_telephone');
		}

		if (!empty($this->request->post['config_customer_group_display']) && !in_array($this->request->post['config_customer_group_id'], $this->request->post['config_customer_group_display'])) {
			$this->error['customer_group_display'] = $this->language->get('error_customer_group_display');
		}

		if (!$this->request->post['config_limit_admin']) {
			$this->error['limit_admin'] = $this->language->get('error_limit');
		}

		if ($this->request->post['config_login_attempts'] < 1) {
			$this->error['login_attempts'] = $this->language->get('error_login_attempts');
		}

		if (!$this->request->post['config_voucher_min']) {
			$this->error['voucher_min'] = $this->language->get('error_voucher_min');
		}

		if (!$this->request->post['config_voucher_max']) {
			$this->error['voucher_max'] = $this->language->get('error_voucher_max');
		}

		if (!isset($this->request->post['config_processing_status'])) {
			$this->error['processing_status'] = $this->language->get('error_processing_status');
		}

		if (!isset($this->request->post['config_complete_status'])) {
			$this->error['complete_status'] = $this->language->get('error_complete_status');
		}

		if ($this->request->post['config_ftp_status']) {
			if (!$this->request->post['config_ftp_hostname']) {
				$this->error['ftp_hostname'] = $this->language->get('error_ftp_hostname');
			}

			if (!$this->request->post['config_ftp_port']) {
				$this->error['ftp_port'] = $this->language->get('error_ftp_port');
			}

			if (!$this->request->post['config_ftp_username']) {
				$this->error['ftp_username'] = $this->language->get('error_ftp_username');
			}

			if (!$this->request->post['config_ftp_password']) {
				$this->error['ftp_password'] = $this->language->get('error_ftp_password');
			}
		}

		if (!$this->request->post['config_error_filename']) {
			$this->error['error_filename'] = $this->language->get('error_error_filename');
		} else {
			if (preg_match('/\.\.[\/\\\]?/', $this->request->post['config_error_filename'])) {
				$this->error['error_filename'] = $this->language->get('error_malformed_filename');
			}
		}

		if ((utf8_strlen($this->request->post['config_encryption']) < 32) || (utf8_strlen($this->request->post['config_encryption']) > 1024)) {
			$this->error['encryption'] = $this->language->get('error_encryption');
		}

		if ($this->error && !isset($this->error['warning'])) {
			$this->error['warning'] = $this->language->get('error_warning');
		}

		return !$this->error;
	}

	public function theme() {
		if ($this->request->server['HTTPS']) {
			$server = HTTPS_CATALOG;
		} else {
			$server = HTTP_CATALOG;
		}

		// This is only here for compatibility with old themes.
		if ($this->request->get['theme'] == 'theme_default') {
			$theme = $this->config->get('theme_default_directory');
		} else {
			$theme = basename($this->request->get['theme']);
		}

		if (is_file(DIR_CATALOG . 'view/theme/' . $theme . '/image/' . $theme . '.png')) {
			$this->response->setOutput($server . 'catalog/view/theme/' . $theme . '/image/' . $theme . '.png');
		} else {
			$this->response->setOutput($server . 'image/no_image.png');
		}
	}
}
