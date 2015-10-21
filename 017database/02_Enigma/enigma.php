<?php
//connectie met database.
include('inc/Verbinding_inc.php');
include('inc/header.php');
?>
    <table class="centreren cent">
        <caption>Lijst van alle landen per werelddeel</caption>
        <tr>
            <th>Achternaam</th>
            <th>Voornaam</th>
            <th>Telefoon</th>
            <th>Email</th>
            <th>Gebruikersnaam</th>
            <th>Wachtwoord</th>
        </tr>
        <?php
        $sql = 'SELECT * FROM 02_Enigma ORDER BY Achternaam';
        if (!$res = $link->query($sql)) {
            // Er zijn fouten.
            trigger_error('Fout in query: ' . $link->error);
        } else {
            //resultaat terug
            while ($row = $res->fetch_assoc()):
                ?>
                <tr>
                    <td><?php echo $row['Achternaam']; ?></td>
                    <td><?php echo $row['Voornaam']; ?></td>
                    <td><?php echo $row['Telefoon']; ?></td>
                    <td><?php echo $row['Email']; ?></td>
                    <td><?php echo $row['Gebruikersnaam']; ?></td>
                    <td><?php echo $row['Wachtwoord']; ?></td>
                </tr>
                <?php
            endwhile;
        }
        echo '<tr><th colspan="7">Aantal records : ' . $res->num_rows . '</th></tr>';
        ?>
    </table>
<?php include('inc/footer.php'); ?>




