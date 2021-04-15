<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

\Bitrix\Main\Loader::includeModule('highloadblock');
$hlblock_id = 1;
$hlblock   = Bitrix\Highloadblock\HighloadBlockTable::getById( $hlblock_id )->fetch();
$entity   = Bitrix\Highloadblock\HighloadBlockTable::compileEntity( $hlblock );
$entity_data_class = $entity->getDataClass();
$entity_table_name = $hlblock['TABLE_NAME'];
$sTableID = 'tbl_'.$entity_table_name;

$arFilter = array("UF_XML_ID" => $arResult['PROPERTIES']['COUNTRY']['VALUE']);
$arSelect = array('UF_FILE');
$rsData = $entity_data_class::getList(array(
	"select" => $arSelect,
	"filter" => $arFilter,
	"limit" => '1',
));

$rsData = new CDBResult($rsData, $sTableID);
while($arRes = $rsData->Fetch()):
	$img_path = CFile::GetPath($arRes["UF_FILE"]);
endwhile;

$arrBig = null;
$arrSmall = null;
foreach($arResult['PROPERTIES']['SLIDES']['VALUE'] as $i => $item):
	(!$i) ? $current = "slick-current" : $current = "";

	$img = CFile::ResizeImageGet($item, array('width'=>450, 'height'=>300), BX_RESIZE_IMAGE_EXACT, true);
	$imgSmall = CFile::ResizeImageGet($item, array('width'=>135, 'height'=>90), BX_RESIZE_IMAGE_EXACT, true);

	$arrBig .= '
		<div class="item" id="'.$this->GetEditAreaId($arItem['ID']).'">
			<div class="image"><img src="'.$img['src'].'"></div>
		</div>
	';

	$arrSmall .= '
		<div class="item '.$current.'" data-slick-index="'.$i.'">
			<div class="image"><img src="'.$imgSmall['src'].'"></div>
		</div>
	';

endforeach;
?>
<div class="news-detail equip-detail clear">

	<h1><?=$arResult["NAME"]?></h1>

	<div class="loc flex">
		<div class="icon"><img src="<?=$img_path?>"/></div>
		<div class="value"><?=$arResult['PROPERTIES']['LOCATION']['VALUE']?></div>
	</div>

	<?=$arResult["DETAIL_TEXT"]?>

	<div class="services-page project">
		<div class="slider"><?=$arrBig?></div>
		<div class="nav flex"><?=$arrSmall?></div>
	</div>

</div>