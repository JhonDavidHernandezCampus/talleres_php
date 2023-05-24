<?php
    header("Content-Type: application/json");
    $DATA = json_decode(file_get_contents("php://input"), true);
    $METHOD = $_SERVER["REQUEST_METHOD"];


    try{
        $res = match($METHOD){
            "POST" => calcular()
        };
    }catch(\Throwable $th){
        $res = "Error en el metodo de envio";
    }
    
    function calcular(){
        global $DATA,$METHOD;
            if($DATA["lado"]){
                if(is_numeric($DATA["lado"])){    
                echo "<h1>El prerimetro del caudrado es: ".($DATA["lado"]*4)."</h1>";
                }else{
                    echo "Error el digitar los datos por favor enviar de nuevo";
                }
            }elseif(is_numeric($DATA["altura"]) && is_numeric($DATA["base"])){
                echo "<h1>El area del rectangulo es: ".($DATA["altura"]*$DATA["base"])."</h1";
            }else{
                echo "Error el digitar los datos por favor enviar de nuevo";
            }
        echo $res;

    }


?>