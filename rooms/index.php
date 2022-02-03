<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Размещение");
?>
	<?
		if($_SERVER['REQUEST_URI'] === "/rooms/") {
			header('Location: /rooms/odnokomnatnyy-standart/');
		}
	?>
	<section class="home hotel_room">
		<div class="bg"><img src="<?= SITE_TEMPLATE_PATH ?>/img/razmesh.jpg" alt=""></div>
		<div class="wrapper">
			<div class="home_content">
				<div class="present wow fadeInUp">
					<div class="breadcrumb">
						<a href="/">Главная</a><span></span><div class="current">Размещение</div>
					</div>
					<div class="title">
						Размещение
					</div>
				</div>
				<form action="" method="post" class="form_order wow fadeInUp" enctype="multipart/form-data">
					<?
						$today = date("d.m.Y");
						$newDate = new DateTime($today);
						$newDate->add(new DateInterval('P7D'));
						$fomattedDate = $newDate->format('d.m.Y');
					?>
					<div class="input_wrapper">
						<div class="title_input">Заезд</div>
						<input name="date_in" class="date datepicker" value="<?= date("d.m.Y"); ?>" readonly>
					</div>
					<div class="input_wrapper">
						<div class="title_input">Выезд</div>
						<input name="date_out" class="date datepicker" value="<?= $fomattedDate; ?>" readonly>
					</div>
					<div class="input_wrapper">
						<div class="title_input">Размещение в номере</div>
						<div class="select">
							<input class="select__input" type="hidden" name="adults" value="2">
							<div class="select__head">
								<div class="name">2 взрослых</div>
								<div class="icon_arrow">
									<img src="<?= SITE_TEMPLATE_PATH ?>/img/arrow_select.svg" alt="">
								</div>
							</div>
							<ul class="select__list" style="display: none;">
								<li data-room="1" class="select__item">1 взрослый</li>
								<li data-room="2" class="select__item active">2 взрослых</li>
								<li data-room="3" class="select__item">3 взрослых</li>
								<li data-room="4" class="select__item">4 взрослых</li>
							</ul>
						</div>
					</div>
					<div class="input_wrapper add_children">
						<div class="btn_add_children">+ Добавить детей</div>
						<div class="title_input">Дети</div>
						<div class="select">
							<input class="select__input" type="hidden" name="children">
							<div class="select__head">
								<div class="name">2 детей</div>
								<div class="icon_arrow">
									<img src="<?= SITE_TEMPLATE_PATH ?>/img/arrow_select.svg" alt="">
								</div>
							</div>
							<ul class="select__list" style="display: none;">
								<li data-room="1" class="select__item">1 ребенок</li>
								<li data-room="2" class="select__item active">2 детей</li>
								<li data-room="3" class="select__item">3 детей</li>
								<li data-room="4" class="select__item">4 детей</li>
							</ul>
						</div>
					</div>
					<input name="ORDER" class="button_order" type="submit" value="Найти номер">
				</form>
				<?
					if($_POST["ORDER"]){
						$inDate = new DateTime($_POST["date_in"]);
						$fomattedDate = $inDate->format('Y-m-d');
						$date = $fomattedDate;
						$checkoutDate = new DateTime($_POST["date_out"]);
						$interval = $inDate->diff($checkoutDate);
						$nights = $interval->format('%a');
						$adults = $_POST["adults"];
						$children = $_POST["children"];
						LocalRedirect("/booking/?date=$date&nights=$nights&adults=$adults&children=$children");
					}
				?>
			</div>
		</div>
	</section>

	<section class="accommodation">
		<div class="wrapper">
			<?$APPLICATION->IncludeComponent(
				"bitrix:news",
				"rooms",
				array(
					"ADD_ELEMENT_CHAIN" => "N",
					"ADD_SECTIONS_CHAIN" => "Y",
					"AJAX_MODE" => "Y",
					"AJAX_OPTION_ADDITIONAL" => "",
					"AJAX_OPTION_HISTORY" => "Y",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"BROWSER_TITLE" => "-",
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "Y",
					"CACHE_TIME" => "36000000",
					"CACHE_TYPE" => "A",
					"CHECK_DATES" => "Y",
					"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
					"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
					"DETAIL_DISPLAY_TOP_PAGER" => "N",
					"DETAIL_FIELD_CODE" => array(
						0 => "",
						1 => "",
					),
					"DETAIL_PAGER_SHOW_ALL" => "Y",
					"DETAIL_PAGER_TEMPLATE" => "",
					"DETAIL_PAGER_TITLE" => "Страница",
					"DETAIL_PROPERTY_CODE" => array(
						0 => "balcon",
						1 => "view",
						2 => "capacity",
						3 => "equipped",
						4 => "area",
						5 => "change_underwear",
						6 => "sleeping_space",
						7 => "cleaning",
						8 => "bathrobe_slippers",
						9 => "photos",
						10 => "icon_one_advantage",
						11 => "icon_two_advantage",
						12 => "icon_three_advantage",
					),
					"DETAIL_SET_CANONICAL_URL" => "N",
					"DISPLAY_BOTTOM_PAGER" => "Y",
					"DISPLAY_DATE" => "Y",
					"DISPLAY_NAME" => "Y",
					"DISPLAY_PICTURE" => "Y",
					"DISPLAY_PREVIEW_TEXT" => "Y",
					"DISPLAY_TOP_PAGER" => "N",
					"HIDE_LINK_WHEN_NO_DETAIL" => "N",
					"IBLOCK_ID" => "1",
					"IBLOCK_TYPE" => "content",
					"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
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
					"NEWS_COUNT" => "5",
					"PAGER_BASE_LINK_ENABLE" => "N",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "N",
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_TEMPLATE" => ".default",
					"PAGER_TITLE" => "Новости",
					"PREVIEW_TRUNCATE_LEN" => "",
					"SEF_MODE" => "Y",
					"SET_LAST_MODIFIED" => "N",
					"SET_STATUS_404" => "N",
					"SET_TITLE" => "Y",
					"SHOW_404" => "N",
					"SORT_BY1" => "SORT",
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
					"COMPONENT_TEMPLATE" => "rooms",
					"SEF_FOLDER" => "/rooms/",
					"SEF_URL_TEMPLATES" => array(
						"news" => "",
						"section" => "",
						"detail" => "#ELEMENT_CODE#/",
					)
				),
				false
			);?>
		</div>
	</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>