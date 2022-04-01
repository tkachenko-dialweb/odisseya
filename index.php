<?
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
	$APPLICATION->SetTitle("1С-Битрикс: Управление сайтом");
	CModule::IncludeModule("iblock");
?>

	<section class="home">
		<div id="video-container" class="bg">
			<img src="<?= SITE_TEMPLATE_PATH ?>/img/background_image.jpg" alt="">
		</div>
		<script>
			$( document).ready(function() {
				if (window.innerWidth >= 641) {
					document.getElementById('video-container').innerHTML = '<video class="" width="100%" preload="auto" muted="muted" loop="" autoplay="" style="visibility: visible; width: 100%; height: 100%; object-fit: cover;" poster="<?= SITE_TEMPLATE_PATH ?>/img/home.jpg"> <source src="<?= SITE_TEMPLATE_PATH ?>/img/videoplayback.webm" type="video/webm"> </video>'
				}
			});
		</script>
		<div class="wrapper">
			<div class="home_content">
				<div class="present wow fadeInUp">
					<div class="sub_title">
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							Array(
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "inc",
								"EDIT_TEMPLATE" => "",
								"PATH" => "/include/main/head_subtitle.php"
							)
						);?>
					</div>
					<div class="title">
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							Array(
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "inc",
								"EDIT_TEMPLATE" => "",
								"PATH" => "/include/main/head_title.php"
							)
						);?>
					</div>
				</div>
				<form action="/" method="post" class="form_order wow fadeInUp" enctype="multipart/form-data">
					<div class="input_wrapper">
						<div class="title_input">
							Гостиница
						</div>
						<div class="select">
							<input class="select__input" type="hidden" name="room-type">
							<div class="select__head">
								<div class="name">Номера</div>
								<div class="icon_arrow">
									<img src="<?= SITE_TEMPLATE_PATH ?>/img/arrow_select.svg" alt="">
								</div>
							</div>
							<ul class="select__list" style="display: none;">
								<li data-room="23624" class="select__item">Однокомнатный стандарт</li>
								<li data-room="143513" class="select__item">Супериор</li>
								<li data-room="23628" class="select__item">Семейный дубль</li>
								<li data-room="23627" class="select__item">Двухкомнатный люкс</li>
								<li data-room="23629" class="select__item">Коттедж</li>
							</ul>
						</div>
					</div>
					<?
						$today = date("d.m.Y");
						$newDate = new DateTime($today);
						$newDate->add(new DateInterval('P7D'));
						$fomattedDate = $newDate->format('d.m.Y');
					?>
					<div class="input_wrapper">
						<div class="title_input">Заезд</div>
						<input name="date_in" class="date datepicker day_today" value="<?= date("d.m.Y"); ?>" readonly>
					</div>
					<div class="input_wrapper">
						<div class="title_input">Выезд</div>
						<input name="date_out" class="date datepicker day_out" value="<?= $fomattedDate; ?>" readonly>
					</div>
					<div class="input_wrapper">
						<div class="title_input">Гости</div>
						<div class="select">
							<input class="adults" type="hidden" name="adults" value="2">
							<input class="children" type="hidden" name="children" value="2">
							<div class="select__head">
								<div class="name">2 взрослых, 2 детей</div>
								<div class="icon_arrow">
									<img src="<?= SITE_TEMPLATE_PATH ?>/img/arrow_select.svg" alt="">
								</div>
							</div>
							<ul class="select__list" style="display: none;">
								<li data-adults="1" class="select__item">1 взрослый</li>
								<li data-adults="2" class="select__item">2 взрослых</li>
								<li data-adults="3" class="select__item">3 взрослых</li>
								<li data-adults="4" class="select__item">4 взрослых</li>
								<li data-adults="1" data-children="1" class="select__item">1 взрослый, 1 ребенок</li>
								<li data-adults="1" data-children="2" class="select__item">1 взрослый, 2 ребенка</li>
								<li data-adults="2" data-children="1" class="select__item">2 взрослых, 1 ребенок</li>
								<li data-adults="2" data-children="2" class="select__item active">2 взрослых, 2 детей</li>
							</ul>
						</div>
					</div>
					<input class="" type="hidden" name="children-age" value="">
					<input name="ORDER" class="button_order" type="submit" value="Забронировать номер">
				</form>
				<?
					if($_POST["ORDER"]){
						$inDate = new DateTime($_POST["date_in"]);
						$fomattedDate = $inDate->format('Y-m-d');
						$roomType = $_POST["room-type"];
						$date = $fomattedDate;

						$checkoutDate = new DateTime($_POST["date_out"]);
						$interval = $inDate->diff($checkoutDate);
						$nights = $interval->format('%a');

						$adults = $_POST["adults"];
						$children = $_POST["children"];
						LocalRedirect("/booking/?room-type=$roomType&date=$date&nights=$nights&adults=$adults&children=$children");
					}
				?>
