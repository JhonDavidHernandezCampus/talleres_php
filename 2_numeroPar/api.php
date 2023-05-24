<?php
    header("Content-Type: application/json;");
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $METHOD = $_SERVER["REQUEST_METHOD"];
    $numero = $_DATA["numero"];

    try{
        $res = match($METHOD){
            "POST" => calcular(...$_DATA)
        };
    }catch(\Throwable $th){
        $res = "Error";
    }
    function calcular(mixed $numero){
        if(is_numeric($numero)){
            if ($numero%2 == 0) {
                if($numero > 10){
                    echo "<h1>El numero es par y mayor a 10</h1>";
                }else{
                    echo "<h1>El numero es par y menor a 10</h1>";
                }
            }else{
                if($numero > 10){
                    echo "<h1>El numero es impar y mayor a 10</h1>";
                }else{
                    echo "<h1>El numero es impar y menor a 10</h1>";
                }
            }
        }else{
            echo "<h1>Error en digitar los datos 'Intente nuevamente'</h1>";
        }
    }
?>