<?
	if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); //Защита от подключения файла напрямую без подключения ядра
	use Bitrix\Main\Page\Asset;

	//Подключение библиотеки для использования  Asset::getInstance()->addCss()
	global $USER;

	use Bitrix\Main\Localization\Loc;
	Loc::loadMessages(__FILE__);
	global $APPLICATION;
	$isMainPage = ($APPLICATION->GetCurPage() == '/') ? true : false;
	$page = $APPLICATION->GetCurPage();
?>
	<!DOCTYPE html>
	<html lang="ru">

	<head>
		<title><? $APPLICATION->ShowTitle(); ?></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta property="og:image" content="path/to/image.jpg">
		<link rel="shortcut icon" href="<?= SITE_TEMPLATE_PATH ?>/img/favicon/favicon.ico" type="image/x-icon">
		<meta name="theme-color" content="#202442">
		<meta name="msapplication-navbutton-color" content="#202442">
		<meta name="apple-mobile-web-app-status-bar-style" content="#202442">
		<link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/normalize.css">
		<link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/main.css">

		<?
			Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/custom.css');
		?>

		<script src="<?= SITE_TEMPLATE_PATH ?>/libs/jquery/jquery.min.js"></script>
		<!-- start TL head script -->
		<!-- <script type='text/javascript'>
			(function(w) {
				var q = [
					['setContext', 'TL-INT-odyssey', 'ru']
				];
				var t = w.travelline = (w.travelline || {}),
					ti = t.integration = (t.integration || {});
				ti.__cq = ti.__cq? ti.__cq.concat(q) : q;
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
		</script> -->
		<!-- end TL head script -->
		<script type="text/javascript">
		  (function() {    window.frisbuy=window.frisbuy||{},window.frisbuy.log=function(t,e,i){var o=localStorage.getItem("frb.log.heap");o=o&&JSON.parse(o)||[],o.push({msg:t,name:e,severity:i,time:Date.now()}),localStorage.setItem("frb.log.heap",JSON.stringify(o))},window.frisbuy.loadScript=function(t,e,i){var o=0,r=function(n){var a=document.createElement("script");n&&frisbuy.log({url:t,attemptLimit:o},"load.widget","high"),o>=e||(i&&(a.onload=i),a.onerror=r,a.src=t,setTimeout(function(){document.head.appendChild(a)},15*Math.pow(10,o)*o),o++)};e=e||3,r()},        frisbuy.loadScript('https://frisbuy.ru/embed/stories?embed_id=272d7f30-05a9-11ec-9365-0242ac130002');
		  })();
		</script>

		<? $APPLICATION->ShowHead(); ?>
	</head>
<? $APPLICATION->ShowPanel() // панель администратора ?>
<body>

<?include_once $_SERVER["DOCUMENT_ROOT"].'/local/templates/odis/include/template/header_main.php';?>
<main <? if (!$isMainPage) echo 'class="main"' ?> >