<?php foreach ($store->getAll() as $darzove): ?>
    <?php if ($darzove->name == 'Agurkas'): ?>
        <div class="row darzoves">
        <div class="cucumber" > <img src="img/agurkas.jpg" alt="agurkas" ></div>
        <div class="nr"> Agurkas nr. <?= $darzove->id ?></div> 
        <div class="count" > Agurkų: <?= $darzove->count ?> </div> 
        <div class="count"> Kaina EUR: <?= $darzove->kazkas ?> </div>
        <div clsss="count"> USD: <?=round($darzove->count*$rate,2)?></div>
        <button class="sumbit" type="button" name="rauti" value="<?= $darzove->id ?>">Išrauti</button>
        </div>
    <?php elseif ($darzove->name == 'Pomidoras'): ?>
        <div class="row darzoves">
        <div class="cucumber" > <img src="img/tomato.jpg" alt="pomidoras" ></div>
        <div class="nr"> Pomidoras nr. <?= $darzove->id ?></div> 
        <div class="count" > Pomidorų: <?= $darzove->count ?> </div> 
           <div class="count"> Kaina EUR:<?=$darzove->count* $darzove->price ?> </div>
        <div clsss="count">  USD: <?=round($darzove->count*$rate,2)?></div>
            <button class="sumbit" type="button" name="rauti" value="<?= $darzove->id ?>">Išrauti</button>
        </div>
    <?php endif ?>
<?php endforeach ?>