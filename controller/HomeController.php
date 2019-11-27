<?php

require(ROOT . "model/HomeModel.php");

// http://localhost/manege/home/index
function index(){
    render("home/index", array(
        'planned' => getAllPlanned()
    ));
}
function plannen(){

    render("home/plannen", array(
        'horse' => getAllHorses(),
        'rider' => getALlRiders()
    ));
}
function edit(){
    render("home/edit");
}
function delete(){
    render("home/delete");
}
function store(){
    $_SESSION["olddata"] = $_POST;
    $starttime = $_POST["start"];
    $endtime = $_POST["end"];
    $idrider = getIDrider($_POST["rider"]);
    $idhorse = getIDhorse($_POST["horse"]);
    $timeshorse = getTimes($idhorse["HorseID"], "horse");

    foreach(getTimes($idrider["RiderID"], "rider") as $timesrider){
        if (compareTime($starttime, $timesrider["start_time"], $timesrider["end_time"]) == false && compareTime($endtime, $timesrider["start_time"], $timesrider["end_time"]) == false){
            echo("can continue</br>");
        }
        else{
            echo("a time overlaps with another rider</br>");
        }
    }
    foreach(getTimes($idhorse["HorseID"], "horse") as $timeshorse){
        if (compareTime($starttime, $timeshorse["start_time"], $timeshorse["end_time"]) == false && compareTime($endtime, $timeshorse["start_time"], $timeshorse["end_time"]) == false){
            echo("can continue</br>");
        }
        else{
            echo("a time overlaps with another horse</br>");
        }
    }

}
