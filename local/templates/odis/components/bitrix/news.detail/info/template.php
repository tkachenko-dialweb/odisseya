<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
<section class="bubbles section-custom">
    <? if ($arResult['PROPERTIES']['FILE_REMEMBER']['VALUE']) { ?>
        <div class="bubble wow fadeInUp">
            <p class="bubble__text">
                <?= $arResult['PROPERTIES']['FILE_REMEMBER']['~DESCRIPTION'] ?>
            </p>
            <div class="bubble__button">
                <a href="<?= $arResult['PROPERTIES']['FILE_REMEMBER']['URL']['src'] ?>" class="btn" data-fancybox="gallery">
                    Подробнее
                </a>
            </div>
        </div>
    <? } ?>
    <? if ($arResult['PROPERTIES']['FILE_MED_NOTES']['VALUE']) { ?>
        <div class="bubble wow fadeInUp">
            <p class="bubble__text">
                <?= $arResult['PROPERTIES']['FILE_MED_NOTES']['~DESCRIPTION'] ?>
            </p>
            <div class="bubble__button">
                <a href="<?= $arResult['PROPERTIES']['FILE_MED_NOTES']['URL']['src'] ?>" class="btn" data-fancybox="gallery_2">
                    Подробнее
                </a>
            </div>
        </div>
    <? } ?>
    <? if ($arResult['PROPERTIES']['FILE_DO_OR_NOT']['VALUE']) { ?>
        <div class="bubble wow fadeInUp">
            <p class="bubble__text">
                <?= $arResult['PROPERTIES']['FILE_DO_OR_NOT']['~DESCRIPTION'] ?>
            </p>
            <div class="bubble__button">
                <a href="<?= $arResult['PROPERTIES']['FILE_DO_OR_NOT']['URL']['src'] ?>" class="btn" data-fancybox="gallery_3">
                    Подробнее
                </a>
            </div>
        </div>
    <? } ?>
