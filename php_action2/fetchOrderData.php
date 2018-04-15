<?php 	

require_once 'core.php';

$orderId = $_POST['facturasId'];

$valid = array('facturas' => array(), 'facturas_item' => array());

$sql = "SELECT facturas.facturas_id, facturas.facturas_date, facturas.client_name, facturas.client_lastname, facturas.sub_total, facturas.vat, facturas.total_amount, facturas.discount, facturas.grand_total, facturas.paid, facturas.due, facturas.payment_type, facturas.payment_status FROM facturas 	
	WHERE facturas.facturas_id = {$facturasId}";

$result = $connect->query($sql);
$data = $result->fetch_row();
$valid['facturas'] = $data;


$connect->close();

echo json_encode($valid);