<?php
include("api.php");

$apiObject = new API();

if($_GET["action"] == 'outputData'){
    $data = $apiObject->outputData();
}

if($_GET["action"] == 'add'){
    $data = $apiObject->addNewToDo();
}

if($_GET["action"] == 'fetch_single')
{
 $data = $apiObject->fetch_single($_GET["id"]);
}

if($_GET["action"] == 'update')
{
 $data = $apiObject->update();
}

if($_GET["action"] == 'delete')
{
 $data = $apiObject->delete($_GET["id"]);
}

echo json_encode($data);
?>
