<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nd9</title>
</head>
<style>
body {
        
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST'):?>
    background: white;
        color:black;
        <?php else: ?>
        background: black;
        color:white;
}
label {
        color:red;
}


</style>
<body>

<form action="" method="post">

<?php $countAll= rand(3,10)?>
<?php foreach(range('A','K') as $key => $checkbox): ?> 
<?php if ($key == $countAll) break; ?>
<input type="checkbox" name="box[] ?? 0"> <label> <?= $checkbox ?></label>
        
<?php endforeach ?>
<input type="hidden" name="agurkas" value="<?= $countAll ?>">
<button type="submit" > GO</button>

</form>
<?php endif ?>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
VISO: <?= count($_POST['box'] ?? [] ) ?> is <?= $_POST['agurkas'] ?>
<?php endif ?>

</body>
</html>

