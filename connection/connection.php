<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "Registration";

$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "Error de conexión a la base de datos"]);
    exit;
}