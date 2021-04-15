<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<div class="mainpage-news">
  <div class="block-title"><?=GetMessage('NEWS')?></div>
	<div class="wrapper flex">
	<?
		  foreach($arResult["ITEMS"] as $arItem):
			  $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			  $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

				if(strlen($arItem['PREVIEW_TEXT'])>0):
					$desc = $arItem['PREVIEW_TEXT'];
				else:
					$desc = $arItem['DETAIL_TEXT'];
				endif;

			?>
				<div class="item" id="<?=$this->GetEditAreaId($arItem['ID'])?>">
				  <div class="date"><?=ConvertDateTime($arItem['ACTIVE_FROM'], "DD.MM.YYYY")?></div>
				  <div class="name"><a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a></div>
				  <div class="desc"><?=TruncateText($desc, 200)?></div>
				</div>
			<?
		  endforeach
	?>
		<div class="full-link"><a href="/novosti/"><?=GetMessage('ALL_NEWS')?></a></div>
	</div>
</div>