<?php
session_start();

if (isset($_SESSION['results'])) {
    $results = $_SESSION['results'];
} else {
    header("Location: processa.php");
    exit();
}


function limparfiltro() {
    unset($_SESSION['results']);
    header("Location: processa.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="configgeral.css">   
    <title>Pesquisa PS2Games</title>
</head>

<body>
    <div class="container">
        <a href="index.php" class="back-btn">Voltar para a Página Inicial</a>
        <header>
            <h1>Biblioteca de Jogos PS2</h1>
            <p class="subtitle">
        </header>

        <div id="drawer" class="drawer">
            <h2>Filtrar Jogos</h2>
            <form  action="processa.php" method="POST">
                <label for="title">Título:</label>
                <input type="text" id="title" name="title"><br><br>
                
                <label for="dev">Desenvolvedora:</label>
                <input type="text" id="dev" name="dev"><br><br>

                <label for="genre">Gênero:</label>
                <input type="text" id="genre" name="genre"><br><br>

            <div class="year-container">
                <div class="year-field">
                    <label for="year_min">Ano mínimo:</label>
                    <input type="number" id="year_min" name="year_min">
                </div>
                <div class="year-field">
                    <label for="year_max">Ano máximo:</label>
                    <input type="number" id="year_max" name="year_max">
                </div>
            </div>
            <br>
                
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </form>

            <form action="processa.php" method="POST" style="display:inline;">
                <input type="hidden" name="clear" value="1">
                <button type="submit" class="btn btn-secondary mt">Limpar Filtros</button>
            </form>
        </div>

        <button id="toggleDrawer" class="btn btn-secondary mt">Filtrar Jogos</button>

        <h2>Jogos</h2>
        <table>
            <thead>
                <tr>
                    <th>Capa</th>
                    <th>Título</th>
                    <th>Ano</th>
                    <th>Desenvolvedora</th>
                    <th>Gênero</th>
                    <th>Faixa Etária</th>
                    <th>Estimativa de Vendas</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $game): ?>
                    <tr>
                        <td data-label="Capa"><img src="<?= htmlspecialchars("PS2_Covers/" . $game->capa) ?>" alt="Capa de <?= htmlspecialchars($game->titulo) ?>" style="height:100px;"></td>
                        <td data-label="Título"><?= htmlspecialchars($game->titulo) ?></td>
                        <td data-label="Ano"><?= htmlspecialchars($game->ano) ?></td>
                        <td data-label="Desenvolvedora"><?= htmlspecialchars($game->desenvolvedora) ?></td>
                        <td data-label="Gênero"><?= htmlspecialchars($game->genero) ?></td>
                        <td data-label="Faixa Etária"><?= htmlspecialchars($game->faixa_etaria) ?></td>
                        <td data-label="Estimativa de Vendas"><?= htmlspecialchars($game->vendas_aproximadas_milhoes) ?> mi</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<script>
    const toggleBtn = document.getElementById('toggleDrawer');
    const drawer = document.getElementById('drawer');

    toggleBtn.addEventListener('click', () => {
        drawer.classList.toggle('open');
        if(drawer.classList.contains('open')) {
            toggleBtn.textContent = 'Fechar Filtros';
        } else {
            toggleBtn.textContent = 'Filtrar Jogos';
        }
    });
</script>

</body>

</html>