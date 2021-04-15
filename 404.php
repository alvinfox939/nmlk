<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("404 Not Found");

$APPLICATION->IncludeComponent("bitrix:main.map", ".default", Array(
	"LEVEL"	=>	"3",
	"COL_NUM"	=>	"2",
	"SHOW_DESCRIPTION"	=>	"Y",
	"SET_TITLE"	=>	"Y",
	"CACHE_TIME"	=>	"36000000"
	)
);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?><section class="page-404">
 <h1 class="h1">404</h1>
 <div class="page-404-wrapper">
  <div class="page-404-info">
   <span>Страница не найдена</span>
   <a href="/" class="links-prevs">Назад</a>
  </div>
 </div>
</section>