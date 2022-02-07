<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<h1 class="main-title">
        Реабилитация после Covid-19
    </h1>

    <section class="courses">
        <?if (!empty($arResult['PROPERTIES']['PROGRAMMS']['VALUE']) && is_array($arResult['PROPERTIES']['PROGRAMMS']['VALUE'])) {?>
            <?foreach ($arResult['PROPERTIES']['PROGRAMMS']['ITEMS'] as $key => $arItem) {?>
                <div class="course">
                    <h2 class="course__title">
                        <?=$arItem['NAME']?>
                    </h2>
                    <div class="course__image">
                        <img src="<?=CFile::GetPath($arItem['PREVIEW_PICTURE']);?>" alt="<?=$arItem['NAME']?>">
                    </div>
                    <div class="course__program bg-orange">
                        <?=$arItem['PROPS']['POST_TITLE']['~VALUE']?>
                    </div>
                    <p class="course__description">
                        <?=$arItem['~PREVIEW_TEXT']?>
                    </p>
                    <?if (!empty($arItem['PROPS']['SERVICE_LIST']['~VALUE'])):?>
                        <ul class="course__list">
                            <?foreach ($arItem['PROPS']['SERVICE_LIST']['~VALUE'] as $item) {?>
                                <li>
                                <?=$item?>
                                </li>
                            <?}?>
                        </ul>
                    <?endif?>
                    <?if (!empty($arItem['PROPS']['SERVICE_PRICE']['~VALUE'])):?>
                        <div class="course__price-block bg-green">
                            <h3 class="price__title">
                                Стоимость:
                            </h3>
                            <?foreach ($arItem['PROPS']['SERVICE_PRICE']['~VALUE'] as $key => $price) {?>
                                <div class="price__item">
                                    <div class="price__item_current-price">
                                        <?=$price?>
                                    </div>
                                    <div class="price__item_previous-price">
                                        <?=$arItem['PROPS']['SERVICE_PRICE']['~DESCRIPTION'][$key]?>
                                    </div>
                                </div>
                            <?}?>
                            <?if (!empty($arItem['PROPS']['SERVICE_PRICE_NOTE']['~VALUE'])) {?>
                                <div class="price__about">
                                    *<?=$arItem['PROPS']['SERVICE_PRICE_NOTE']['~VALUE']?>
                                </div>
                            <?}?>
                        </div>
                    <?endif?>
                </div>
            <?}?>
        <?}?>
    </section>

    <div class="stocks bg-orange">
        Программа суммируется с акциями на проживание
    </div>

    <section class="programs">
        <h2 class="programs-title">
            Программа реабилитации:
        </h2>
        <?if (!empty($arResult['PROPERTIES']['DIAGNOSTIC_BLOCK']['VALUE'])):?>
            <div class="programs-block">
                <h3 class="programs-block__title">
                    <?=$arResult['PROPERTIES']['DIAGNOSTIC_BLOCK']['NAME']?>:
                </h3>
                <p class="programs-block__text">
                    <?=$arResult['PROPERTIES']['DIAGNOSTIC_BLOCK']['~VALUE']['TEXT']?>
                </p>
            </div>
        <?endif;?>
        <?if (!empty($arResult['PROPERTIES']['HEALING_BLOCK']['VALUE'])):?>
            <div class="programs-block">
                <h3 class="programs-block__title">
                    <?=$arResult['PROPERTIES']['HEALING_BLOCK']['NAME']?>:
                </h3>

                <ol class="programs-block__list">
                    <?foreach ($arResult['PROPERTIES']['HEALING_BLOCK']['~VALUE'] as $item) {?>
                        <li>
                            <?=$item?>
                        </li>
                    <?}?>
                    <li> Спелеотерапия (соляная пещера)
                </ol>
            </div>
        <?endif;?>
        <?if (!empty($arResult['PROPERTIES']['HEALTH_BLOCK']['VALUE'])):?>
            <div class="programs-block">
                <h3 class="programs-block__title">
                    <?=$arResult['PROPERTIES']['HEALTH_BLOCK']['NAME']?>:
                </h3>
                <p class="programs-block__text">
                    <?=$arResult['PROPERTIES']['HEALTH_BLOCK']['~VALUE']['TEXT']?>
                </p>
            </div>
        <?endif;?>
    </section>
    <?if (!empty($arResult['PROPERTIES']['REABILITATION_BLOCK_NOTE_2']['VALUE'])):?>
        <div class="plan bg-blue">
            <?=$arResult['PROPERTIES']['REABILITATION_BLOCK_NOTE_2']['~VALUE']['TEXT']?>
        </div>
    <?endif?>
    <?if (!empty($arResult['PROPERTIES']['REABILITATION_BLOCK_NOTE']['VALUE'])):?>
        <div class="reabilitation">
            <?=$arResult['PROPERTIES']['REABILITATION_BLOCK_NOTE']['~VALUE']['TEXT']?>
        </div>
    <?endif?>
    <?if (!empty($arResult['PROPERTIES']['FOOTNOTE']['VALUE'])):?>
        <div class="bottom">
            <?=$arResult['PROPERTIES']['FOOTNOTE']['~VALUE']['TEXT']?>
            <?if (!empty($arResult['PROPERTIES']['MORE_INFO']['VALUE'])):?>
            <p>
                <?=$arResult['PROPERTIES']['MORE_INFO']['~VALUE']?>
            </p>
            <?endif?>
        </div>
    <?endif?>

    <?//p($arResult);?>