<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<div class="other-news">
  <div class="block-title"><?=GetMessage('OTHER_NEWS')?></div>

	<?
		  foreach($arResult["ITEMS"] as $arItem):
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				$img = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>185, 'height'=>90), BX_RESIZE_IMAGE_EXACT, true);
			?>
				<div class="item" id="<?=$this->GetEditAreaId($arItem['ID'])?>">
					<div class="image"><img src="<?=$img["src"]?>"></div>
					<div class="name"><a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a></div>
				</div>
			<?
		  endforeach
	?>
	<div class="full-link"><a href="/uslugi/"><?=GetMessage('ALL_NEWS')?></a></div>
</div>