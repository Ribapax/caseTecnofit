<?php
function route($method, $routePattern, $callback)
{
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    // Substitui parâmetros dinâmicos (ex: {id}) no padrão da rota por uma expressão regular
    $routePattern = preg_replace('#\{([a-zA-Z0-9_]+)\}#', '([a-zA-Z0-9_]+)', $routePattern);

    // Verifica se a rota atual corresponde ao padrão de rota fornecido
    if ($_SERVER['REQUEST_METHOD'] === strtoupper($method) && preg_match("#^$routePattern$#", $uri, $matches)) {
        // Remove o primeiro elemento (a correspondência completa)
        array_shift($matches);
        // Passa os parâmetros para o callback
        $callback(...$matches);
        exit;
    }
}