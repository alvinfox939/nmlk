<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="equip-list news-page-list">
	<?
	foreach($arResult["ITEMS"] as $arItem):
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

		$img = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>278, 'height'=>128), BX_RESIZE_IMAGE_EXACT, true);

		?>

		<div class="item flex" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<div class="image">
				<img src="<?=$img["src"]?>">
			</div>
			<div class="content flex">
				<div class="date"><?=$arItem['DISPLAY_ACTIVE_FROM']?></div>
				<div class="name"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></div>
				<div class="preview"><?=$arItem["PREVIEW_TEXT"]?></div>
			</div>
		</div>

		<?

		endforeach;
	?>
</div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
