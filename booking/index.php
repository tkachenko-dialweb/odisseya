<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Бронирование");
?>
	<section class="home hotel_room">
		<div class="bg"><img src="<?= SITE_TEMPLATE_PATH ?>/img/booking.jpg" alt=""></div>
		<div class="wrapper">
			<div class="home_content">
				<div class="present wow fadeInUp">
					<div class="breadcrumb">
						<a href="/">Главная</a><span></span><div class="current">Бронирование</div>
					</div>
					<div class="title">
						Бронирование
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="accommodation">
		<div class="wrapper">

			<!-- start TL Booking form script -->


			<div id='tl-booking-form'>&nbsp;</div>
			<script type='text/javascript'>

				(function(w) {
					var q = [
						['setContext', 'TL-INT-odyssey', 'ru'],
						['embed', 'booking-form', {
							container: 'tl-booking-form'
						}]
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
			</script>
			<!-- end TL Booking form script -->
		</div>
	</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>