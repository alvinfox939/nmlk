<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>

<div class="mainpage-search-form">
	<form action="<?=$arResult["FORM_ACTION"]?>">
		<div class="flex">
			<div class="search-button"><button name="s" type="submit"></button></div>
			<div class="search-block"><input type="text" name="q" value="" size="15" maxlength="50"/></div>
			<div class="search-title"><button name="s" type="submit"><?=GetMessage("SEARCH_TITLE")?></button></div>
		</div>
	</form>
</div>