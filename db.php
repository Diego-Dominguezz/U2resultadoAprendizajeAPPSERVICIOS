<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "compras_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
header('Content-type: text/html');
if (isset($_POST)) {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];
    $accion = $_POST['accion'];
    $total = $_POST['total'];
    $empty = $_POST['empty'];
    // dump varialbes
     echo "nombre: " . $nombre . "<br>";
     echo "precio: " . $precio . "<br>";
     echo "imagen: " . $imagen . "<br>";
     echo "accion: " . $accion . "<br>";
     echo "total: " . $total . "<br>";
    Strval($imagen);

    // add record utilizado para poblar productos
    // $sql = "INSERT INTO productos (nombre, precio, imagen)
    // VALUES ('$nombre','$precio','$imagen')";
    
    // if ($conn->query($sql) === TRUE) {
    //   echo "New record created successfully";
    // } else {
    //   echo "Error: " . $sql . "<br>" . $conn->error;
    // }
        // insertar en carrito
    if ((isset($_POST['nombre'])) || (isset($_POST['precio'])) || (isset($_POST['imagen'])) || (isset($_POST['accion']) || (isset($_POST['total'])))) {
        if ($accion == "add") {
            $sql = "SELECT id FROM productos WHERE nombre = '$nombre'";
            $res = $conn->query($sql);
              while($row = $res->fetch_assoc()) {
                echo "id: " . $row["id"];
                $id = $row["id"];
             }

            $sql = "INSERT INTO carrito (total, productoid)
            VALUES ('$total','$id')";
            if ($conn->query($sql) === TRUE) {
              echo "New record created successfully";
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } elseif ($accion == "delete") {
            $sql = "SELECT id FROM productos WHERE nombre = '$nombre'";
            $res = $conn->query($sql);
              while($row = $res->fetch_assoc()) {
                echo "id: " . $row["id"];
                $id = $row["id"];
             }
            $sql = "DELETE FROM carrito WHERE productoid = '$id'";
            if ($conn->query($sql) === TRUE) {
              echo "Record deleted successfully";
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

    }
    if ($empty == "empty") {
        // empty carritos
        $sql = "DELETE FROM carrito";
        
        if ($conn->query($sql) === TRUE) {
          echo "carrito vaciado";
        } else {
          echo "Error deleting record: " . $conn->error;
        }
    }
}



$conn->close();
?>