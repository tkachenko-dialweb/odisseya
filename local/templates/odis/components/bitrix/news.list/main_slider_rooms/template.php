<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="slider_room">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="slide" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="content">
			<div class="title"><?echo $arItem["NAME"]?></div>
			<div class="desc_slide">
				<?if($arItem['PROPERTIES']['area']['VALUE']):?>
					<div class="area">
						<?= $arItem['PROPERTIES']['area']['VALUE']?>
					</div>
				<?endif;?>
				<?if($arItem['PROPERTIES']['capacity']['VALUE']):?>
					<div class="title_quanity"><?= $arItem['PROPERTIES']['capacity']['NAME']?>:</div>
					<div class="quanity"><?= $arItem['PROPERTIES']['capacity']['VALUE']?></div>
				<?endif;?>
				<?if($arItem['PROPERTIES']['sleeping_space']['~VALUE']['TEXT']):?>
					<div class="title_place"><?= $arItem['PROPERTIES']['sleeping_space']['NAME']?>:</div>
					<?= $arItem['PROPERTIES']['sleeping_space']['~VALUE']['TEXT']?>
				<?endif;?>
				<?if($arItem['PROPERTIES']['price']['VALUE']):?>
					<div class="price_wrap">
						от <span><?= $arItem['PROPERTIES']['price']['VALUE']?> ₽</span> / <?= $arItem['PROPERTIES']['price_desc']['VALUE']?>
					</div>
				<?endif;?>
				<div class="buttons">
					<a href="<?echo $arItem["PROPERTIES"]["attr_btn"]["VALUE"]?>" class="button_phone_order">Выбрать номер</a>
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="button_transparent">Подробнее</a>
				</div>
			</div>
		</div>
	</div>
	<div class="bg_image"><img src="<?echo $arItem["DISPLAY_PROPERTIES"]["main_slider"]["FILE_VALUE"]["SRC"]?>" alt=""></div>
<?endforeach;?>
</div>
