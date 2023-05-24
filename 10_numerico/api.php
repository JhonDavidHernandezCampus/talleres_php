<?php
    header("Content-Type: application/json");
    $DATA = json_decode(file_get_contents("php://input"), true);
    $METHOD = $_SERVER["REQUEST_METHOD"];
    $suma = 0;
    $mayor = null;
    $menor = null;
    $promedio = null;
    $cant = 0;
    try{
        $res = match($METHOD){
            "POST" => calcular($DATA)
        };
    }catch(\Throwable $th){
        $res = "Error";
    }

    function calcular($data){
        foreach($data as $numeros){
            $suma += $numeros["numero"];
            $cant++;
            ($mayor === null || $mayor < $numeros["numero"])?$mayor =$numeros["numero"]:$mayor;
            ($menor === null || $menor > $numeros["numero"])?$menor = $numeros["numero"]:$menor;
            $promedio =  $suma/$cant;
        }
        return (array)[
            "suma"=>$suma,
            "mayor"=>$mayor,
            "menor" => $menor,
            "promedio"=> $promedio,
            "cant" => $cant,

        ];
    }
    echo json_encode($res);


?>