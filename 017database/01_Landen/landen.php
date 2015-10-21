<?php
//connectie met database.
include('inc/Verbinding_inc.php');

$wereldeel = 'ALLE';
$sql = 'SELECT * FROM 01_Landen ORDER BY Werelddeel, land';

if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['filter'])) {
    $wereldeel = $link->real_escape_string($_POST['filter']);
    if ($wereldeel != 'ALLE') {
        $sql = 'SELECT *
                FROM 01_Landen
                WHERE werelddeel = "' . $wereldeel . '"
                ORDER BY werelddeel, land';
    }
}
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="author" content="Yarne Decuyper">
    <link href="/yarne/css/style.css" rel="stylesheet" type="text/css">
    <link href='http/fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <title>Landen</title>
</head>
<body>
    <header>
        <h1>Lijst van alle landen per werelddeel</h1>
    </header>
    <section>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <select name="filter">
                <option value="ALLE" <?php if($wereldeel == 'ALLE') {echo 'selected';} ?>>Alle werelddelen</option>
                <option value="Europa" <?php if($wereldeel == 'Europa') {echo 'selected';} ?>>Europa</option>
                <option value="Azië" <?php if($wereldeel == 'Azië') {echo 'selected';} ?>>Azi&euml;</option>
                <option value="Afrika" <?php if($wereldeel == 'Afrika') {echo 'selected';} ?>>Afrika</option>
                <option value="Noord-Amerika" <?php if($wereldeel == 'Noord-Amerika') {echo 'selected';} ?>>Noord-Amerika</option>
                <option value="Zuid-Amerika" <?php if($wereldeel == 'Zuid-Amerika') {echo 'selected';} ?>>Zuid-Amerika</option>
                <option value="Oceanië" <?php if($wereldeel == 'Oceanië') {echo 'selected';} ?>>Oceani&euml;</option>
                <option value="Antarctica" <?php if($wereldeel == 'Antarctica') {echo 'selected';} ?>>Antarctica</option>
            </select>
            <button type="submit"><img src="img/detail-icon.png">Filter</button>
        </form>
    </section>
    <section>
        <table>
            <tr>
                <th>Land</th>
                <th>Hoofdstad</th>
                <th>Werelddeel</th>
                <th>Aantal inwoners</th>
            </tr>
            <?php
            if (!$res = $link->query($sql)) {
                // Er zijn fouten.
                trigger_error('Fout in query: ' . $link->error);
            } else {
                //resultaat terug
                if ($res->num_rows < 1):
                    ?>
                    <tr>
                        <td colspan="4">Geen landen gevonden</td>
                    </tr>
                    <?php
                endif;
                while ($row = $res->fetch_assoc()):
                    ?>
                    <tr>
                        <td><?php echo $row['Land']; ?></td>
                        <td><?php echo $row['Hoofdstad']; ?></td>
                        <td><?php echo $row['Werelddeel']; ?></td>
                        <td><?php echo $row['Inwoners']; ?></td>
                    </tr>
                    <?php
                endwhile;
            }
            echo '<tr><th colspan="4">Aantal records : ' . $res->num_rows . '</th></tr>';
            ?>
        </table>
    </section>
    <footer>
        &copy Yarne Decuyper
    </footer>
</body>
</html>


