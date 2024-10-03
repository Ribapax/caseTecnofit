<?php
// Configurações do banco de dados
$host = 'db'; // Nome do serviço definido no docker-compose.yml
$db = 'tecnofit';
$user = 'root';
$pass = 'secret';


// Conectando ao banco de dados
$dsn = "mysql:host=$host;dbname=$db;";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Erro ao conectar ao banco de dados']);
    exit;
}
