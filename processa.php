<?php
session_start();

$arq = file_get_contents("./PS2_Games.json");
if ($arq === false) {
    die("Erro ao ler o arquivo.");
}
$ps2g = json_decode($arq);
if ($ps2g === null) {
    die("Erro ao decodificar JSON: " . json_last_error_msg());
}
$games = $ps2g->jogos_ps2;

//esses filtros serão substituídos na versão final pelos valores do formulário
// -1 = sem limite
$filters = array(
    "year_min" => -1,
    "year_max" => -1,
    "title" => "God of",
    "dev" => "Santa Monica",
    "genre" => "Ação",
);

//TODO: filtro para vendas, e filtro de faixa etária.


$filtered = array_filter($games, function ($game) use ($filters) {
    return
        ($filters['year_max'] === -1 || $game->ano <= $filters['year_max']) &&
        ($filters['year_min'] === -1 || $game->ano >= $filters['year_min']) &&
        str_contains(strtolower($game->titulo), strtolower($filters['title'])) &&
        str_contains(strtolower($game->desenvolvedora), strtolower($filters['dev'])) &&
        str_contains(strtolower($game->genero), strtolower($filters['genre']));
});

$_SESSION['results'] = $filtered;
header("Location: results.php");
exit();