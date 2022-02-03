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
<?
	//	echo "<pre>";
	//	print_r($arResult["DISPLAY_PROPERTIES"]["photos"]);
	//	echo "</pre>";
?>
<div class="main_room_order action_detail">
	<div class="slider_number wow fadeInUp">
		<?if($arResult["DETAIL_PICTURE"]["SRC"]):?>
			<div class="image"><a data-src="<?echo $arResult["DETAIL_PICTURE"]["SRC"];?>" data-fancybox="image"><img src="<?echo $arResult["DETAIL_PICTURE"]["SRC"];?>" alt=""></a></div>
		<?endif;?>
	</div>
	<div class="room_info">
		<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
			<div class="title wow fadeInUp">
				<?=$arResult["NAME"]?>
			</div>
		<?endif;?>

		<?if($arResult["DETAIL_TEXT"]):?>
			<div class="text wow fadeInUp">
				<?echo $arResult["DETAIL_TEXT"];?>
			</div>
		<?endif;?>
	</div>
</div>