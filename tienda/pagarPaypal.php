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

    if (isset($_GET['action']) && isset($_GET['total']) && $_GET['total'] != 0) {
        $action = $_GET['action'];
        $idUss = $_GET['usser'];
        $sql = " SELECT `productoID`,`usuarioId`,`costoProduct`, `nameP` , `cantC`, `costoTotal` FROM `carrito` 
                INNER JOIN product
                ON carrito.productoID = product.idP
                WHERE usuarioId = $idUss";
                $columnas = 6;
            
                try {
                    require_once ('../includes/functions/db_connection-regular.php');
                    $res = $connection->query($sql);
                } catch (\Exception $e) {
                    echo $e->getMessage();
                }
        $productos = $res->fetch_all();
        $precio = 0;
        $envio = 0;
        $total = (int) $_GET['total'];
        echo '<pre>';
        $arrayProductos = array();
        for ($i=0; $i < count ($productos); $i++) { 
            $price = intval($productos[$i][5]);
            // var_dump($price);
            ${"articulo$i"} = new Item();
            $arrayProductos[] = ${"articulo$i"};
            ${"articulo$i"}->setName($productos[$i][3])
                                ->setCurrency('MXN')
                                ->setQuantity(1)
                                ->setPrice($price);
        }
        $lista = new ItemList();
        
        $lista->setItems($arrayProductos);

        $intTotal = intval($total);
        var_dump($intTotal);
        $cantidad = new Amount();
        $cantidad->setCurrency('MXN')
        ->setTotal($intTotal);
        
        // echo 'cantidad'.$cantidad;
        $transaccion = new Transaction();
        $transaccion->setAmount($cantidad)
        ->setItemList($lista)
        ->setDescription('Pago ')
        ->setInvoiceNumber(uniqid());
        echo 'transaccion'.var_dump($transaccion);
        $redireccionar = new RedirectUrls();
        $redireccionar->setReturnUrl(URL_SITIO . "/pago_finalizado.php?exito=true")
                    ->setCancelUrl(URL_SITIO . "/pago_finalizado.php?exito=false");
        $pago = new Payment();
        $pago->setIntent("sale")
        ->setPayer($compra)
        ->setRedirectUrls($redireccionar)
        ->setTransactions(array($transaccion));
        echo 'PAgo'.$pago;
        try{
            $pago->create($apiContext);
        } catch(PayPal\Exception\PayPalConnectionException $pce){
            echo "<pre>";
            print_r(json_decode($pce->getData()));
            exit;
            echo "</pre>";
        }
        
        $aprobado = $pago->getApprovalLink();
        
        header("Location: {$aprobado}");
                    
                    
    } else {
        
    }
?>

<!-- va en confing: -->