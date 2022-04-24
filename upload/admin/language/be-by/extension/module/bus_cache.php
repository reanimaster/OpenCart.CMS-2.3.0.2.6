<?php
// *   Аўтар: "БуслікДрэў" ( https://buslikdrev.by/ )
// *   © 2016-2022; BuslikDrev - Усе правы захаваныя.
// *   Спецыяльна для сайта: "OpenCart.pro" ( https://opencart.pro/ )

// Heading
$_['heading_title']                              = '<b>Буслік Кэш <span style="color:limegreen">Full</span></b> v' . (isset($this->data['bus_cache_version']) ? $this->data['bus_cache_version'] : '1.0');
$_['heading_description']                        = '';

// Tab
$_['tab_setting']                                = 'Налады';
$_['tab_cache']                                  = 'Кэширование';
$_['tab_pagespeed']                              = 'PageSpeed';
$_['tab_support']                                = 'Тэхнічная падтрымка';

// Text
$_['text_extension']                             = 'Пашырэньні';
$_['text_module']                                = 'Модулі';
$_['text_edit']                                  = 'Рэдагаванне';
$_['text_min']                                   = 'От';
$_['text_max']                                   = 'До';
$_['text_yes']                                   = 'Так';
$_['text_no']                                    = 'Не';
$_['text_enabled']                               = 'Уключана';
$_['text_disabled']                              = 'Адключана';
$_['text_all']                                   = ' --- Усе --- ';
$_['text_none']                                  = ' --- Не выбрана --- ';
$_['text_select']                                = ' --- Выбраць --- ';
$_['text_select_all']                            = 'Вылучыць усё';
$_['text_unselect_all']                          = 'Зняць вылучэнне';
$_['text_width']                                 = 'Ширина';
$_['text_height']                                = 'Высота';
$_['text_install']                               = 'Усталёўка модуля...';
$_['text_uninstall']                             = 'Выдаленне модуля...';
$_['text_uninstall_files']                       = 'Выдаленне файлаў модуля...';
$_['text_uninstall_files_log']                   = 'Справаздача аб выдаленні файлаў модуля';
$_['text_ocmod_clear']                           = 'Чыстка мадыфікатараў...';
$_['text_ocmod_clearlog']                        = 'Чыстка лога мадыфікатараў...';
$_['text_ocmod_refresh']                         = 'Абнаўленьнне мадыфікатараў...';
$_['text_cache_clear']                           = 'Чыстка кэша...';
$_['text_processing']                            = 'Апрацоўка';
$_['text_loading']                               = 'Загрузка';
$_['text_start']                                 = 'Старт';
$_['text_continue']                              = 'Працягнуць';
$_['text_pause']                                 = 'Паўза';
$_['text_restart']                               = 'Рэстарт';
$_['text_link']                                  = 'Спасылка';
$_['text_default']                               = 'Па змаўчанні';
$_['text_guest']                                 = 'Госць';
$_['text_dir_1']                                 = 'Справа на лева';
$_['text_dir_2']                                 = 'Злева на права';
$_['text_path']                                  = 'Шлях';
$_['text_no_results']                            = 'Няма дадзеных';
$_['text_confirm']                               = 'Вы ўпэўненыя?';
$_['text_pagespeed_inline_transfer_1']           = 'Уверх';
$_['text_pagespeed_inline_transfer_2']           = 'Уніз';
$_['text_pagespeed_inline_transfer_3']           = 'У файл сціску';
$_['text_cache_total']                           = 'Колькасць файлаў кэша:';
$_['text_cache_size']                            = 'Памер файлаў кэша:';
$_['text_disc_free']                             = 'Вольнага месца на дыску:';
$_['text_debug_2']                               = 'Так і пераствараць кэш css, js';
$_['text_author']                                = 'Аўтар: <a href="https://buslikdrev.by/" title="Тавары рамеснай вытворчасці" rel="noreferrer noopener" target="_blank">БуслікДрэў</a>. Тых. падтрымка: <a href="https://liveopencart.ru/buslikdrev" title="Тэхнічная дапамога па вырашэнні праблем звязаныя з модулем" rel="noreferrer noopener" target="_blank">ТУТ</a>. Тэма падтрымкі: <a href="https://forum.opencart.pro/topic/6191-буслік-кэш-buslik-cache/" title="Тэхнічная дапамога па вырашэнні праблем звязаныя з модулем" rel="noreferrer noopener" target="_blank">ТУТ</a>.';
$_['text_corp']                                  = '© 2016-' . date('d.m.Y') . '; <a href="https://buslikdrev.by/" title="BuslikDrev" rel="noreferrer noopener" target="_blank">BuslikDrev</a> - Усе правы захаваныя.';

