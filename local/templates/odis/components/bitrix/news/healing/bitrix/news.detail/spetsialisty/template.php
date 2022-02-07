<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<h1 class="main-title">
    Специалисты
</h1>
<section class="courses">
    <?if (!empty($arResult['PROPERTIES']['SPECIALIST']['VALUE']) && is_array($arResult['PROPERTIES']['SPECIALIST']['VALUE'])) {?>
        <?foreach ($arResult['PROPERTIES']['SPECIALIST']['DETAIL_TEXT'] as $key => $arItem) {?>
            <div class="course">
                <h2 class="course__title">
                    <?=$arItem['NAME']?>
                </h2>
                <div class="course__image">
                    <img src="<?=CFile::GetPath($arItem['PREVIEW_PICTURE']);?>" alt="<?=$arItem['NAME']?>">
                </div>
                <div class="course__program bg-orange">
                    <?=$arItem['PROPS']['POSITION']['~VALUE']?>
                </div>
            </div>
        <?}?>
    <?}?>
</section>
<section class="workers">
    <?if (!empty($arResult['SPECIALISTS']) && is_array($arResult['SPECIALISTS'])) {?>
        <?foreach ($arResult['SPECIALISTS'] as $item) {?>
            <h2 class="workers__title">
                <?=$item['NAME']?>
            </h2>
            <div class="workers__blocks">
                <?if (!empty($item['ITEMS']) && is_array($item['ITEMS'])) {?>
                    <?foreach ($item['ITEMS'] as $key => $element) {?>
                        <div class="workers__block">
                            <div class="worker__image">
                                <?if ($element['PREVIEW_PICTURE_SRC']) {?>
                                    <img src="<?=$element['PREVIEW_PICTURE_SRC'];?>" alt="<?=$element['NAME']?>">
                                <?}else{?>
                                    <?=$element['PREVIEW_PICTURE_NOSRC'];?>
                                <?}?>
                            </div>
                            <h3 class="worker__name">
                                <?=$element['NAME']?>
                            </h3>
                            <p class="worker__profession">
                                <?=$element['PROPS']['POSITION']?>
                            </p>
                        </div>
                    <?}?>
                <?}?>
            </div>
        <?}?>
    <?}?>

</section>