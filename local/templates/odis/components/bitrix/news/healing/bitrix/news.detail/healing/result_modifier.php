<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arSelect = Array();//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
$arFilter = Array("IBLOCK_ID"=>$arResult['PROPERTIES']['SPECIALIST']['LINK_IBLOCK_ID'], "ID" => $arResult['PROPERTIES']['SPECIALIST']['VALUE'], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
while($ob = $res->GetNextElement()){ 
    $arFields = $ob->GetFields();  
    $arFields['PROPS'] = $arProps = $ob->GetProperties();
    $arResult['PROPERTIES']['SPECIALIST']['DETAIL_TEXT'] = $arFields;
}