// Entry
$_['entry_status']                               = 'Статус';
$_['entry_store']                                = 'Крама';
$_['entry_cache_status']                         = 'Уключыць кэшаванне';
$_['entry_cache_ses']                            = 'Параметры сесій';
$_['entry_cache_onrot']                          = 'Параметры працы';
$_['entry_cache_rot']                            = 'Параметры выключэння';
$_['entry_cache_customer']                       = 'Кэшаваць для аўтарызаваных карыстальнікаў?';
$_['entry_cache_cart']                           = 'Кэшировать корзину';
$_['entry_cache_cart_count']                     = 'Кэшировать при наличии товара в корзине';
$_['entry_cache_oc']                             = 'Кантраляваць кэш OpenCart';
$_['entry_cache_controller']                     = 'Кэшаванне функцый кантролераў';
$_['entry_cache_model']                          = 'Кэшаванне функцый мадэляў';
$_['entry_cache_engine']                         = 'Тып кэша';
$_['entry_cache_expire']                         = 'Час жыцця кэша';
$_['entry_cache_expire_controller']              = 'Час жыцця кэша кантралёраў';
$_['entry_cache_expire_model']                   = 'Час жыцця кэша мадэляў';
$_['entry_cache_expire_all']                     = 'Час жыцця кэша страниц';
$_['entry_pagespeed_status']                     = 'Уключыць аптымізацыю (PageSpeed)';
$_['entry_pagespeed_onrot']                      = 'Параметры працы';
$_['entry_pagespeed_rot']                        = 'Параметры выключэння';
$_['entry_pagespeed_attribute_w_h']              = 'Уключыць атрыбуты шырыні і вышыні';
$_['entry_pagespeed_device']                     = 'Уключыць вызначэнне мабільных прылад';
$_['entry_pagespeed_lazy_load_images']           = 'Уключыць Lazy load малюнкаў';
$_['entry_pagespeed_lazy_load_html']             = 'Уключыць Lazy load html';
$_['entry_pagespeed_html_replace']               = 'Замена ў html-кодзе';
$_['entry_pagespeed_html_min']                   = 'Сціскаць html-код';
$_['entry_pagespeed_css_replace']                = 'Замена в css-коде';
$_['entry_pagespeed_css_min']                    = 'Сціскаць css-код';
$_['entry_pagespeed_css_min_links']              = 'Спасылкі на css файлы';
$_['entry_pagespeed_css_min_download']           = 'Спасылкі на css файлы для запампоўкі';
$_['entry_pagespeed_css_min_exception']          = 'Выключэнне з сціску css';
$_['entry_pagespeed_css_min_font']               = 'Предзагрузка шрыфтоў або малюнкаў';
$_['entry_pagespeed_css_min_display']            = 'Font-Display';
$_['entry_pagespeed_css_critical']               = 'Уключыць збор крытычных стыляў';
$_['entry_pagespeed_css_inline_transfer']        = 'Перамясціць інлайн css-код';
$_['entry_pagespeed_css_inline_exception']       = 'Выключэнне з пераносу інлайн css-кода';
$_['entry_pagespeed_css_events']                 = 'Падзеі для запуску css-кода';
$_['entry_pagespeed_css_style']                  = 'Стыль';
$_['entry_pagespeed_js_replace']                 = 'Замена в js-коде';
$_['entry_pagespeed_js_min']                     = 'Сціскаць js-код';
$_['entry_pagespeed_js_min_links']               = 'Спасылкі на js файлы';
$_['entry_pagespeed_js_min_download']            = 'Спасылкі на js файлы для запампоўкі';
$_['entry_pagespeed_js_min_exception']           = 'Выключэнне з сціску js';
$_['entry_pagespeed_js_inline_event']            = 'Адкласці загрузку інлайн js-кода';
$_['entry_pagespeed_js_inline_event_time']       = 'Час да аўтазапуску інлайн js-кода';
$_['entry_pagespeed_js_inline_transfer']         = 'Перамясціць інлайн js-код';
$_['entry_pagespeed_js_inline_exception']        = 'Выключэнне з пераносу інлайн js-кода';
$_['entry_pagespeed_js_events']                  = 'Падзеі для запуску js-кода';
$_['entry_pagespeed_js_script']                  = 'Скрыпт';
$_['entry_debug']                                = 'Уключыць адладку';

