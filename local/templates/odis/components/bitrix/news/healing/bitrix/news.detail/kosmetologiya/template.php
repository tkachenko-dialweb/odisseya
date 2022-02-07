<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$specialist = $arResult['PROPERTIES']['SPECIALIST']['DETAIL_TEXT'];?>
<h1 class="main-title">
        Косметология и SPA
    </h1>
    <div class="review">
        <div class="review__block">
            
            <div class="review__block_image">
                <img src="<?= CFile::GetPath($specialist['PREVIEW_PICTURE']);?>" alt="<?=$specialist['NAME']?>">
            </div>
            <p class="review__block_description">
                <?=$specialist['PROPS']['NOTE']['VALUE']?>
            </p>

            <h2 class="review__block_name">
                <?=$specialist['NAME']?>
            </h2>
            <p>
                <?=$specialist['PROPS']['POSITION']['VALUE']?>
            </p>
        </div>
        <div class="review__image">
            <img src="<?= CFile::GetPath($specialist['PROPS']['FILE_SERTIFICATE']['VALUE']);?>" alt="sertificate">
        </div>
    </div>
    <button class="accordion-title">
        Прейскурант дополнительных услуг
    </button>
    <div class="accordion-content">
        <h2 class="accordion-content__title">
            Прейскурант дополнительных услуг
        </h2>
        <p class="accordion-content__text">косметологического кабинета</p>
        <?
        // Контент прейскуранта задается в инфоблоке ID 17
        ?>
        <table class="table" border="1">
            <tbody>
            <tr>
                <td style="text-align: center;/* display: none; */">п/п</td>
                <td style="text-align: center;">Наименование услуг</td>
                <td style="text-align: center;">Единица измерения</td>
                <td style="text-align: center;">Стоимость</td>
            </tr>
            <?
            $i = 1; // Нумерация строк
            foreach ($arResult['CUSTOM_PRICE_LIST'] as $title) {
            ?>
            <tr>
                <td style="text-align: left;" colspan="4"><strong><?=$title['NAME']?></strong></td>
            </tr>
                <?foreach ($title['ITEMS'] as $titleItems) {?>
                    <tr>
                        <td><?=$i?></td>
                        <td style="text-align: left;"><?=$titleItems['NAME']?></td>
                        <td><?=$titleItems['PROPS']['PRICE_VALUE']?></td>
                        <td><?=$titleItems['PROPS']['PRICE']?></td>
                    </tr>
                    <?$i++;?>
                <?}?>
                <?foreach ($title['SUB_SECTIONS'] as $titleSubSections) {?>
                    <tr>
                        <td></td>
                        <td style="text-align: left;"><strong><?=$titleSubSections['NAME']?></strong></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?foreach ($titleSubSections['ITEMS'] as $sectionItems) {?>
                        <tr>
                            <td><?=$i?></td>
                            <td style="text-align: left;"><?=$sectionItems['NAME']?></td>
                            <td><?=$sectionItems['PROPS']['PRICE_VALUE']?></td>
                            <td><?=$sectionItems['PROPS']['PRICE']?></td>
                        </tr>
                        <?$i++;?>
                    <?}?>
                <?}?>
            <?}?>
            </tbody>
        </table>
    </div>
<script>
    let acc = document.getElementsByClassName("accordion-title");
    let i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            console.log(1)
            this.classList.toggle("active");
            let panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }
</script>
<?//p($arResult);?>