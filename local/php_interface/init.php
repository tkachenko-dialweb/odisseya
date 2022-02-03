<?
//Регистрируем обработчик именем функции будет IBFeedForm
	AddEventHandler('iblock', 'OnBeforeIBlockElementAdd', 'IBContactusForm');

	function IBContactusForm(&$arFields)
	{
		//Создаем переменные, внутри которых прописываем:
		$SITE_ID = 's1'; //Индетификатор сайта
		$IBLOCK_ID = 12; //Индетификатор инфоблока с новостями
		$EVEN_TYPE = 'CONTUCT_US'; // Тип почтового события (создавали выше)

		if ($arFields['IBLOCK_ID'] == $IBLOCK_ID) {

			//Собираем в массив все данные, которые хотим передать в письмо
			//Перечисляем все поля как в почтовом событии
			$arFeedForm = array(

				//Стандартные поля инфоблока
				"NAME" => $arFields['NAME'], //Название новости
				"COMMENT" => $arFields['PREVIEW_TEXT'], //Анонс
				//Свойства инфоблока - просто перечисляем ID всех нужных свойств
				"PHONE" => $arFields['PROPERTY_VALUES']['PHONE_USER'],
			);

			//И собственно, собираем все это в метод
			//Который создаст наше почтовое событие
			CEvent::Send($EVEN_TYPE, $SITE_ID, $arFeedForm );
		}
	}


	AddEventHandler('iblock', 'OnBeforeIBlockElementAdd', 'IBEventForm');

	function IBEventForm(&$arFields)
	{
		//Создаем переменные, внутри которых прописываем:
		$SITE_ID = 's1'; //Индетификатор сайта
		$IBLOCK_ID = 13; //Индетификатор инфоблока с новостями
		$EVEN_TYPE = 'ORDER_EVENT'; // Тип почтового события (создавали выше)

		if ($arFields['IBLOCK_ID'] == $IBLOCK_ID) {

			//Собираем в массив все данные, которые хотим передать в письмо
			//Перечисляем все поля как в почтовом событии
			$arFeedForm = array(

				//Стандартные поля инфоблока
				"NAME" => $arFields['NAME'], //Название новости
				"COMMENT" => $arFields['PREVIEW_TEXT'], //Анонс
				//Свойства инфоблока - просто перечисляем ID всех нужных свойств
				"PHONE" => $arFields['PROPERTY_VALUES']['PHONE_USER'],
				"EVENT" => $arFields['PROPERTY_VALUES']['NAME_EVENT'],
			);

			//И собственно, собираем все это в метод
			//Который создаст наше почтовое событие
			CEvent::Send($EVEN_TYPE, $SITE_ID, $arFeedForm );
		}
	}

	function p($smth) {
		global $USER;
		if ($USER->IsAdmin()) {
			echo "<pre>";
			print_r($smth);
			echo "</pre>";
		}
	}

	//Очистка номра телефона от лишних символов
	function setCallablePhone($phoneNumber) {
		$number = preg_replace("/[^0-9+]/", '', $phoneNumber);
		if ($number[0]=='8') {$number[0]='7';}
		if ($number[0]=='+') {$number = str_replace('+', '', $number);}
		$number = 'tel:+'.$number;

		return $number;
	}

	function setWhatsappPhone($phoneNumber) {
		$number = preg_replace("/[^0-9+]/", '', $phoneNumber);
		if ($number[0]=='8') {$number[0]='7';}
		if ($number[0]=='+') {$number = str_replace('+', '', $number);}
		$number = $number;

		return $number;
	}
?>