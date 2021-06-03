<?php
class API{
    private $connect = '';

    function __construct(){
        $this->dbConnection();
    }

    function dbConnection(){
        $this->connect = new PDO("mysql:host=localhost;dbname=testapi","root","youssef");
    }

    function outputData(){
        $select = $this->connect->prepare("SELECT * FROM vol ");
        if($select->execute()){
            while($row = $select->fetch(PDO::FETCH_ASSOC)){
                $data[] = $row;
            }
            return $data;
        }
    }

    function addNewToDo(){
        if(isset($_POST["depart"])){
            $data = array(
                ':depart' => $_POST["depart"],
                ':destination' => $_POST["destination"]
            );
            $insert = $this->connect->prepare("INSERT INTO vol (depart, destination) VALUES (:depart, :destination)");
            $insert->execute($data);
        }
    }

 function fetch_single($id)
 {
  $query = "SELECT * FROM vol WHERE id='".$id."'";
  $statement = $this->connect->prepare($query);
  if($statement->execute())
  {
   foreach($statement->fetchAll() as $row)
   {
    $data['depart'] = $row['depart'];
    $data['destination'] = $row['destination'];
   }
   return $data;
  }
 }


function update(){

     if(isset($_POST["depart"]))
  {

    $data = array(

        ':depart' => $_POST["depart"],
        ':destination' => $_POST["destination"],
        ':id'   => $_POST['id']

  );
      $query ="UPDATE vol SET depart = :depart, destination = :destination WHERE id = :id";
  $statement = $this->connect->prepare($query);
  $statement->execute($data);
    }

}



function delete($id)
 {
  $query = "DELETE FROM vol WHERE id = '".$id."'";
  $statement = $this->connect->prepare($query);
  $statement->execute();
 }









}

?>
