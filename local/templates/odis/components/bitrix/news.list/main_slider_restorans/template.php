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

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="slide left_hidden">
		<div class="slide_content">
			<div class="bg_image"><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt=""></div>
			<div class="title_rest"><?echo $arItem["NAME"]?></div>
			<a data-src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" class="button_transparent" data-fancybox="gallery_<?= $arItem['ID'];?>">Cмотреть фото</a>
		</div>
		<div style="display: none">
			<?if(count($arItem["DISPLAY_PROPERTIES"]["photos_resoran"]["FILE_VALUE"]["SRC"]) == 1):?>
				<img src="<?echo $arItem["DISPLAY_PROPERTIES"]["photos_resoran"]["FILE_VALUE"]["SRC"]?>" data-fancybox="gallery_<?= $arItem['ID'];?>" alt="">
			<?else:?>
				<? foreach ($arItem["DISPLAY_PROPERTIES"]['photos_resoran']['FILE_VALUE'] as $pid => $arProperty): ?>
					<img src="<? echo $arProperty['SRC']; ?>" data-fancybox="gallery_<?= $arItem['ID'];?>" alt="">
				<?endforeach;?>
			<?endif?>
		</div>
	</div>

<?endforeach;?>

