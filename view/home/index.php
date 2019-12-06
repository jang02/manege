<h1>Planning</h1>
<table class="table">
    <tr>
        <th scope="col">Naam rijder</th>
        <th scope="col">Naam dier</th>
        <th scope="col">Start tijd</th>
        <th scope="col">Eind tijd</th>
        <th scope="col">Planning ID</th>
    </tr>
    <?php
    foreach ($data["planned"] as $planned) {

        echo '<tr><td>'.$planned["RiderName"].'</td><td>'.$planned["HorseName"].'</td><td>'.$planned["start_time"].'</td><td>'.$planned["end_time"].'</td>
<td>'.$planned["id"].'</td><td><a href="edit/'.$planned["id"].'"><i class="fas fa-pen"></i></a> <a href="delete/'.$planned["id"].'"><i class="fas fa-trash"></i></a></td></tr>';





    }

?>
</table>