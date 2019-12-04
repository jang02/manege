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
function edit($id){
    render("home/edit", array(
        'horse' => getAllHorses(),
        'rider' => getALlRiders(),
        'entry' => entry($id)
    ));
}
function delete($id){
    $entry = entry($id);

    render("home/delete", $entry);
}

function store()
{
    $_SESSION["olddata"] = $_POST;
    $starttime = $_POST["start"];
    $endtime = $_POST["end"];
    $idrider = getIDrider($_POST["rider"]);
    $idhorse = getIDhorse($_POST["horse"]);
    $checker = [];

    if (!empty($starttime) && !empty($endtime)) {
        if (strtotime($starttime) > strtotime($endtime)) {
            $_SESSION["error"][] = "End time can't be smaller than start time";
            header("Location: plannen");
        } else {
            // start is eerder dan eindtijd

            foreach (getTimes($idrider["RiderID"], "rider") as $timesrider) {
                if (compareTime($starttime, $timesrider["start_time"], $timesrider["end_time"], $endtime, "start") == false && compareTime($starttime, $timesrider["start_time"], $timesrider["end_time"], $endtime, "end") == false) {
                    array_push($checker, true);
                } else {
                    $_SESSION["error"][] = "Rider is unavailable during your selected times";
                    array_push($checker, false);
                }
            }
            foreach (getTimes($idhorse["HorseID"], "horse") as $timeshorse) {
                if (compareTime($starttime, $timeshorse["start_time"], $timeshorse["end_time"], $endtime, "start") == false && compareTime($starttime, $timeshorse["start_time"], $timeshorse["end_time"], $endtime, "end") == false) {
                    array_push($checker, true);
                } else {
                    $_SESSION["error"][] = "Horse is unavailable during your selected times";
                    array_push($checker, false);
                }
            }
            if (in_array(false, $checker)) {
                header("Location: plannen");
            } else {
                createEntry($idrider["RiderID"], $idhorse["HorseID"], $starttime, $endtime);
                header("Location: /manege/home/index");
            }

        }

    } else {
        $_SESSION["error"][] = "Time can't be empty";
        header("Location: plannen");
    }
}
function updatestore()
{
    $_SESSION["olddata"] = $_POST;
    $starttime = $_POST["start"];
    $endtime = $_POST["end"];
    $idrider = getIDrider($_POST["rider"]);
    $idhorse = getIDhorse($_POST["horse"]);
    $entryid = $_POST["entryid"];
    $checker = [];

    if (!empty($starttime) && !empty($endtime)) {
        if (strtotime($starttime) > strtotime($endtime)) {
            $_SESSION["error"][] = "End time can't be smaller than start time";
            header("Location: plannen");
        } else {
            // start is eerder dan eindtijd

            foreach (getTimes($idrider["RiderID"], $entryid, "rider") as $timesrider) {
                if (compareTime($starttime, $timesrider["start_time"], $timesrider["end_time"], $endtime, "start") == false && compareTime($starttime, $timesrider["start_time"], $timesrider["end_time"], $endtime, "end") == false) {
                    array_push($checker, true);
                } else {
                    $_SESSION["error"][] = "Rider is unavailable during your selected times";
                    array_push($checker, false);
                }
            }
            foreach (getTimes($idhorse["HorseID"], $entryid, "horse") as $timeshorse) {
                if (compareTime($starttime, $timeshorse["start_time"], $timeshorse["end_time"], $endtime, "start") == false && compareTime($starttime, $timeshorse["start_time"], $timeshorse["end_time"], $endtime, "end") == false) {
                    array_push($checker, true);
                } else {
                    $_SESSION["error"][] = "Horse is unavailable during your selected times";
                    array_push($checker, false);
                }
            }
            if (in_array(false, $checker)) {
                header("Location: edit/". $entryid ."");
            } else {
                updateEntry($idrider["RiderID"], $idhorse["HorseID"], $starttime, $endtime, $entryid);
                header("Location: /manege/home/index");
            }

        }

    } else {
        $_SESSION["error"][] = "Time can't be empty";
        header("Location: plannen");
    }
}
function destroy($id){
    deleteEntry($id);
}
