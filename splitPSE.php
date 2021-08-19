<?php
require '../vendor/autoload.php';
require 'config.php';

$keys = new ApiKeys();

$epayco = new Epayco\Epayco(array(
    "apiKey" => $keys->publicKey, 
    "privateKey" => $keys->privateKey, 
    "lenguage" => "ES", 
    "test" => true 
));

/*
 "bankCode": "1040", "bankName": "BANCO AGRARIO"
 "bankCode": "1052", "bankName": "BANCO AV VILLAS"
 "bankCode": "1013", "bankName": "BANCO BBVA COLOMBIA S.A."
 "bankCode": "1032", "bankName": "BANCO CAJA SOCIAL"
 "bankCode": "1066", "bankName": "BANCO COOPERATIVO COOPCENTRAL"
 "bankCode": "1051", "bankName": "BANCO DAVIVIENDA"
 "bankCode": "1001", "bankName": "BANCO DE BOGOTA"
 "bankCode": "1023", "bankName": "BANCO DE OCCIDENTE"
 "bankCode": "1062", "bankName": "BANCO FALABELLA "
 "bankCode": "1012", "bankName": "BANCO GNB SUDAMERIS"
 "bankCode": "1006", "bankName": "BANCO ITAU"
 "bankCode": "1060", "bankName": "BANCO PICHINCHA S.A."
 "bankCode": "1002", "bankName": "BANCO POPULAR"
 "bankCode": "1058", "bankName": "BANCO PROCREDIT"
 "bankCode": "1065", "bankName": "BANCO SANTANDER COLOMBIA"
 "bankCode": "1007", "bankName": "BANCOLOMBIA"
 "bankCode": "1061", "bankName": "BANCOOMEVA S.A."
 "bankCode": "1009", "bankName": "CITIBANK "
 "bankCode": "1292", "bankName": "CONFIAR COOPERATIVA FINANCIERA"
 "bankCode": "1551", "bankName": "DAVIPLATA"
 "bankCode": "1507", "bankName": "NEQUI"
 "bankCode": "1019", "bankName": "SCOTIABANK COLPATRIA"
*/

 $pse = $epayco->bank->create(array(
    "bank" => "1551",
    "invoice" => strval(rand(500000, 300000)),
    "description" => "SDK PHP Pruebas ePayco Split PSE",
    "value" => "6",
    "tax" => "0",
    "tax_base" => "0",
    "currency" => "COP",
    "type_person" => "0",
    "doc_type" => "CC",
    "doc_number" => "1194418306",
    "name" => "Juan Diego",
    "last_name" => "Vargas Posada",
    "email" => "diego.vargas@payco.co",
    "country" => "CO",
    "cell_phone" => "3001234567",
    "ip" => "181.134.247.50",  // This is the client's IP, it is required
    "url_response" => "http://diego.dev-plugins.info/respuesta.html",
    "url_confirmation" => "http://diego.dev-plugins.info/confirmacion.php",
    "method_confirmation" => "POST",
    "splitpayment" => "true",
    "split_app_id" => "93006",
    "split_merchant_id" => "93006",
    "split_type" => "01",
    "split_primary_receiver" => "93006",
    "split_primary_receiver_fee" => "0",
    "split_rule" => 'multiple', // Parametros para split multiple
    "split_receivers" => array(
        array('id' => '515360', 'total' => '3', 'iva' => '0', 'base_iva' => '0', 'fee' => '1'),
        array('id' => '9898', 'total' => '3', 'iva' => '0', 'base_iva' => '0', 'fee' => '1'),
    ), // Parametros para split multiple
    //Extra params: These params are optional and can be used by the commerce
    "extra1" => "",
    "extra2" => "",
    "extra3" => "",
    "extra4" => "",
    "extra5" => "",
    "extra6" => "",
    "extra7" => "",
    "extra8" => "",
    "extra9" => "",
    "extra10" => ""
));

var_dump($pse);

?>