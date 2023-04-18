<?php
    require_once('conexao.php');

    $sql = "SELECT id_usuarios , nome ,email  FROM usuarios WHERE id_usuarios > 0 ";
    $query = $con->prepare($sql);
    $query->execute();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br>
     <form action="gerar_excel.php" method="post">
        <input type="submit" value="Gerar excel" name="Gerar">
     </form>
     <br>
    
    
    <h2>Listar Dados</h2>
    <br>
    <?php
        if(($query) and ($query->rowCount() !=0)){
            while($row_usuario = $query->fetch(PDO::FETCH_ASSOC)){
                //var_dump($row_usuario);
                extract($row_usuario); //torna key como variavel
                echo "ID: $id_usuarios <br>";
                echo "Nome: $nome <br>";
                echo "Email: $email <br>";
                echo "<br>";
            }
        }else{
            
            echo "<p style='color: #f00;'> Erro: Nenhum usuário encontrado ! </p>";
        }
        
        
    ?>
    
</body>
</html>