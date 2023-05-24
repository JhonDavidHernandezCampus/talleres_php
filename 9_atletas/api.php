<?php 
    header("Content-Type: application/json");
    $DATA = json_decode(file_get_contents("php://input"), true);
    $METHOD = $_SERVER["REQUEST_METHOD"];
    $ganadora = null;
    $record = null;


    try{
        $res = match($METHOD){
            "POST" => calcular()
        };
    }catch(\Throwable $th){
        $res = "Error";
    }
    function calcular(){
        global $DATA;
        foreach($DATA as $atletas){
            if($ganadora === null || $atletas["marca"] > $ganadora["marca"]  ){
                $ganadora = $atletas;
            }
        }
        ($ganadora["marca"]>15.50)?$record = "si": $record = "no";
        return (array)[
            "ganadora" => $ganadora,
            "record" => $record
        ];
    }
    echo json_encode($res);
?>