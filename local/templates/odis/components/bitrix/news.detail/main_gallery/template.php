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
<div class="gallery_head">
	<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
		<div class="title"><?=$arResult["NAME"]?></div>
	<?endif;?>
	<div class="description">
		<?echo $arResult["PREVIEW_TEXT"];?>
	</div>
</div>
<div class="gallery_images">
	<? foreach ($arResult["DISPLAY_PROPERTIES"]['photos_view']['FILE_VALUE'] as $pid => $arProperty): ?>
		<a data-src="<?echo $arProperty["SRC"]?>" class="image wow fadeInUp" data-fancybox="gallery"><img src="<?echo $arProperty["SRC"]?>" alt=""></a>
	<?endforeach;?>
</div>
<div style="display: none">
	<? foreach ($arResult["DISPLAY_PROPERTIES"]['photos_not_view']['FILE_VALUE'] as $pid => $arProperty): ?>
		<a data-src="<?echo $arProperty["SRC"]?>" data-fancybox="gallery"><img src="<?echo $arProperty["SRC"]?>" alt=""></a>
	<?endforeach;?>
</div>