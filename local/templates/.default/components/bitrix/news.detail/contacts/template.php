<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>



	<div class="contacts-container flex">
		<div class="address flex">
			<div class="icon"><img src="/local/templates/.default/images/c1.png"></div>
			<div class="content"><?=$arResult["PROPERTIES"]["ADDRESS"]["VALUE"]?></div>
		</div>
		<div class="phones flex">
			<div class="icon"><img src="/local/templates/.default/images/c2.png"></div>
			<div class="content"><?=$arResult["PROPERTIES"]["PHONES"]["~VALUE"]["TEXT"]?></div>
		</div>
		<div class="email flex">
			<div class="icon"><img src="/local/templates/.default/images/c3.png"></div>
			<div class="content"><a href="mailto:<?=$arResult["PROPERTIES"]["EMAIL"]["VALUE"]?>"><?=$arResult["PROPERTIES"]["EMAIL"]["VALUE"]?></a></div>
		</div>
		<div class="social flex">
			<div class="icon"><img src="/local/templates/.default/images/c4.png"></div>
			<div class="content">
				<div><a href="<?=$arResult["PROPERTIES"]["FB"]["VALUE"]?>"><?=explode("//", $arResult["PROPERTIES"]["FB"]["VALUE"])[1]?></a></div>
				<div><a href="<?=$arResult["PROPERTIES"]["VK"]["VALUE"]?>"><?=explode("//", $arResult["PROPERTIES"]["VK"]["VALUE"])[1]?></a></div>
			</div>
		</div>
	</div>

<?
$coord = str_replace(",", ", ", $arResult["PROPERTIES"]["MAP"]["VALUE"]);
$coord = "[".$coord."]";
?>

<script type="text/javascript">
	(function ($){
		$(document).ready(function(){
			ymaps.ready(function () {
				var myMap = new ymaps.Map('contacts-map', {
						center: <?=$coord?>,
						zoom: 14,
						controls: []
					});

				myMap.behaviors.disable('scrollZoom');

				myPlacemark = new ymaps.Placemark(myMap.getCenter(),
				{
					iconCaption: '<?=$arResult["NAME"]?>',
				},
				{
					preset:'islands#darkGreenDotIconWithCaption',
				});
				myMap.geoObjects.add(myPlacemark);
			});
		});
	})(jQuery);
</script>