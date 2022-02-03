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
<div class="preload">
	<div class="title"><?=$arResult["NAME"]?></div>
	<a href="<?=$arResult["DISPLAY_PROPERTIES"]["link_video"]["VALUE"]?>" target="_blank" class="play_button" data-effect="mfp-zoom-in">
		<svg width="21" height="25" viewBox="0 0 21 25" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M21 12.5L0.750001 24.1913L0.750002 0.808657L21 12.5Z" fill="#262729"/>
		</svg>
	</a>
	<div class="image"><img src="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>" alt=""></div>
</div>