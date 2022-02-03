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
<?/*?>
<div class="news-list">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<p class="news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img
						class="preview_picture"
						border="0"
						src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
						width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
						height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
						alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
						title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
						style="float:left"
						/></a>
			<?else:?>
				<img
					class="preview_picture"
					border="0"
					src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
					width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
					height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
					alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
					title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
					style="float:left"
					/>
			<?endif;?>
		<?endif?>
		<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
			<span class="news-date-time"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
		<?endif?>
		<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
				<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><b><?echo $arItem["NAME"]?></b></a><br />
			<?else:?>
				<b><?echo $arItem["NAME"]?></b><br />
			<?endif;?>
		<?endif;?>
		<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
			<?echo $arItem["PREVIEW_TEXT"];?>
		<?endif;?>
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<div style="clear:both"></div>
		<?endif?>
		<?foreach($arItem["FIELDS"] as $code=>$value):?>
			<small>
			<?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?>
			</small><br />
		<?endforeach;?>
		<?foreach($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
			<small>
			<?=$arProperty["NAME"]?>:&nbsp;
			<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
				<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
			<?else:?>
				<?=$arProperty["DISPLAY_VALUE"];?>
			<?endif?>
			</small><br />
		<?endforeach;?>
	</p>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
<?*/?>
<section class="about">
        <div class="about__left">
            <p>
                Пребывание в ОДИССЕЯ Wellness Resort сочетает эффективное лечение недорого с комфортным отдыхом на
                Чёрном море. Курорт – важный этап восстановления после травм и острых патологий. Санатории и пансионаты
                российского Черноморского побережья Кавказа ещё с прошлого века были популярными среди больных с
                лёгочными, сердечно-сосудистыми, неврологическими заболеваниями.

            </p>
            <p>Помимо оздоровительных программ мы также предлагаем омолаживающие, общеукрепляющие и детокс-программы, в
                которые входит широкий спектр косметологических методик.</p>
            <p>Ознакомиться со всеми услугами нашего медицинского центра можно на медицинской стойке, расположенной в
                холле 0 этажа.</p>
        </div>
        <div class="about__right">
            <div class="about__right_block">
                <h3 class="block__title">
                    Прием
                </h3>
                <p class="block__days">
                    Пн-Сб:
                </p>
                <p class="block__time">
                    с 09:00 до 17:00
                </p>
                <p class="block__day">
                    воскресенье
                </p>
                <p class="block__weekend">
                    выходной
                </p>
            </div>
            <div class="about__right_button">
                <button class="btn">Связаться с доктором по Whatsapp</button>
            </div>
        </div>
    </section>
    <section class="blocks">
        <div class="col wow fadeInUp">
            <div class="block ">
                <div class="block__top-line">
                    <div class="block__top-line_square"></div>
                    <div class="block__top-line_line"></div>
                    <div class="block__top-line_square"></div>
                </div>
                <h3 class="block__title">кардиология </h3>
                <div class="block__button">
                    <a href="healing-cardio/index.html">Подробнее</a>
                </div>
                <img src="healing/images/DIM07566-min%201.png" alt="" class="block__bg-image">
            </div>
        </div>

        <div class="col m-top106 wow fadeInUp">
            <div class="block h309 ">
                <h3 class="block__title">косметология</h3>
                <div class="block__button">
                    <a href="healing-kosmetologia/index.html">Подробнее</a>
                </div>
                <img src="healing/images/Mask%20Group-1.png" alt="" class="block__bg-image">
            </div>
            <div class="block h309 ">
                <h3 class="block__title">специалисты</h3>
                <div class="block__button">
                    <a class="open-popup-link" href="#" data-effect="mfp-zoom-in">Подробнее</a>
                </div>
                <img src="healing/images/DIM07794-min%202.png" alt="" class="block__bg-image">
            </div>
        </div>

        <div class="col wow fadeInUp">
            <div class="block ">
                <div class="block__top-line">

                    <div class="block__top-line_square"></div>
                    <div class="block__top-line_line"></div>
                    <div class="block__top-line_square"></div>
                </div>
                <h3 class="block__title">программы</h3>
                <div class="block__button">
                    <a href="healing-program-v2/index.html">Подробнее</a>
                </div>
                <img src="healing/images/Mask%20Group.png" alt="" class="block__bg-image">
            </div>
        </div>
    </section>