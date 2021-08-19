<?php
require '../vendor/autoload.php';
require 'config.php';

$keys = new ApiKeys();

$epayco = new Epayco\Epayco(array(
    "apiKey" => $keys->publicKey, 
    "privateKey" => $keys->privateKey, 
    "lenguage" => "ES", 
    "test" => false 
));


// $token = $epayco->token->create(array(
//     "card[number]" => $keys->cardNumber,
//     "card[exp_year]" => $keys->expYear,
//     "card[exp_month]" => $keys->expMonth,
//     "card[cvc]" => "$keys->cvc
// ));

// $customer = $epayco->customer->create(array(
//     "token_card" => $token->id,
//     "name" => "Juan Diego",
//     "last_name" => "Vargas Posada", 
//     "email" => "diego.vargas@payco.co",
//     "default" => false,
//     "city" => "Medellin",
//     "address" => "Cl 104 # 74a - 4",
//     "phone" => "5502712",
//     "cell_phone" => "3042462218",
// ));

$pay = $epayco->charge->create(array(
    // "token_card" => $token->id,
    // "customer_id" => $customer->data->customerId,
    "token_card" => $keys->tokenCard,
    "customer_id" => $keys->customerId,
    "doc_type" => "CC",
    "doc_number" => "1194418306",
    "name" => "Juan Diego",
    "last_name" => "Vargas Posada",
    "email" => "diego.vargas@payco.co",
    "bill" => strval(rand(500000, 300000)),
    "description" => "SDK PHP Pruebas ePayco Split TC",
    "value" => "6",
    "tax" => "0",
    "tax_base" => "0",
    "currency" => "COP",
    "dues" => "1",
    "address" => "Cl 104 # 74a - 4",
    "phone" => "5502712",
    "cell_phone" => "3042462218",
    "ip" => "181.134.247.50",  
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
        array('id' => '9898', 'total' => '3', 'iva' => '0', 'base_iva' => '0', 'fee' => '1'),
        array('id' => '515360', 'total' => '3', 'iva' => '0', 'base_iva' => '0', 'fee' => '1'),
    ), 
    "use_default_card_customer" => false,
    "extras" => array(
        "extra1" => "",
        "extra2" => "",
        "extra3" => "",
        "extra4" => "",
        "extra5" => "",
        "extra6" => "",
        "extra7" => "",
        "extra8" => "",
        "extra9" => "",
        "extra10" =>"",
    )
));

var_dump($pay);

?>