<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<h1 class="main-title">
        Кардиологический центр
    </h1>
    <p class="main-partner">
        Наш партнер <a href="#">Международный Центр Сердца в Санкт-Петербурге</a>
    </p>
    <section class="advantage bg-gray">
        <div class="advantage__title">
            <?=$arResult['PROPERTIES']['sub_title_detail']['~VALUE']?>
        </div>
        <p class="advantage__text">
            <?=$arResult['PROPERTIES']['MORE_TEXT']['~VALUE']['TEXT']?>
        </p>
    </section>
    <section class="advantage bg-orange">

        <p class="advantage__text">
            <?=$arResult['PROPERTIES']['MORE_TEXT_2']['~VALUE']['TEXT']?>
        </p>
        <ul class="advantage-list">
            <?foreach ($arResult['PROPERTIES']['WHAT_IF']['~VALUE'] as $key => $arItem) {?>
                <li><span></span><?=$arItem?></li>
            <?}?>
        </ul>
    </section>
    <h2 class="main-titles">Кардиология Мирового уровня в ОДИССЕЯ Wellness Resort</h2>
    <section class="main-blocks">
        <?foreach ($arResult['PROPERTIES']['MORE_PHOTO']['VALUE'] as $key => $arItem) {?>
            <div class="main-block">
                <div class="main-block__text">
                    <?=$arResult['PROPERTIES']['MORE_PHOTO']['DESCRIPTION'][$key]?>
                </div>
                <div class="main-block__image">
                    <img src="<?= CFile::GetPath($arItem);?>" alt="picture">
                </div>
            </div>
        <?}?>
    </section>
    <section class="main-doctor">
        <div class="main-doctor__info">
            <?$specialist = $arResult['PROPERTIES']['SPECIALIST']['DETAIL_TEXT'];?>
            <div class="main-doctor__info_title">
                <?=$specialist['NAME']?>
                <p><?=$specialist['PROP']['POSITION']['VALUE']?></p>
            </div>
            <div class="main-doctor__info_content">
                <?=$specialist['~PREVIEW_TEXT']?>
            </div>
        </div>
        <div class="main-doctor__image">
            <img src="<?= CFile::GetPath($specialist['PREVIEW_PICTURE']);?>" alt="picture">
        </div>
    </section>

    <?//p($arResult);?>