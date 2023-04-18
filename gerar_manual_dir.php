<?php


echo "<h1> Gerar arquivo CSV </h1>";

//aceitar csv ou texto

//header('Content-Type: text/csv; charset=utf-8');

//nome do arquivo
//header('Content-Disposition: attachment; filename=arquivo.csv');

//$resultado = fopen("php://output" , 'w');

//criar cabeçalho

$cabecalho = ['ID' , 'Nome' , 'email' , mb_convert_encoding('Endereço' , 'ISO-8859-1' ,'UTF-8')];

//array de dados
$usuarios = [
    [
        'id' => '1' ,
        'nome' => mb_convert_encoding('danilo' , 'ISO-8859-1' ,'UTF-8'),
        'email' => 'email@eamil',
        'endereco' => 'rua zeze joao 12',

    ],
    [
        'id' => '1' ,
        'nome' => mb_convert_encoding('danilo' , 'ISO-8859-1' ,'UTF-8'),
        'email' => 'email@eamil',
        'endereco' => 'rua zeze joao 12',

    ],
    [
        'id' => '1' ,
        'nome' => mb_convert_encoding('danilo' , 'ISO-8859-1' ,'UTF-8'),
        'email' => 'email@eamil',
        'endereco' => 'rua zeze joao 12',

    ],
    [
        'id' => '1' ,
        'nome' => mb_convert_encoding('danilo' , 'ISO-8859-1' ,'UTF-8'),
        'email' => 'email@eamil',
        'endereco' => 'rua zeze joao 12',

    ],
];

// Abrir 0 arquivo

$arquivo = fopen('file.csv' , 'w');

//escrever cabeçalho

fputcsv($arquivo , $cabecalho , ";");


//escrever conteudo no arquivo

foreach($usuarios as $usuario){
    fputcsv($arquivo , $usuario , ";" );
}

//fechar o arquivo

fclose($arquivo);