<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<div class="mainpage-projects">
	<div class="block-title"><a href="/proekty/"><?=GetMessage("PROJECTS")?></a></div>
	<a href="/proekty/">
		<div class="wrapper">
			<?
				foreach($arResult["ITEMS"] as $i => $arItem):

					$img = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>250, 'height'=>155), BX_RESIZE_IMAGE_EXACT, true, false, false, 65);

					?>

					<div class="item item-<?=$i?>">
						<img
							src="<?=$img["src"]?>"
							width="250"
							height="155"
							alt="<?=$arItem["NAME"]?>"
						>
					</div>

					<?
				endforeach
			?>
		</div>
	</a>
</div>