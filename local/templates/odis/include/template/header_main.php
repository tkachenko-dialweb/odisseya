<div class="preloader">
	<div class="logo_preload">
		<img src="<?= SITE_TEMPLATE_PATH ?>/img/preload.svg" alt="preload">
	</div>
</div>
<header class="header wow fadeInDown">
	<div class="wrapper">
		<a href="/" class="logo">
			<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "file",
					"AREA_FILE_SUFFIX" => "inc",
					"EDIT_TEMPLATE" => "",
					"PATH" => "/include/logo.php"
				)
			);?>
		</a>
		<div class="navi">
			<nav class="navigation_menu">
				<div class="toggle_mnu">
				<span class="sandwich">
					<span class="sw-topper"></span>
					<span class="sw-bottom"></span>
					<span class="sw-footer"></span>
				</span>
				</div>
				<ul class="main_menu">
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
			</nav>

			<div class="callback">
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
				<a href="/booking/" class="button_phone_order">Выбрать номер</a>
			</div>
		</div>
	</div>
	<div class="mobile_menu">
		<ul class="mnu">
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
	</div>
</header>