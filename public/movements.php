<?php
function getRankingByMovementId(int $movementId){
    global $pdo;

    header('Content-Type: application/json');

    // Obtém o movimento a partir da URL
    if (!$movementId) {
        echo json_encode(['error' => 'Movimento ID não fornecido']);
        return;
    }

    // Consulta o nome do movimento e os recordes pessoais
    $stmt = $pdo->prepare("
        SELECT m.name AS movement, u.name AS user, MAX(r.value) AS pr, MAX(r.date) AS date
        FROM movement m
        LEFT JOIN personal_record r ON r.movement_id = m.id
        LEFT JOIN user u ON r.user_id = u.id
        WHERE m.id = ?
        GROUP BY u.id, movement, user
        ORDER BY pr DESC, date ASC;
    ");
    $stmt->execute([$movementId]);

    $records = $stmt->fetchAll();

    // Monta o ranking com a posição dos usuários
    $ranking = [];

    if ($records[0]["user"] === null) {
        echo json_encode([
            'movimento' => $records[0]['movement']??"",
            'ranking' => $ranking
        ]);
        return;
    }

    $position = 0; // Posição atual no ranking
    $ultimoRecorde = null;

    foreach ($records as $index => $record) {

        if ($record['pr'] != $ultimoRecorde) {
            $position = $position + 1;
            //$position = $index + 1;
            $ultimoRecorde = $record['pr'];
        }

        $ranking[] = [
            'posição' => $position,
            'usuário' => $record['user'],
            'recorde pessoal' => $record['pr'],
            'data' => date('d/m/Y', strtotime($record['date'])),
        ];
    }
    // Retorna o resultado em formato JSON
    return json_encode([
        'movimento' => $records[0]['movement'],
        'ranking' => $ranking
    ]);
}