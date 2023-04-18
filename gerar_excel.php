<?php   
    ob_start();
    
    require_once('conexao.php');

    $sql = "SELECT * FROM usuarios";
    $query = $con->prepare($sql);
    $query->execute();

    
    if(isset($_POST['Gerar'])){ 
        if(($query) and ($query->rowCount() !=0)){
            
            //aceitar csv ou texto
            header('Content-Type: text/csv; charset=UTF-8');

            // Nome arquivo
            header('Content-Disposition: attachment; filename=arquivo.csv');
            

            //Gravar no buffer
            $resultado = fopen('php://output', 'w');
            
            $x = 0;
            while($row_usuario = $query->fetch(PDO::FETCH_ASSOC)){
                if($x == 0){
                    $cabeçalho = [];
                    foreach($row_usuario as $key => $dado){
                        $cabeçalho[] = $key;
                    }
                    $x = 1; 
                    //escreve cabeçalho
                    fputcsv($resultado ,$cabeçalho , ";");  
                }
                $dados = [];
                foreach($row_usuario as $dado){
                    $dados[] = $dado;
                }
                //escreve dados
                fputcsv($resultado ,$dados , ";");


                
            }
            fclose($resultado);
        }else{
            header('Location: index.php');
        }


    }
?>