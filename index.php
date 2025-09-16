<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa PS2Games</title>
</head>

<body>
    <h1>PS2Games</h1>
    <form action="processa.php" method="POST">
        <label for="title">Título:</label>
        <input type="text" id="title" name="title"><br><br>

        <label for="dev">Desenvolvedora:</label>
        <input type="text" id="dev" name="dev"><br><br>

        <label for="genre">Gênero:</label>
        <input type="text" id="genre" name="genre"><br><br>

        <label for="year_min">Ano mínimo:</label>
        <input type="number" id="year_min" name="year_min"><br><br>

        <label for="year_max">Ano máximo:</label>
        <input type="number" id="year_max" name="year_max"><br><br>

        <button type="submit">Filtrar</button>
    </form>
</body>

</html>