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
<div class="services_wrapper">
	<div class="tabs">
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<? if($arItem['ID'] == 15):?>
				<div class="tab wow	fadeInUp none_title"><?echo $arItem["NAME"]?></div>
			<? elseif($arItem['ID'] == 13):?>
				<div class="tab wow	fadeInUp children"><?echo $arItem["NAME"]?></div>
			<? else:?>
				<div class="tab wow	fadeInUp"><?echo $arItem["NAME"]?></div>
			<? endif;?>
		<?endforeach;?>
	</div>
	<div class="nav_buttons">
		<div class="tab_prev btn">
			<svg width="24" height="6" viewBox="0 0 24 6" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M0 3L5 5.88675L5 0.113247L0 3ZM24 2.5L4.5 2.5L4.5 3.5L24 3.5L24 2.5Z" fill="white"/>
			</svg>
		</div>
		<div class="tab_next btn">
			<svg width="24" height="6" viewBox="0 0 24 6" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M0 3L5 5.88675L5 0.113247L0 3ZM24 2.5L4.5 2.5L4.5 3.5L24 3.5L24 2.5Z" fill="white"/>
			</svg>
		</div>
	</div>
	<div class="tab_content">
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<? if($arItem['ID'] == 15):?>
				<div class="slide">
					<div class="tab_item left_hidden">
						<div class="title_tab">Морской<br>клуб</div>
						<div class="desc_tab">
							<? if($arItem["DISPLAY_PROPERTIES"]["subtitle_slide"]["VALUE"]):?>
								<div class="title_info"><?= $arItem["DISPLAY_PROPERTIES"]["subtitle_slide"]["VALUE"]?>:</div>
							<? endif;?>
							<?echo $arItem["PREVIEW_TEXT"];?>
						</div>
					</div>
				</div>
			<? else:?>
				<div class="slide">
					<?if(count($arItem["DISPLAY_PROPERTIES"]["photos_slider"]["FILE_VALUE"]["SRC"]) == 1):?>
						<div class="tab_item left_hidden">
							<div class="photo">
								<img src="<?echo $arItem["DISPLAY_PROPERTIES"]["photos_slider"]["FILE_VALUE"]["SRC"]?>" alt="">
							</div>
						</div>
					<?else:?>
						<? foreach ($arItem["DISPLAY_PROPERTIES"]['photos_slider']['FILE_VALUE'] as $pid => $arProperty): ?>
							<div class="tab_item left_hidden">
								<div class="photo">
									<img src="<? echo $arProperty['SRC']; ?>" alt="">
								</div>
							</div>
						<?endforeach;?>
					<?endif?>
					<div class="title_active_slide <?if($arItem["PREVIEW_TEXT"]):?>bg_black<?endif;?>">
						<div class="name"><?echo $arItem["NAME"];?></div>
						<div class="description">
							<?echo $arItem["PREVIEW_TEXT"];?>
						</div>
					</div>
				</div>
			<? endif;?>
		<?endforeach;?>
	</div>
</div>
