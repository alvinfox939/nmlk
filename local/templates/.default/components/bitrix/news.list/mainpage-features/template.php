<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<div class="features">
		<div class="wrapper flex">

	<?
		  foreach($arResult["ITEMS"] as $arItem):
			  $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			  $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

			?>
				<div class="item" id="<?=$this->GetEditAreaId($arItem['ID'])?>">
					<a href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?>">
						<div class="icon"><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"></div>
						<div class="content"><?=$arItem["NAME"]?></div>
					</a>
				</div>
			<?
		  endforeach
	?>
		</div>
</div>
