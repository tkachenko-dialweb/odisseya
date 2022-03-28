<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
// p($arResult);
if (!empty($arResult['PROPERTIES']))
{
    foreach ($arResult['PROPERTIES'] as $key => $arProp) {
        if (empty($arProp['VALUE']) || is_array($arProp['VALUE']) || $arProp['ID'] == 62) 
        {
            continue;
        }

        $arResult['PROPERTIES'][$key]['FILE_ARRAY'] = CFile::GetFileArray($arProp['VALUE']);
        $arResult['PROPERTIES'][$key]['URL'] = CFile::ResizeImageGet($arProp['VALUE'], array('width'=>600, 'height'=>800), BX_RESIZE_IMAGE_PROPORTIONAL, true);
        
    }
}

// Блок Организационная структура
if ($arResult['PROPERTIES']['STRUCTURE']['VALUE'] == 1)
{

    $tree = CIBlockSection::GetList(
        array('sort' => 'asc'),
        $arFilter = Array(
            'IBLOCK_ID' => $arResult['PROPERTIES']['STRUCTURE']['LINK_IBLOCK_ID'],
        ),
        true,
        array()
    );
    while($section = $tree->GetNext()) {

        $arSelect = Array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM","PROPERTY_*");
        $arFilter = Array("IBLOCK_ID"=>$section['IBLOCK_ID'], "SECTION_ID"=>$section["ID"], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
        $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
        while($ob = $res->GetNextElement()){ 
            $arFields = $ob->GetFields();  
            $arProps = $ob->GetProperties();
            $arFields['PROPS']['PRICE_VALUE'] = $arProps['PRICE_VALUE']['VALUE'];
            $arFields['PROPS']['PRICE'] = $arProps['PRICE']['VALUE'];
            $section['ITEMS'][] = $arFields;
        }

        if ($section['DEPTH_LEVEL'] == 1)
        {
            $arResult['CUSTOM_STRUCTURE'][$section['ID']] = $section;
        }
            
        if($section['DEPTH_LEVEL'] == 2){
            $arResult['CUSTOM_STRUCTURE'][$section['IBLOCK_SECTION_ID']]['SUB_SECTIONS'][$section['ID']] = $section;
            $lavael_1 = $section['IBLOCK_SECTION_ID'];
        }

        if($section['DEPTH_LEVEL'] == 3){
            $arResult['CUSTOM_STRUCTURE'][$lavael_1]['SUB_SECTIONS'][$section['IBLOCK_SECTION_ID']]['SUB_SECTIONS'][$section['ID']] = $section;
        }
    }
}

if (!empty($arResult['PROPERTIES']['FILE_SERT_CAT']['VALUE']))
{
    foreach ($arResult['PROPERTIES']['FILE_SERT_CAT']['VALUE'] as $key => $arProp) {
        if (empty(CFile::GetPath($arProp))) 
        {
            continue;
        }

        $arResult['PROPERTIES']['FILE_SERT_CAT']['URL'][] = CFile::GetPath($arProp);
    }
}
if (!empty($arResult['PROPERTIES']['FILE_LICENSE']['VALUE']))
{
    foreach ($arResult['PROPERTIES']['FILE_LICENSE']['VALUE'] as $key => $arProp) {
        if (empty(CFile::GetPath($arProp))) 
        {
            continue;
        }

        $arResult['PROPERTIES']['FILE_LICENSE']['URL'][] = CFile::GetPath($arProp);
    }
}

if (!empty($arResult['PROPERTIES']['FILE_SERT']['VALUE']))
{
    foreach ($arResult['PROPERTIES']['FILE_SERT']['VALUE'] as $key => $arProp) {
        if (empty(CFile::GetPath($arProp))) 
        {
            continue;
        }

        $arResult['PROPERTIES']['FILE_SERT']['URL'][] = CFile::GetPath($arProp);
    }
}
// p($arResult['CUSTOM_STRUCTURE']);