</section>
<section class="requisites section-custom">
    <div class="requisites-content">
        <? if ($arResult['PROPERTIES']['REQUISITES']['VALUE']) { ?>
            <h2 class="requisites-content__title">
                Реквизиты
            </h2>
            <ul class="requisites-content__list">
                <? foreach ($arResult['PROPERTIES']['REQUISITES']['VALUE'] as $key => $value) { ?>
                    <? if ($key == 11 || $key == 13) {
                        continue;
                    } ?>
                    <? if ($key == 10) { ?>
                        <li>
                            <span><?= $arResult['PROPERTIES']['REQUISITES']['~DESCRIPTION'][$key] ?>:</span><?= $value ?>
                            <span><?= $arResult['PROPERTIES']['REQUISITES']['~DESCRIPTION'][$key + 1] ?>:</span><?= $arResult['PROPERTIES']['REQUISITES']['VALUE'][$key + 1] ?>
                        </li>

                    <? } else if ($key == 12) { ?>
                        <li>
                            <span><?= $arResult['PROPERTIES']['REQUISITES']['~DESCRIPTION'][$key] ?>:</span><?= $value ?>
                            <span><?= $arResult['PROPERTIES']['REQUISITES']['~DESCRIPTION'][$key + 1] ?>:</span><?= $arResult['PROPERTIES']['REQUISITES']['VALUE'][$key + 1] ?>
                        </li>
                    <? } else { ?>
                        <li>
                            <span><?= $arResult['PROPERTIES']['REQUISITES']['~DESCRIPTION'][$key] ?>:</span><?= $value ?>
                        </li>
                    <? } ?>
                <? } ?>
            </ul>
        <? } ?>
        <div class="requisites-content__line">
            <div class="requisites-content__line_square"></div>
            <div class="requisites-content__line_line"></div>
            <div class="requisites-content__line_square"></div>
        </div>
        <div class="requisites-content__address">
            <p class="address__title"><?= $arResult['PROPERTIES']['ADDRESS']['~NAME'] ?>: </p>
            <div class="address__position">
                <?= $arResult['PROPERTIES']['ADDRESS']['~VALUE'] ?>
            </div>
        </div>
        <div class="requisites-content__faces">
            <div class="face">
                <h3 class="face__title"><?= $arResult['PROPERTIES']['PRE_DIRECTOR_1']['~NAME'] ?>: </h3>
                <p class="face__name">
                    <?= $arResult['PROPERTIES']['PRE_DIRECTOR_1']['~VALUE'] ?>
                </p>
            </div>
            <div class="face">
                <h3 class="face__title"><?= $arResult['PROPERTIES']['PRE_DIRECTOR_2']['~NAME'] ?>: </h3>
                <p class="face__name">
                    <?= $arResult['PROPERTIES']['PRE_DIRECTOR_2']['~VALUE'] ?>
                </p>
            </div>
        </div>
    </div>
    <div class="requisites-blocks">
        <div class="requisites-block blue">
            <p class="requisites-block__description">
                Дата государственной регистрации и сведения об учредителе
            </p>
            <div class="requisites-block__button">
                <button>
                    <a href="<?= $arResult['PROPERTIES']['FILE_EGRUL']['URL']['src'] ?>" data-fancybox="gallery_4">
                        <svg class="fst" width="14" height="18" viewBox="0 0 14 18" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 17H13" stroke="white" stroke-width="1.23" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M7 13L3.5 9.5M7 1V13V1ZM7 13L10.5 9.5L7 13Z" stroke="white" stroke-width="1.23" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <svg class="scd" width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 17H13H1Z" fill="#1E3056" />
                            <path d="M1 17H13" stroke="#1E3056" stroke-width="1.23" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M7 1V13V1ZM7 13L10.5 9.5L7 13ZM7 13L3.5 9.5L7 13Z" fill="#1E3056" />
                            <path d="M7 13L3.5 9.5M7 1V13V1ZM7 13L10.5 9.5L7 13Z" stroke="#1E3056" stroke-width="1.23" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        Выписка из ЕГРЮЛ
                    </a>
                </button>
            </div>
        </div>
        <? if ($arResult['PROPERTIES']['WORKING_DAY']['VALUE']) { ?>
            <div class="requisites-block orange">
                <div class="orange-square">

                </div>
                <p class="requisites-block__time-title">
                    <?= $arResult['PROPERTIES']['WORKING_DAY']['NAME'] ?>:
                </p>
                <p class="requisites-block__work-time">
                    <?= $arResult['PROPERTIES']['WORKING_DAY']['VALUE'] ?>
                </p>
            </div>
        <? } ?>
    </div>
