<?php
session_start();

if (isset($_SESSION['results'])) {
    $results = $_SESSION['results'];
} else {
    header("Location: processa.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Resultados</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #aaa;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #eee;
        }
    </style>
</head>

<body>
    <h1>Resultados dos Jogos</h1>
    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Ano</th>
                <th>Desenvolvedora</th>
                <th>Gênero</th>
                <th>Estimativa de Vendas</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($results as $game): ?>
                <tr>
                    <td><?= htmlspecialchars($game->titulo) ?></td>
                    <td><?= htmlspecialchars($game->ano) ?></td>
                    <td><?= htmlspecialchars($game->desenvolvedora) ?></td>
                    <td><?= htmlspecialchars($game->genero) ?></td>
                    <td><?= htmlspecialchars($game->vendas_aproximadas_milhoes) ?> mi</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>