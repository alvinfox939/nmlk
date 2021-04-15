<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?>
<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<!-- <base href="/"> -->

	<title><?$APPLICATION->ShowTitle()?></title>
	<meta name="description" content="Startup HTML template OptimizedHTML 5">

	<meta name="viewport" content="width=device-width">

	<link rel="icon" href="<?=SITE_TEMPLATE_PATH;?>/assets/images/favicon.png">
	<meta property="og:image" content="<?=SITE_TEMPLATE_PATH;?>/assets/images/dist/preview.jpg">
	
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH;?>/assets/css/main.min.css">
 
 <?$APPLICATION->ShowHead()?>

</head>

<body> 
<?$APPLICATION->ShowPanel();?>
 <div class="cart-button">
  <button class="btn-cart" id="btn-cart">корзина</button>
  <span>0</span>
 </div>
 <main class="main">
  <header class="header">
   <div class="containers">
    <div class="logo">
     <a href="/"><img src="<?=SITE_TEMPLATE_PATH;?>/assets/images/dist/logo.svg" alt=""></a>
    </div>
    <a href="/model-compitence/" class="header__link">Модель компетенций</a>
    <div class="search">
     <form action="">
      <button type="submit" class="btn-search"></button>
      <input type="search" name="search">
     </form>
    </div>
    <div class="login">
     <span>Александров Александр Александрович</span>
     <img src="<?=SITE_TEMPLATE_PATH;?>/assets/images/dist/icons/user.svg" alt="">
    </div>
   </div>
  </header>
