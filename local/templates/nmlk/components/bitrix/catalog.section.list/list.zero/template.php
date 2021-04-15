<section class="competency-models m-level">
 <div class="competency-models--title">
  <h2 class="h2">Выберите компетенцию</h2>
 </div>
 <div class="containers">
  <div class="competency-models--wrapper">
  <?foreach($arResult["SECTIONS"] as $arSection): ?>
   <div class="cmodels-item" style="background-image: url(<?=$arSection["PICTURE"]["SRC"];?>)">
    <h3 class="h3"><? echo $arSection["NAME"]?></h3>
    <div class="cmodels-item--hover">
     <div class="cmodels-item--bottom">
      <div class="cmodels-item--bottom-title">
       <h4 class="h4"><? echo $arSection["NAME"]?></h4>
      </div>
      <a href="<? echo $arSection["CODE"]?>.php">Выбрать</a>
     </div>
    </div>
   </div>
  <?endforeach?>
  </div>
 </div>
</section>

