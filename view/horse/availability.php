<h1>Beschikbaarheid</h1>
<table class="table">
    <tr>
        <th>Ras</th>
        <th>Naam</th>
        <th>9-10</th>
        <th>10-11</th>
        <th>11-12</th>
        <th>12-13</th>
    </tr>
    <?php
    foreach ($data["horse"] as $horse) {

        echo '<tr><td>'.$horse["ras"].'</td><td>'.$horse["HorseName"].'</td><td></td><td></td><td></td><td></td></tr>';

    }

    ?>
</table>