// Help
$_['help_status']                                = 'Калі адключана, то ўвесь функцыянал ніжэй будзе адключаны.';
$_['help_store']                                 = 'Выберыце крамы ў якіх будзе працаваць модуль.';
$_['help_cache_status']                          = 'Калі так, то будуць кэшавацца старонкі цалкам.';
$_['help_cache_ses']                             = 'Пазначце параметры сесій для разнастайнасці кэша. Калі патрэбны параметр у масіве, то паказвайце кожны параметр масіва праз \' | \', напрыклад, $session[\'products\'][\'total\'] =&gt; products|total';
$_['help_cache_onrot']                           = 'Укажыце роўт модуля або яго keyword (seo_url) для дакладнай працы модуля (Пры запаўненні параметры выключэння дзейнічаць не будуць), потым пасля \' | \' укажыце час кэшавання ў секундах. Значэнне задаецца пачынаючы з новага радка. Калі не жадаеце выдаляць, то ў пачатку радка ўсталюеце \' ; \'.';
$_['help_cache_rot']                             = 'Укажыце роўт модуля або яго keyword (seo_url) для выключэння з кэша. Значэнне задаецца пачынаючы з новага радка. Калі не жадаеце выдаляць, то ў пачатку радка ўсталюеце \' ; \'.';
$_['help_cache_cart']                            = 'Калі так, то кошык будзе кэшавацца для кожнага карыстальніка на час захоўвання кэша кантролераў.';
$_['help_cache_cart_count']                      = 'Укажыце максімальную колькасць тавараў у кошыку пры якім кэшаванне старонак будзе працаваць.';
$_['help_cache_oc']                              = 'Калі так, то кэш іншых модуляў будзе кантралявацца наладамі Буслік Кэш.';
$_['help_cache_controller']                      = 'Укажыце роўт кантролера які трэба закэшаваць (прыклад - extension/module/category), потым пасля \' | \' укажыце час кэшавання ў секундах, потым пасля \' | \' укажыце параметры $this->config->get() праз \' , \', калі яны патрэбныя, потым пасля \' | \' укажыце параметры $this->session->data[] праз \' , \', калі яны патрэбныя. Значэнне задаецца пачынаючы з новага радка. Калі не жадаеце выдаляць, то ў пачатку радка ўсталюеце \' ; \'.';
$_['help_cache_model']                           = 'Пакажыце роўт мадэлі, якую трэба закэшаваць (прыклад - catalog/category/getCategories), потым пасля \' | \' укажыце час кэшавання ў секундах, потым пасля \' | \' укажыце параметры $this->config->get() праз \' , \', калі яны патрэбныя, потым пасля \' | \' укажыце параметры $this->session->data[] праз \' , \', калі яны патрэбныя. Значэнне задаецца пачынаючы з новага радка. Калі не жадаеце выдаляць, то ў пачатку радка ўсталюеце \' ; \'.';
$_['help_cache_engine']                          = 'Па змаўчанні File.<br />APC - гэта кэш кодаў аперацый і сховішча дадзеных з дапамогай аператыўнай памяці, падыходзіць для тых у каго няма пашырэння OPCache;<br />APCu - гэта новая версія APC прызначана толькі для захоўвання дадзеных з дапамогай аператыўнай памяці . Рэкамендуецца ўключаць OPCache на сэрвэры;<br />Buslik - тое самае, што і File, але дазваляе захоўваць файлы кэша падзяляючы па тэчках у залежнасці ад крамы, мовы, групы пакупнікоў, прылады, катэгорыі і вытворцы, тым самым паскарае пошук патрэбнага кэш файла і дазваляе захоўваць большую колькасць;<br />File - стандартнае захоўванне кэш файлаў у system/storage/cache/;<br />Memcache - кэшаванне дадзеных у аператыўнай памяці на аснове хэш-табліцы;<br />Memcached - новая версія Memcache для кэшавання дадзеных у аператыўнай памяці на аснове хэш-табліцы;<br />Redis - тое самае, што Memcached, але з вялікімі магчымасцямі;';
$_['help_cache_expire']                          = 'Па змаўчанні 3600 секунд. Час жыцця кэша задаецца ў секундах.';
$_['help_cache_expire_controller']               = 'Па змаўчанні 3600 секунд. Час жыцця кэша задаецца ў секундах.';
$_['help_cache_expire_model']                    = 'Па змаўчанні 3600 секунд. Час жыцця кэша задаецца ў секундах.';
$_['help_cache_expire_all']                      = 'Па змаўчанні 3600 секунд. Час жыцця кэша задаецца ў секундах.';
$_['help_pagespeed_status']                      = 'Уключэнне аптымізацыі павінна паскорыць аддачу кантэнту тым самым палюбіць ваш сайт з пошукавымі робатамі, а значыць пазіцыі ў пошукавай выдачы павінны стаць вышэй.';
$_['help_pagespeed_onrot']                       = 'Укажыце роўт модуля або яго keyword (seo_url) для дакладнай працы модуля. Значэнне задаецца пачынаючы з новага радка. Калі не жадаеце выдаляць, то ў пачатку радка ўсталюеце \' ; \'.';
$_['help_pagespeed_rot']                         = 'Укажыце роут модуля або яго keyword (seo_url) для выключэння з аптымізацыі. Значэнне задаецца пачынаючы з новага радка. Калі не жадаеце выдаляць, то ў пачатку радка ўсталюеце \' ; \'.';
$_['help_pagespeed_attribute_w_h']               = 'Уключэнне гэтай функцыі будзе дадаваць атрыбуты шырыні і вышыні да ўсіх малюнках у якіх у назвах ёсць іх памеры, напрыклад, image-100х100.jpg';
$_['help_pagespeed_device']                      = 'Укажыце роўт або keyword (seo_url), потым пасля \' | \' укажыце максімальную шырыню экрана да якога бакавыя калонкі сайта павінны быць выдалены з шаблону. Калі хочаце на ўсіх старонках, то замест роўту пазначце \' # \'. Значэнне задаецца пачынаючы з новага радка. Калі не жадаеце выдаляць, то ў пачатку радка ўсталюеце \' ; \'.';
$_['help_pagespeed_lazy_load_images']            = 'Абярыце варыянт падгрузкі малюнкаў і фрэйм ​​вокнаў.';
$_['help_pagespeed_lazy_load_html']              = 'Укажыце роўт модуля, потым пасля \' | \' укажыце id модуля (module_id) калі ён ёсць. Значэнне задаецца пачынаючы з новага радка. Калі не жадаеце выдаляць, то ў пачатку радка ўсталюеце \' ; \'.';
$_['help_pagespeed_html_replace']                = 'Укажыце роўт або keyword, потым пасля \' | \' укажыце радок кода які трэба замяніць, потым пасля \' | \' укажыце на які радок замяніць. Калі хочаце на ўсіх старонках, то замест роўту пазначце \' # \'. Значэнне задаецца пачынаючы з новага радка. Калі не жадаеце выдаляць, то ў пачатку радка ўсталяванне \' ; \'. Замена вырабляецца пасля ўсіх функцый модуля да сціску html-кода.';
$_['help_pagespeed_html_min']                    = 'Выберыце варыянт сціску html-кода. 0 - без сціску, 4 максімальны сціск.';
$_['help_pagespeed_css_replace']                 = 'Укажыце роўт або keyword, потым пасля \' | \' укажыце радок кода які трэба замяніць, потым пасля \' | \' укажыце на які радок замяніць. Калі хочаце на ўсіх старонках, то замест роўту пазначце \' # \'. Значэнне задаецца пачынаючы з новага радка. Калі не жадаеце выдаляць, то ў пачатку радка ўсталяванне \' ; \'. Замена вырабляецца пасля ўсіх функцый модуля да сціску css-кода.';
$_['help_pagespeed_css_min']                     = 'Выберыце варыянт сціску css-кода. 0 - без зборкі, 1 - зборка без сціску, 5 максімальны сціск. Калі ўключана, то ўсе файлы стыляў, якія апрацоўвае OpenCart па стандарце, будуць злучаныя ў адзін файл і максімальна сціснутыя.';
$_['help_pagespeed_css_min_links']               = 'Дадайце спасылку на css стыль які не патрапіў у агульны файл стыляў (для працы з іншых сайтаў, укажыце спасылку таксама ў поле для запампоўкі). Значэнне задаецца пачынаючы з новага радка. Калі не жадаеце выдаляць, то перад спасылкай установа \' ; \'. Калі вы жадаеце пазначыць свае атрыбуты, то пасля спасылкі ўсталюеце \' | \' і ўпішыце атрыбуты, напрыклад, catalog/style.css|type=&quot;text/css&quot; rel=&quot;preload&quot;<br />Таксама можна паказаць у пачатку спасылкі наступныя параметры (атрыбуты маюць уверх над параметрамі, акрамя параметраў перасоўвання):<br />[header] - адправіць спасылку ў самы верх сайта;<br />[ footer] - адправіць спасылку ў самы ніз сайта;<br />[async] - просіць браўзэр загрузіць асінхронна;<br />[defer] - просіць браўзэр загрузіць адразу пасля пабудовы структуры DOM;<br />[prelod] - просіць браўзэр папярэдне загрузіць;<br />[prefetch] - просіць браўзэр адкласці загрузку ў канец;<br />[dns-prefetch] - просіць браўзэр загадзя выканаць рэзалінг DNS для дамена;<br />[preconnect] - просіць браўзэр загадзя падключыцца да дамену;<br />[event] - адкласці загрузку па падзеі любога дзеяння;<br />[event-2000] - адкласці загрузку па часе;<br />[critical] - гэты стыль з\'яўляецца крытычным і яго загрузіць асобна, і самым першым (калі такі стыль падрыхтаваны вамі, то можна не ўключаць функцыю стварэння крытычных стыляў);';
$_['help_pagespeed_css_min_download']            = 'Дадайце спасылку на css стыль які трэба спампаваць на свой сайт (запампуе пры захаванні настроек, настойліва раім захаваць бягучыя налады). Значэнне задаецца пачынаючы з новага радка. Калі не жадаеце выдаляць, то перад спасылкай ўсталююць \' ; \'.';
$_['help_pagespeed_css_min_exception']           = 'Дадайце спасылку на css стыль які хочаце выключыць і адправіць па сваім шляху. Значэнне задаецца пачынаючы з новага радка. Калі не жадаеце выдаляць, то перад спасылкай ўсталююць \' ; \'. Калі вы жадаеце пазначыць свае атрыбуты, то пасля спасылкі ўсталюеце \' | \' і ўпішыце атрыбуты, напрыклад, catalog/style.css|type=&quot;text/css&quot; rel=&quot;preload&quot;<br />Таксама можна паказаць у пачатку спасылкі наступныя параметры (атрыбуты маюць уверх над параметрамі, акрамя параметраў перасоўвання):<br />[header] - адправіць спасылку ў самы верх сайта;<br />[ footer] - адправіць спасылку ў самы ніз сайта;<br />[async] - просіць браўзэр загрузіць асінхронна;<br />[defer] - просіць браўзэр загрузіць адразу пасля пабудовы структуры DOM;<br />[prelod] - просіць браўзэр папярэдне загрузіць;<br />[prefetch] - просіць браўзэр адкласці загрузку ў канец;<br />[dns-prefetch] - просіць браўзэр загадзя выканаць рэзалінг DNS для дамена;<br />[preconnect] - просіць браўзэр загадзя падключыцца да дамену;<br />[event] - адкласці загрузку па падзеі любога дзеяння;<br />[event-2000] - адкласці загрузку па часе;<br />[critical] - гэты стыль з\'яўляецца крытычным і яго загрузіць асобна, і самым першым (калі такі стыль падрыхтаваны вамі, то можна не ўключаць функцыю стварэння крытычных стыляў);';
$_['help_pagespeed_css_min_font']                = 'Дадайце спасылку на шрыфт або карцінку на якую лаецца Pagespeed - просіць, каб предзагрузили. Значэнне задаецца пачынаючы з новага радка. Калі не жадаеце выдаляць, то перад спасылкай ўсталююць \' ; \'. Таксама можаце паказаць даменнае імя іншых шрыфтоў разам са спасылкай стылю у якім ідзе загрузяць шрыфтоў падзяліўшы \' | \', тады гэта даменнае імя будзе прадвызначаецца (dns-prefetch, preconnect), напрыклад, https://fonts.gstatic.com/|https://fonts.googleapis.com/css?family=Open+Sans:400,400i,300,700&display=swap';
$_['help_pagespeed_css_min_display']             = 'Уключыце гэтую функцыю, каб 100% для шрыфтоў было ўстаноўлена ўласцівасць font-display каб не паказваць нябачны тэкст.';
$_['help_pagespeed_css_critical']                = 'Уключэнне гэтай функцыі будзе збіраць неабходныя стылі пры першай загрузцы старонкі і адпраўляць на сервер, пазней усе стылі будуць загружацца па ўзаемадзеянні. У мэтах бяспекі збор стыляў будзе даступны пры загрузцы старонкі адміністратарам.';
$_['help_pagespeed_css_inline_transfer']         = 'Выберыце варыянт перамяшчэння css-кода.<br />Уверх - адразу перад </head>;<br />Уніз - адразу перад </body>;<br />У файл сціску - у самы ніз файла які загружаецца адразу.';
$_['help_pagespeed_css_inline_exception']        = 'Укажыце роут або keyword (seo_url), потым пасля \' | \' укажыце радок або частку радка css-кода, тады ўвесь блок кода ў &lt;style&gt;&lt;/style&gt; не будзе крануты функцыяй пераносу кода. Значэнне задаецца пачынаючы з новага радка. Калі хочаце на ўсіх старонках, то замест роўту пазначце \' # \'. Калі не жадаеце выдаляць, то ў пачатку радка ўсталюеце \' ; \'.';
$_['help_pagespeed_css_events']                  = 'Укажыце пры якіх падзеях запускаць js-код, па-змаўчанні падзея выклічацца 1 раз. Значэнне задаецца пачынаючы з новага радка. Калі не жадаеце выдаляць, то ў пачатку радка ўсталяванне \' ; \'.';
$_['help_pagespeed_css_style']                   = 'Тут вы можаце задаць стылі для адаптацыі стыляў модуля пад дызайн свайго сайта. Указваць тэгі &lt;style&gt;&lt;/style&gt; ня трэба.';
$_['help_pagespeed_js_replace']                 = 'Укажыце роўт або keyword, потым пасля \' | \' укажыце радок кода які трэба замяніць, потым пасля \' | \' укажыце на які радок замяніць. Калі хочаце на ўсіх старонках, то замест роўту пазначце \' # \'. Значэнне задаецца пачынаючы з новага радка. Калі не жадаеце выдаляць, то ў пачатку радка ўсталяванне \' ; \'. Замена вырабляецца пасля ўсіх функцый модуля да сціску js-кода.';
$_['help_pagespeed_js_min']                      = 'Выберыце варыянт сціску js-кода. 0 - без зборкі, 1 - зборка без сціску, 4 максімальны сціск. Калі ўключана, то ўсе файлы скрыптоў, якія апрацоўвае OpenCart па стандарце, будуць злучаныя ў адзін файл і максімальна сціснутыя.';
$_['help_pagespeed_js_min_links']                = 'Дадайце спасылку на js скрыпт які не патрапіў у агульны файл скрыптоў. Значэнне задаецца пачынаючы з новага радка. Калі не жадаеце выдаляць, то перад спасылкай установа \'; \'. Калі вы жадаеце пазначыць свае атрыбуты, то пасля спасылкі ўсталюеце \' | \' і ўпішыце атрыбуты, прыклад, catalog/script.js|type=&quot;text/javascript&quot;<br />Таксама можна паказаць у пачатку спасылкі наступныя параметры (атрыбуты маюць уверх над параметрамі, акрамя параметраў перасоўвання):<br /> [header] - адправіць спасылку ў самы верх сайта;<br />[footer] - адправіць спасылку ў самы ніз сайта;<br />[async] - просіць браўзэр загрузіць асінхронна;<br />[defer] - просіць браўзэр загрузіць адразу пасля пабудовы структуры DOM;<br />[prelod] - просіць браўзэр папярэдне загрузіць;<br />[prefetch] - просіць браўзэр адкласці загрузку ў канец;<br />[dns-prefetch] - просіць браўзэр загадзя выканаць рэзалінг DNS для дамена;<br />[preconnect] - просіць браўзэр загадзя падлучыцца да дамена;<br />[event] - адкласці загрузку па падзеі любога дзеяння;<br />[event-2000] - адкласці загрузку па часе;';
$_['help_pagespeed_js_min_download']             = 'Дадайце спасылку на js скрыпт які трэба спампаваць на свой сайт (спампуе пры захаванні налад або чысткі кэша, рэкамендуецца спачатку захаваць бягучыя налады). Калі не жадаеце выдаляць, то перад спасылкай установа \' ; \'.';
$_['help_pagespeed_js_min_exception']            = 'Дадайце спасылку на js скрыпт які хочаце выключыць і адправіць па сваім шляху. Напрыклад, бываюць скрыпты якія цалкам незалежныя і не блакуюць рэндэру старонкі, таму не варта іх сціскаць з іншымі бо гэта можа пагоршыць аптымізацыю. Значэнне задаецца пачынаючы з новага радка. Калі не жадаеце выдаляць, то перад спасылкай ўсталююць \' ; \'. Калі вы жадаеце пазначыць свае атрыбуты, то пасля спасылкі ўсталюеце \' | \' і ўпішыце атрыбуты, прыклад, catalog/script.js|type=&quot;text/javascript&quot;<br />Таксама можна паказаць у пачатку спасылкі наступныя параметры (атрыбуты маюць уверх над параметрамі, акрамя параметраў перасоўвання):<br /> [header] - адправіць спасылку ў самы верх сайта;<br />[footer] - адправіць спасылку ў самы ніз сайта;<br />[async] - просіць браўзэр загрузіць асінхронна;<br />[defer] - просіць браўзэр загрузіць адразу пасля пабудовы структуры DOM;<br />[prelod] - просіць браўзэр папярэдне загрузіць;<br />[prefetch] - просіць браўзэр адкласці загрузку ў канец;<br />[dns-prefetch] - просіць браўзэр загадзя выканаць рэзалінг DNS для дамена;<br />[preconnect] - просіць браўзэр загадзя падлучыцца да дамена;<br />[event] - адкласці загрузку па падзеі любога дзеяння;<br />[event-2000] - адкласці загрузку па часе;';
$_['help_pagespeed_js_inline_event']             = 'Укажыце радок або частку радка js-кода, тады ўвесь блок кода ў &lt;script&gt;&lt;/script&gt; будзе абгорнута ў падзею запуску пры любым узаемадзеянні з сайтам. Значэнне задаецца пачынаючы з новага радка. Калі не жадаеце выдаляць, то перад радком усталяванне \' ; \'.';
$_['help_pagespeed_js_inline_event_time']        = 'Укажыце час у мілісекундах, калі трэба, каб адкладзеныя скрыпты запусціліся самі не чакаючы любога ўзаемадзеяння з сайтам. Калі пазначана 0, то аўтазапуск не будзе працаваць.';
$_['help_pagespeed_js_inline_transfer']          = 'Выберыце варыянт перамяшчэння js-кода.<br />Уверх - адразу перад </head>;<br />Уніз - адразу перад </body>;<br />У файл сціску - у самы ніз файла які загружаецца адразу.';
$_['help_pagespeed_js_inline_exception']         = 'Укажыце роут або keyword (seo_url), потым пасля \' | \' укажыце радок або частку радка js-кода, тады ўвесь блок кода ў &lt;script&gt;&lt;/script&gt; не будзе крануты функцыяй пераносу кода. Значэнне задаецца пачынаючы з новага радка. Калі хочаце на ўсіх старонках, то замест роўту пазначце \' # \'. Калі не жадаеце выдаляць, то ў пачатку радка ўсталюеце \' ; \'.';
$_['help_pagespeed_js_events']                   = 'Укажыце пры якіх падзеях запускаць js-код, па-змаўчанні падзея выклічацца 1 раз. Значэнне задаецца пачынаючы з новага радка. Калі не жадаеце выдаляць, то ў пачатку радка ўсталяванне \' ; \'.';
$_['help_pagespeed_js_script']                   = 'Тут вы можаце задаць скрыпты для адаптацыі стыляў модуля пад дызайн свайго сайта. Указваць тэгі &lt;script&gt;&lt;/script&gt; ня трэба.';
$_['help_debug']                                 = 'Калі так, то для адміністратара над шапкай сайта будзе выводзіцца інфармацыя аб часе загрузкі старонкі, таксама кэш пачне дзейнічаць.';

