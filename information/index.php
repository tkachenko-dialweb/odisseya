<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Информация");
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
<p>Раздел в разработке.</p>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>