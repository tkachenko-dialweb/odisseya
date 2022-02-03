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

<!--	--><?//
//		echo "<pre>";
//		print_r($arResult);
//		echo "</pre>";
//	?>
	<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
		<div class="title">
			<?=$arResult["NAME"]?>
		</div>
	<?endif;?>
	<div class="about_content">
		<div class="images">
			<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
				<div class="image wow fadeInLeft">
					<img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="">
				</div>
			<? endif; ?>
			<div class="image wow fadeInUp">
				<div class="decor_circle"><?=$arResult["PROPERTIES"]["decor"]["VALUE"]?></div>
				<img src="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>" alt="">
			</div>
		</div>
		<div class="description wow fadeInRight">
			<div class="title_desc"><?=$arResult["PROPERTIES"]["title_desc"]["VALUE"]?></div>
			<? if($arResult["DETAIL_TEXT"] <> ''):?>
				<div class="text">
					<?echo $arResult["DETAIL_TEXT"];?>
				</div>

			<?endif?>

		</div>
	</div>
