<?php
include_once("config.php");
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
if(isset($postdata) && !empty($postdata))
{
	countID = 1; 
 // $name = mysqli_real_escape_string($mysqli, trim($request->name));
	$pwd = mysqli_real_escape_string($mysqli, (int)$request->pwd);
   $email = mysqli_real_escape_string($mysqli, trim($request->email));

  $sql = "INSERT INTO usuario( IDCLIENTE, USUARIOUSER, PASSWORD ) VALUES (countID,'{$email}' ,'{$pwd}')";
 // echo $sql;
 countID++; 
if ($mysqli->query($sql) === TRUE) {
 
 
    $authdata = [
      
	  'pwd' => '',
	  'email' => $email,
      
      
    ];
    echo json_encode($authdata);
 
}
}
?>