<h1>Planning</h1>
<table>
    <tr>
        <th>Naam rijder</th>
        <th>Naam dier</th>
        <th>Start tijd</th>
        <th>Eind tijd</th>
        <th>Planning ID</th>
    </tr>
    <?php
    foreach ($data["planned"] as $planned) {

        echo '<tr><td>'.$planned["RiderName"].'</td><td>'.$planned["HorseName"].'</td><td>'.$planned["start_time"].'</td><td>'.$planned["end_time"].'</td>
<td>'.$planned["id"].'</td><td><a href="edit/'.$planned["id"].'"><i class="fas fa-pen"></i></a> <a href="delete/'.$planned["id"].'"><i class="fas fa-trash"></i></a></td></tr>';





    }

?>
</table>