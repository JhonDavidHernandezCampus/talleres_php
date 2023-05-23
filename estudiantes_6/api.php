<?php
    header("Content-Type: application/json");
    $DATA = json_decode(file_get_contents("php://input"), true);
    $METHOD = $_SERVER["REQUEST_METHOD"];

    $notamayor = null;
    $notamenor = null;
    $canthombres =0;
    $cantmujeres=0;
    //echo json_encode($DATA);

try{
    $res = match($METHOD){
        "POST" => calcular()
    };
}catch(\Throwable $th){
    $res = "Error";
}

function calcular(){
    global $notamayor,$notamenor,$canthombres,$cantmujeres,$DATA;
    foreach ($DATA as $estudiantes){
        if($notamayor === null || $estudiantes["nota"] > $notamayor["nota"]){
            $notamayor = $estudiantes;
        }
        if($notamenor === null || $estudiantes["nota"] < $notamenor["nota"]){
            $notamenor = $estudiantes;
        }
        ($estudiantes["sexo"] === "masculino" )?$canthombres++:$cantmujeres++;
    }

    return [
        "notamayor" => $notamayor,
        "notamenor" => $notamenor,
        "canthombres" =>$canthombres,
        "cantmujeres" =>$cantmujeres,
    ];

}


    echo json_encode($res);

?>