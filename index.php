<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("NMLK");
?><section class="home-banner">
<div class="container">
	<div class="home-banner--text">
		<h1 class="h1">Руководство по развитию компетенций</h1>
  <?$APPLICATION->IncludeComponent(
      "bitrix:main.include",
      "",
      Array(
          "AREA_FILE_SHOW" => "file",
          "PATH" => $APPLICATION->GetTemplatePath("includes/home/home_text.php")
      )
  );?>
	</div>
</div>
 </section> 
 <?$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    Array(
        "AREA_FILE_SHOW" => "file",
        "PATH" => $APPLICATION->GetTemplatePath("includes/home/management-model.php")
    )
);?>

<section class="instruction">
 <div class="containers">
  <div class="instruction--title">
   <h2 class="h2">Как пользоваться Руководством?</h2>
  </div>
  <div class="instruction--desc">
    От вашего руководителя вы получили рекомендации о том, какие компетенции и <span>индикаторы ✦</span><br>
    вам нужно развивать. Или возможно вы прошли <span>ассессмент-центр ✦</span>, <span>центр развития ✦</span><br>
    или опрос <span>360°/180° ✦</span>, а может быть, даже выбрали сами, какие компетенции<br>
    и индикаторы вы будете развивать.
  </div>
  <div class="instruction--wrapper">
   <div class="instruction-item--desc">
    Чтобы выбрать развивающие действия с помощью этого Руководства, вам предстоит совершить следующие шаги:
   </div>
   <div class="instruction-item--one">
    <div class="instruction-item bg-smail">
     <span class="instruction-item--number">1</span>
     <div class="instruction-item--text">
      Выбрать <span>свой уровень ✦</span> модели компетенций ИЛИ <span>целевой уровень ✦</span>, если вы резервист.
     </div>
    </div>
    <div class="instruction-item">
     <span class="instruction-item--number">2</span>
     <div class="instruction-item--text">
      Выбрать компетенцию <br>
      и индикатор, который планируете развивать.
     </div>
    </div>
   </div>
   <div class="instruction-item--two">
    <div class="instruction-item bg-smail-3">
     <span class="instruction-item--number">3</span>
     <div class="instruction-item--text">
      Подобрать из списка развивающие действия на ближайший год,<br> пользуясь
      <span>формулой эффективного развития «70-20-10» ✦</span>. При выборе следуйте рекомендациям 
      по оптимальному количеству развивающих действий из каждого блока и учитывайте вашу рабочую нагрузку. Действия будут автоматически собираться в один документ, который вы сможете сохранить у себя в любом устройстве.
     </div>
    </div>
    <div class="instruction-item">
     <span class="instruction-item--number">4</span>
     <div class="instruction-item--text">
      Полученный список развивающих действий внесите в <span>форму индивидуального плана развития <br>(ИПР) ✦</span>, утвержденную в НЛМК.
     </div>
    </div>
   </div>
  </div>
 </div>
</section>

 <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"",
	Array(
		"ADD_SECTIONS_CHAIN" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COUNT_ELEMENTS" => "Y",
		"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
		"FILTER_NAME" => "sectionsFilter",
		"HIDE_SECTION_NAME" => "N",
		"IBLOCK_ID" => "",
		"IBLOCK_TYPE" => "compitence",
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => array("NAME","DESCRIPTION",""),
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array("",""),
		"SHOW_PARENT_NAME" => "Y",
		"TOP_DEPTH" => "2",
		"VIEW_MODE" => "TILE"
	)
);?><br>
<section class="competency-models">
<div class="container">
	<div class="competency-models--title">
		<h2 class="h2">Выберите уровень Модели компетенций</h2>
	</div>
	<div class="containers">
		<div class="competency-models--wrapper">
    <?
    // выберем все активные информационные блоки для текущего сайта типа catalog
    // у которых мнемонический код не my_products, со счетчиком активных элементов.
    $res = CIBlock::GetList(
       Array(),
       Array(
          'TYPE'=>'compitence',
          'SITE_ID'=>SITE_ID, 
          'ACTIVE'=>'Y', 
          "CNT_ACTIVE"=>"Y",
          "!CODE"=>'my_products'
       ), true
    ); while($ar_res = $res->Fetch()): 
       $image1 = CFile::GetPath($ar_res["PICTURE"])?>
         <div class="cmodels-item" style="background-image: url(<?=$image1?>);">
          <div class="cmodels-item--text">
            <span><? echo $ar_res['EDIT_FILE_BEFORE']?></span>
            уровень <br>
            управления
          </div>
          <h3 class="h3"><? echo $ar_res['NAME']?></h3>
          <div class="cmodels-item--hover">
           <div class="cmodels-item--list">
            <span> Категории должностей на данном уровне:</span>
            <? echo $ar_res['DESCRIPTION']?>
           </div>
           <div class="cmodels-item--bottom">
            <div class="cmodels-item--bottom-title">
             <h4 class="h4"><? echo $ar_res['NAME']?></h4>
             <span><? echo $ar_res['EDIT_FILE_BEFORE']?> уровень управления</span>
            </div>
            <a href="<? echo $ar_res['CANONICAL_PAGE_URL']?>">Выбрать</a>
           </div>
          </div>
         </div>
    <? endwhile ?>
		</div>
	</div>
</div>
 </section>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>