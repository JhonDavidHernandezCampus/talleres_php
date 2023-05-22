<?php
    header("Content-type: application/json");
    $_DATA = json_decode(file_get_contents("php://input"),true);
    $METHOD = $_SERVER["REQUEST_METHOD"];

    echo $METHOD;
    echo json_encode($_DATA);


?>