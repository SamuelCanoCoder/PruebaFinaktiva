<?php
header("Content-Type: application/json");
require_once "../connection/connection.php";

/**
 * Obtiene los datos de la soslicitud desde JSON o formulario.
 * @return array Datos procesados con 'description' y 'event_type'.
 * @throws Exception Si los datos son inválidos o están incompletos.
 */
function getRequestData()
{
    $inputJSON = file_get_contents("php://input");
    $data = json_decode($inputJSON, true) ?? $_POST;

    if (empty($data["description"]) || empty($data["event_type"])) {
        throw new Exception("Datos incompletos. Se requiere 'description' y 'event_type'.", 400);
    }

    return [
        "description" => trim($data["description"]),
        "event_type" => trim($data["event_type"])
    ];
}

/**
 * Valida los datos antes de insertarlos en la base de datos.
 * @param string $description Descripción del evento.
 * @param string $event_type Tipo de evento.
 * @throws Exception Si los datos no cumplen con las reglas de validación.
 */
function validateData($description, $event_type)
{
    if (strlen($description) > 255) {
        throw new Exception("La descripción es demasiado larga (máximo 255 caracteres).", 400);
    }
}

/**
 * Inserta un nuevo evento en la base de datos.
 * @param mysqli $conn Conexión a la base de datos.
 * @param string $description Descripción del evento.
 * @param string $event_type Tipo de evento.
 * @throws Exception Si la inserción falla.
 */
function insertEvent($conn, $description, $event_type)
{
    $stmt = $conn->prepare("INSERT INTO EventLogs (description, event_type) VALUES (?, ?)");
    $stmt->bind_param("ss", $description, $event_type);

    if (!$stmt->execute()) {
        throw new Exception("Error al registrar el evento.", 500);
    }

    $stmt->close();
}

try {
    // Verificar el método HTTP
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        throw new Exception("Método no permitido", 405);
    }

    // Obtener y validar datos
    $data = getRequestData();
    validateData($data["description"], $data["event_type"]);

    // Insertar en la base de datos
    insertEvent($conn, $data["description"], $data["event_type"]);

    // Respuesta exitosa
    echo json_encode(["message" => "Evento registrado exitosamente"]);
} catch (Exception $e) {
    http_response_code($e->getCode() ?: 400);
    echo json_encode(["error" => $e->getMessage()]);
} finally {
    $conn->close();
}
