<?php include(__DIR__ . '/../../inc/header.php'); ?>

<img src="./tpl2/remafstand.gif">
<h1>Bereken de stopafstand</h1>
<form name="f" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <p><label class="<?php if ($fout1) echo error ?>" for="snl">Snelheid</label> <input type="text" id="snl" name="snelheid" value="<?php if ($set && !$fout1) echo $snelheid; ?>"> km/u</p>
    <p>Nat wegdek?<br> 
        <input type="radio" name="wegdek" id="ye" value="ja" <?php if ($set && $check && !$fout2) echo "checked"; ?>>
        <label class="<?php if ($fout2) echo "error" ?>" for="ye" >Ja</label><br>
        <input type="radio" name="wegdek" id="nay" value="nee" <?php if ($set && !$check && !$fout2) echo "checked"; ?>>
        <label class="<?php if ($fout2) echo "error" ?>" for="nay" >Nee</label></p>
    <input type="submit" value="doorgaan">    
</form>

<?php if (count($fouten)): ?>
    <?php include('./tpl2/fouten.tpl.php'); ?>
<?php endif; ?>

<?php if ($set && !$fout1 && !$fout2): ?>
    <?php include('./tpl2/resultaat.tpl.php'); ?>
<?php endif; ?>


<?php include(__DIR__ . '/../../inc/footer.php'); ?>