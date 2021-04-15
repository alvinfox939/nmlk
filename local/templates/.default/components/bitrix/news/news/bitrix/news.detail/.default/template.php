<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

$img = CFile::ResizeImageGet($arResult["PREVIEW_PICTURE"], array('width'=>280, 'height'=>130), BX_RESIZE_IMAGE_EXACT, true);
?>
<div class="news-detail equip-detail clear">

	<div class="image">
		<img
			src="<?=$img["src"]?>"
			width="280px"
			height="130px"
			title="<?=$arResult["NAME"]?>"
			alt="<?=$arResult["NAME"]?>"
		>
	</div>

	<h1><?=$arResult["NAME"]?></h1>

	<?=$arResult["DETAIL_TEXT"]?>
</div>