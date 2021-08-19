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

$token = $epayco->token->create(array(
    "card[number]" => $keys->cardNumber,
    "card[exp_year]" => $keys->expYear,
    "card[exp_month]" => $keys->expMonth,
    "card[cvc]" => $keys->cvc
));

$namePlan = "Suscripcion".strval(rand(1000, 100));

$plan = $epayco->plan->create(array(
    "id_plan" => $nameplan,
    "name" => $nameplan,
    "description" => $nameplan,
    "amount" => 1,
    "currency" => "cop",
    "interval" => "month",
    "interval_count" => 1,
    "trial_days" => 7
));

$customer = $epayco->customer->create(array( 
    "token_card" => $token->id, 
    "name" => "Juan Diego", 
    "last_name" => "Vargas Posada",
    "email" => "diego.vargas@payco.co",
    "default" => false,
    "city" => "Medellin",
    "address" => "Cl 104 # 74a - 4",
    "phone" => "5502712",
    "cell_phone" => "3042462218",
));


$sub = $epayco->subscriptions->create(array(
    "id_plan" => $plan->id_plan,
    "customer" => $customer->data->customerId,
    "token_card" => $token->id,
    "doc_type" => "CC",
    "doc_number" => "1194418306",
     "url_confirmation" => "http://diego.dev-plugins.info/confirmacion.php",
     "method_confirmation" => "POST"
));

$pay = $epayco->subscriptions->charge(array(
  "id_plan" => $plan->id_plan,
  "customer" => $customer->data->customerId,
  "token_card" => $token->id,
  "doc_type" => "CC",
  "doc_number" => "1194418306",
  "address" => "Cl 104 # 74a - 4",
  "phone"=> "5502712",
  "cell_phone"=> "3042462218",
  "ip" => "181.134.247.50" 
));

var_dump($pay);
die();

?>