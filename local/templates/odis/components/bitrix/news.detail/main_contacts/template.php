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
<div class="head">
	<div class="contact_item">
		<div class="title_item"><?= $arResult["DISPLAY_PROPERTIES"]["address"]["NAME"]?></div>
		<div class="text">
			<address><?= $arResult["DISPLAY_PROPERTIES"]["address"]["VALUE"]?></address>
		</div>
	</div>
	<div class="contact_item">
		<div class="title_item"><?= $arResult["DISPLAY_PROPERTIES"]["phone"]["NAME"]?></div>
		<div class="text">
			<a href="tel:<?= $arResult["DISPLAY_PROPERTIES"]["phone"]["VALUE"]?>"><?= $arResult["DISPLAY_PROPERTIES"]["phone"]["VALUE"]?></a>
		</div>
	</div>
	<div class="contact_item">
		<div class="title_item"><?= $arResult["DISPLAY_PROPERTIES"]["booking"]["NAME"]?></div>
		<div class="text">
			<a href="mailto:<?= $arResult["DISPLAY_PROPERTIES"]["booking"]["VALUE"]?>"><?= $arResult["DISPLAY_PROPERTIES"]["booking"]["VALUE"]?></a>
		</div>
	</div>
	<div class="contact_item">
		<div class="title_item"><?= $arResult["DISPLAY_PROPERTIES"]["marketing"]["NAME"]?></div>
		<div class="text">
			<a href="mailto:<?= $arResult["DISPLAY_PROPERTIES"]["marketing"]["VALUE"]?>"><?= $arResult["DISPLAY_PROPERTIES"]["marketing"]["VALUE"]?></a>
		</div>
	</div>
</div>
<div class="bottom">
	<div class="info_stand">
		<div class="icon">
			<img src="<?= SITE_TEMPLATE_PATH ?>/img/bus.svg" alt="">
		</div>
		<div class="stand">
			<div class="title_stand"><?= $arResult["DISPLAY_PROPERTIES"]["subtitle"]["VALUE"]?></div>
			<div class="desc">
				<?= $arResult["DISPLAY_PROPERTIES"]["description"]["~VALUE"]["TEXT"]?>
			</div>
		</div>
	</div>
	<a href="#feedback" class="button_transparent popup-with-form" data-effect="mfp-zoom-in">Связаться с нами</a>
</div>
<form id="feedback" class="feedback mfp-with-anim mfp-hide" action="" method="post" enctype="multipart/form-data">
	<div class="form_title">Связаться<br> с нами</div>
	<div class="inputs">
		<div class="input-wrapper">
			<label for="name_contact_us">Имя</label>
			<input id="name_contact_us" class="input" type="text" name="NAME_USER" maxlength="50" value="">
		</div>
		<div class="input-wrapper">
			<label for="phone_contact_us">Телефон*</label>
			<input id="phone_contact_us" class="input" type="text" name="PHONE" maxlength="50" value="">
		</div>
	</div>
	<div class="textarea-wrapper">
		<label for="textarea_contacts">Комментарий</label>
		<textarea class="input" id="textarea_contacts" name="COMMENT" cols="30" rows="10"></textarea>
	</div>
	<div class="privacy_form">
		Нажимая кнопку “Отправить” вы соглашаетесь на <a href="">обработку персональных данных</a>
	</div>
	<input name="ORDER_CONTACT_US" type="submit" class="button_phone_order" value="Отправить">
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
	if($_POST["ORDER_CONTACT_US"]){
		if(CModule::IncludeModule("iblock")){
			if($_POST["NAME_USER"]!=""){
				$el = new CIBlockElement;
				$arProp["PHONE_USER"] = $_POST["PHONE"];
				$arFields  = Array(
					"MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
					"IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
					"IBLOCK_ID"      => 12, // id инфоблока, который вы создали
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