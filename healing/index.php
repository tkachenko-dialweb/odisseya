<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Медицинский центр");

use \Bitrix\Main\Page\Asset;

Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/libs/template/healing/main.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/libs/template/healing/adaptive.css');

?>

<section class="home hotel_room">
	<div class="bg">
		<? if (!empty($APPLICATION->GetProperty("SECTION_HEADER_PICTURE"))) { ?>
			<img src="<?= $APPLICATION->ShowProperty("SECTION_HEADER_PICTURE") ?>" alt="<?= $APPLICATION->ShowTitle() ?>">
		<? } else { ?>
			<img src="<?= SITE_TEMPLATE_PATH ?>/img/header/healing.png" alt="<?= $APPLICATION->ShowTitle() ?>">
		<? } ?>
	</div>
	<div class="wrapper">
		<div class="home_content">
			<div class="present wow fadeInUp">
				<?$APPLICATION->IncludeComponent(
					"bitrix:breadcrumb",
					"breadcrumb",
					Array(
						"PATH" => "",
						"SITE_ID" => "s1",
						"START_FROM" => "0"
					)
				);?>
				<div class="title">
					<?= $APPLICATION->ShowTitle() ?>
				</div>
			</div>
		</div>
	</div>
</section>

<? $APPLICATION->IncludeComponent(
	"bitrix:news",
	"healing_v2",
	array(
		"ADD_ELEMENT_CHAIN" => "Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "Y",
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
			0 => "",
			1 => "dop_info",
			2 => "name_programm_one",
			3 => "name_programm_two",
			4 => "name_programm_three",
			5 => "sub_title",
			6 => "sub_title_detail",
			7 => "professionals",
			8 => "price_programm_one",
			9 => "price_programm_two",
			10 => "price_programm_three",
			11 => "",
		),
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FILE_404" => "/404.php",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "4",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "",
			1 => "dop_info",
			2 => "name_programm_one",
			3 => "name_programm_two",
			4 => "name_programm_three",
			5 => "sub_title",
			6 => "sub_title_detail",
			7 => "professionals",
			8 => "price_programm_one",
			9 => "price_programm_two",
			10 => "price_programm_three",
			11 => "",
		),
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"NEWS_COUNT" => "4",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PREVIEW_TRUNCATE_LEN" => "",
		"SEF_FOLDER" => "/healing/",
		"SEF_MODE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "Y",
		"SHOW_404" => "Y",
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
		"COMPONENT_TEMPLATE" => "healing_v2",
		"SEF_URL_TEMPLATES" => array(
			"news" => "",
			"section" => "",
			"detail" => "#ELEMENT_CODE#/",
		)
	),
	false
); ?>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>