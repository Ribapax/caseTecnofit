<?php
require("conexao.php");



// Função auxiliar para roteamento
function route($method, $route, $callback) {
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    //echo ' '. $uri .' '. $method .' '. $route ;
    if ($_SERVER['REQUEST_METHOD'] === strtoupper($method) && preg_match("#^$route$#", $uri)) {
        $callback();
        exit;
    }
}

// Rota para /movements/ranking
route('GET', '/movements/ranking', function() use ($pdo) {
    header('Content-Type: application/json');

    // Obtém o movimento a partir da URL
    $movimentoId = isset($_GET['movement_id']) ? (int)$_GET['movement_id'] : null;

    if (!$movimentoId) {
        echo json_encode(['error' => 'Movimento ID não fornecido']);
        return;
    }

    // Consulta o nome do movimento e os recordes
    $stmt = $pdo->prepare("
        SELECT m.name AS movement, u.name AS user, MAX(r.value) AS pr, max(r.date) AS date
        FROM personal_record r
        JOIN user u ON r.user_id = u.id
        JOIN movement m ON r.movement_id = m.id
        WHERE r.movement_id = ?
        GROUP BY u.id, m.name, u.name
        ORDER BY pr DESC;
    ");
    $stmt->execute([$movimentoId]);

    $records = $stmt->fetchAll();

    //validação par
    if (!$records) {
        
        echo json_encode(['message' => 'Nenhum recorde encontrado para este movimento']);
        return;
    }

    // Monta o ranking com a posição dos usuários
    $ranking = [];
    $posicao = 1; // Posição atual no ranking
    $ultimoRecorde = null; // Último valor de recorde

    foreach ($records as $index => $record) {
        // Se o recorde for diferente do último recorde, incrementa a posição
        if ($record['recorde'] != $ultimoRecorde) {
            $posicao = $index + 1;
            $ultimoRecorde = $record['recorde'];
        }

        $ranking[] = [
            'posicao' => $posicao,
            'usuario' => $record['user'],
            'recorde' => $record['pr'],
            'data' => $record['date'],
        ];
    }
    // Retorna o resultado em formato JSON
    echo json_encode([
        'movimento' => $records[0]['movement'],
        'ranking' => $ranking
    ]);
});

// Rota para a documentação em HTML na URL "/"
route('GET', '/', function() {
    header('Content-Type: text/html');
    readfile("index.html");
});

// Se a rota não for encontrada
http_response_code(404);
echo json_encode(['error' => 'Rota não encontrada']);
