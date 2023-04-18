<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ler excel</title>
</head>
<body>
    <h3>Ler excel .csv e exibir</h3>

    <form action="processa_exibir_excel.php" method="post" enctype="multipart/form-data">
        <label for=""></label>
        <input type="file" name="arquivo" id="arquivo"><br><br>
        <input type="submit" value="Enviar">

    </form>

    
    <h3>Ler excel .csv e exibir</h3>

    <form action="processa_salvabd_excel.php" method="post" enctype="multipart/form-data" accept="text/csv">
        <label for=""></label>
        <input type="file" name="arquivo" id="arquivo"><br><br>
        <input type="submit" value="Enviar">

    </form>
    
</body>
</html>