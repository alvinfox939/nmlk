<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

\Bitrix\Main\Loader::includeModule('highloadblock');
$hlblock_id = 1;
$hlblock   = Bitrix\Highloadblock\HighloadBlockTable::getById( $hlblock_id )->fetch();
$entity   = Bitrix\Highloadblock\HighloadBlockTable::compileEntity( $hlblock );
$entity_data_class = $entity->getDataClass();
$entity_table_name = $hlblock['TABLE_NAME'];
$sTableID = 'tbl_'.$entity_table_name;
?>
<div class="projects-list flex">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

		$img = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>240, 'height'=>160), BX_RESIZE_IMAGE_EXACT, true);

		$arFilter = array("UF_XML_ID" => $arItem['PROPERTIES']['COUNTRY']['VALUE']);
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
		?>
		<div class="item" id="<?=$this->GetEditAreaId($arItem['ID'])?>">
			<div class="image"><a href="<?=$arItem['DETAIL_PAGE_URL']?>"><img src="<?=$img["src"]?>"></a></div>
			<div class="loc flex">
				<div class="icon"><img src="<?=$img_path?>"/></div>
				<div class="value"><a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['PROPERTIES']['LOCATION']['VALUE']?></a></div>
			</div>
			<div class="name"><a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a></div>
		</div>
	<?endforeach;?>
</div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
