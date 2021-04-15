<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul class="main-menu flex">

<?
$previousLevel = 0;

$current_url = strtok($_SERVER["REQUEST_URI"], '?');

foreach($arResult as $arItem):?>

	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($arItem["IS_PARENT"]):?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<li>

				<? if($current_url === $arItem["LINK"]): ?>
					<span class="root-item-selected">
						<?= $arItem["TEXT"]; ?>
					</span>
				<? else: ?>
					<a href="<?= $arItem["LINK"]; ?>" class="root-item">
						<?= $arItem["TEXT"]; ?>
					</a>
				<? endif; ?>
				<? /* <a href="<?=$arItem["LINK"]?>" class="<? if ($arItem["SELECTED"]): ?>root-item-selected<? else: ?>root-item<?endif?>"><?=$arItem["TEXT"]?></a> */ ?>
				<ul>
		<?else:?>
			<? if($current_url === $arItem["LINK"]): ?>
				<li class="item-selected">
					<span class="parent"><?= $arItem["TEXT"]; ?></span>
			<? else: ?>
				<li>
					<a href="<?= $arItem["LINK"]; ?>">
						<?= $arItem["TEXT"]; ?>
					</a>
			<? endif; ?>
			
			<? /* <li<?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>><a href="<?=$arItem["LINK"]?>" class="parent"><?=$arItem["TEXT"]?></a> */ ?>
				<ul>
		<?endif?>

	<?else:?>

		<?if ($arItem["PERMISSION"] > "D"):?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				
				<? if($current_url === $arItem["LINK"]): ?>
					<li>
						<span class="root-item-selected"><?= $arItem["TEXT"]; ?></span>
					</li>
				<? else: ?>
					<li>
						<a href="<?= $arItem["LINK"]; ?>" class="root-item"><?= $arItem["TEXT"]; ?></a>
					</li>
				<? endif; ?>

				<? /* <li><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><?=$arItem["TEXT"]?></a></li> */ ?>
			<?else:?>
				<? if($current_url === $arItem["LINK"]): ?>
					<li class="item-selected">
						<span><?= $arItem["TEXT"]; ?></span>
					</li>
				<? else: ?>
					<li>
						<a href="<?= $arItem["LINK"]; ?>"><?=$arItem["TEXT"]?></a>
					</li>
				<? endif; ?>

				<? /* <li<?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li> */ ?>
			<?endif?>

		<?else:?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<? if($current_url === $arItem["LINK"]): ?>
					<li>
						<span class="root-item-selected" title="<?= GetMessage("MENU_ITEM_ACCESS_DENIED"); ?>"><?= $arItem["TEXT"]; ?></span>
					</li>
				<? else: ?>
					<li>
						<a href="#" class="root-item" title="<?= GetMessage("MENU_ITEM_ACCESS_DENIED"); ?>"><?= $arItem["TEXT"]; ?></a>
					</li>
				<? endif; ?>
				<? /* <li><a href="" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li> */ ?>
			<?else:?>
				<li><a href="" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?endif?>

	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>

</ul>
<?endif?>