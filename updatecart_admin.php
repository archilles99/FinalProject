<?php

session_start();
$_SESSION['sup_id'] = $_POST['SUP_ID'];
$itemId = isset($_GET['itemId']) ? $_GET['itemId'] : "";
$itemqty = isset($_POST['size']) ? $_POST['size'] : "";

$prosize = isset($_POST['select']) ? $_POST['select'] : "";

if ($itemId == "") {
    for ($i = 0; $i < count($_POST['qty']); $i++) {
        // Recalculate ???
        $key = $_POST['arr_key_' . $i];
        $_SESSION['qty'][$key] = $_POST['qty'][$i];
        header('location:order_admin.php');
    }
} else {
    if (!isset($_SESSION['cart'])) {
        // Create new
        $_SESSION['cart'] = array();
        $_SESSION['qty'][] = array();
    }

    /* if (in_array($itemId, $_SESSION['cart'])) {
      // Updating
      $key = array_search($itemId, $_SESSION['cart']);
      $_SESSION['qty'][$key] = $_SESSION['qty'][$key] + 1;
      header('location:buy_list_payment.php?a=exists');
      } else { */
    // Adding
    foreach ($prosize as $k => $v) {
        if ($v == "1") {
            if (in_array($itemId . '|' . $k, $_SESSION['cart'])) {
                $key = array_search($itemId . '|' . $k, $_SESSION['cart']);
                $_SESSION['qty'][$key] += 1;
            } else {
                array_push($_SESSION['cart'], $itemId . '|' . $k);
                $key = (string) array_search($itemId . '|' . $k, $_SESSION['cart']);
                $_SESSION['qty'][$key] = 1; // QTY
            }
        }
    }

    header('location:buy_list_payment.php?a=add');
    //}                                            
}