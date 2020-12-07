<?php

use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;

require 'config.php';

    $compra = new Payer();
    $compra->setPaymentMethod('paypal');
    $total = 130;
    $precio = 130;
    $cantidad = 1;
    $envio = 0;
    $articulo = new Item();
    // $arrayName = array('' => , );
    // $arrayName->array_push($articulo);
    $articulo->setName('Jamaica')
            ->setCurrency('MXN')
            ->setQuantity($cantidad)
            ->setPrice($precio);

    $lista = new ItemList();

    $lista->setItems(array($articulo));

    $detalles = new Details();
    $detalles->setShipping($envio)
             ->setSubtotal($precio);

    $cantidad = new Amount();
    $cantidad->setCurrency('MXN')
             ->setTotal($total)
             ->setDetails($detalles);

    $transaccion = new Transaction();
    $transaccion->setAmount($cantidad)
                ->setItemList($lista)
                ->setDescription('Pago ')
                ->setInvoiceNumber(uniqid());

    $redireccionar = new RedirectUrls();
    $redireccionar->setReturnUrl(URL_SITIO . "/pago_finalizado.php?exito=true")
                  ->setCancelUrl(URL_SITIO . "/pago_finalizado.php?exito=false");

    $pago = new Payment();
    $pago->setIntent("sale")
         ->setPayer($compra)
         ->setRedirectUrls($redireccionar)
         ->setTransactions(array($transaccion));

    try{
        $pago->create($apiContext);
    } catch(PayPal\Exception\PayPalConnectionException $pce){
        echo "<pre>";
        print_r(json_decode($pce->getData()));
        exit;
        echo "</pre>";
    }

    $aproado = $pago->getApprovalLink();

    header("Location: {$aproado}");
    

?>

<!-- va en confing: define('URL_SITIO','http://localhost:8088/paypal'; -->