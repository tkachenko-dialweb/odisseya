<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
	<?
	foreach($arResult as $arItem):
		if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
			continue;
	?>
		<?if($arItem["SELECTED"]):?>
			<li class="nav__item selected"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
		<?else:?>
			<li class="nav__item"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
		<?endif?>

	<?endforeach?>
<?endif?>