<?php

function getAllHorses(){
    $db = openDatabaseConnection();

    $sql = "SELECT * FROM `horses`";
    $query = $db->prepare($sql);
    $query->execute();

    $db = null;

    return $query->fetchAll();
}
function getAllPlanned(){
    $db = openDatabaseConnection();

    $sql = "SELECT id, TIME_FORMAT(start_time, '%H:%i') start_time, TIME_FORMAT(end_time, '%H:%i') end_time, HorseName, ras 
FROM planning 
  INNER JOIN horses on HorseID = Horse_id 
ORDER BY start_time ASC";
    $query = $db->prepare($sql);
    $query->execute();

    $db = null;

    return $query->fetchAll();
}

function getHorse($id){
    try {
        $conn=openDatabaseConnection();

        $stmt = $conn->prepare("SELECT * FROM `horses` WHERE HorseID = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();

    }
    catch(PDOException $e){

        echo "Connection failed: " . $e->getMessage();
    }

    $conn = null;

    return $stmt->fetch();


}

function ValidateData($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function createHorse($type, $name, $ras, $schofthoogte){
    try {
        $conn=openDatabaseConnection();

        $stmt = $conn->prepare("INSERT INTO `horses` (HorseID, type, HorseName, ras, schofthoogte) VALUES (NULL, :type, :name, :ras, :schofthoogte)");
        $stmt->bindParam(":type", $type);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":ras", $ras);
        $stmt->bindParam(":schofthoogte", $schofthoogte);
        $stmt->execute();

    }
    catch(PDOException $e){

        echo "Connection failed: " . $e->getMessage();
    }

    $conn = null;

}

function deleteHorse($id){
    $data = getHorse($id);
    $_SESSION["success"][] = "Successvol een $data[type] met de naam $data[HorseName] verwijderd!";
    try {
        $conn=openDatabaseConnection();

        $stmt = $conn->prepare("DELETE FROM `horses` WHERE HorseID = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();

    }
    catch(PDOException $e){

        echo "Connection failed: " . $e->getMessage();
    }
    $conn = null;
    header("Location: /manege/horse/index");
}

function updateHorse($id, $type, $name, $ras, $schofthoogte){
    try {
        $conn=openDatabaseConnection();

        $stmt = $conn->prepare("UPDATE `horses` SET `type`=:type, `HorseName`=:name, `ras`=:ras, `schofthoogte`=:schofthoogte WHERE `HorseID`=:id");
        $stmt->bindParam(":type", $type);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":ras", $ras);
        $stmt->bindParam(":schofthoogte", $schofthoogte);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

    }
    catch(PDOException $e){

        echo "Connection failed: " . $e->getMessage();
    }

    $conn = null;
}


?>