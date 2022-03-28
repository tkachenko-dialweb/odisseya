<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
// \Bitrix\Main\Page\Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/libs/template/contacts/main.css');
use \Bitrix\Main\Page\Asset;
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/libs/template/contacts/main.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/libs/template/contacts/adaptive.css');

// Данные из модуля Дополниетлные настройки (Контенет -> Дополниетлные настройки)
use \Bitrix\Main\Config\Option;
// Отдел бронирования
$bookingMulti = Option::get("grain.customsettings","BOOKING_MULTI");
$bookingWhatsapp = Option::get("grain.customsettings","BOOKING_WHATSAPP");
$bookingEmail = Option::get("grain.customsettings","BOOKING_MAIL");
$bookingDay = Option::get("grain.customsettings","BOOKING_DAY");
$bookingDayEmail = Option::get("grain.customsettings","BOOKING_DAY_EMAIL");

// Медицинский центр
$medPhone_1 = Option::get("grain.customsettings","MED_PHONE_1");
$clearMedPhone_1 = preg_replace('/\([А-Я]{3,}\.\s[0-9]{3,}\)/', '', $medPhone_1);
$medPhone_2 = Option::get("grain.customsettings","MED_PHONE_2");

// Администратор
$adminPhone = Option::get("grain.customsettings","ADMIN_PHONE");

// Дополнительная информация
$insta = Option::get("grain.customsettings","INSTA");

// Адрес
$address = Option::get("grain.customsettings","ADDRESS");

