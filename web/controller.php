<?php
if(isset($_POST["action"])){
    
    if($_POST["action"] == 'addNew'){
        $data = array(
            'depart'     => $_POST["depart"],
            'destination'      => $_POST["destination"]
        );
        $client = curl_init('http://localhost/PHP-API-CRUD/api/apiHandler.php?action=add');
        curl_setopt($client, CURLOPT_POST, true);
        curl_setopt($client, CURLOPT_POSTFIELDS, $data);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($client);
        curl_close($client);
 
    }



 if($_POST["action"] == 'fetch_single')
 {
  $id = $_POST["id"];
  $api_url = "http://localhost/PHP-API-CRUD/api/apiHandler.php?action=fetch_single&id=".$id."";
  $client = curl_init($api_url);
  curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($client);
  echo $response;
 }
 


 if($_POST["action"] == 'update')
 {
  $data = array(
   'depart' => $_POST['depart'],
   'destination'  => $_POST['destination'],
   'id'   => $_POST['hidden_id']
  );
  $client = curl_init('http://localhost/PHP-API-CRUD/api/apiHandler.php?action=update');
 
  curl_setopt($client, CURLOPT_POST, true);
  curl_setopt($client, CURLOPT_POSTFIELDS, $data);
  curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($client);
  curl_close($client);
  
 
  }



if($_POST["action"] == 'delete')
 {
  $id = $_POST["id"];
  $client = curl_init("http://localhost/PHP-API-CRUD/api/apiHandler.php?action=delete&id=".$id."");
 
//   curl_setopt($client, CURLOPT_POST, true);
//   curl_setopt($client, CURLOPT_POSTFIELDS, $id);
  curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($client);
//   curl_close($client);
  
 
  }




















 
}






?>