<!--				<div id='block-search'>-->
<!--					<div id='tl-search-form' class='tl-container'>-->
<!--						<noindex><a href='http://www.travelline.ru/products/tl-hotel' rel='nofollow'>система онлайн-бронирования</a></noindex>-->
<!--					</div>-->
<!--				</div>-->
			</div>
		</div>
	</section>
	<section id="about" class="about">
		<div class="wrapper">
			<?$APPLICATION->IncludeComponent(
				"bitrix:news.detail",
				"main_about",
				array(
					"ACTIVE_DATE_FORMAT" => "d.m.Y",
					"ADD_ELEMENT_CHAIN" => "N",
					"ADD_SECTIONS_CHAIN" => "Y",
					"AJAX_MODE" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"BROWSER_TITLE" => "-",
					"CACHE_GROUPS" => "Y",
					"CACHE_TIME" => "36000000",
					"CACHE_TYPE" => "A",
					"CHECK_DATES" => "Y",
					"DETAIL_URL" => "",
					"DISPLAY_BOTTOM_PAGER" => "Y",
					"DISPLAY_DATE" => "Y",
					"DISPLAY_NAME" => "Y",
					"DISPLAY_PICTURE" => "Y",
					"DISPLAY_PREVIEW_TEXT" => "Y",
					"DISPLAY_TOP_PAGER" => "N",
					"ELEMENT_CODE" => "",
					"ELEMENT_ID" => "6",
					"FIELD_CODE" => array(
						0 => "PREVIEW_PICTURE",
						1 => "",
					),
					"IBLOCK_ID" => "2",
					"IBLOCK_TYPE" => "content",
					"IBLOCK_URL" => "",
					"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
					"MESSAGE_404" => "",
					"META_DESCRIPTION" => "-",
					"META_KEYWORDS" => "-",
					"PAGER_BASE_LINK_ENABLE" => "N",
					"PAGER_SHOW_ALL" => "N",
					"PAGER_TEMPLATE" => ".default",
					"PAGER_TITLE" => "Страница",
					"PROPERTY_CODE" => array(
						0 => "decor",
						1 => "title_desc",
						2 => "",
					),
					"SET_BROWSER_TITLE" => "Y",
					"SET_CANONICAL_URL" => "N",
					"SET_LAST_MODIFIED" => "N",
					"SET_META_DESCRIPTION" => "Y",
					"SET_META_KEYWORDS" => "Y",
					"SET_STATUS_404" => "N",
					"SET_TITLE" => "Y",
					"SHOW_404" => "N",
					"STRICT_SECTION_CHECK" => "N",
					"USE_PERMISSIONS" => "N",
					"USE_SHARE" => "N",
					"COMPONENT_TEMPLATE" => "main_about"
				),
				false
			);?>
		</div>
	</section>
	<div class="frisbuy-stories-widget"></div>
	<section class="gallery">
		<?$APPLICATION->IncludeComponent(
	"bitrix:news.detail", 
	"main_gallery", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_ELEMENT_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BROWSER_TITLE" => "-",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_CODE" => "",
		"ELEMENT_ID" => "7",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"IBLOCK_ID" => "3",
		"IBLOCK_TYPE" => "content",
		"IBLOCK_URL" => "",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Страница",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "photos_view",
			2 => "photos_not_view",
			3 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_CANONICAL_URL" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"STRICT_SECTION_CHECK" => "N",
		"USE_PERMISSIONS" => "N",
		"USE_SHARE" => "N",
		"COMPONENT_TEMPLATE" => "main_gallery"
	),
	false
);?>
	</section>
	<section class="slider_custom">
		<div class="head_section">
			<?
				$res = CIBlock::GetByID(1);
				if($ar_res = $res->GetNext()):
			?>
				<div class="title">
					<?= $ar_res['NAME']; ?>
				</div>
				<div class="desc"><?= $ar_res['DESCRIPTION']; ?></div>
			<? endif; ?>

		</div>
		<?$APPLICATION->IncludeComponent(
			"bitrix:news.list",
			"main_slider_rooms",
			array(
				"ACTIVE_DATE_FORMAT" => "d.m.Y",
				"ADD_SECTIONS_CHAIN" => "Y",
				"AJAX_MODE" => "N",
				"AJAX_OPTION_ADDITIONAL" => "",
				"AJAX_OPTION_HISTORY" => "N",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "Y",
				"CACHE_FILTER" => "N",
				"CACHE_GROUPS" => "Y",
				"CACHE_TIME" => "36000000",
				"CACHE_TYPE" => "A",
				"CHECK_DATES" => "Y",
				"DETAIL_URL" => "",
				"DISPLAY_BOTTOM_PAGER" => "Y",
				"DISPLAY_DATE" => "Y",
				"DISPLAY_NAME" => "Y",
				"DISPLAY_PICTURE" => "Y",
				"DISPLAY_PREVIEW_TEXT" => "Y",
				"DISPLAY_TOP_PAGER" => "N",
				"FIELD_CODE" => array(
					0 => "",
					1 => "",
				),
				"FILTER_NAME" => "",
				"HIDE_LINK_WHEN_NO_DETAIL" => "N",
				"IBLOCK_ID" => "1",
				"IBLOCK_TYPE" => "content",
				"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
				"INCLUDE_SUBSECTIONS" => "Y",
				"MESSAGE_404" => "",
				"NEWS_COUNT" => "5",
				"PAGER_BASE_LINK_ENABLE" => "N",
				"PAGER_DESC_NUMBERING" => "N",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				"PAGER_SHOW_ALL" => "N",
				"PAGER_SHOW_ALWAYS" => "N",
				"PAGER_TEMPLATE" => ".default",
				"PAGER_TITLE" => "Новости",
				"PARENT_SECTION" => "",
				"PARENT_SECTION_CODE" => "",
				"PREVIEW_TRUNCATE_LEN" => "",
				"PROPERTY_CODE" => array(
					0 => "capacity",
					1 => "area",
					2 => "sleeping_space",
					3 => "main_slider",
					4 => "",
				),
				"SET_BROWSER_TITLE" => "N",
				"SET_LAST_MODIFIED" => "N",
				"SET_META_DESCRIPTION" => "Y",
				"SET_META_KEYWORDS" => "Y",
				"SET_STATUS_404" => "N",
				"SET_TITLE" => "N",
				"SHOW_404" => "N",
				"SORT_BY1" => "SORT",
				"SORT_BY2" => "SORT",
				"SORT_ORDER1" => "DESC",
				"SORT_ORDER2" => "ASC",
				"STRICT_SECTION_CHECK" => "N",
				"COMPONENT_TEMPLATE" => "main_slider_rooms"
			),
			false
		);?>
	</section>
	<section id="med" class="medcenter">
		<div class="wrapper">
			<? $res = CIBlock::GetByID(4);
				if($ar_res = $res->GetNext()):
					?>
					<div class="title">
						<?= $ar_res['NAME']; ?>
					</div>
					<div class="desc">управления здоровьем</div>
			<? endif; ?>
		</div>
		<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"main_medcentr", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "DETAIL_PICTURE",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "4",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "2",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "dop_info",
			1 => "name_programm_one",
			2 => "name_programm_two",
			3 => "name_programm_three",
			4 => "sub_title",
			5 => "sub_title_detail",
			6 => "professionals",
			7 => "price_programm_one",
			8 => "price_programm_two",
			9 => "price_programm_three",
			10 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "main_medcentr"
	),
	false
);?>
	</section>
	<?/*?>
	<section class="services">
		<div class="wrapper">
			<? $res = CIBlock::GetByID(5);
				if($ar_res = $res->GetNext()):?>
					<div class="title"><?= $ar_res['~NAME']; ?></div>
			<? endif; ?>

			<?$APPLICATION->IncludeComponent(
				"bitrix:news.list",
				"main_services",
				array(
					"ACTIVE_DATE_FORMAT" => "d.m.Y",
					"ADD_SECTIONS_CHAIN" => "Y",
					"AJAX_MODE" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "Y",
					"CACHE_TIME" => "36000000",
					"CACHE_TYPE" => "A",
					"CHECK_DATES" => "Y",
					"DETAIL_URL" => "",
					"DISPLAY_BOTTOM_PAGER" => "Y",
					"DISPLAY_DATE" => "Y",
					"DISPLAY_NAME" => "Y",
					"DISPLAY_PICTURE" => "Y",
					"DISPLAY_PREVIEW_TEXT" => "Y",
					"DISPLAY_TOP_PAGER" => "N",
					"FIELD_CODE" => array(
						0 => "",
						1 => "",
					),
					"FILTER_NAME" => "",
					"HIDE_LINK_WHEN_NO_DETAIL" => "N",
					"IBLOCK_ID" => "5",
					"IBLOCK_TYPE" => "content",
					"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
					"INCLUDE_SUBSECTIONS" => "Y",
					"MESSAGE_404" => "",
					"NEWS_COUNT" => "6",
					"PAGER_BASE_LINK_ENABLE" => "N",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "N",
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_TEMPLATE" => ".default",
					"PAGER_TITLE" => "Новости",
					"PARENT_SECTION" => "",
					"PARENT_SECTION_CODE" => "",
					"PREVIEW_TRUNCATE_LEN" => "",
					"PROPERTY_CODE" => array(
						0 => "subtitle_slide",
						1 => "photos_slider",
						2 => "",
					),
					"SET_BROWSER_TITLE" => "N",
					"SET_LAST_MODIFIED" => "N",
					"SET_META_DESCRIPTION" => "Y",
					"SET_META_KEYWORDS" => "Y",
					"SET_STATUS_404" => "N",
					"SET_TITLE" => "N",
					"SHOW_404" => "N",
					"SORT_BY1" => "SORT",
					"SORT_BY2" => "SORT",
					"SORT_ORDER1" => "DESC",
					"SORT_ORDER2" => "ASC",
					"STRICT_SECTION_CHECK" => "N",
					"COMPONENT_TEMPLATE" => "main_services"
				),
				false
			);?>
		</div>
	</section>
	<?*/?>
	<section class="video">
		<div class="wrapper">
			<?$APPLICATION->IncludeComponent("bitrix:news.detail", "main_video", Array(
				"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
					"ADD_ELEMENT_CHAIN" => "N",	// Включать название элемента в цепочку навигации
					"ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
					"AJAX_MODE" => "N",	// Включить режим AJAX
					"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
					"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
					"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
					"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
					"BROWSER_TITLE" => "-",	// Установить заголовок окна браузера из свойства
					"CACHE_GROUPS" => "Y",	// Учитывать права доступа
					"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
					"CACHE_TYPE" => "A",	// Тип кеширования
					"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
					"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
					"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
					"DISPLAY_DATE" => "Y",	// Выводить дату элемента
					"DISPLAY_NAME" => "Y",	// Выводить название элемента
					"DISPLAY_PICTURE" => "Y",	// Выводить детальное изображение
					"DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
					"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
					"ELEMENT_CODE" => "",	// Код новости
					"ELEMENT_ID" => "16",	// ID новости
					"FIELD_CODE" => array(	// Поля
						0 => "PREVIEW_PICTURE",
						1 => "",
					),
					"IBLOCK_ID" => "6",	// Код информационного блока
					"IBLOCK_TYPE" => "content",	// Тип информационного блока (используется только для проверки)
					"IBLOCK_URL" => "",	// URL страницы просмотра списка элементов (по умолчанию - из настроек инфоблока)
					"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",	// Включать инфоблок в цепочку навигации
					"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
					"META_DESCRIPTION" => "-",	// Установить описание страницы из свойства
					"META_KEYWORDS" => "-",	// Установить ключевые слова страницы из свойства
					"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
					"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
					"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
					"PAGER_TITLE" => "Страница",	// Название категорий
					"PROPERTY_CODE" => array(	// Свойства
						0 => "link_video",
						1 => "",
					),
					"SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
					"SET_CANONICAL_URL" => "N",	// Устанавливать канонический URL
					"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
					"SET_META_DESCRIPTION" => "Y",	// Устанавливать описание страницы
					"SET_META_KEYWORDS" => "Y",	// Устанавливать ключевые слова страницы
					"SET_STATUS_404" => "N",	// Устанавливать статус 404
					"SET_TITLE" => "N",	// Устанавливать заголовок страницы
					"SHOW_404" => "N",	// Показ специальной страницы
					"STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа элемента
					"USE_PERMISSIONS" => "N",	// Использовать дополнительное ограничение доступа
					"USE_SHARE" => "N",	// Отображать панель соц. закладок
					"COMPONENT_TEMPLATE" => ".default"
				),
				false
			);?>
		</div>
	</section>
	<?/*?>
	<section class="restaurants">
		<div class="wrapper">
			<? $res = CIBlock::GetByID(7);
				if($ar_res = $res->GetNext()):?>
					<div class="title"><?= $ar_res['NAME']; ?></div>
					<div class="decription"><?= $ar_res['DESCRIPTION']; ?></div>
			<? endif; ?>
			<div class="content">
				<?$APPLICATION->IncludeComponent(
					"bitrix:news.list",
					"main_restorans",
					array(
						"ACTIVE_DATE_FORMAT" => "d.m.Y",
						"ADD_SECTIONS_CHAIN" => "Y",
						"AJAX_MODE" => "N",
						"AJAX_OPTION_ADDITIONAL" => "",
						"AJAX_OPTION_HISTORY" => "N",
						"AJAX_OPTION_JUMP" => "N",
						"AJAX_OPTION_STYLE" => "Y",
						"CACHE_FILTER" => "N",
						"CACHE_GROUPS" => "Y",
						"CACHE_TIME" => "36000000",
						"CACHE_TYPE" => "A",
						"CHECK_DATES" => "Y",
						"DETAIL_URL" => "",
						"DISPLAY_BOTTOM_PAGER" => "Y",
						"DISPLAY_DATE" => "Y",
						"DISPLAY_NAME" => "Y",
						"DISPLAY_PICTURE" => "Y",
						"DISPLAY_PREVIEW_TEXT" => "Y",
						"DISPLAY_TOP_PAGER" => "N",
						"FIELD_CODE" => array(
							0 => "DETAIL_PICTURE",
							1 => "",
						),
						"FILTER_NAME" => "",
						"HIDE_LINK_WHEN_NO_DETAIL" => "N",
						"IBLOCK_ID" => "7",
						"IBLOCK_TYPE" => "-",
						"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
						"INCLUDE_SUBSECTIONS" => "Y",
						"MESSAGE_404" => "",
						"NEWS_COUNT" => "2",
						"PAGER_BASE_LINK_ENABLE" => "N",
						"PAGER_DESC_NUMBERING" => "N",
						"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
						"PAGER_SHOW_ALL" => "N",
						"PAGER_SHOW_ALWAYS" => "N",
						"PAGER_TEMPLATE" => ".default",
						"PAGER_TITLE" => "Новости",
						"PARENT_SECTION" => "",
						"PARENT_SECTION_CODE" => "",
						"PREVIEW_TRUNCATE_LEN" => "",
						"PROPERTY_CODE" => array(
							0 => "breakfast",
							1 => "lunch",
							2 => "dinner",
							3 => "photos_resoran",
							4 => "",
						),
						"SET_BROWSER_TITLE" => "N",
						"SET_LAST_MODIFIED" => "N",
						"SET_META_DESCRIPTION" => "Y",
						"SET_META_KEYWORDS" => "Y",
						"SET_STATUS_404" => "N",
						"SET_TITLE" => "N",
						"SHOW_404" => "N",
						"SORT_BY1" => "SORT",
						"SORT_BY2" => "SORT",
						"SORT_ORDER1" => "DESC",
						"SORT_ORDER2" => "ASC",
						"STRICT_SECTION_CHECK" => "N",
						"COMPONENT_TEMPLATE" => "main_restorans"
					),
					false
				);?>
				<div class="rest wow fadeInUp rest_slider">
					<?$APPLICATION->IncludeComponent("bitrix:news.list", "main_slider_restorans", Array(
						"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
						"ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
						"AJAX_MODE" => "N",	// Включить режим AJAX
						"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
						"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
						"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
						"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
						"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
						"CACHE_GROUPS" => "Y",	// Учитывать права доступа
						"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
						"CACHE_TYPE" => "A",	// Тип кеширования
						"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
						"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
						"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
						"DISPLAY_DATE" => "Y",	// Выводить дату элемента
						"DISPLAY_NAME" => "Y",	// Выводить название элемента
						"DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
						"DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
						"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
						"FIELD_CODE" => array(
							0 => "PREVIEW_PICTURE",
							1 => "",
						),
						"FILTER_NAME" => "",	// Фильтр
						"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
						"IBLOCK_ID" => 8,	// Код информационного блока
						"IBLOCK_TYPE" => "-",	// Тип информационного блока (используется только для проверки)
						"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",	// Включать инфоблок в цепочку навигации
						"INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
						"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
						"NEWS_COUNT" => "20",	// Количество новостей на странице
						"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
						"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
						"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
						"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
						"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
						"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
						"PAGER_TITLE" => "Новости",	// Название категорий
						"PARENT_SECTION" => "",	// ID раздела
						"PARENT_SECTION_CODE" => "",	// Код раздела
						"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
						"PROPERTY_CODE" => array(
							0 => "photos_resoran",
							1 => "",
						),
						"SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
						"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
						"SET_META_DESCRIPTION" => "Y",	// Устанавливать описание страницы
						"SET_META_KEYWORDS" => "Y",	// Устанавливать ключевые слова страницы
						"SET_STATUS_404" => "N",	// Устанавливать статус 404
						"SET_TITLE" => "N",	// Устанавливать заголовок страницы
						"SHOW_404" => "N",	// Показ специальной страницы
						"SORT_BY1" => "SORT",	// Поле для первой сортировки новостей
						"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
						"SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
						"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
						"STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
					),
						false
					);?>
				</div>
			</div>
			<div class="nav_buttons">
				<div class="slide_prev rest_prev btn">
					<svg width="24" height="6" viewBox="0 0 24 6" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M0 3L5 5.88675L5 0.113247L0 3ZM24 2.5L4.5 2.5L4.5 3.5L24 3.5L24 2.5Z" fill="white"/>
					</svg>
				</div>
				<div class="slide_next rest_next btn">
					<svg width="24" height="6" viewBox="0 0 24 6" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M0 3L5 5.88675L5 0.113247L0 3ZM24 2.5L4.5 2.5L4.5 3.5L24 3.5L24 2.5Z" fill="white"/>
					</svg>
				</div>
			</div>
		</div>
		<div class="decor_text">restaurants</div>
	</section>
	<?*/?>
	<?/*?>
	<section class="events">
		<div class="wrapper">
			<? $res = CIBlock::GetByID(9);
				if($ar_res = $res->GetNext()):?>
					<div class="title"><?= $ar_res['NAME']; ?></div>
					<div class="sub_title"><?= $ar_res['DESCRIPTION']; ?></div>
			<? endif; ?>
			<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"main_events", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "9",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "4",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "main_events"
	),
	false
);?>
		</div>
	</section>
	<?*/?>
	<?/*?>
	<section id="action" class="action">
		<div class="title marquee">
			<? $res = CIBlock::GetByID(10);
				if($ar_res = $res->GetNext()):?>
				<? endif; ?>
			<span><?= $ar_res['NAME']; ?></span>
			<span><?= $ar_res['NAME']; ?></span>
			<span><?= $ar_res['NAME']; ?></span>
			<span><?= $ar_res['NAME']; ?></span>
			<span><?= $ar_res['NAME']; ?></span>
			<span><?= $ar_res['NAME']; ?></span>
			<span><?= $ar_res['NAME']; ?></span>
			<span><?= $ar_res['NAME']; ?></span>
			<span><?= $ar_res['NAME']; ?></span>
			<span><?= $ar_res['NAME']; ?></span>
			<span><?= $ar_res['NAME']; ?></span>
			<span><?= $ar_res['NAME']; ?></span>
			<span><?= $ar_res['NAME']; ?></span>
			<span><?= $ar_res['NAME']; ?></span>
		</div>
		<div class="wrapper">
			<?$APPLICATION->IncludeComponent(
				"bitrix:news",
				"main_actions",
				array(
					"ADD_ELEMENT_CHAIN" => "N",
					"ADD_SECTIONS_CHAIN" => "N",
					"AJAX_MODE" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"BROWSER_TITLE" => "-",
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "Y",
					"CACHE_TIME" => "36000000",
					"CACHE_TYPE" => "A",
					"CHECK_DATES" => "Y",
					"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
					"DETAIL_DISPLAY_BOTTOM_PAGER" => "N",
					"DETAIL_DISPLAY_TOP_PAGER" => "N",
					"DETAIL_FIELD_CODE" => array(
						0 => "",
						1 => "",
					),
					"DETAIL_PAGER_SHOW_ALL" => "N",
					"DETAIL_PAGER_TEMPLATE" => "",
					"DETAIL_PAGER_TITLE" => "Страница",
					"DETAIL_PROPERTY_CODE" => array(
						0 => "",
						1 => "",
					),
					"DETAIL_SET_CANONICAL_URL" => "N",
					"DISPLAY_BOTTOM_PAGER" => "N",
					"DISPLAY_DATE" => "N",
					"DISPLAY_NAME" => "Y",
					"DISPLAY_PICTURE" => "Y",
					"DISPLAY_PREVIEW_TEXT" => "Y",
					"DISPLAY_TOP_PAGER" => "N",
					"HIDE_LINK_WHEN_NO_DETAIL" => "N",
					"IBLOCK_ID" => "10",
					"IBLOCK_TYPE" => "content",
					"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
					"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
					"LIST_FIELD_CODE" => array(
						0 => "",
						1 => "",
					),
					"LIST_PROPERTY_CODE" => array(
						0 => "",
						1 => "",
					),
					"MESSAGE_404" => "",
					"META_DESCRIPTION" => "-",
					"META_KEYWORDS" => "-",
					"NEWS_COUNT" => "12",
					"PAGER_BASE_LINK_ENABLE" => "N",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "N",
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_TEMPLATE" => ".default",
					"PAGER_TITLE" => "Новости",
					"PREVIEW_TRUNCATE_LEN" => "",
					"SEF_FOLDER" => "/actions/",
					"SEF_MODE" => "Y",
					"SET_LAST_MODIFIED" => "N",
					"SET_STATUS_404" => "N",
					"SET_TITLE" => "N",
					"SHOW_404" => "N",
					"SORT_BY1" => "ACTIVE_FROM",
					"SORT_BY2" => "SORT",
					"SORT_ORDER1" => "DESC",
					"SORT_ORDER2" => "ASC",
					"STRICT_SECTION_CHECK" => "N",
					"USE_CATEGORIES" => "N",
					"USE_FILTER" => "N",
					"USE_PERMISSIONS" => "N",
					"USE_RATING" => "N",
					"USE_RSS" => "N",
					"USE_SEARCH" => "N",
					"USE_SHARE" => "N",
					"COMPONENT_TEMPLATE" => "main_actions",
					"SEF_URL_TEMPLATES" => array(
						"news" => "",
						"section" => "",
						"detail" => "#ELEMENT_CODE#/",
					)
				),
				false
			);?>
		</div>
		<div class="decor_text">offers</div>
	</section>
	<?*/?>
	<section id="contacts" class="contacts">
		<div class="wrapper">
			<? $res = CIBlock::GetByID(11);
				if($ar_res = $res->GetNext()):?>
					<div class="title"><?= $ar_res['NAME']; ?></div>
					<div class="sub_title"><?= $ar_res['DESCRIPTION']; ?></div>
				<? endif; ?>
			<div class="contacts_wrap">
				<div class="contacts_info">
					<?$APPLICATION->IncludeComponent(
	"bitrix:news.detail", 
	"main_contacts", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_ELEMENT_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BROWSER_TITLE" => "-",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_CODE" => "",
		"ELEMENT_ID" => "28",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"IBLOCK_ID" => "11",
		"IBLOCK_TYPE" => "content",
		"IBLOCK_URL" => "",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Страница",
		"PROPERTY_CODE" => array(
			0 => "address",
			1 => "description",
			2 => "booking",
			3 => "marketing",
			4 => "subtitle",
			5 => "phone",
			6 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_CANONICAL_URL" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"STRICT_SECTION_CHECK" => "N",
		"USE_PERMISSIONS" => "N",
		"USE_SHARE" => "N",
		"COMPONENT_TEMPLATE" => "main_contacts"
	),
	false
);?>

				</div>
				<div class="map">
					<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"",
						Array(
							"AREA_FILE_SHOW" => "file",
							"AREA_FILE_SUFFIX" => "inc",
							"EDIT_TEMPLATE" => "",
							"PATH" => "/include/map.php"
						)
					);?>
				</div>
			</div>
		</div>
	</section>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>