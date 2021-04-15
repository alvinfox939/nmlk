<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>


<?
	$slides = null;
	$content = null;
	$navigation = null;
	$i = 1;
	$active = "active";
	foreach($arResult["ITEMS"] as $arItem):
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		
		$img = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], array('width'=>1920, 'height'=>550), BX_RESIZE_IMAGE_EXACT, true);

		$slides .= '<div class="item" id="'.$this->GetEditAreaId($arItem['ID']).'" style="background-image: url('.$img["src"].')"></div>';
		$content .= '
			<div class="item '.$active.'" data-slide="'.$i.'">
				<div class="name">'.$arItem["NAME"].'</div>
				<div class="desc">'.$arItem["PREVIEW_TEXT"].'</div>
		';
		if(strlen($arItem["PROPERTIES"]["LINK"]["VALUE"])>0):
			$content .= '<div class="link"><a href="'.$arItem["PROPERTIES"]["LINK"]["VALUE"].'">'.GetMessage("LINK").'</a></div>';
		endif;
		$content .= '
			</div>
		';
		$navigation .= '<div class="item '.$active.'" data-slide="'.$i.'"><span>'.$i.'</span></div>';
		$i++;
		$active = null;
	endforeach
?>


<div class="mainpage-slider-container">
	<div class="slider">
		<?=$slides?>
	</div>
  	<div class="navigation-container">
		<div class="container">
			<div class="wrapper flex">
				<div class="navigation"><?=$navigation?></div>
				<div class="content"><?=$content?></div>
			</div>
		</div>
	</div>
</div>
