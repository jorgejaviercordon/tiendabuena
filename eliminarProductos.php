<?php
$servername = "localhost";
$username = "php";
$password = "1234";
$dbname = "pruebas";

$textoabuscar = $_POST['bus'];
$opcion = $_POST['listadeopciones'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



// sql to delete a record
$sql = "DELETE  FROM productos WHERE ";

if ($opcion == '1') {
  $sql = $sql. "cod like '%$textoabuscar%' ";
}elseif ($opcion == '2') {
    $sql = $sql. "descripcion like '%$textoabuscar%' ";
}elseif ($opcion == '3') {
    $sql = $sql. "precio like '%$textoabuscar%' ";
}elseif ($opcion == "4") {
    $sql = $sql. "stock like '%$textoabuscar%' ";
}


if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
