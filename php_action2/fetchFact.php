<?php 	

require_once 'core.php';

$sql = "SELECT facturas_id, facturas_date, client_name, client_lastname, payment_status FROM facturas WHERE order_status = 1";
$result = $connect->query($sql);



$output = array('data' => array());

if($result->num_rows > 0) { 
 
 $paymentStatus = ""; 
 $x = 1;

 while($row = $result->fetch_array()) {
 	$facturasId = $row[0];

 	$countOrderItemSql = "SELECT count(*) FROM facturas_item WHERE facturas_id = $facturasId";
 	$itemCountResult = $connect->query($countOrderItemSql);
 	$itemCountRow = $itemCountResult->fetch_row();


 	// active 
 	if($row[4] == 1) { 		
 		$paymentStatus = "<label class='label label-success'>Pago completo</label>";
 	} else if($row[4] == 2) { 		
 		$paymentStatus = "<label class='label label-info'>Avance</label>";
 	} else { 		
 		$paymentStatus = "<label class='label label-warning'>Sin pagar</label>";
 	} // /else

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a href="facturas.php?o=editFact='.$facturasId.'" id="editOrderModalBtn"> <i class="glyphicon glyphicon-edit"></i> Editar</a></li>
	    
	    <li><a type="button" data-toggle="modal" id="paymentOrderModalBtn" data-target="#paymentOrderModal" onclick="paymentOrder('.$facturasId.')"> <i class="glyphicon glyphicon-save"></i> Pago</a></li>

	    <li><a type="button" onclick="printOrder('.$facturasId.')"> <i class="glyphicon glyphicon-print"></i> imprimir </a></li>
	    
	    <li><a type="button" data-toggle="modal" data-target="#removeOrderModal" id="removeOrderModalBtn" onclick="removeOrder('.$facturasId.')"> <i class="glyphicon glyphicon-trash"></i> Quitar</a></li>       
	  </ul>
	</div>';		

 	$output['data'][] = array( 		
 		// image
 		$x,
 		// fact date
 		$row[1],
 		// client name
 		$row[2], 
 		// client lastname
 		$row[3], 		 	
 		$itemCountRow, 		 	
 		$paymentStatus,
 		// button
 		$button 		
 		); 	
 	$x++;
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);