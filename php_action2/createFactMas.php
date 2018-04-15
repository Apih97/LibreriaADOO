<?php 	
date_default_timezone_set('America/Managua');
require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array(), 'facturas_id' => '');
if($_POST) {	

  $FacturasDate = date('d-m-Y', strtotime($_POST['FacturasDate']));	
  $clientName = $_POST['clientName'];
  $clientLastName = $_POST['clientLastName'];
  $subTotalValue = $_POST['subTotalValue'];
  $vatValue =	$_POST['vatValue'];
  $totalAmountValue  = $_POST['totalAmountValue'];
  $discount = $_POST['discount'];
  $grandTotalValue = $_POST['grandTotalValue'];
  $paid	= $_POST['paid'];
  $dueValue = $_POST['dueValue'];
  $paymentType	= $_POST['paymentType'];
  $paymentStatus = $_POST['paymentStatus'];

				
	$sql = "INSERT INTO facturas (facturas_date, client_name, client_lastname, sub_total, vat, total_amount, discount, grand_total, paid, due, payment_type, payment_status, order_status) VALUES ('$FacturasDate', '$clientName', '$clientLastName', '$subTotalValue', '$vatValue', '$totalAmountValue', '$discount', '$grandTotalValue', '$paid', '$dueValue', $paymentType, $paymentStatus, 1)";
	
	
	$facturas_id;
	$orderStatus = false;
	if($connect->query($sql) === true) {
		$facturas_id = $connect->insert_id;
		$valid['facturas_id'] = $facturas_id;	

		$orderStatus = true;
	}

		
	// echo $_POST['productName'];
	$facturasItemStatus = false;

	for($x = 0; $x < count($_POST['productName']); $x++) {			
		$updateProductQuantitySql = "SELECT product.quantity FROM product WHERE product.product_id = ".$_POST['productName'][$x]."";
		$updateProductQuantityData = $connect->query($updateProductQuantitySql);
		
		
		while ($updateProductQuantityResult = $updateProductQuantityData->fetch_row()) {
			$updateQuantity[$x] = $updateProductQuantityResult[0] - $_POST['quantity'][$x];							
				// update product table
				$updateProductTable = "UPDATE product SET quantity = '".$updateQuantity[$x]."' WHERE product_id = ".$_POST['productName'][$x]."";
				$connect->query($updateProductTable);

				// add into order_item
				$orderItemSql = "INSERT INTO facturas_item (facturas_id, product_id, quantity, rate, total, facturas_item_status) 
				VALUES ('$facturas_id', '".$_POST['productName'][$x]."', '".$_POST['quantity'][$x]."', '".$_POST['rateValue'][$x]."', '".$_POST['totalValue'][$x]."', 1)";

				$connect->query($orderItemSql);		

				if($x == count($_POST['productName'])) {
					$facturasItemStatus = true;
				}		
		} // while	
	} // /for quantity

	$valid['success'] = true;
	$valid['messages'] = "Añadido exitosamente";		
	
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST
// echo json_encode($valid);