</section>
<? if (!empty($arResult['CUSTOM_STRUCTURE']) && is_array($arResult['CUSTOM_STRUCTURE'])) { ?>
    <? $lastBlock = ['Юристконсульт', 'Экономический отдел', 'Отдел кадров']; ?>
    <section class="structure section-custom">
        <h2 class="structure-title">
            Организационная структура
        </h2>
        <p class="structure-title-description">
            О комплексе
        </p>
        <div class="structure-blocks">
            <? foreach ($arResult['CUSTOM_STRUCTURE'] as $arItem) { ?>
                <div class="director-line">
                    <div class="director">
                        <?= $arItem['NAME'] ?>
                        <div class="director-vertical-line">

                        </div>
                    </div>
                </div>
                <div class="line-top"></div>
                <? if (is_array($arItem['SUB_SECTIONS'])) { ?>
                    <div class="content-blocks">
                        <? foreach ($arItem['SUB_SECTIONS'] as $arSubItems) { ?>
                            <? if (!in_array($arSubItems['NAME'], $lastBlock)) { ?>
                                <div class="content-col">
                                    <div class="blue-block block">
                                        <div class="vertical-line h25"></div>
                                        <?= $arSubItems['NAME'] ?>
                                        <? if (is_array($arSubItems['SUB_SECTIONS']) && count($arSubItems['SUB_SECTIONS']) > 1) {
                                            echo '<div class="right-line"></div>';
                                        } ?>
                                    </div>
                                    <? if (is_array($arSubItems['SUB_SECTIONS'])) { ?>
                                        <?
                                        $countSubSections = count($arSubItems['SUB_SECTIONS']);
                                        ?>
                                        <? foreach ($arSubItems['SUB_SECTIONS'] as $arSubItem_3) { ?>
                                            <div class="block"><?= $arSubItem_3['NAME'] ?>
                                                <div class="vertical-line"></div>
                                                <? if ($countSubSections > 1) {
                                                    echo '<div class="right-line"></div>';
                                                }
                                                ?>
                                            </div>
                                        <? } ?>
                                        <?
                                        if ($countSubSections >= 2 && $countSubSections != 4) {
                                            echo '<div class="col-vertical-line"></div>';
                                        } else if ($countSubSections == 4) {
                                            echo '<div class="col-vertical-line h405"></div>';
                                        }
                                        ?>
                                    <? } ?>

                                </div>
                            <? } ?>
                        <? } ?>

                        <div class="content-col">
                            <div class="col-vertical-line-left"></div>
                            <? foreach ($arItem['SUB_SECTIONS'] as $arSubItems) { ?>
                                <? if (in_array($arSubItems['NAME'], $lastBlock)) { ?>
                                    <div class="block"><?= $arSubItems['NAME'] ?>
                                        <div class="left-line"></div>
                                    </div>
                                <? } ?>
                            <? } ?>
                        </div>
                    </div>
                <? } ?>
            <? } ?>
        </div>
    </section>
<? } ?>

<section class="slider section-custom">
    <div class="slider-bg"></div>
    <div class="slider-pages">
        <? if ($arResult['PROPERTIES']['FILE_SERT_CAT']['VALUE']) { ?>
            <div class="slider-page active" data-id="first-slider">
                <?= $arResult['PROPERTIES']['FILE_SERT_CAT']['NAME'] ?>
            </div>
        <? } ?>
        <div class="page-square">

        </div>
        <? if ($arResult['PROPERTIES']['FILE_LICENSE']['VALUE']) { ?>
            <div class="slider-page" data-id="scd-slider">
                <?= $arResult['PROPERTIES']['FILE_LICENSE']['NAME'] ?>
            </div>
        <? } ?>
        <div class="page-square">

        </div>
        <? if ($arResult['PROPERTIES']['FILE_SERT']['VALUE']) { ?>
            <div class="slider-page" data-id="thrd-slider">
                <?= $arResult['PROPERTIES']['FILE_SERT']['NAME'] ?>
            </div>
        <? } ?>
    </div>
    <div class="slider-arrows first-arrows">

    </div>
    <div class="slider-arrows scd-arrows none">

    </div>
    <div class="slider-arrows thrd-arrows none">

    </div>
    <? if ($arResult['PROPERTIES']['FILE_SERT_CAT']['VALUE']) { ?>
        <div class="slider-container first-slider">
            <? foreach ($arResult['PROPERTIES']['FILE_SERT_CAT']['URL'] as $slide) { ?>
                <div class="slider-item">
                    <img src="<?= $slide; ?>" alt="picture">
                </div>
            <? } ?>
        </div>
    <? } ?>
    <? if ($arResult['PROPERTIES']['FILE_LICENSE']['VALUE']) { ?>
        <div class="slider-container scd-slider none">
            <? foreach ($arResult['PROPERTIES']['FILE_LICENSE']['URL'] as $slide) { ?>
                <div class="slider-item">
                    <img src="<?= $slide; ?>" alt="picture">
                </div>
            <? } ?>
        </div>
    <? } ?>
    <? if ($arResult['PROPERTIES']['FILE_SERT']['VALUE']) { ?>
        <div class="slider-container thrd-slider none">
            <? foreach ($arResult['PROPERTIES']['FILE_SERT']['URL'] as $slide) { ?>
                <div class="slider-item">
                    <img src="<?= $slide; ?>" alt="picture">
                </div>
            <? } ?>
        </div>
    <? } ?>
