<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Recebe o comando do JavaScript
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['status'])) {
    $newStatus = $data['status'] === 'OFF' ? 'OFF' : 'ON';
    // Grava o novo status no ficheiro de texto
    file_put_contents('guax_status.txt', $newStatus);
    
    echo json_encode([
        'success' => true, 
        'status' => $newStatus, 
        'message' => 'Status alterado para: ' . $newStatus
    ]);
} else {
    echo json_encode(['success' => false, 'message' => 'Erro ao receber dados.']);
}
?>