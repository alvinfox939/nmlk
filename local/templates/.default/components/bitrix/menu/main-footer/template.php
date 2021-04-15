<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>

<?
$arrLinks = null;
$current_url = strtok($_SERVER["REQUEST_URI"], '?');

foreach($arResult as $arItem):

	if ($current_url === $arItem["LINK"]) {
		$link = '<span>' . $arItem["TEXT"] . '</span>';
	} else {
		$link = '<a href="'.$arItem["LINK"].'">'.$arItem["TEXT"].'</a>';
	}
	
	switch($arItem["LINK"]):
		case "/uslugi/":
			$arrLinks[0] = $link;
			break;
		case "/oborudovanie/":
			$arrLinks[1] = $link;
			break;
		default:
			$arrLinks[2] .= "<li>".$link."</li>";
			break;
	endswitch;

endforeach;


$arrServiceItems = null;
$arrEqItems = null;

if(CModule::IncludeModule('iblock')):
	$arSelect = Array("NAME", "DETAIL_PAGE_URL");

	$arFilter = Array("IBLOCK_ID"=>GetMessage("SERVICES_ID"));
	$arrService = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
	while($item = $arrService->GetNext()):
		if ($current_url === $item["DETAIL_PAGE_URL"]) {
			$arrServiceItems .= '<li><span>'.$item["NAME"].'</span></li>';
		} else {
			$arrServiceItems .= '<li><a href="'.$item["DETAIL_PAGE_URL"].'">'.$item["NAME"].'</a></li>';
		}
	endwhile;

	$arFilter = Array("IBLOCK_ID"=>GetMessage("EQ_ID"));
	$arrEq = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
	while($item = $arrEq->GetNext()):
		if ($current_url === $item["DETAIL_PAGE_URL"]) {
			$arrEqItems .= '<li><span>'.$item["NAME"].'</span></li>';
		} else {
			$arrEqItems .= '<li><a href="'.$item["DETAIL_PAGE_URL"].'">'.$item["NAME"].'</a></li>';
		}
		
	endwhile;
endif;
?>

<ul class="main-menu flex">
	<li>
		<?=$arrLinks[0]?>
		<ul>
			<?=$arrServiceItems?>
		</ul>
	</li>
	<li>
		<?=$arrLinks[1]?>
		<ul>
			<?=$arrEqItems?>
		</ul>
	</li>
	<li class="other-links">
		<ul>
			<?=$arrLinks[2]?>
		</ul>
	</li>
</ul>
<?endif?>