//Button
$_['button_files_clear']                         = 'Выдаліць таксама файлы модуля? - калі няма, проста абновіце старонку ад граху. Справаздача аб выдаленні файлаў глядзіце ў логах мадыфікатараў.';
$_['button_add']                                 = 'Дадаць';
$_['button_delete']                              = 'Выдаліць';
$_['button_clear']                               = 'Ачысціць кэш';
$_['button_save']                                = 'Захаваць';
$_['button_apply']                               = 'Прымяніць';
$_['button_apply_piecemeal']                     = 'Прымяніць часткамі';
$_['button_export']                              = 'Экспарт';
$_['button_import']                              = 'Імпарт';
$_['button_start']                               = 'Запуск загрузкі';
$_['button_continue']                            = 'Працяг загрузкі з месца прыпынку';
$_['button_pause']                               = 'Прыпыненне загрузкі';
$_['button_restart']                             = 'Перазапуск загрузкі - пачаць спачатку';
$_['button_search']                              = 'Знайсці';
$_['button_edit']                                = 'Рэдагаваць';

// Error
$_['error_permission']                           = 'У вас недастаткова правоў для ўнясення змяненняў!';
$_['error_warning']                              = 'Уважліва праверце форму на памылкі!';
$_['error_install']                              = 'Нешта пайшло не так!';
$_['error_uninstall']                            = 'Нешта пайшло не так!';
$_['error_name']                                 = 'Назва павінна ўтрымліваць ад 3 да 64 знакаў!';
$_['error_width']                                = 'Пазначце Шырыню!';
$_['error_height']                               = 'Пазначце Вышыню!';
$_['error_max_input_vars']                       = '<b>Увага! Будзе перавышаны ліміт параметру %s</b>, калі перавысіць, дадзеныя могуць не захавацца. Павялічце значэнне на серверы або звярніцеся з дадзенай просьбай да хостеру для павелічэння ліміту. Або скарыстайцеся кнопкай прымянення часткамі.<br>Ліміт на сэрвэру: %s <br>Ліміт ад модуля: %s - адсечка %s каб пазбегнуць страты дадзеных<br>Бягучы значэнне: ';
$_['error_setting_import']                       = 'Файл не ўтрымлівае налады модуля, імпарту адмоўлена!';
$_['error_setting_import_format']                = 'Модуль не ведае пра такі фармат, імпарту адмоўлена! - модуль мякка вас паслаў.';
$_['error_not_required']                         = 'Не патрабуецца!';

