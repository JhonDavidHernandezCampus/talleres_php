<?php
header("Content-Type: application/json ; charset:UTF-8");

$_DATA = json_decode(file_get_contents("php://input"), true);
$METHOD = $_SERVER["REQUEST_METHOD"];

function validacion(){
    return ($arg <= 3.9)?"Estudie":"Becado";
}

function algoritmo(float $nota1,float $nota2,float $nota3){
    $promedio = ($nota1+$nota2+ $nota3);
    return validacion($promedio);
}
try{
    $res = match($METHOD){
        "POST" => algoritmo(...$_DATA)
    };
}catch(\Throwable $th){
    $res = "Error";
}
$mensaje = (array)[
    "mensaje"=> validacion($res),
    "notas" => $_DATA,
    "promedio" => $res

];

echo json_encode($mensaje,JSON_PRETTY_PRINT);
















/* 
switch($METHOD){
    case 'POST':
        $suma= (float) 0;
        foreach($_DATA as $key => $value){
            if(!is_numeric($value)){
                $suma = 0;
                break;
            }else{
                $suma += $value;
            }
        }
        $promedio = (float) $suma/count($_DATA);
        $res = (array)[
            "mensaje" => ($promedio <= 3.9)?"estudiante":"becado",
            "notas" => $_DATA,
            "promedio" =>$promedio,
        ];
        echo json_encode($res,JSON_PRETTY_PRINT);
        break;

    default:
        break;
    }

 */
?>
