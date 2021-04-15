<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<div class="features">
	<div class="container">
		<div class="drop-container">
			<div class="drop drop_left"></div>
			<div class="drop drop_right"></div>
		</div>
		<div class="wrapper flex">
			<div class="item item-left">
				<div class="icon"></div>
				<div class="content"><?=$arResult['PROPERTIES']['BLOCK_LEFT']['VALUE']?></div>
			</div>
			<div class="item item-center">
				<div class="icon"></div>
				<div class="content"><?=$arResult['PROPERTIES']['BLOCK_CENTER']['VALUE']?></div>
			</div>
			<div class="item item-right">
				<div class="icon"></div>
				<div class="content"><?=$arResult['PROPERTIES']['BLOCK_RIGHT']['VALUE']?></div>
			</div>
		</div>
	</div>
	<div class="bg-town"></div>
</div>