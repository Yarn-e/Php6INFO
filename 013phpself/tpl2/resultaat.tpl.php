<?php
$remafstand = pow(($snelheid / 10), 2) / 2;
$reactieafstand = $snelheid / 10 * 3;
if ($wegdek == 'ja') {
    $remafstand = $remafstand * 1.5;
}
$stopafstand = $remafstand + $reactieafstand;

$remafstand = round($remafstand, 0);
$reactieafstand = round($reactieafstand, 0);
$stopafstand = round($stopafstand, 0);
?>

<hr>
<p>Bij een snelheid van <b><?php echo $snelheid ?> km/u</b></p>
<ul>
    <li>Je remafstand =  <b><?php echo $remafstand; ?> m</b></li>
    <li>Je reactieafstand = <b><?php echo $reactieafstand ?> m</b></li>
    <li>Je stopafstand = <b><?php echo $stopafstand; ?> m</b></li>
</ul>


