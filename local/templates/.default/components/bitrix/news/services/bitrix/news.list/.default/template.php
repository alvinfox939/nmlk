<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<?
$arrBig = null;
$arrSmall = null;
foreach($arResult["ITEMS"] as $i => $arItem):
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

	(!$i) ? $current = "slick-current" : $current = "";

	$img = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>450, 'height'=>300), BX_RESIZE_IMAGE_EXACT, true);
	$imgSmall = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>135, 'height'=>90), BX_RESIZE_IMAGE_EXACT, true);

	$arrBig .= '
		<div class="item" id="'.$this->GetEditAreaId($arItem['ID']).'">
			<div class="image"><a href="'.$arItem["DETAIL_PAGE_URL"].'"><img src="'.$img['src'].'"></a></div>
			<div class="name"><a href="'.$arItem["DETAIL_PAGE_URL"].'">'.$arItem["NAME"].'</a></div>
			<div class="preview">'.$arItem["PREVIEW_TEXT"].'</div>
		</div>
	';

	$arrSmall .= '
		<div class="item '.$current.'" data-slick-index="'.$i.'">
			<div class="image"><img src="'.$imgSmall['src'].'"></div>
			<div class="name">'.$arItem["NAME"].'</div>
		</div>
	';
	endforeach;
?>

<div class="services-page">
	<div class="slider"><?=$arrBig?></div>
	<div class="nav flex"><?=$arrSmall?></div>
</div>

