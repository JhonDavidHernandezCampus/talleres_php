<?php
    header("Conent-Type: application/json");
    $DATA = json_decode(file_get_contents("php://input"),true);
    $METHOD = $_SERVER["REQUEST_METHOD"];


    $num1 = $DATA["num1"];
    $num2 = $DATA["num2"];

    try{
        global $num1,$num2;
        $res = match($METHOD){
            "POST" => (is_numeric($num1)&& is_numeric($num2))?calcular():error()
        };
    }catch(\Throwable $th){
        $res = "Error";
    }

    function error(){
        return "Error en los datos; Deben ser numericos";
    }

    function calcular(){
        global $num1,$num2;
        if($num1 > $num2){
            return "<h1>El numero uno es mayor al numero 2</h1>
                    <h3>Suma: ".$num1+$num2."</h3>
                    <h3>Diferencia: ".$num1-$num2."</h3>";
        }elseif($num2 > $num1){
            return "<h1>El numero dos es mayor al numero 1</h1>
            <h3>Producto: ".$num1*$num2."</h3>
            <h3>Divicion: ".$num1/$num2."</h3>";
        }else{
            return "<h1>los numeros son iguales</h1>";
        }
    }

    echo  $res;

?>