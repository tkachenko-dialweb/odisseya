<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$sectionId = $arResult['ITEMS'][0]['IBLOCK_SECTION_ID'];
$res = CIBlockSection::GetByID($sectionId);
if($ar_res = $res->GetNext())
{
    $arResult['SECTION'] = $ar_res;
}