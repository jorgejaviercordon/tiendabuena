<?php
$servername = "localhost";
$username = "php";
$password = "1234";
$dbname = "pruebas";

$textoabuscar = $_POST['bus'];
$opcion = $_POST['listadeopciones'];

// Create connection con el servidor
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT cod, descripcion, precio, stock FROM productos where ";
if ($opcion == '1') {
  $sql = $sql. "cod like '%$textoabuscar%' ";
}elseif ($opcion == '2') {
    $sql = $sql. "descripcion like '%$textoabuscar%' ";
}elseif ($opcion == '3') {
    $sql = $sql. "precio like '%$textoabuscar%' ";
}elseif ($opcion == "4") {
    $sql = $sql. "stock like '%$textoabuscar%' ";
}



$result = $conn->query($sql);
echo "<table><tr><th>Cod</th><th>Descripcion</th><th>Precio</th><th>Stock</th></tr>";
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
 echo "<tr><td>".$row["cod"]."</td><td>".$row["descripcion"]."</td><td> ".$row["precio"]."</td><td>".$row["stock"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>
