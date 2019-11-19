<?php

require(ROOT . "model/HorseModel.php");

function index(){
    render("horse/index", array(
        'horse' => getAllHorses()
    ));
}
function create()
{
    render("horse/create");
}
function edit(){
    render("horse/edit");
}
function delete(){
    render("horse/delete");
}
function store(){
    $type = $name = $ras = $schofthoogte = "";
    $type = ValidateData($_POST["type"]);
    $name = ValidateData($_POST["name"]);
    $ras = ValidateData($_POST["ras"]);
    $schofthoogte = ValidateData($_POST["schofthoogte"]);


    if ($type == "" || $name == "" || $ras == "" || tofloat($schofthoogte) <= 0 || tofloat($schofthoogte) > 3){
        if($name == ""){
            $_SESSION["error"][] = "Vul een naam in";
        }
        if($ras == ""){
            $_SESSION["error"][] = "Vul een ras in";
        }
        if($schofthoogte == ""){
            $_SESSION["error"][] = "Vul een schofthoogte in";
        }
        if(tofloat($schofthoogte) <= 0 || tofloat($schofthoogte) > 3){
            $_SESSION["error"][] = "Schofthoogte moet groter dan 0 en kleiner of gelijk aan 3 zijn";
        }
        render("horse/create");
    }
    else{
        createHorse($type, $name, $ras, $schofthoogte);
        $_SESSION["success"][] = "Successvol een $type met de naam $name Toegevoegd!";
        header("Location: index");
    }

}

function tofloat($num) {
    $dotPos = strrpos($num, '.');
    $commaPos = strrpos($num, ',');
    $sep = (($dotPos > $commaPos) && $dotPos) ? $dotPos :
        ((($commaPos > $dotPos) && $commaPos) ? $commaPos : false);

    if (!$sep) {
        return floatval(preg_replace("/[^0-9]/", "", $num));
    }

    return floatval(
        preg_replace("/[^0-9]/", "", substr($num, 0, $sep)) . '.' .
        preg_replace("/[^0-9]/", "", substr($num, $sep+1, strlen($num)))
    );
}