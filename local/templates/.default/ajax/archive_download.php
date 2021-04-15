<?require_once($_SERVER['DOCUMENT_ROOT']. "/bitrix/modules/main/include/prolog_before.php");
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)	die();?>
<?
	if(isset($_POST["section_id"])):
		if(CModule::IncludeModule("iblock") && extension_loaded('zip')):
			$sid = filter_var($_POST["section_id"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			$arSelect = Array("ID", "PROPERTY_FILE");
			$arFilter = Array("IBLOCK_ID"=>15, "SECTION_ID"=>$sid, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
			$arrItems = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
			$zip = new ZipArchive();
			$zip_name = "files".$sid.".zip";
			if($zip->open($zip_name, ZIPARCHIVE::CREATE)!==TRUE):
				echo "Sorry ZIP creation failed at this time";
			endif;
			while($arrItem = $arrItems->GetNext()):
				$arrFile = CFile::GetFileArray($arrItem["PROPERTY_FILE_VALUE"]);
				$zip->addFile($_SERVER["DOCUMENT_ROOT"].$arrFile["SRC"], $arrFile["FILE_NAME"]);
			endwhile;
			$zip->close();
			if(file_exists($zip_name)):
				header('Content-type: application/zip');
				header('Content-Disposition: attachment; filename="'.$zip_name.'"');
				readfile($zip_name);
				unlink($zip_name);
			endif;
		endif;
	endif;
?>
