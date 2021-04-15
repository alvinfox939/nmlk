<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div id="feedback" class="form-feedback" name="feedback">
	<div class="wrapper">
		<div class="content">

			<div class="form-title"><?=GetMessage("FEEDBACK_TITLE")?></div>

			<?if ($arResult["isFormErrors"] == "Y"):?>
				<div class="errortext">
					<?=GetMessage("FEEDBACK_ERROR_TEXT")?>
				</div>
			<?endif;?>

			<?if($arResult["isFormNote"] == "Y"):?>
				<div class="success-message">
					<div class="sa-icon sa-success" style="display: block;">
						<span class="sa-line sa-tip animateSuccessTip"></span>
						<span class="sa-line sa-long animateSuccessLong"></span>

						<div class="sa-placeholder"></div>
						<div class="sa-fix"></div>
					</div>
					<?=$arResult["FORM_NOTE"]?>
				</div>
			<?else:?>

				<?=$arResult["FORM_HEADER"]?>

				<div class="flex">
					<div class="question name">
						<input type="text" class="inputtext" name="form_text_1" value="" size="0" placeholder="<?=GetMessage("FEEDBACK_PERSON")?>">
					</div>

					<div class="question phone">
						<input type="text" class="inputtext" name="form_text_2" value="" size="0">
					</div>
				</div>

				<div class="question message">
					<textarea name="form_textarea_3" cols="40" rows="5" class="inputtextarea" placeholder="<?=GetMessage("FEEDBACK_MESSAGE")?>"></textarea>
				</div>


				<div class="flex bottom-block">
					<?if($arResult["isUseCaptcha"] == "Y"):?>
						<div class="image"><input type="hidden" name="captcha_sid" value="<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" /><img src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" width="180" height="40" /></div>
						<div><input type="text" name="captcha_word" size="30" maxlength="50" value="" class="inputtext" /></div>
					<?endif?>

					<div class="form-submit">
						<div><?=GetMessage("FEEDBACK_BUTTON")?></div>
						<input class="hide" type="submit" name="web_form_submit" value="<?=GetMessage("FEEDBACK_BUTTON")?>" />
					</span>
				</div>

				<?=$arResult["FORM_FOOTER"]?>

			<?endif?>
		</div>
	</div>
</div>

<script>
	$(".form-feedback .phone input").intlTelInput({
		geoIpLookup: function(callback) {
			$.get('http://ipinfo.io', function() {}, "jsonp").always(function(resp) {
				var countryCode = (resp && resp.country) ? resp.country : "";
				callback(countryCode);
			});
		},
		utilsScript: "/local/templates/.default/intl-tel-input-master/build/js/utils.js",
		defaultCountry: 'auto',
		preferredCountries: ['ru'],
		nationalMode: false
	});

	$(".form-feedback .phone input").keydown(function(event) {
		if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 ||
			(event.keyCode == 65 && event.ctrlKey === true) ||
			(event.keyCode >= 35 && event.keyCode <= 39) ||
			event.keyCode == 107) {
			return;
		}
		else {
			if ((event.keyCode < 48 || event.keyCode > 57) &&
				(event.keyCode < 96 || event.keyCode > 105 )) {
				event.preventDefault();
			}
		}
	});

	$(document).ready(function(){

		if($(".form-feedback div").is(".success-message")){
			$(".form-feedback .sa-icon").addClass("animate");
		}
		$("body").on("click", ".form-feedback .form-submit div", function(){
			var frm1 = $(".form-feedback form"),
				error = false;
			frm1.find(".question input, .question textarea").removeClass("error");
			if(!frm1.find(".name input").val()){
				error = true;
				frm1.find(".name input").addClass("error");
			}
			if(!frm1.find(".phone input").val()){
				error = true;
				frm1.find(".phone input").addClass("error");
			}
			if(!frm1.find(".message textarea").val()){
				error = true;
				frm1.find(".message textarea").addClass("error");
			}
			if(!error){
				frm1.find(".form-submit input").click();
			}
		});

		$(".form-feedback .form-submit").closest('form').on('submit', function(){
			yaCounter50315134.reachGoal('forma', function () {
				alert('Данные успешно отправлены');
			}); 
			return true;
		});
	});
</script>