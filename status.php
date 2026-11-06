<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$statusFile = 'guax_status.txt';

// Se o ficheiro não existir, cria-o com o status ON por defeito
if (!file_exists($statusFile)) {
    file_put_contents($statusFile, 'ON');
}

$status = file_get_contents($statusFile);
echo json_encode(['status' => trim($status)]);
?>