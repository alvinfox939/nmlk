<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");

?>
<?if($arResult["NavPageCount"] > 1):?>
<div class="pagi flex">
<?
if($arResult["bDescPageNumbering"] === true):
	$bFirst = true;
	if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
		if($arResult["bSavePage"]):
?>
			
			<div class="item">
				<a class="forum-page-previous" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><</a>
			</div>
<?
		else:
			if ($arResult["NavPageCount"] == ($arResult["NavPageNomer"]+1) ):
?>
			<div class="item">
				<a class="forum-page-previous" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><</a>
			</div>
<?
			else:
?>
			<div class="item">			
				<a class="forum-page-previous" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><</a>
			</div><?
			endif;
		endif;
		
		if ($arResult["nStartPage"] < $arResult["NavPageCount"]):
			$bFirst = false;
			if($arResult["bSavePage"]):
?>
				<div class="item">			
					<a class="forum-page-first" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>">1</a>
				</div><?
			else:
?>
				<div class="item">			
					<a class="forum-page-first" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">1</a>
				</div><?
			endif;
			if ($arResult["nStartPage"] < ($arResult["NavPageCount"] - 1)):
?>
				<div class="item">			
					<span class="forum-page-dots">...</span>
				</div><?
			endif;
		endif;
	endif;
	do
	{
		$NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1;
		
		if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
?>
<div class="item">		<span class="<?=($bFirst ? "forum-page-first " : "")?>forum-page-current"><?=$NavRecordGroupPrint?></span>
</div><?
		elseif($arResult["nStartPage"] == $arResult["NavPageCount"] && $arResult["bSavePage"] == false):
?>
<div class="item">		<a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>" class="<?=($bFirst ? "forum-page-first" : "")?>"><?=$NavRecordGroupPrint?></a>
</div><?
		else:
?>
<div class="item">		<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"<?
			?> class="<?=($bFirst ? "forum-page-first" : "")?>"><?=$NavRecordGroupPrint?></a></div>
<?
		endif;
		
		$arResult["nStartPage"]--;
		$bFirst = false;
	} while($arResult["nStartPage"] >= $arResult["nEndPage"]);
	
	if ($arResult["NavPageNomer"] > 1):
		if ($arResult["nEndPage"] > 1):
			if ($arResult["nEndPage"] > 2):
?>
<div class="item">		<span class="forum-page-dots">...</span>
</div><?
			endif;
?>
<div class="item">		<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1"><?=$arResult["NavPageCount"]?></a>
</div><?
		endif;
	
?>
<div class="item">		<a class="forum-page-next"href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>">></a>
</div><?
	endif; 

else:
	$bFirst = true;

	if ($arResult["NavPageNomer"] > 1):
		if($arResult["bSavePage"]):
?>
<div class="item">			<a class="forum-page-previous" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><</a>
</div><?
		else:
			if ($arResult["NavPageNomer"] > 2):
?>
<div class="item">			<a class="forum-page-previous" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><</a>
</div><?
			else:
?>
<div class="item">			<a class="forum-page-previous" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><</a>
</div><?
			endif;
		
		endif;
		
		if ($arResult["nStartPage"] > 1):
			$bFirst = false;
			if($arResult["bSavePage"]):
?>
<div class="item">			<a class="forum-page-first" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1">1</a>
</div><?
			else:
?>
<div class="item">			<a class="forum-page-first" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">1</a>
</div><?
			endif;
			if ($arResult["nStartPage"] > 2):
?>
<div class="item">			<span class="forum-page-dots">...</span>
</div><?
			endif;
		endif;
	endif;

	do
	{
		if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
?>
<div class="item">		<span class="<?=($bFirst ? "forum-page-first " : "")?>forum-page-current"><?=$arResult["nStartPage"]?></span>
</div><?
		elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):
?>
<div class="item">		<a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>" class="<?=($bFirst ? "forum-page-first" : "")?>"><?=$arResult["nStartPage"]?></a>
</div><?
		else:
?>
<div class="item">		<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"<?
			?> class="<?=($bFirst ? "forum-page-first" : "")?>"><?=$arResult["nStartPage"]?></a></div>
<?
		endif;
		$arResult["nStartPage"]++;
		$bFirst = false;
	} while($arResult["nStartPage"] <= $arResult["nEndPage"]);
	
	if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
		if ($arResult["nEndPage"] < $arResult["NavPageCount"]):
			if ($arResult["nEndPage"] < ($arResult["NavPageCount"] - 1)):
?>
<div class="item">		<span class="forum-page-dots">...</span>
</div><?
			endif;
?>
<div class="item">		<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>"><?=$arResult["NavPageCount"]?></a>
</div><?
		endif;
?>
<div class="item">		<a class="forum-page-next" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>">></a>
</div><?
	endif;
endif;

if ($arResult["bShowAll"]):
	if ($arResult["NavShowAll"]):
?>
<div class="item">		<a class="forum-page-pagen" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=0"><?=GetMessage("nav_paged")?></a>
</div><?
	else:
?>
<div class="item">		<a class="forum-page-all" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=1"><?=GetMessage("nav_all")?></a>
</div><?
	endif;
endif
?>
</div>
<?endif?>