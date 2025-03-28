<?php
header("Content-Type: application/json");
require_once "../connection/connection.php";

/**
 * Registros a recibir y a retornar (array) en la funcion getEventLogs:
 * @param mysqli $conn Conexión a la base de datos.
 * @param string|null $event_type Tipo de evento.
 * @param string|null $start_date Fecha de inicio.
 * @param string|null $end_date Fecha de fin.
 * @return array Datos de eventos o mensaje de error.
 */
function getEventLogs($conn, $event_type = null, $start_date = null, $end_date = null) {
    $query = "SELECT id, event_date, description, event_type FROM EventLogs";
    $conditions = [];
    $params = [];
    $types = "";

    // Aplicar filtros solo si tienen valores
    if (!empty($event_type)) {
        $conditions[] = "event_type = ?";
        $params[] = $event_type;
        $types .= "s";
    }
    if (!empty($start_date)) {
        $conditions[] = "DATE(event_date) >= ?";
        $params[] = $start_date;
        $types .= "s";
    }
    if (!empty($end_date)) {
        $conditions[] = "DATE(event_date) <= ?";
        $params[] = $end_date;
        $types .= "s";
    }

    // Agregar condiciones a la consulta si existen
    if (!empty($conditions)) {
        $query .= " WHERE " . implode(" AND ", $conditions);
    }

    $query .= " ORDER BY event_date DESC";

    // Preparar consulta
    if ($stmt = $conn->prepare($query)) {
        if ($types) {
            $stmt->bind_param($types, ...$params);
        }

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $data = $result->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
            return $data;
        } else {
            return ["error" => "Error al ejecutar la consulta."];
        }
    } else {
        return ["error" => "Error al preparar la consulta."];
    }
}

// Obtener parámetros del GET
$event_type = $_GET["event_type"] ?? null;
$start_date = $_GET["start_date"] ?? null;
$end_date = $_GET["end_date"] ?? null;

// Obtener datos
$data = getEventLogs($conn, $event_type, $start_date, $end_date);

// Enviar respuesta en formato JSON
echo json_encode($data, JSON_PRETTY_PRINT);

// Cerrar conexión
$conn->close();
?>
