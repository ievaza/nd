<?php foreach($store->getAll() as $darzove): ?>
    <form action="" method="post">

 <?php if ($darzove->name == 'Agurkas'):?>
    <div class="row darzoves">
    <div class="cucumber"> <img src="img/agurkas.jpg" alt="agurkas" ></div>
    <div class="nr">Agurkas Nr. <?= $darzove->id ?> </div> 
    <?php if ($darzove->count==0): ?>
    <div class="nr ">Negalima skinti agurku</div> 
    <?php else: ?>
        <div class="count "> Galima skinti <?= $darzove->count?></div> 
   
    <input class="kiekis" type="text" name="kiek">
    <button class="two-btn" type="button" name="skinti"  value="<?= $darzove->id?>" >Skinti</button>
    <button class="two-btn" type="button" name="israuti" value="<?= $darzove->id?>" >SKINTI VISUS</button>
    <?php endif ?>
    </div>

    <?php elseif ($darzove->name == 'POmidoras'): ?>
    <div class="row darzoves">
    <div class="cucumber"> <img src="img/tomato.jpg" alt="pomidoras" ></div>
    <div class="nr">Pomidoras Nr. <?= $darzove->id ?> </div> 
    <?php if ($darzove->count==0): ?>
    <div class="nr ">Negalima skinti pomidoru</div> 
    <?php else: ?>
        <div class="count "> Galima skinti <?= $darzove->count?></div> 
   
    <input class="kiekis" type="text" name="kiek">
    <button class="two-btn" type="button" name="skinti"  value="<?= $darzove->id?>" >Skinti</button>
    <button class="two-btn" type="button" name="israuti" value="<?= $darzove->id?>" >SKINTI VISUS</button>
    <?php endif ?>
    </div>
    
    <?php endif ?>
    </form> 
    <?php endforeach ?>
