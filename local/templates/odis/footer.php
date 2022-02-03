<?php
$page_main_search = parse_url($_SERVER['REQUEST_URI']);
if (strpos($page_main_search['path'],"/booking") === false) : ?>
<!-- start TL Search form script -->
<script type='text/javascript'>
	(function(w) {
		var q = [
			['setContext', 'TL-INT-odyssey', 'ru'],
			['embed', 'search-form', {
				container: 'tl-search-form'
			}]
		];
		var t = w.travelline = (w.travelline || {}),
			ti = t.integration = (t.integration || {});
		ti.__cq = ti.__cq ? ti.__cq.concat(q) : q;
		if (!ti.__loader) {
			ti.__loader = true;
			var d = w.document,
				p = d.location.protocol,
				s = d.createElement('script');
			s.type = 'text/javascript';
			s.async = true;
			s.src = (p == 'https:' ? p : 'http:') + '//ibe.tlintegration.com/integration/loader.js';
			(d.getElementsByTagName('head')[0] || d.getElementsByTagName('body')[0]).appendChild(s);
		}
	})(window);
</script>
<!-- end TL Search form script -->
<?php endif; ?>
</main>
<footer>
	<div class="wrapper">
		<div class="head">
			<div class="logo">
				<img src="<?= SITE_TEMPLATE_PATH ?>/img/logo_footer.svg" alt="">
			</div>
			<ul class="menu">
				<?$APPLICATION->IncludeComponent(
					"bitrix:menu",
					"main",
					Array(
						"ALLOW_MULTI_SELECT" => "N",
						"CHILD_MENU_TYPE" => "top",
						"DELAY" => "N",
						"MAX_LEVEL" => "1",
						"MENU_CACHE_GET_VARS" => array(""),
						"MENU_CACHE_TIME" => "3600",
						"MENU_CACHE_TYPE" => "N",
						"MENU_CACHE_USE_GROUPS" => "Y",
						"ROOT_MENU_TYPE" => "top",
						"USE_EXT" => "Y"
					)
				);?>
			</ul>
			<div class="contacts">
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "inc",
						"EDIT_TEMPLATE" => "",
						"PATH" => "/include/phone.php"
					)
				);?>
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "inc",
						"EDIT_TEMPLATE" => "",
						"PATH" => "/include/mail.php"
					)
				);?>
				<a href="https://odisseya.com/">Перейти на старый сайт</a>
			</div>
		</div>
		<div class="bottom">
			<div class="copy">
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "inc",
						"EDIT_TEMPLATE" => "",
						"PATH" => "/include/copyright.php"
					)
				);?>
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "inc",
						"EDIT_TEMPLATE" => "",
						"PATH" => "/include/privacy.php"
					)
				);?>
			</div>
			<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "file",
					"AREA_FILE_SUFFIX" => "inc",
					"EDIT_TEMPLATE" => "",
					"PATH" => "/include/insta.php"
				)
			);?>
		</div>
	</div>

</footer>







<script src="<?= SITE_TEMPLATE_PATH ?>/libs/animate/wow.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/libs/scroll2id/PageScroll2id.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/libs/jquery/jquery-ui.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/libs/fancybox/jquery.fancybox.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/libs/popup/jquery.magnific-popup.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/libs/swiper/swiper-bundle.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/libs/jquery.maskedinput.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/libs/jquery.touchSwipe.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/common.js"></script>
<?php
$page_main_search = parse_url($_SERVER['REQUEST_URI']);
if (strpos($page_main_search['path'],"/booking") !== false) : ?>
<script type="text/javascript">
    function scrollDown() {
        window.scrollTo({ top: document.getElementById('tl-booking-form').offsetHeight + 400, behavior: 'smooth' })
    }

    $(window).on('load', function () {
        window.setTimeout(function () {
            if (document.documentElement.offsetWidth >= 704) {
                scrollDown();
            }
        }, 300);
    });
</script>
<?php endif; ?>
</body>
</html>