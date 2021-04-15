<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

$strTitle = "";
?>

	<?
	$TOP_DEPTH = $arResult["SECTION"]["DEPTH_LEVEL"];
	$CURRENT_DEPTH = $TOP_DEPTH; ?>

<section class="competency-models m-level">
 <div class="competency-models--title">
  <h2 class="h2">Выберите компетенцию</h2>
 </div>
 <div class="containers">
  <div class="competency-models--wrapper">
  <?foreach($arResult["SECTIONS"] as $arSection): ?>
   <div class="cmodels-item">
    <h3 class="h3"><? echo $arSection["NAME"]?></h3>
    <div class="cmodels-item--hover">
     <div class="cmodels-item--bottom">
      <div class="cmodels-item--bottom-title">
       <h4 class="h4"><? echo $arSection["NAME"]?></h4>
      </div>
      <a href="<? echo $arSection["SECTION_PAGE_URL"]?>">Выбрать</a>
     </div>
    </div>
   </div>
  <?endforeach?>
  </div>
 </div>
</section>