// Success
$_['success_install']                            = ' - паспяхова ўсталявана!';
$_['success_uninstall']                          = ' - паспяхова выдалены!';
$_['success_uninstall_data_base']                = '◄ База дадзеных выдаленая ►: ';
$_['success_uninstall_modification']             = '◄ Мадыфікатар выдалены ►: ';
$_['success_uninstall_folder']                   = '◄ Папка выдаленая бо файлаў няма ►: ';
$_['success_uninstall_file']                     = '◄ Файл выдалены ►: ';
$_['success_update']                             = ' - паспяхова абноўлены!';
$_['success_setting']                            = 'Налады паспяхова зменены!';
$_['success_setting_apply']                      = 'Налады паспяхова ужытыя!';
$_['success_setting_save']                       = 'Налады паспяхова захаваны!';
$_['success_setting_new']                        = 'Новы модуль паспяхова дададзены!';
$_['success_setting_redirect']                   = 'Вы былі перанакіраваны на патрэбную старонку налад!';
$_['success_setting_import']                     = 'Налады модуля "%s" паспяхова імпартаваныя ў модуль, вам засталося іх прымяніць!';
$_['success_add']                                = 'Паспяхова дададзена!';
$_['success_delete']                             = 'Паспяхова выдалена!';
$_['success_clear']                              = 'Паспяхова ачышчана!';