<?php

require 'conexao.php';

$arquivo = $_FILES['arquivo'];
//var_dump($arquivo);

if($arquivo['type'] == "text/csv"){
    $dados_arquivos = fopen($arquivo['tmp_name'] , "r");

    var_dump($dados_arquivos);
    
    //Ler linha por linha
    while($linha = fgetcsv($dados_arquivos, 1000 , ";")){
        //var_dump($linha);
        //Usar array_walk_recursive paara criar função com PHP
        array_walk_recursive($linha, 'converter');

        //ternario se verdadeiro exibe ele mesmo
        echo "ID: ".($linha[0] ?? null)."<br>" ;
        echo "Nome: ".($linha[1] ?? null) ."<br>";
        echo "Email: ".($linha[2] ?? null) ."<br>";
        echo "<br>"; 

        //isso é só exemplo , precisa de proteção  e també o id não pode ser cadastrado em uma tabela com id autoincrement
        $sql = "INSERT INTO tabela (id_usuarios ,nome ,email) value(:id_usuarios ,:nome ,:email)";

        $query = $con->prepare($sql);
        $query->bindParam('id_usuarios' , $linha[0] ,PDO::PARAM_STR);
        $query->bindParam('nome' , $linha[1] ,PDO::PARAM_STR);
        $query->bindParam('email' , $linha[2] ,PDO::PARAM_STR);
        $query->execute();
       

    }


}else{
    echo "Necessário enviar arquivo csv !";
}

//criar função valor ppor referencia ,isto é quando altera o valor dentro da funçao , valepara a varaivel fora da funçao
function converter(&$dados_arquivos){
    $dados_arquivos = mb_convert_encoding($dados_arquivos,"UTF-8","ISO-8859-1");
}