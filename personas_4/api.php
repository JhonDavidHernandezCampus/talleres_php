<?php
    header("Content-Type: application/json");
    $_DATA = json_decode(file_get_contents("php://input"),true);
    $METHOD = $_SERVER["REQUEST_METHOD"];

    $edadp1 = $_DATA["edadp1"];
    $edadp2 = $_DATA["edadp2"];
    $edadp3 = $_DATA["edadp3"];
    try{
        $res = match($METHOD){
            "POST" => provar()
        };
    }catch(\Throwable $th){
        $res = "Error";
    }

    function provar(){
        global $edadp1,$edadp2,$edadp3;
        (is_numeric($edadp1)&&is_numeric($edadp2) &&is_numeric($edadp3))? calcular() : error();
    }

    function error(){
        echo "<h1>Error en los datos deben ser numericos</h1>";
    }
    function calcular(){
        global $_DATA;
        global $edadp1, $edadp2,$edadp3;
        if($edadp1 > $edadp2 && $edadp1 > $edadp3){
            echo "<h1>".$_DATA["nombrep1"]." es la persona con mayor edad con ".$edadp1." años </h1>";
        }elseif($edadp2 > $edadp1 && $edadp2 > $edadp3){
            echo "<h1>".$_DATA["nombrep2"]." es la persona con mayor edad con ".$edadp2." años </h1>";
        }elseif($edadp3 > $edadp1 && $edadp3 > $edadp2){
            echo "<h1>".$_DATA["nombrep3"]." es la persona con mayor edad con ".$edadp3." años </h1>";
        }else{
            echo "<h1> las personas ".$_DATA["nombrep1"].", ".$_DATA["nombrep2"]." y ".$_DATA["nombrep3"]." tienen la misma edad </h1>";
        }
    }

/*     function calcular(){
        global $edadp1, $edadp2,$edadp3;
        $mayor = max($edadp1,$edadp2,$edadp3);
        echo "<h1>".$mayor."esta el la edad del mayor </h1>";
    } */

?>