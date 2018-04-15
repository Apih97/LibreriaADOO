<?php 	

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$facturasId = $_POST['facturasId'];

if($facturasId) { 

 $sql = "UPDATE facturas SET order_status = 2 WHERE facturas_id = {$facturasId}";

 $facturasItem = "UPDATE facturas_item SET facturas_item_status = 2 WHERE  facturas_id = {$facturasId}";

 if($connect->query($sql) === TRUE && $connect->query($facturasItem) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Successfully Removed";		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error while remove the brand";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST