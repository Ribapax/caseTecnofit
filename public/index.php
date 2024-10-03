<?php
require("conexao.php");
require("router.php");
require("movements.php");


// Rota para /movements/{movement_id}/ranking

route('GET', '/movements/{movement_id}/ranking', function (int $movementId) {
    echo getRankingByMovementId($movementId);
});

// Rota para a documentação em HTML na URL "/"
route('GET', '/', function () {
    header('Content-Type: text/html');
    readfile("index.html");
});

// Se a rota não for encontrada
http_response_code(404);
echo json_encode(['error' => 'Rota não encontrada']);
