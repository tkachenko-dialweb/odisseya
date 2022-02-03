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

<div class="events_wrap">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="item wow fadeInUp" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<div class="image"><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt=""></div>
		<?endif?>
		<div class="head">
			<div class="title_event"><?echo $arItem["NAME"]?></div>
			<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
				<div class="sub_title_event"><?echo $arItem["PREVIEW_TEXT"];?></div>
			<?endif;?>
		</div>
		<a href="#order" class="button_phone_order popup-with-form" data-effect="mfp-zoom-in">Оставить заявку</a>
	</div>
<?endforeach;?>
</div>
<form id="order" class="feedback mfp-with-anim mfp-hide" action="" method="post" enctype="multipart/form-data">
	<div class="form_title">Оставить<br> заявку</div>
	<div class="inputs">
		<div class="input-wrapper">
			<label for="name">Имя</label>
			<input id="name" class="input" type="text" name="NAME_USER" maxlength="50" value="">
		</div>
		<div class="input-wrapper">
			<label for="phone">Телефон*</label>
			<input id="phone" class="input" type="text" name="PHONE" maxlength="50" value="">
		</div>
	</div>
	<div class="textarea-wrapper">
		<label for="textarea">Комментарий</label>
		<textarea class="input" id="textarea" name="COMMENT" id="" cols="30" rows="10"></textarea>
	</div>
	<div class="privacy_form">
		Нажимая кнопку “Отправить” вы соглашаетесь на <a href="">обработку персональных данных</a>
	</div>
	<input name="NAME_EVENT" class="title_event" type="hidden" value="">
	<input name="ORDER_EVENT" type="submit" class="button_phone_order" value="Отправить">
	<div class="mfp-close"><img src="<?= SITE_TEMPLATE_PATH ?>/img/close.svg" alt=""></div>
</form>

	<div id="thanks" class="mfp-hide feedback mfp-with-anim">
		<div class="form_title">Благодарим<br> за вашу заявку</div>
		<div class="desc">
			Мы свяжемся с вами в ближайшее время
		</div>
		<div class="mfp-close"><img src="<?= SITE_TEMPLATE_PATH ?>/img/close.svg" alt=""></div>
	</div>


<?
	CModule::IncludeModule('iblock');
	if($_POST["ORDER_EVENT"]){
		if(CModule::IncludeModule("iblock")){
			if($_POST["NAME_USER"]!=""){
				$el = new CIBlockElement;
				$arProp["PHONE_USER"] = $_POST["PHONE"];
				$arProp["NAME_EVENT"] = $_POST["NAME_EVENT"];
				$arFields  = Array(
					"MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
					"IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
					"IBLOCK_ID"      => 13, // id инфоблока, который вы создали
					"ACTIVE"         => "N",            // убираем активность
					"NAME"           => $_POST["NAME_USER"], // название вакансии
					"PREVIEW_TEXT"   => $_POST["COMMENT"], // название вакансии
					"PROPERTY_VALUES" => $arProp
				);
				if($PRODUCT_ID = $el->Add($arFields)) {
//								CEvent::Send('VAСANCY_CREATE', SITE_ID, $arFields);
					echo '<script>$.magnificPopup.open({
                                items: {
                                    src: \'#thanks\'
                                },
                                        type: \'inline\'
                            });$("form").trigger("reset");
                            </script>';
//								LocalRedirect('/');
				}
				else
					echo "Что-то пошло не так!";
			}else{
				echo "Заполнены не все поля";
			}
		}
	}
?>

<script>
	$(document).ready(function() {
		$('.popup-with-form').magnificPopup({
			removalDelay: 500,
			callbacks: {
				beforeOpen: function() {
					this.st.mainClass = this.st.el.attr('data-effect');
				}
			},
			midClick: true
		});
	});
</script>

