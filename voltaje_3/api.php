<?php
    header("Content-type: application/json");
    $_DATA = json_decode(file_get_contents("php://input"),true);
    $METHOD = $_SERVER["REQUEST_METHOD"];



    try{
        $res = match($METHOD){
            "POST" => calcular()
        };
    }catch(\Throwable $th){
        $res = "Error";        
    }

    function calcular(float $resistencia,float $corriente){
        $res = $resistencia * $corriente;
        return $res;
    }
    
    echo "<p>El voltage del circuito es de ".  $_DATA["resistencia"]*$_DATA["corriente"] ." Voltios </p>";


?>