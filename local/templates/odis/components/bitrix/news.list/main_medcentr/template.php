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
<div class="med_category">
<!--	<div class="category">-->
<!--		<div class="image"><img src="--><?//= SITE_TEMPLATE_PATH ?><!--/img/med1.jpg" alt=""></div>-->
<!--		<div class="title_category">Кардиология</div>-->
<!--		<div class="desc">мирового уровня</div>-->
<!--		<a href="#сardiology" class="button_transparent popup-with-form" data-effect="mfp-zoom-in">Подробнее</a>-->
<!--	</div>-->
<!--	<div class="category">-->
<!--		<div class="image"><img src="--><?//= SITE_TEMPLATE_PATH ?><!--/img/med2.jpg" alt=""></div>-->
<!--		<div class="title_category">Программы</div>-->
<!--		<div class="desc">восстановления здоровья<br> от 7 дней</div>-->
<!--		<a href="#programs" class="button_transparent popup-with-form" data-effect="mfp-zoom-in">Подробнее</a>-->
<!--	</div>-->
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="category" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="image"><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt=""></div>
		<div class="title_category"><?echo $arItem["NAME"]?></div>
		<div class="desc"><?= $arItem['PROPERTIES']['sub_title']['~VALUE']?></div>
		<a href="#form_<?= $arItem['ID'];?>" class="button_transparent popup-with-form" data-effect="mfp-zoom-in">Подробнее</a>
		<div id="form_<?= $arItem['ID'];?>" class="<?if ($arItem['ID'] == 9):?>сardiology<?elseif($arItem['ID'] == 8):?>programs<?endif;?>_popup mfp-with-anim mfp-hide">
			<div class="image">
				<img src="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>" alt="">
				<div class="label"><img src="<?= SITE_TEMPLATE_PATH ?>/img/label1.svg" alt=""></div>
			</div>
			<div class="info_popup">
				<div class="title_popup"><?echo $arItem["NAME"]?></div>
				<div class="sub_title"><?= $arItem['PROPERTIES']['sub_title_detail']['VALUE']?></div>
				<? if ($arItem['PROPERTIES']['professionals']['VALUE']):?>
					<div class="title">Специалисты:</div>
					<div class="sub_info"><?= $arItem['PROPERTIES']['professionals']['VALUE']?></div>
				<? endif; ?>
				<?= $arItem["DETAIL_TEXT"]?>
			</div>
			<div class="bottom_popup">
				<?if ($arItem['ID'] == 9):?>
					<?= $arItem['PROPERTIES']['dop_info']['VALUE']?>
				<?endif;?>
				<?if ($arItem['ID'] == 8):?>
					<div class="prices">
						<div class="item">
							<?= $arItem['PROPERTIES']['name_programm_one']['VALUE']?><br>
							<span><?= $arItem['PROPERTIES']['price_programm_one']['VALUE']?></span> р/сутки
						</div>
						<div class="item">
							<?= $arItem['PROPERTIES']['name_programm_two']['VALUE']?><br>
							<span><?= $arItem['PROPERTIES']['price_programm_two']['VALUE']?></span> р/сутки
						</div>
						<div class="item">
							<?= $arItem['PROPERTIES']['name_programm_three']['VALUE']?><br>
							<span><?= $arItem['PROPERTIES']['price_programm_three']['VALUE']?></span> р/сутки
						</div>
					</div>
				<?endif;?>
			</div>
			<div class="mfp-close"><img src="<?= SITE_TEMPLATE_PATH ?>/img/close2.svg" alt=""></div>
		</div>
	</div>
<?endforeach;?>
</div>
