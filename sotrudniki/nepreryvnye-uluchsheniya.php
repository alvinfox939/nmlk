<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Непрерывные улучшения");
CModule::IncludeModule('iblock');
?><?
$res = CIBlockSection::GetList(array(), array('IBLOCK_ID' => $arParams["IBLOCK_ID"], 'CODE' => $section["CODE"], 'SITE_ID' => "s1"));
$section = $res->Fetch();    
?> 

<section class="page-title competence">
  <div class="container">
    <div class="breadcrumps">
     <ul>
      <li><a href="/">Главная /</a></li>
      <li><a href="/sotrudniki/">Уровень «Сотрудники» /</a></li>
      <li><?$APPLICATION->ShowTitle();?></li>
     </ul>
    </div>
    <div class="containers">
     <div class="page-title--wrapper">
       <a href="/sotrudniki/" class="link-back">Назад</a>
       <div class="cont-h1">
        <h1 class="h1"><?$APPLICATION->ShowTitle();?></h1>
       </div>
       <div class="info">
         <div class="info-text">
           Вы на странице компетенции. Изучите предложенные рекомендации по развитию 
           для каждого индикатора, выберите оптимальные для вас и достигайте новых высот!
         </div>
       </div>
     </div>
     <div class="page-title--list">
      <span>Ищет новые, более эффективные решения, внедряет изменения в работу.</span>
     </div>
     <div class="page-title--btn">
      <button class="btn-page turn-off">Предыдущая компетенция</button>
      <button class="btn-page">Следующая компетенция</button>
     </div>
    </div>
  </div>
</section>



