<h1>Inplannen</h1>
<?php

?>
<form action="<?= URL ?>home/updatestore" method="post">
    <div class="form-group">
        <label for="rider">Rijder</label>
        <select name="rider" class="form-control" id="rider">
            <?php
            foreach ($data["rider"] as $rider) {
                ?>

                <option <?php if (isset($_SESSION["olddata"]["rider"])) {
                    if ($_SESSION["olddata"]["rider"] == $rider["RiderName"]) {
                        echo 'selected="selected"';
                    }
                }
                else{
                    if ($entry["RiderName"] == $rider["RiderName"]){
                        echo 'selected="selected"';
                    }
                }
                ?>><?php echo $rider["RiderName"] ?></option>;

                <?php
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="horse">Naam Paard/Pony</label>
        <select name="horse" class="form-control" id="horse">
            <?php
            foreach ($data["horse"] as $horse) {
                ?>

                <option <?php if (isset($_SESSION["olddata"]["horse"])) {
                    if ($_SESSION["olddata"]["horse"] == $horse["HorseName"]) {
                        echo 'selected="selected"';
                    }
                }
                else{
                    if ($entry["HorseName"] == $horse["HorseName"]){
                        echo 'selected="selected"';
                    }
                }?>><?php echo ($horse["HorseName"]) ?></option>;

                <?php
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="start">Start tijd</label>
        <input type="time" name="start" class="form-control" id="start" value="<?php if (isset($_SESSION["olddata"]["start"])) {
            echo $_SESSION["olddata"]["start"];
        }
        else{
            echo $entry["start_time"];
        }?>">
    </div>
    <div class="form-group">
        <label for="end">Eind tijd</label>
        <input type="time" name="end" class="form-control" id="end" value="<?php if (isset($_SESSION["olddata"]["end"])) {
            echo $_SESSION["olddata"]["end"];
        }
        else{
            echo $entry["end_time"];
        }?>">
        <input class="hidden" name="entryid" value="<?php echo $entry["id"]; ?>">
    </div>
    <input class="btn btn-primary" type="submit">
</form>
