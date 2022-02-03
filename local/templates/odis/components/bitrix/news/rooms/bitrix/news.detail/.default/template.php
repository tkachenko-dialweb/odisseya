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
<div class="main_room_order">
	<div class="slider_number">
		<div class="big_slide wow fadeInUp">
			<div class="swiper-container mySwiper">
				<div class="swiper-wrapper">
					<?if(count($arResult["DISPLAY_PROPERTIES"]["photos"]["FILE_VALUE"]["SRC"]) == 1):?>
						<div class="swiper-slide"><img src="<?echo $arResult["DISPLAY_PROPERTIES"]["photos"]["FILE_VALUE"]["SRC"]?>" alt=""></div>
					<?else:?>
						<? foreach ($arResult["DISPLAY_PROPERTIES"]['photos']['FILE_VALUE'] as $pid => $arProperty): ?>
							<div class="swiper-slide"><img src="<?echo $arProperty["SRC"]?>" alt=""></div>
						<?endforeach;?>
					<?endif?>
				</div>
				<?if(count($arResult["DISPLAY_PROPERTIES"]["photos"]["FILE_VALUE"]["SRC"]) != 1):?>
					<div class="nav_buttons">
						<div class="slide_prev btn">
							<svg width="24" height="6" viewBox="0 0 24 6" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M0 3L5 5.88675L5 0.113247L0 3ZM24 2.5L4.5 2.5L4.5 3.5L24 3.5L24 2.5Z" fill="white"></path>
							</svg>
						</div>
						<div class="slide_next btn">
							<svg width="24" height="6" viewBox="0 0 24 6" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M0 3L5 5.88675L5 0.113247L0 3ZM24 2.5L4.5 2.5L4.5 3.5L24 3.5L24 2.5Z" fill="white"></path>
							</svg>
						</div>
					</div>
				<?endif?>
			</div>
		</div>
		<?if(count($arResult["DISPLAY_PROPERTIES"]["photos"]["FILE_VALUE"]["SRC"]) != 1):?>
			<div class="small wow fadeInUp">
				<div class="swiper-container mySwiper_thumbs">
					<div class="swiper-wrapper thumbs">
						<? foreach ($arResult["DISPLAY_PROPERTIES"]['photos']['FILE_VALUE'] as $pid => $arProperty): ?>
							<div class="swiper-slide"><img src="<?echo $arProperty["SRC"]?>" alt=""></div>
						<?endforeach;?>
					</div>
				</div>
			</div>
		<?endif?>
	</div>
	<div class="room_info">
		<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
			<div class="title wow fadeInUp">
				<?=$arResult["NAME"]?>
			</div>
		<?endif;?>

		<?if($arResult['PROPERTIES']['area']['VALUE']):?>
			<div class="area wow fadeInUp">
				<?= $arResult['PROPERTIES']['area']['VALUE']?>
			</div>
		<?endif;?>

		<?if($arResult['PROPERTIES']['capacity']['VALUE']):?>
			<div class="info_item wow fadeInUp">
				<div class="title_item"><?= $arResult['PROPERTIES']['capacity']['NAME']?>:</div>
				<div class="value"><?= $arResult['PROPERTIES']['capacity']['VALUE']?></div>
			</div>
		<?endif;?>
		<?if($arResult['PROPERTIES']['sleeping_space']['~VALUE']['TEXT']):?>
			<div class="info_item wow fadeInUp">
				<div class="title_item"><?= $arResult['PROPERTIES']['sleeping_space']['NAME']?>:</div>
				<?= $arResult['PROPERTIES']['sleeping_space']['~VALUE']['TEXT']?>
			</div>
		<?endif;?>
		<?if($arResult['PROPERTIES']['view']['~VALUE']['TEXT']):?>
			<div class="info_item wow fadeInUp">
				<div class="title_item"><?= $arResult['PROPERTIES']['view']['NAME']?>:</div>
				<?= $arResult['PROPERTIES']['view']['~VALUE']['TEXT']?>
			</div>
		<?endif;?>
		<?if($arResult['PROPERTIES']['equipped']['~VALUE']['TEXT']):?>
			<div class="info_item wow fadeInUp">
				<div class="title_item"><?= $arResult['PROPERTIES']['equipped']['NAME']?>:</div>
				<?= $arResult['PROPERTIES']['equipped']['~VALUE']['TEXT']?>
			</div>
		<?endif;?>
		<?if($arResult['PROPERTIES']['balcon']['~VALUE']['TEXT']):?>
			<div class="info_item wow fadeInUp">
				<div class="title_item"><?= $arResult['PROPERTIES']['balcon']['NAME']?>:</div>
				<?= $arResult['PROPERTIES']['balcon']['~VALUE']['TEXT']?>
			</div>
		<?endif;?>
		<?if($arResult['PROPERTIES']['bathrobe_slippers']['~VALUE']['TEXT']):?>
			<div class="info_item wow fadeInUp">
				<div class="title_item"><?= $arResult['PROPERTIES']['bathrobe_slippers']['NAME']?>:</div>
				<?= $arResult['PROPERTIES']['bathrobe_slippers']['~VALUE']['TEXT']?>
			</div>
		<?endif;?>
		<?if($arResult['PROPERTIES']['cleaning']['~VALUE']['TEXT']):?>
			<div class="info_item wow fadeInUp">
				<div class="title_item"><?= $arResult['PROPERTIES']['cleaning']['NAME']?>:</div>
				<?= $arResult['PROPERTIES']['cleaning']['~VALUE']['TEXT']?>
			</div>
		<?endif;?>
		<?if($arResult['PROPERTIES']['change_underwear']['~VALUE']['TEXT']):?>
			<div class="info_item wow fadeInUp">
				<div class="title_item"><?= $arResult['PROPERTIES']['change_underwear']['NAME']?>:</div>
				<?= $arResult['PROPERTIES']['change_underwear']['~VALUE']['TEXT']?>
			</div>
		<?endif;?>
		<?if($arResult['PROPERTIES']['price']['VALUE']):?>
			<div class="price wow fadeInUp">
				от <span class="value_price"><?= $arResult['PROPERTIES']['price']['VALUE']?> ₽</span> / <?= $arResult['PROPERTIES']['price_desc']['VALUE']?>
			</div>
		<?endif;?>

		<div class="bottom_info wow fadeInUp">
			<div class="item">
				<div class="icon">
					<img src="<?echo $arResult["DISPLAY_PROPERTIES"]["icon_one_advantage"]["FILE_VALUE"]["SRC"]?>" alt="">
				</div>
				<div class="desc">
					<?echo $arResult["PROPERTIES"]["desc_one_advantage"]["~VALUE"]?>
				</div>
			</div>
			<div class="item">
				<div class="icon">
					<img src="<?echo $arResult["DISPLAY_PROPERTIES"]["icon_two_advantage"]["FILE_VALUE"]["SRC"]?>" alt="">
				</div>
				<div class="desc">
					<?echo $arResult["PROPERTIES"]["desc_two_advantage"]["~VALUE"]?>
				</div>
			</div>
			<div class="item">
				<div class="icon">
					<img src="<?echo $arResult["DISPLAY_PROPERTIES"]["icon_three_advantage"]["FILE_VALUE"]["SRC"]?>" alt="">
				</div>
				<div class="desc">
					<?echo $arResult["PROPERTIES"]["desc_three_advantage"]["~VALUE"]?>
				</div>
			</div>
		</div>
		<a href="<?echo $arResult["PROPERTIES"]["attr_btn"]["VALUE"]?>" class="button_phone_order wow fadeInUp">Забронировать</a>
	</div>
</div>