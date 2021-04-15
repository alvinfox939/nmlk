<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="page-letters page-partners">
	<div class="letters-list flex">
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<div class="item flex" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<div class="image">
					<?
					if(isset($arItem['PREVIEW_PICTURE'])):
						$img = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], array('width'=>150, 'height'=>1000), BX_RESIZE_IMAGE_PROPORTIONAL, true);
					?>
						<img
							src="<?=$img['src']?>"
							width="<?=$img['width']?>"
							height="<?=$img['height']?>"
							alt="<?=$arItem["NAME"]?>"
							title="<?=$arItem["NAME"]?>"
						>
					<?
					endif;
					?>					
					<?if(isset($arItem["PROPERTIES"]["FILE"]["VALUE"])):?>
						<div class="file"><a href="<?=CFile::GetPath($arItem["PROPERTIES"]["FILE"]["VALUE"])?>"><?=GetMessage("CERTIFICATE")?></a></div>
					<?endif?>
				</div>
				<div class="info">
					<div class="name"><?=$arItem["NAME"]?></div>
					<div class="text"><?=$arItem["PREVIEW_TEXT"]?></div>
				</div>
			</div>
		<?endforeach;?>
	</div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>