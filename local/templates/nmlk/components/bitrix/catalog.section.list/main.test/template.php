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

<section class="recomend">
 <div class="containers">
  <div class="recomend--title">
   <h2 class="h2">Рекомендации по развитию</h2>
   Выберите индикатор
  </div>
 </div>
 <div class="containers">
  <div class="recomend--tabs">
   <ul>
     <?foreach($arResult["SECTIONS"] as $arSection): ?>
      <li><? echo $arSection["NAME"]?></li>
     <?endforeach?>
   </ul>
  </div>
 </div>
 <div class="container">
  <div class="containers">
   <? foreach($arResult['SECTIONS'] as $key => $section): ?>
   <div class="recomend--tab">

    <div class="recomend-tb-title">
     Выявляет зоны неэффективности в собственной работе
    </div>
    <div class="recomend-wrapp">
     <div class="recomend-wrapp--title">
      <h2 class="h2">70% ー Самостоятельное развитие на рабочем месте</h2>
      Развивающие задачи
      <p>
       Выберите минимум 1 развивающее действие для выбранного индикатора.
      </p>
     </div>
     <div class="recomend-items">
        <? foreach($section['ITEMS'] as $item): ?>
           <div class="recomend-item">
            <div class="recomend-item--image">
             <img src="images/dist/1.png" alt="">
             <div class="recomend-item--hover">
              <a href="#">В корзину</a>
             </div>
            </div>
            <div class="recomend-item--text">
              <?=$item['PREVIEW_TEXT']?>
            </div>
            <button class="btn-item"></button>
           </div>
        <?endforeach?>
     </div>
    </div>
    <div class="recomend-wrapp">
     <div class="recomend-wrapp--title">
      Развивающие практики Операционной эффективности
      <p>
       Вы сможете включить развивающие действия из этого блока, если вы ранее прошли обучение по программам СРР, ПС,<br>
       Инструменты ПС. Выберите такое количество инструментов, которое вы сможете самостоятельно применить в рамках текущего ИПР.
      </p>
     </div>
     <div class="recomend-items">
      <div class="recomend-item">
       <div class="recomend-item--image">
        <img src="images/dist/1.png" alt="">
        <div class="recomend-item--hover">
         <a href="#">В корзину</a>
        </div>
       </div>
       <div class="recomend-item--text">
        Найти и описать потери рабочего процесса. Предложить способы их устранения: - выбрать процесс в подразделении, реализация которого требует наибольших затрат ресурсов; - письменно зафиксировать алгоритм выполнения процесса, разбив его на этапы. Напротив каждого этапа указать затрачиваемые ресурсы (человеческие, временные, материальные). Выделить значимую работу, незначимую работу и потери на каждом этапе; - выяснить, как аналогичные процессы выстроены в других отделах или компаниях. Для этого обратиться к коллегам из других подразделений или компаний, либо найти информацию в сети интернет; - сопоставить схему моего рабочего процесса с другими схемами; - особое внимание уделить разнице в количестве этапов и потребляемых ресурсов; - выяснить подробнее, как реализуется рабочий процесс на этапах с наибольшими отличиями; - определить, за счет чего достигается экономия шагов или ресурсов; - построить целевую карту процесса, исключив потери; - описать мероприятия по его улучшению.
       </div>
       <button class="btn-item"></button>
      </div>
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
      <div class="recomend-item">
       <div class="recomend-item--image">
        <img src="images/dist/1.png" alt="">
        <div class="recomend-item--hover">
         <a href="#">В корзину</a>
        </div>
       </div>
       <div class="recomend-item--text">
        Найти и описать потери рабочего процесса. Предложить способы их устранения: - выбрать процесс в подразделении, реализация которого требует наибольших затрат ресурсов; - письменно зафиксировать алгоритм выполнения процесса, разбив его на этапы. Напротив каждого этапа указать затрачиваемые ресурсы (человеческие, временные, материальные). Выделить значимую работу, незначимую работу и потери на каждом этапе; - выяснить, как аналогичные процессы выстроены в других отделах или компаниях. Для этого обратиться к коллегам из других подразделений или компаний, либо найти информацию в сети интернет; - сопоставить схему моего рабочего процесса с другими схемами; - особое внимание уделить разнице в количестве этапов и потребляемых ресурсов; - выяснить подробнее, как реализуется рабочий процесс на этапах с наибольшими отличиями; - определить, за счет чего достигается экономия шагов или ресурсов; - построить целевую карту процесса, исключив потери; - описать мероприятия по его улучшению.
       </div>
       <button class="btn-item"></button>
      </div>
      <div class="recomend-item">
       <div class="recomend-item--image">
        <img src="images/dist/1.png" alt="">
        <div class="recomend-item--hover">
         <a href="#">В корзину</a>
        </div>
       </div>
       <div class="recomend-item--text">
        Найти и описать потери рабочего процесса. Предложить способы их устранения: - выбрать процесс в подразделении, реализация которого требует наибольших затрат ресурсов; - письменно зафиксировать алгоритм выполнения процесса, разбив его на этапы. Напротив каждого этапа указать затрачиваемые ресурсы (человеческие, временные, материальные). Выделить значимую работу, незначимую работу и потери на каждом этапе; - выяснить, как аналогичные процессы выстроены в других отделах или компаниях. Для этого обратиться к коллегам из других подразделений или компаний, либо найти информацию в сети интернет; - сопоставить схему моего рабочего процесса с другими схемами; - особое внимание уделить разнице в количестве этапов и потребляемых ресурсов; - выяснить подробнее, как реализуется рабочий процесс на этапах с наибольшими отличиями; - определить, за счет чего достигается экономия шагов или ресурсов; - построить целевую карту процесса, исключив потери; - описать мероприятия по его улучшению.
       </div>
       <button class="btn-item"></button>
      </div>
     </div>
    </div>
    <div class="recomend-small">
     <div class="recomend-small--title">
      <h2 class="h2">10% ー Обучение, чтение литературы</h2>
      <h3 class="h3">Обучение</h3>
      <div class="mini-title">
       Образовательные решения Корпоративного университета <button class="btn-hide">скрыть</button>
      </div>
      <p>
       При выборе образовательных решений, пожалуйста, учитывайте, что для развития одной компетенции следует выбирать<br>
       не более 3 образовательных решений, а общее количество часов обучения не должно превышать 80 часов в год.
      </p>
     </div>
     <div class="recomend-small--wrapper">
      <div class="recomend-small--items">

       <div class="recomend-small-item">
        <div class="recomend-small-item--images">
         <div class="recomend-small-item--hover">
          <a href="#">Смотреть</a> <a href="#">В корзину</a>
         </div>
        </div>
        <div class="recomend-small-item--title">
         <h4 class="h4">Лидерство</h4>
         Продолжительность обучения: 8ч 40мин
        </div>
        <div class="recomend-small-item--text">
         Образовательное решение направлено на формирование понимания роли Лидера, психологических основ эффективного Лидерства, а также особенностей Лидерской модели в НЛМК.
        </div>
       </div>
      
      </div>
      <div class="recomend-small--title">
       <div class="mini-title">
        Электронные курсы
       </div>
       <p>
        Выберите не более 5 электронных курсов на компетенцию. <br>
        Вы можете изучить их в свободное время.
       </p>
      </div>
      <div class="recomend-small--items">

       <div class="recomend-small-item">
        <div class="recomend-small-item--images">
         <img src="images/dist/2.png" alt="">
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
       Корпоративная библиотека МАНН, ИВАНОВ и ФЕРБЕР <button class="btn-hide">скрыть</button>
      </div>
     </div>
     <div class="recomend-small--wrapper">
      <div class="recomend-small--items">

       <div class="recomend-small-item">
        <div class="recomend-small-item--images">
         <img src="images/dist/3.png" alt="">
         <div class="recomend-small-item--hover">
          <a href="#">Смотреть</a> <a href="#">В корзину</a>
         </div>
        </div>
        <div class="recomend-small-item--title">
         <h4 class="h4">Т. Эйрих. Инсайт</h4>
        </div>
        <div class="recomend-small-item--text">
         По мнению автора, чтобы овладеть новыми навыками, которые делают нас более эффективными в профессиональной сфере, необходимо правильно осознавать себя. Все те качества, которые имеют решающее значение для достижения успеха в современном мире - эмоциональный интеллект, эмпатия, влияние, убеждение, коммуникация и сотрудничество - проистекают из самоосознания.
        </div>
       </div>
      
      </div>
     </div>
    </div>
    <div class="recomend-small recomend-small-bottom digital">
     <div class="recomend-small--title">
      <div class="mini-title">
       Корпоративная библиотека Alpina Digital <button class="btn-hide">скрыть</button>
      </div>
     </div>
     <div class="recomend-small--wrapper">
      <div class="recomend-small--items">

       <div class="recomend-small-item">
        <div class="recomend-small-item--images">
         <img src="images/dist/4.png" alt="">
         <div class="recomend-small-item--hover">
          <a href="#">Смотреть</a> <a href="#">В корзину</a>
         </div>
        </div>
        <div class="recomend-small-item--title">
         <h4 class="h4">
          С.Бехтерев. Как работать в рабочее время: Правила победы над офисным хаосом </h4>
        </div>
        <div class="recomend-small-item--text">
         С помощью приведенных в книге правил и рекомендаций можно существенно повысить эффективность своей работы, находить эффективные решения, внедрять изменения, которые позволят сэкономить массу времени и добиться видимых улучшений.
        </div>
       </div>

      </div>
     </div>
    </div>
   </div>
   <?endforeach?>
  </div>
 </div>
</section>