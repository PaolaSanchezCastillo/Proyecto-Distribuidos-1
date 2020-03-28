<?php
include_once("config.php");
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
if(isset($postdata) && !empty($postdata))
{
$pwd = mysqli_real_escape_string($mysqli, trim($request->password));
$email = mysqli_real_escape_string($mysqli, trim($request->username));
$sql='';
$sql = "SELECT * FROM usuario where USUARIOUSER='$email' and PASSWORD='$pwd';
		
";

$sqlInserta ="INSERT INTO BITACORA (usuariouser, ingreso) values ('$email', now());";
	
$sqlcuenta = " SELECT CU.IDCUENTA, SALDO FROM CUENTA CU
INNER JOIN CLIENTE_CUENTA C
ON C.IDCUENTA = CU.IDCUENTA
INNER JOIN USUARIO O
ON C.IDCLIENTE = O.IDCLIENTE
WHERE USUARIOUSER = '$email';";
	

if($result = mysqli_query($mysqli,$sql))
{
 $rows = array();
  while($row = mysqli_fetch_assoc($result))
  {
    $rows[] = $row;
	
	
  }  
 
  	if(!empty($rows))	{mysqli_query($mysqli,$sqlInserta);}
  
  if($result2 = mysqli_query($mysqli,$sqlcuenta)){
	   $rowsC = array();
  while($rowC = mysqli_fetch_assoc($result2))
  {
    $rowsC[] = $rowC;
	
  }
	  
  }
  
  
 
  echo json_encode($rows, 	$rowC );
}
else
{
  http_response_code(404);
}
}
?>