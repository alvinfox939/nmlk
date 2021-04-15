<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Сотрудники");
CModule::IncludeModule('iblock');
?>
<section class="page-title" style="background-image: url(<?=CFile::GetPath(CIBlock::GetArrayByID(6, "PICTURE"));?>); ">
 <div class="container">
  <div class="breadcrumps">
   <ul>
    <li><a href="/">Главная /</a></li>
    <li>Уровень «<?$APPLICATION->SHowTitle();?>»</li>
   </ul>
  </div>
  <div class="containers">
   <div class="page-title--wrapper">
    <a href="/" class="link-back">Назад</a>
    <div class="cont-h1">
     <h1 class="h1"><?$APPLICATION->ShowTitle();?></h1>
     <ul>
      <li class="active"><a href="#">Сотрудники</a></li>
      <li><a href="#">Линейные руководители</a></li>
      <li><a href="#">Руководители среднего уровня</a></li>
      <li><a href="#">Руководители высшего уровня</a></li>
     </ul>
    </div>
    <div class="info">
     <div class="info-text">
      Вы на странице с уровнем Модели компетенций «Сотрудники». Ознакомьтесь с компетенциями и начинайте выбирать развивающие действия для себя!
     </div>
    </div>
   </div>
   <div class="page-title--desc">
    <span>8 уровень управления</span>
   </div>
   <div class="page-title--list">
    <span>Ниже приведен перечень категорий должностей на выбранном уровне</span>
    <ul>
     <li>Рабочий</li>
     <li>Специалист</li>
     <li>Служащий</li>
    </ul>
   </div>
  </div>
 </div>
</section>
 <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"list.zero",
	Array(
		"ADD_SECTIONS_CHAIN" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COUNT_ELEMENTS" => "Y",
		"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
		"FILTER_NAME" => "sectionsFilter",
		"IBLOCK_ID" => "6",
		"IBLOCK_TYPE" => "compitence",
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => array("NAME","PREVIEW_PICTURE",'PICTURE', ""),
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array("",""),
		"SHOW_PARENT_NAME" => "Y",
		"TOP_DEPTH" => "1",
		"VIEW_MODE" => "LINE"
	)
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>