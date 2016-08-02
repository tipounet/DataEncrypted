<?php

/**
* Data Encrypted framework
* Version: 0.0.1
* VersionPHP: 5.5.12
* Copyright 2016, F.GUEGAN
* CC license https://creativecommons.org/licenses/by-nc-sa/4.0/
*/
class DataEncrypted
{
	// For all function
	protected $Data;

	public function __construct($Data){
		if (!file_exists('DataEncrypted/DataEncryptedList.xml')) {
			$domtree = new DOMDocument('1.0', 'UTF-8');
			$xml = $domtree->createElement("DATAS");
			$xmlRoot = $domtree->appendChild($xml);
			$domtree->save("DataEncrypted/DataEncryptedList.xml");
		}else{
			exit;
		}

		if(is_array($Data)){
			function Generator(){
				$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$charactersLength = strlen($characters);
				$RandomEncrypted = '';
				for ($i = 0; $i < 20; $i++) {
					$RandomEncrypted .= $characters[rand(0, $charactersLength - 1)];
				}

				return $RandomEncrypted;
			}

			$dom = new DomDocument();
			$dom->preserveWhiteSpace = false;
			if (file_exists('DataEncrypted/DataEncryptedList.xml')) {
				$domtree = new DOMDocument('1.0', 'UTF-8');
				$xml = $domtree->createElement("DATAS");
				$xmlRoot = $domtree->appendChild($xml);
				$domtree->save("DataEncrypted/DataEncryptedList.xml");

				foreach ($Data as $value) {
					$dom->load('DataEncrypted/DataEncryptedList.xml');
					$dom->formatOutput = true;
					$Encrypted = $dom->createElement('Encrypted');
					$EncryptedCode = $dom->createElement('EncryptedCode', Generator());
					$Encrypted->appendChild($EncryptedCode);
					$dom->documentElement->appendChild($Encrypted);
					$dom->documentElement->appendChild($Encrypted)->setAttribute("EncryptedTraduction", $value);
					$dom->save('DataEncrypted/DataEncryptedList.xml');
				}
			}
		}else{
			echo "ERROR:¨Please use a array !";
		}
	}

	public function Read_DataToEncrypted($Data){
		if(!is_array($Data)){
			$dom = new DomDocument();
			$dom->load('DataEncrypted/DataEncryptedList.xml');

			$searchNode = $dom->getElementsByTagName( "Encrypted" );

			foreach($searchNode as $searchNode){
				$EncryptedTraduction = $searchNode->getAttribute('EncryptedTraduction');
				if ($EncryptedTraduction == $Data) {
					$domEncryptedCode = $searchNode->getElementsByTagName( "EncryptedCode" );
					$EncryptedCode = $domEncryptedCode->item(0)->nodeValue; 
					echo "$EncryptedCode";
				}
			}
		}else{
			echo "ERROR: Please don't use a array !";
		}
	}

	public function Read_EncryptedToData($Encrypted){
		if(!is_array($Encrypted)){
			$dom = new DomDocument();
			$dom->load('DataEncrypted/DataEncryptedList.xml');

			$searchNode = $dom->getElementsByTagName( "Encrypted" );

			foreach($searchNode as $searchNode){
				$domEncryptedCode = $searchNode->getElementsByTagName( "EncryptedCode" );
				$EncryptedCode = $domEncryptedCode->item(0)->nodeValue; 
				if ($EncryptedCode == $Data) {
					$EncryptedTraduction = $searchNode->getAttribute('EncryptedTraduction');
					echo "$EncryptedTraduction";
				}
			}
		}else{
			echo "ERROR: Please don't use a array !";
		}
	}
}
?>