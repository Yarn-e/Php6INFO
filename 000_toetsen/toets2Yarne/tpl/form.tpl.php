<?php
if (!defined('LOADED')) {
    die;
}
?>

<!DOCTYPE html
    <html>
<head>
    <meta charset="utf-8">
    <meta name="author" content="Yarne Decuyper">
    <link href="/yarne/css/style.css" rel="stylesheet" type="text/css">
    <link href='http/fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <style>
        .links {
            position: relative;
            clear: left;
            float: left;
            width: 150px;
            margin-right: 5px;
            line-height: 1.4em;
            text-align: right;
        }
        label {
            position: inherit;
            clear: none;
            float: none;
            width: inherit;
        }
    </style>
    <title>Toets PHP_SELF</title>
</head>
<body>
    <header>
        <h1>Toets PHP_SELF</h1>
    </header>
    <section>
        <form name="f" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <p>
                <label class="links <?php foutstijl($fouten, 'achternaam'); ?>" for="achternaam">Achternaam:</label>
                <input type="text" name="achternaam" id="achternaam" value="<?php echo $data['achternaam']; ?>">
            </p>
            <p>
                <label class="links <?php foutstijl($fouten, 'voornaam'); ?>" for="voornaam">Voornaam:</label>
                <input type="text" name="voornaam" id="voornaam" value="<?php echo $data['voornaam']; ?>">
            </p>
            <p>
                <label class="links <?php foutstijl($fouten, 'geboortedatum'); ?>" >Geboortedatum</label>
                <select name="dag">
                    <?php foreach ($days as $day): ?>
                        <?php if (($day == $data['dag'])): ?>
                            <option value="<?php echo $day; ?>" selected><?php echo $day; ?></option>
                        <?php else: ?>
                            <option value="<?php echo $day; ?>"><?php echo $day; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                <select name="maand">
                    <?php foreach ($months as $month): ?>
                        <?php if (($month == $data['maand'])): ?>
                            <option value="<?php echo $month; ?>" selected><?php echo $month; ?></option>
                        <?php else: ?>
                            <option value="<?php echo $month; ?>"><?php echo $month; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                <select name="jaar">
                    <?php foreach ($years as $year): ?>
                        <?php if (($year == $data['jaar'])): ?>
                            <option value="<?php echo $year; ?>" selected><?php echo $year; ?></option>
                        <?php else: ?>
                            <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </p>
            <p>
                <span class="links <?php foutstijl($fouten, 'soorteten'); ?>" >Favoriet eten</span> 
                <input type="checkbox" name="eten1" id="smf" value="Steak met friet" <?php if(!empty($_POST['eten1'])): ?>checked <?php endif; ?>>
                <label for="smf">Steak met friet</label><br/>
                <span class="links">&nbsp;</span>
                <input type="checkbox" name="eten2" id="pizza" value="Pizza" <?php if(!empty($_POST['eten2'])): ?>checked <?php endif; ?>>
                <label for="pizza">Pizza</label><br/>
                <span class="links">&nbsp;</span>
                <input type="checkbox" name="eten3" id="pita" value="Pita" <?php if(!empty($_POST['eten3'])): ?>checked <?php endif; ?>>
                <label for="pita">Pita</label>
            </p>
            <p>
                <label class="links <?php foutstijl($fouten, 'quote'); ?>" for="quote">Favoriete quote:</label>
                <textarea id="quote" name="quote" rows="5" cols="20"><?php echo $data['quote']; ?></textarea>
            </p>
            <p>
                <label class="links <?php foutstijl($fouten, 'niveau'); ?>" for="niveau">Hoogste niveau studies</label> 
                <select name="niveau" id="niveau" size="3">
                    <option value="Secundair" <?php if($data['niveau'] == 'Secundair'): ?>selected <?php endif; ?>>Secundair Onderwijs</option>
                    <option value="Hoger" <?php if($data['niveau'] == 'Hoger'): ?>selected <?php endif; ?>>Hoger Onderwijs</option>
                    <option value="Universitair" <?php if($data['niveau'] == 'Universitair'): ?>selected <?php endif; ?>>Universitair Onderwijs</option>
                </select>
            </p>
            <p>
                <span class="links <?php foutstijl($fouten, 'geslacht'); ?>" >Aanspreekvorm:</span>
                <input type="radio" value="Man" name="geslacht" id="man" <?php if($data['geslacht'] == 'Man'): ?>checked<?php endif; ?>>
                <label for="man">Man</label>
                <input type="radio" value="Vrouw" name="geslacht" id="vrouw" <?php if($data['geslacht'] == 'Vrouw'): ?>checked<?php endif; ?>>
                <label for="vrouw">Vrouw</label>
            </p>
            <p>
                <input type="submit" class="centreren" value="Versturen">
            </p>
        </form>

        <?php if (count($fouten)): ?>
            <?php include('./tpl/error.tpl.php'); ?>
        <?php endif; ?>

        <?php
        include(__DIR__ . '/../../../inc/footer.php');
        