</section>
<section class="laws section-custom">
    <? if ($arResult['PROPERTIES']['FILE_LAWS']['VALUE']) { ?>
        <h2 class="laws-title">
            ЗАКОНЫ И ПОСТАНОВЛЕНИЯ
        </h2>
        <div class="laws-blocks">
            <? foreach ($arResult['PROPERTIES']['FILE_LAWS']['VALUE'] as $key => $law) { ?>
                <div class="laws-block">
                    <a href="<?= CFile::GetPath($law); ?>" class="law-block__download" download>
                        <svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 17H13" stroke="#262729" stroke-width="1.23" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M7 13L3.5 9.5M7 1V13V1ZM7 13L10.5 9.5L7 13Z" stroke="#262729" stroke-width="1.23" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                    <p class="law-block__text">
                        <?= $arResult['PROPERTIES']['FILE_LAWS']['DESCRIPTION'][$key] ?>
                    </p>
                </div>
            <? } ?>
        </div>
    <? } ?>
    <? if ($arResult['PROPERTIES']['FILE_APPROVAL']['VALUE']) { ?>
        <h2 class="laws-bold-title">
            Об утверждении:
        </h2>
        <div class="laws-blocks">
            <? foreach ($arResult['PROPERTIES']['FILE_APPROVAL']['VALUE'] as $key => $law) { ?>
                <div class="laws-block">
                    <a href="<?= CFile::GetPath($law); ?>" class="law-block__download">
                        <svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 17H13" stroke="#262729" stroke-width="1.23" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M7 13L3.5 9.5M7 1V13V1ZM7 13L10.5 9.5L7 13Z" stroke="#262729" stroke-width="1.23" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                    <p class="law-block__text">
                        <?= $arResult['PROPERTIES']['FILE_APPROVAL']['DESCRIPTION'][$key] ?>
                    </p>
                </div>
            <? } ?>
        </div>
    <? } ?>
</section>
<section class="vacancies section-custom">
    <div class="vacancies__top">
        <div class="vacancies__line">
            <div class="vacancies__line_square"></div>
            <div class="vacancies__line_line"></div>
            <div class="vacancies__line_square"></div>
        </div>
        <div class="vacancies__content">
            <h2 class="">вакансии</h2>
        </div>
        <div class="vacancies__line">
            <div class="vacancies__line_square"></div>
            <div class="vacancies__line_line"></div>
            <div class="vacancies__line_square"></div>
        </div>

    </div>
    <div class="vacancies__button">
        <a href="/vacancies/" class="btn">
            Подробнее
        </a>
    </div>
</section>
<? if ($arResult['PROPERTIES']['FILE_OT']['VALUE']) { ?>
    <section class="info section-custom">
        <h2 class="info__title">
            ИНФОРМАЦИЯ ПО ОХРАНЕ ТРУДА
        </h2>
        <div class="laws-blocks">
            <? foreach ($arResult['PROPERTIES']['FILE_OT']['VALUE'] as $key => $law) { ?>
                <div class="laws-block">
                    <a href="<?= CFile::GetPath($law); ?>" class="law-block__download" download>
                        <svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 17H13" stroke="#262729" stroke-width="1.23" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M7 13L3.5 9.5M7 1V13V1ZM7 13L10.5 9.5L7 13Z" stroke="#262729" stroke-width="1.23" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                    <p class="law-block__text">
                        <?= $arResult['PROPERTIES']['FILE_OT']['DESCRIPTION'][$key] ?>
                    </p>
                </div>
            <? } ?>
        </div>
    </section>
<? } ?>
<? //p($arResult);
?>