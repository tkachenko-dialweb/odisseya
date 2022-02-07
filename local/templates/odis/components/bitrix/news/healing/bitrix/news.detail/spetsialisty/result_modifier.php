<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arSelect = Array();//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
$arFilter = Array("IBLOCK_ID"=>$arResult['PROPERTIES']['SPECIALISTS_SECTIONS']['LINK_IBLOCK_ID'], "ID" => $arResult['PROPERTIES']['SPECIALIST']['VALUE'], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
while($ob = $res->GetNextElement()){ 
    $arFields = $ob->GetFields();  
    $arFields['PROPS'] = $arProps = $ob->GetProperties();
    $arResult['PROPERTIES']['SPECIALIST']['DETAIL_TEXT'][] = $arFields;
}

if (!empty($arResult['PROPERTIES']['SPECIALISTS_SECTIONS']['VALUE'])) 
{
    // Собираем массив Прайс листа
    $tree = CIBlockSection::GetList(
        array('sort' => 'asc'),
        $arFilter = Array(
            'IBLOCK_ID' => $arResult['PROPERTIES']['SPECIALISTS_SECTIONS']['LINK_IBLOCK_ID'],
        ),
        true,
        array()
    );
    while($section = $tree->GetNext()) {

        $arSelect = Array();
        $arFilter = Array("IBLOCK_ID"=>$section['IBLOCK_ID'], "SECTION_ID"=>$section["ID"], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
        $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
        while($ob = $res->GetNextElement()){ 
            $arFields = $ob->GetFields();  
            $arProps = $ob->GetProperties();
            $arFields['PROPS']['POSITION'] = $arProps['POSITION']['VALUE'];
            if (!empty($arFields['PREVIEW_PICTURE']))
            {
                $arFields['PREVIEW_PICTURE_SRC'] = CFile::GetPath($arFields['PREVIEW_PICTURE']);
            }
            else
            {
                $arFields['PREVIEW_PICTURE_NOSRC'] = "<svg width='159' height='159' viewBox='0 0 159 159' fill='none' xmlns='http://www.w3.org/2000/svg'><g clip-path='url(#clip0_1976_1452)'><path d='M55.8405 124.657L32.1195 137.596C30.7275 138.355 29.4765 139.288 28.3125 140.305C42.1425 151.966 59.9955 159.001 79.5015 159.001C98.8635 159.001 116.603 152.071 130.394 140.569C129.122 139.495 127.742 138.529 126.212 137.767L100.811 125.068C97.5285 123.427 95.4555 120.073 95.4555 116.404V106.438C96.1695 105.625 96.9855 104.581 97.8585 103.348C101.321 98.4579 103.94 93.0789 105.755 87.4359C109.013 86.4309 111.413 83.4219 111.413 79.8459V69.2079C111.413 66.8679 110.372 64.7769 108.755 63.3129V47.9349C108.755 47.9349 111.914 24.0039 79.5045 24.0039C47.0955 24.0039 50.2545 47.9349 50.2545 47.9349V63.3129C48.6345 64.7769 47.5965 66.8679 47.5965 69.2079V79.8459C47.5965 82.6479 49.0695 85.1139 51.2745 86.5389C53.9325 98.1099 60.8925 106.438 60.8925 106.438V116.158C60.8895 119.698 58.9515 122.959 55.8405 124.657Z' fill='#F7DAAE'/><path d='M80.8588 0.0118385C36.9598 -0.738162 0.761846 34.2418 0.0118463 78.1408C-0.414154 103.032 10.6798 125.403 28.3438 140.28C29.4988 139.272 30.7378 138.348 32.1148 137.598L55.8358 124.659C58.9468 122.961 60.8848 119.7 60.8848 116.154V106.434C60.8848 106.434 53.9218 98.1058 51.2668 86.5348C49.0648 85.1098 47.5888 82.6468 47.5888 79.8418V69.2038C47.5888 66.8638 48.6298 64.7728 50.2468 63.3088V47.9308C50.2468 47.9308 47.0878 23.9998 79.4968 23.9998C111.906 23.9998 108.747 47.9308 108.747 47.9308V63.3088C110.367 64.7728 111.405 66.8638 111.405 69.2038V79.8418C111.405 83.4178 109.005 86.4268 105.747 87.4318C103.932 93.0748 101.313 98.4538 97.8509 103.344C96.9779 104.577 96.1618 105.621 95.4478 106.434V116.4C95.4478 120.069 97.5209 123.426 100.803 125.064L126.204 137.763C127.728 138.525 129.105 139.488 130.374 140.559C147.504 126.273 158.571 104.913 158.982 80.8588C159.738 36.9598 124.761 0.761838 80.8588 0.0118385Z' fill='#B17E4F'/></g><defs><clipPath id='clip0_1976_1452'><rect width='159' height='159' fill='white'/></clipPath></defs></svg>";
            }
            $section['ITEMS'][] = $arFields;
        }

        if($section['DEPTH_LEVEL'] == 1){
            $arResult['SPECIALISTS'][$section['ID']] = $section;
        }
    }
}
