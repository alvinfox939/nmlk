<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>


<div class="page-letters">
	<div class="letters-list flex">
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			
			$review_scan_id = $arItem["PROPERTIES"]["REVIEW_SCAN"]['VALUE'];
			$review_scan_props = CFile::ResizeImageGet($review_scan_id, array('width'=>150, 'height'=>1000), BX_RESIZE_IMAGE_PROPORTIONAL, true);
			$review_scan_preview = $review_scan_props['src'];
			$review_scan_full = CFile::GetPath($review_scan_id);
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
							style="margin-bottom: 15px;"
						>
					<?
					endif;
					?>
					<? if ($review_scan_id): ?>
						<a class="js-mfp-image" href="#" data-mfp-src = "<?= $review_scan_full; ?>">
							<img src="<?= $review_scan_preview; ?>" alt="<?= $arItem["NAME"]; ?>">
						</a>
					<? endif; ?>
				</div>
				<div class="info">
					<div class="name"><?=$arItem["NAME"]?></div>
					<?if(isset($arItem["PROPERTIES"]["POSITION"]["VALUE"])):?>
						<div class="pos"><?=$arItem["PROPERTIES"]["POSITION"]["VALUE"]?></div>
					<?endif?>
					<div class="text"><?=$arItem["PREVIEW_TEXT"]?></div>
				</div>
			</div>
		<?endforeach;?>
	</div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>