$phone = setCallablePhone($bookingMulti);
// p($phone);
?>

    <section class="map">
        <img class="map__image" src="<?=SITE_TEMPLATE_PATH?>/libs/template/contacts/images/map.png" alt="">
        <div class="map__address">
            <div class="map__address_icon">
                <svg width="52" height="40" viewBox="0 0 52 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_1976_1725)">
                        <path d="M11.5479 39.9083C11.5592 39.9158 11.5742 39.912 11.5854 39.9195C11.674 39.9687 11.7729 39.9962 11.8742 39.9995C11.9299 39.9994 11.9854 39.9918 12.0392 39.977L25.6242 36.2695L39.2092 39.977C39.2629 39.9918 39.3184 39.9994 39.3742 39.9995C39.4752 39.9965 39.574 39.9686 39.6617 39.9183C39.6742 39.912 39.6879 39.9145 39.6992 39.907L50.9492 33.032C51.0654 32.9606 51.1551 32.8533 51.2048 32.7263C51.2544 32.5993 51.2612 32.4595 51.2242 32.3283L44.9942 10.4533C44.9687 10.3622 44.9228 10.278 44.86 10.2073C44.7972 10.1365 44.7191 10.081 44.6317 10.0449C44.5443 10.0087 44.4498 9.99297 44.3553 9.99875C44.2609 10.0045 44.169 10.0317 44.0867 10.0783L37.8842 13.5583C37.7483 13.644 37.6507 13.7787 37.6113 13.9344C37.572 14.0902 37.594 14.2551 37.6728 14.3951C37.7516 14.5351 37.8812 14.6394 38.0348 14.6865C38.1884 14.7336 38.3542 14.7199 38.4979 14.6483L44.0092 11.5545L49.8929 32.212L39.8742 38.3358L37.4942 19.297C37.4736 19.1324 37.3885 18.9827 37.2576 18.8809C37.1267 18.779 36.9607 18.7333 36.7961 18.7539C36.6315 18.7744 36.4818 18.8595 36.3799 18.9905C36.278 19.1214 36.2324 19.2874 36.2529 19.452L38.6367 38.5258L26.2492 35.1445V31.732C26.2492 31.5663 26.1833 31.4073 26.0661 31.2901C25.9489 31.1729 25.7899 31.107 25.6242 31.107C25.4584 31.107 25.2994 31.1729 25.1822 31.2901C25.065 31.4073 24.9992 31.5663 24.9992 31.732V35.1445L12.6104 38.5258L14.9942 19.452C15.0044 19.3705 14.9984 19.2878 14.9766 19.2086C14.9548 19.1294 14.9176 19.0553 14.8672 18.9905C14.8168 18.9256 14.7541 18.8714 14.6827 18.8308C14.6113 18.7902 14.5326 18.7641 14.4511 18.7539C14.3696 18.7437 14.2868 18.7497 14.2077 18.7715C14.1285 18.7933 14.0543 18.8304 13.9895 18.8809C13.9247 18.9313 13.8704 18.994 13.8298 19.0654C13.7892 19.1368 13.7631 19.2155 13.7529 19.297L11.3742 38.3358L1.35543 32.2133L7.23918 11.557L12.7504 14.6508C12.8942 14.7224 13.06 14.7361 13.2136 14.689C13.3671 14.6419 13.4967 14.5376 13.5756 14.3976C13.6544 14.2576 13.6764 14.0927 13.637 13.9369C13.5977 13.7812 13.5 13.6465 13.3642 13.5608L7.16043 10.0795C7.07826 10.0325 6.9864 10.0049 6.89191 9.99882C6.79741 9.99278 6.70279 10.0085 6.6153 10.0447C6.52781 10.0809 6.44977 10.1366 6.38717 10.2077C6.32457 10.2787 6.27908 10.3632 6.25418 10.4545L0.0241772 32.3295C-0.0135033 32.4607 -0.00699662 32.6007 0.0426952 32.7279C0.092387 32.855 0.182508 32.9623 0.299177 33.0333L11.5479 39.9083Z"
                              fill="#262729"/>
                        <path d="M25.2012 29.21C25.316 29.3159 25.4662 29.375 25.6224 29.3757C25.7786 29.3764 25.9293 29.3186 26.045 29.2138C26.4613 28.835 36.25 19.8525 36.25 10.625C36.25 4.66625 31.5837 0 25.625 0C19.6662 0 15 4.66625 15 10.625C15 19.6925 24.785 28.825 25.2012 29.21ZM25.625 1.25C30.9688 1.25 35 5.28 35 10.625C35 18.2463 27.5087 26.0463 25.6287 27.8838C23.7525 26.025 16.25 18.1225 16.25 10.625C16.25 5.28 20.2812 1.25 25.625 1.25Z"
                              fill="#262729"/>
                        <path d="M31.25 10.625C31.25 7.52375 28.7262 5 25.625 5C22.5238 5 20 7.52375 20 10.625C20 13.7262 22.5238 16.25 25.625 16.25C28.7262 16.25 31.25 13.7262 31.25 10.625ZM25.625 15C23.2125 15 21.25 13.0375 21.25 10.625C21.25 8.2125 23.2125 6.25 25.625 6.25C28.0375 6.25 30 8.2125 30 10.625C30 13.0375 28.0375 15 25.625 15Z"
                              fill="#262729"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_1976_1725">
                            <rect width="51.25" height="40" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
            </div>
            <div class="map__address_content">
                <h3 class="content__title">
                    Адрес
                </h3>
                <p class="content__text">
                    <?=$address?>
                </p>
            </div>
        </div>
    </section>
    <section class="contact-blocks">
        <div class="contact-block contact-block-fst">
            <h2 class="contact-block__title">
                Отдел бронирования
            </h2>
            <div class="contact">
                <a href="<?=setCallablePhone($bookingMulti)?>" class="contact__number">
                    <?=$bookingMulti?>
                </a>
                <div class="contact__dot"></div>
                <p class="contact__text">
                    многоканальный
                </p>
            </div>
            <div class="contact">
                <a href="https://wa.me/<?=setWhatsappPhone($bookingWhatsapp)?>" class="contact__number" target="_blank">
                    <?=$bookingWhatsapp?>
                </a>
                <div class="contact__dot"></div>
                <p class="contact__text">
                    whatsapp
                </p>
            </div>
            <div class="contact">
                <a href="mailto:<?=$bookingEmail?>" class="contact__mail"><?=$bookingEmail?></a>
            </div>
        </div>
        <div class="contact-block">
            <h2 class="contact-block__title">
                Отдел бронирования
            </h2>
            <div class="contact">
                <a href="<?=setCallablePhone($bookingDay)?>" class="contact__number">
                    <?=$bookingDay?>
                </a>
                <div class="contact__dot"></div>
                <p class="contact__text">
                    с 8-00 до 17-00
                </p>
            </div>
            <div class="contact">
                <a href="mailto:<?=$bookingDayEmail?>" class="contact__mail"><?=$bookingDayEmail?></a>
            </div>
        </div>
    </section>
    <section class="line">
        <div class="line__square"></div>
        <div class="line__line"></div>
        <div class="line__square"></div>
    </section>
    <section class="contact-blocks">
        <div class="contact-block contact-block-fst">
            <h2 class="contact-block__title">
                Медицинский центр
            </h2>
            <div class="contact">
                <a href="<?=setCallablePhone($clearMedPhone_1)?>" class="contact__number">
                    <?=$medPhone_1?>
                </a>
            </div>
        </div>
        <div class="contact-block">
            <h2 class="contact-block__title">
                Медицинский диспетчер

            </h2>
            <div class="contact">
                <a href="<?=setCallablePhone($medPhone_2)?>" class="contact__number">
                    <?=$medPhone_2?>
                </a>
            </div>
        </div>
    </section>
    <section class="line">
        <div class="line__square"></div>
        <div class="line__line"></div>
        <div class="line__square"></div>
    </section>
    <section class="contact-blocks">
        <div class="contact-block">
            <h2 class="contact-block__title">
                администратор
            </h2>
            <div class="contact">
                <a href="<?=setCallablePhone($adminPhone)?>" class="contact__number">
                    <?=$adminPhone?>
                </a>
                <div class="contact__dot"></div>
                <p class="contact__text">
                    круглосуточно

                </p>
            </div>
        </div>
    </section>
    <section class="line">
        <div class="line__square"></div>
        <div class="line__line"></div>
        <div class="line__square"></div>
    </section>
    <section class="media">
        <div class="media-block">
            <a href="#" class="media-block__arrow">
                <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16.7071 8.70711C17.0976 8.31658 17.0976 7.68342 16.7071 7.29289L10.3431 0.928932C9.95262 0.538408 9.31946 0.538408 8.92893 0.928932C8.53841 1.31946 8.53841 1.95262 8.92893 2.34315L14.5858 8L8.92893 13.6569C8.53841 14.0474 8.53841 14.6805 8.92893 15.0711C9.31946 15.4616 9.95262 15.4616 10.3431 15.0711L16.7071 8.70711ZM0 9H16V7H0V9Z"
                          fill="#262729"/>
                </svg>
            </a>
            <div class="media-block__text">
                Правила проживания в ОДИССЕЯ Wellness Resort
            </div>
        </div>
        <div class="media-block inst">
            <a href="<?=$insta?>" class="media-block__icon" target="_blank">
                <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.0013 18.3327C14.4158 18.3327 15.7723 17.7708 16.7725 16.7706C17.7727 15.7704 18.3346 14.4138 18.3346 12.9993C18.3346 11.5849 17.7727 10.2283 16.7725 9.22811C15.7723 8.22792 14.4158 7.66602 13.0013 7.66602C11.5868 7.66602 10.2303 8.22792 9.23007 9.22811C8.22987 10.2283 7.66797 11.5849 7.66797 12.9993C7.66797 14.4138 8.22987 15.7704 9.23007 16.7706C10.2303 17.7708 11.5868 18.3327 13.0013 18.3327V18.3327Z"
                          stroke="#262729" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M1 18.3333V7.66667C1 5.89856 1.70238 4.20286 2.95262 2.95262C4.20286 1.70238 5.89856 1 7.66667 1H18.3333C20.1014 1 21.7971 1.70238 23.0474 2.95262C24.2976 4.20286 25 5.89856 25 7.66667V18.3333C25 20.1014 24.2976 21.7971 23.0474 23.0474C21.7971 24.2976 20.1014 25 18.3333 25H7.66667C5.89856 25 4.20286 24.2976 2.95262 23.0474C1.70238 21.7971 1 20.1014 1 18.3333Z"
                          stroke="#262729" stroke-width="1.5"/>
                    <path d="M20.332 5.67873L20.3454 5.66406" stroke="#262729" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>
            </a>
            <div class="media-block__label">
                INSTAGRAM
            </div>
        </div>
    </section>
</main>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>