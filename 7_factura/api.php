<?php
    header("Content-Type: application/json");
    $DATA = json_decode(file_get_contents("php://input"),true);
    $METHOD = $_SERVER["REQUEST_METHOD"];

    //echo json_encode($DATA);

    try{
        $res = match($METHOD){
            "POST" => calcular()
        }; 
    }catch(\Throwable $th){
        $res = "Error";
    }
    function calcular(){
        global $DATA;
        return "<p>El total a pagar por su pediso es de </p>
                <h3>Pagar : ".$DATA["cantidad"]*$DATA["precio"]."</h3>";
    }

        echo $res;

?>