<section class="recomend">
 <div class="containers">
  <div class="recomend--title">
   <h2 class="h2">Рекомендации по развитию</h2>
   <span>Выберите индикатор</span>
  </div>
 </div>
 <div class="containers">
  <div class="recomend--tabs">
   <ul>
      <?//пример выборки дерева подразделов для раздела 
       $rsParentSection = CIBlockSection::GetByID($section['ID']);
       if ($arParentSection = $rsParentSection->GetNext()) :
          $arFilter = array('IBLOCK_ID' => $arParentSection['IBLOCK_ID'],'>LEFT_MARGIN' => $arParentSection['LEFT_MARGIN'],'<RIGHT_MARGIN' => $arParentSection['RIGHT_MARGIN'],'>DEPTH_LEVEL' => $arParentSection['DEPTH_LEVEL']); // выберет потомков без учета активности
          $rsSect = CIBlockSection::GetList(array('left_margin' => 'desc'),$arFilter);
          while ($arSect = $rsSect->GetNext()) : ?>
           <li><?echo $arSect['NAME']?></li>
          <?endwhile?>
       <?endif?>
   </ul>
  </div>
 </div>
 <div class="container">
  <div class="containers">
  <?//пример выборки дерева подразделов для раздела 
   $rsParentSection = CIBlockSection::GetByID($section['ID']);
   if ($arParentSection = $rsParentSection->GetNext()) :
      $arFilter = array('IBLOCK_ID' => $arParentSection['IBLOCK_ID'],'>LEFT_MARGIN' => $arParentSection['LEFT_MARGIN'],'<RIGHT_MARGIN' => $arParentSection['RIGHT_MARGIN'],'>DEPTH_LEVEL' => $arParentSection['DEPTH_LEVEL']); // выберет потомков без учета активности
      $rsSect = CIBlockSection::GetList(array('left_margin' => 'desc', "PROPERTY_*"),$arFilter);
      while ($arSect = $rsSect->GetNext()) : ?>
   <div class="recomend--tab">
    <div class="recomend-tb-title">
     <?echo $arSect['DESCRIPTION']?>
    </div>
    <div class="recomend-wrapp">
     <div class="recomend-wrapp--title">
      <h2 class="h2">70% ー Самостоятельное развитие на рабочем месте</h2>
      <span>Развивающие задачи</span>
      <p>
       Выберите минимум 1 развивающее действие для выбранного индикатора.
      </p>
     </div>
     <div class="recomend-items">
       <?
       $arSelectFields = Array("NAME", 'DETAIL_TEXT', "PROPERTY_COOKING_TIME", "PROPERTY_RAZOR");
       $res = CIBlockElement::GetList(Array(), Array("IBLOCK_SECTION_ID"=>$arSect), false, false, $arSelectFields);
       while($item = $res->GetNext()): ?>
       <?if ($item['PROPERTY_COOKING_TIME_VALUE'] == "70" && $item['PROPERTY_RAZOR_VALUE'] == "Развивающие задачи"):?>
       <div class="recomend-item" data-cooking="<?=$item['PROPERTY_COOKING_TIME_VALUE']?>" data-check="<?=$arSect['NAME']?>" data-desc="<?echo $arSect['DESCRIPTION']?>" data-sect="<?$APPLICATION->ShowTitle();?>" data-razor="<?=$item['PROPERTY_RAZOR_VALUE']?>">
        <div class="recomend-item--image">
         <img src="<?=SITE_TEMPLATE_PATH;?>/assets/images/dist/1.png" alt="">
         <div class="recomend-item--hover">
          <a href="#" data-id="1" class="addtocard">В корзину</a>
         </div>
        </div>
        <div class="recomend-item--text">
          <?=$item['DETAIL_TEXT']?>
        </div>
        <button class="btn-item"></button>
       </div>
       <?endif?>
       <?endwhile?>
     </div>
    </div>
    <div class="recomend-wrapp">
     <div class="recomend-wrapp--title">
      <span>Развивающие практики Операционной эффективности</span>
      <p>
       Вы сможете включить развивающие действия из этого блока, если вы ранее прошли обучение по программам СРР, ПС,<br>
       Инструменты ПС. Выберите такое количество инструментов, которое вы сможете самостоятельно применить в рамках текущего ИПР.
      </p>
     </div>
     <div class="recomend-items">
       <?
       $arSelectFields = Array("NAME", 'DETAIL_TEXT', "PROPERTY_COOKING_TIME", "PROPERTY_RAZOR");
       $res = CIBlockElement::GetList(Array(), Array("IBLOCK_SECTION_ID"=>$arSect), false, false, $arSelectFields);
       while($item = $res->GetNext()): ?>
       <?if ($item['PROPERTY_COOKING_TIME_VALUE'] == "70" && $item['PROPERTY_RAZOR_VALUE'] == "Развивающие практики Операционной эффективности"):?>
       <div class="recomend-item">
        <div class="recomend-item--image">
         <img src="<?=SITE_TEMPLATE_PATH;?>/assets/images/dist/1.png" alt="">
         <div class="recomend-item--hover">
          <a href="#" data-id="1" class="addtocard">В корзину</a>
         </div>
        </div>
        <div class="recomend-item--text">
          <?=$item['DETAIL_TEXT']?>
        </div>
        <button class="btn-item"></button>
       </div>
       <?endif?>
       <?endwhile?>
     </div>
    </div>
    <div class="recomend-wrapp">
     <div class="recomend-wrapp--title">
      <h2 class="h2">20% ー Обучение на опыте других и запрос обратной связи</h2>
      <p>
       Выберите 1-2 развивающих действия для выбранного индикатора.
      </p>
     </div>
     <div class="recomend-items">
       <?
       $arSelectFields = Array("NAME", 'DETAIL_TEXT', "PROPERTY_COOKING_TIME");
       $res = CIBlockElement::GetList(Array(), Array("IBLOCK_SECTION_ID"=>$arSect), false, false, $arSelectFields);
       while($item = $res->GetNext()): ?>
       <?if ($item['PROPERTY_COOKING_TIME_VALUE'] == "20"):?>
       <div class="recomend-item">
        <div class="recomend-item--image">
         <img src="<?=SITE_TEMPLATE_PATH;?>/assets/images/dist/1.png" alt="">
         <div class="recomend-item--hover">
          <a href="#" data-id="1" class="addtocard">В корзину</a>
         </div>
        </div>
        <div class="recomend-item--text">
          <?=$item['DETAIL_TEXT']?>
        </div>
        <button class="btn-item"></button>
       </div>
       <?endif?>
       <?endwhile?>
     </div>
    </div>
    <div class="recomend-small">
     <div class="recomend-small--title">
      <h2 class="h2">10% ー Обучение, чтение литературы</h2>
      <h3 class="h3">Обучение</h3>
      <div class="mini-title">
       <span>Образовательные решения Корпоративного университета</span> <button class="btn-hide">скрыть</button>
      </div>
      <p>
       При выборе образовательных решений, пожалуйста, учитывайте, что для развития одной компетенции следует выбирать<br>
       не более 3 образовательных решений, а общее количество часов обучения не должно превышать 80 часов в год.
      </p>
     </div>
     <div class="recomend-small--wrapper">
      <div class="recomend-small--items">
       <?
       $arSelectFields = Array("NAME", 'DETAIL_TEXT', "PROPERTY_COOKING_TIME", "PROPERTY_RAZOR");
       $res = CIBlockElement::GetList(Array(), Array("IBLOCK_SECTION_ID"=>$arSect), false, false, $arSelectFields);
       while($item = $res->GetNext()): ?>
       <?if ($item['PROPERTY_COOKING_TIME_VALUE'] == "10" && $item['PROPERTY_RAZOR_VALUE'] == "Обучение"):?>
       <div class="recomend-small-item">
        <div class="recomend-small-item--images">
         <div class="recomend-small-item--hover">
          <a href="#">Смотреть</a> <a href="#" data-id="1" class="addtocard">В корзину</a>
         </div>
        </div>
        <div class="recomend-small-item--title">
         <h4 class="h4"><?=$item['NAME']?></h4>
         Продолжительность обучения: 8ч 40мин
        </div>
        <div class="recomend-small-item--text">
         <?=$item['DETAIL_TEXT']?>
        </div>
       </div>
       <?endif?>
       <?endwhile?>
      
      </div>
      <div class="recomend-small--title">
       <div class="mini-title">
        <span>Электронные курсы</span>
       </div>
       <p>
        Выберите не более 5 электронных курсов на компетенцию. <br>
        Вы можете изучить их в свободное время.
       </p>
      </div>
      <div class="recomend-small--items">

       <div class="recomend-small-item">
        <div class="recomend-small-item--images">
         <img src="<?=SITE_TEMPLATE_PATH;?>/assets/images/dist/2.png" alt="">
         <div class="recomend-small-item--hover">
          <a href="#">Смотреть</a> <a href="#">В корзину</a>
         </div>
        </div>
        <div class="recomend-small-item--title">
         <h4 class="h4">Система управления инновациями</h4>
         Продолжительность обучения: 10мин
        </div>
        <div class="recomend-small-item--text">
         Десять приемов, которые помогут вам правильно ставить задачи и контролировать их выполнение.
        </div>
       </div>

      </div>
     </div>
    </div>
    <div class="recomend-small recomend-small-bottom">
     <div class="recomend-small--title">
      <h3 class="h3">Чтение литературы</h3>
      <p>
       Выберите до 2 книг на компетенцию (одна и та же книга может быть направлена на развитие нескольких<br>
       индикаторов компетенции, смотрите на краткое описание книги).
      </p>
      <div class="mini-title">
      <span> Корпоративная библиотека МАНН, ИВАНОВ и ФЕРБЕР</span> <button class="btn-hide">скрыть</button>
      </div>
     </div>
     <div class="recomend-small--wrapper">
      <div class="recomend-small--items">
       <?
       $arSelectFields = Array("NAME", 'DETAIL_TEXT', 'DETAIL_PICTURE', "PROPERTY_LISTCOMP", "PROPERTY_URLLM");
       $res = CIBlockElement::GetList(Array(), Array("IBLOCK_ID"=>10), false, false, $arSelectFields);
       while($item = $res->GetNext()): 
       $item["DETAIL_PICTURE"] = CFile::GetFileArray($item["DETAIL_PICTURE"]);
       ?>
       <?if ($item['PROPERTY_LISTCOMP_VALUE'] == $section['NAME']):?>
        <div class="recomend-small-item">
         <div class="recomend-small-item--images">
          <img src="<?=$item['DETAIL_PICTURE']['SRC']?>" alt="">
          <div class="recomend-small-item--hover">
           <a href="<?=$item['PROPERTY_URLLM_VALUE']?>">Смотреть</a> <a href="#">В корзину</a>
          </div>
         </div>
         <div class="recomend-small-item--title">
          <h4 class="h4"><?=$item['NAME']?></h4>
         </div>
         <div class="recomend-small-item--text">
          <?=$item['DETAIL_TEXT']?>
         </div>
        </div>
        <?endif?>
       <?endwhile?>
      </div>
     </div>
    </div>

    <div class="recomend-small recomend-small-bottom digital">
     <div class="recomend-small--title">
      <div class="mini-title">
       <span>Корпоративная библиотека Alpina Digital</span> <button class="btn-hide">скрыть</button>
      </div>
     </div>
     <div class="recomend-small--wrapper">
      <div class="recomend-small--items">
      <?
      $arSelectFields = Array("NAME", 'DETAIL_TEXT', 'DETAIL_PICTURE', "PROPERTY_LISTCOMP", "PROPERTY_URLLT");
      $res = CIBlockElement::GetList(Array(), Array("IBLOCK_ID"=>11), false, false, $arSelectFields);

      while($item = $res->GetNext()): 
      $item["DETAIL_PICTURE"] = CFile::GetFileArray($item["DETAIL_PICTURE"]);
      ?>
      
       <?if ($item['PROPERTY_LISTCOMP_VALUE'] == $section['NAME']):?>
         <div class="recomend-small-item">
          <div class="recomend-small-item--images">
           <img src="<?=$item["DETAIL_PICTURE"]['SRC']?>" alt="">
           <div class="recomend-small-item--hover">
            <a href="<?=$item['PROPERTY_URLLM_VALUE']?>">Смотреть</a> <a href="#">В корзину</a>
           </div>
          </div>
          <div class="recomend-small-item--title">
           <h4 class="h4">
            <?=$item['NAME']?> </h4>
          </div>
          <div class="recomend-small-item--text">
            <?=$item['DETAIL_TEXT']?>
          </div>
         </div>
        <?endif?>
       <?endwhile?>

      </div>
     </div>
    </div>
   </div>
   <?endwhile?>
  <?endif?>
  </div>
 </div>
</section>
 
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>