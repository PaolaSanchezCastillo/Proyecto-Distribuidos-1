<?php
include_once("config.php");
 
$postdata = file_get_contents("php://input");
$empid=$_GET["userid"];
 
$sql="
SELECT DISTINCT C.IDCUENTA, SALDO from CUENTA C
INNER JOIN CLIENTE_CUENTA CL
ON C.IDCUENTA = CL.IDCUENTA
WHERE C.IDCUENTA= '$userid'"; 

 
 
if($result = mysqli_query($mysqli,$sql))
{
 $rows = array();
  while($row = mysqli_fetch_assoc($result))
  {
    $rows[] = $row;
  }
 
  echo json_encode($rows);
}
else
{
  http_response_code(404);
}
?>