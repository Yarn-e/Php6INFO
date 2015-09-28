<?php include(__DIR__ . '/../../inc/header.php'); ?>

<h1>Overzicht lening op afbetaling</h1>
<hr>
<ul>
    <li>Naam: <?php echo $data['naam']; ?></li>
    <li>Ontleend bedrag: <b><?php echo $data['bedrag']; ?> &euro;</b></li>
    <li>Looptijd: <b><?php echo $data['maand']; ?></b> maand</li>
    <li>Jaarlijks kosten percentage: <b><?php echo $data['percentage']; ?> &percnt;</b></li>
    <li>Maandelijkse aflossing: <b><?php echo $maandaf; ?> &euro;</b></li>
    <li>Totaal terug te betalen bedrag: <b><?php echo $totaalbed; ?> &euro;</b></li>
</ul>
<?php if(isset($_POST['overzicht']) == '1'): ?>
<table>
    <tr>
        <th>maand</th>
        <th>terug te betalen bedrag</th>
        <th>maandelijkse afbetaling</th>
        <th>nog terug te betalen</th>
    </tr>
    <?php for ($i = 1; $i < $data['maand']; $i++): ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $totaalbed - (($i - 1) * $maandaf); ?></td>
        <td><?php echo $maandaf; ?></td>
        <td><?php echo $totaalbed - (($i) * $maandaf); ?></td>
    </tr>
    <?php endfor; ?>
    <tr>
        <td><?php echo $data['maand']; ?></td>
        <td><?php echo $totaalbed - (($data['maand'] - 1) * $maandaf); ?></td>
        <td><?php echo $maandaf; ?></td>
        <td>0</td>
    </tr>
</table>
<?php endif; ?>
<?php include(__DIR__ . '/../../inc/footer.php'); ?>
