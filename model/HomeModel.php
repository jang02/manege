<?php

function getAllPlanned(){
    $db = openDatabaseConnection();

    $sql = "SELECT id, start_time, end_time, RiderName, HorseName 
FROM planning 
  INNER JOIN riders on RiderID = Rider_id 
  INNER JOIN horses on HorseID = Horse_id 
ORDER BY start_time ASC";
    $query = $db->prepare($sql);
    $query->execute();

    $db = null;

    return $query->fetchAll();
}

function getAllHorses(){
    $db = openDatabaseConnection();

    $sql = "SELECT * FROM `horses`";
    $query = $db->prepare($sql);
    $query->execute();

    $db = null;

    return $query->fetchAll();
}
function getALlRiders(){
    $db = openDatabaseConnection();

    $sql = "SELECT * FROM `riders`";
    $query = $db->prepare($sql);
    $query->execute();

    $db = null;

    return $query->fetchAll();
}
function getIDrider($name){
    try {
        $conn=openDatabaseConnection();

        $stmt = $conn->prepare("SELECT `RiderID` FROM `riders` WHERE RiderName = :name");
        $stmt->bindParam(":name", $name);
        $stmt->execute();

    }
    catch(PDOException $e){

        echo "Connection failed: " . $e->getMessage();
    }

    $conn = null;

    return $stmt->fetch();
}
function getIDhorse($name){
    try {
        $conn=openDatabaseConnection();

        $stmt = $conn->prepare("SELECT `HorseID` FROM `horses` WHERE HorseName = :name");
        $stmt->bindParam(":name", $name);
        $stmt->execute();

    }
    catch(PDOException $e){

        echo "Connection failed: " . $e->getMessage();
    }

    $conn = null;

    return $stmt->fetch();
}
function getTimes($id, $option){
    if($option === "rider"){
        try {
            $conn=openDatabaseConnection();

            $stmt = $conn->prepare("SELECT `start_time`,`end_time` FROM `planning` WHERE Rider_id = :id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();

        }
        catch(PDOException $e){

            echo "Connection failed: " . $e->getMessage();
        }

        $conn = null;

        return $stmt->fetchAll();
    }
    else{
        try {
            $conn=openDatabaseConnection();

            $stmt = $conn->prepare("SELECT `start_time`,`end_time` FROM `planning` WHERE Horse_id = :id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();

        }
        catch(PDOException $e){

            echo "Connection failed: " . $e->getMessage();
        }

        $conn = null;

        return $stmt->fetchAll();
    }
}

function compareTime($time1, $time2, $time3, $time4, $type){
    if(strtotime($time1) < strtotime($time2) && strtotime($time3) < strtotime($time4)){
        return true;
    }
    else{
        if ($type === "start") {
            if (strtotime($time1) >= strtotime($time2) && strtotime($time1) < strtotime($time3)) {
                return true;
            } else {
                return false;
            }
        } else {
            if (strtotime($time4) > strtotime($time2) && strtotime($time4) <= strtotime($time3)) {
                return true;
            } else {
                return false;
            }
        }
    }
}


