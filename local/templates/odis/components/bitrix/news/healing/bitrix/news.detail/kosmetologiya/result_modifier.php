<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (!empty($arResult['PROPERTIES']['SPECIALIST']['VALUE']))
{
    $arSelect = Array();//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
    $arFilter = Array("IBLOCK_ID"=>$arResult['PROPERTIES']['SPECIALIST']['LINK_IBLOCK_ID'], "ID" => $arResult['PROPERTIES']['SPECIALIST']['VALUE'], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
    while($ob = $res->GetNextElement()){ 
        $arFields = $ob->GetFields();  
        $arFields['PROPS'] = $arProps = $ob->GetProperties();
        $arResult['PROPERTIES']['SPECIALIST']['DETAIL_TEXT'] = $arFields;
    }
    unset($arFields);
}


// Собираем массив Прайс листа
$tree = CIBlockSection::GetList(
    array('sort' => 'asc'),
    $arFilter = Array(
        'IBLOCK_ID' => $arResult['PROPERTIES']['PRICE_LIST']['LINK_IBLOCK_ID'],
        "SECTION_ID" => $arResult['PROPERTIES']['PRICE_LIST']['VALUE'],
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


    if($section['DEPTH_LEVEL'] == 2){
        $arResult['CUSTOM_PRICE_LIST'][$section['ID']] = $section;
    }

    if(($section['RIGHT_MARGIN'] - $section['LEFT_MARGIN']) > 1){
        $subTree = CIBlockSection::GetList(
            array('sort' => 'asc'),
            $arSubFilter = Array(
                'IBLOCK_ID' => $section['IBLOCK_ID'],
                "SECTION_ID" => $section["ID"],
            ),
            true,
            array()
        );
        while($subSection = $subTree->GetNext()) {
            $arSelect = Array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM","PROPERTY_*");
            $arFilter = Array("IBLOCK_ID"=>$subSection['IBLOCK_ID'], "SECTION_ID"=>$subSection["ID"], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
            $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
            while($ob = $res->GetNextElement()){ 
                $arFields = $ob->GetFields();  
                $arProps = $ob->GetProperties();
                $arFields['PROPS']['PRICE_VALUE'] = $arProps['PRICE_VALUE']['VALUE'];
                $arFields['PROPS']['PRICE'] = $arProps['PRICE']['VALUE'];
                $subSection['ITEMS'][] = $arFields;
            }
            $arResult['CUSTOM_PRICE_LIST'][$section['ID']]['SUB_SECTIONS'][] = $subSection;
        }
        
    }

    
}