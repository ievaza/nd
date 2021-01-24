<?php foreach($store->getAll() as $darzove): ?>
    <?php if ($darzove->name == 'Agurkas'):?>
        <div class="row darzoves">
            <div class="cucumber" > <img src="img/agurkas.jpg" alt="agurkas" ></div>
            <div class="nr"> Agurkas nr. <?= $darzove->id ?></div> 
            <div class="count" > Agurkų: <?= $darzove->count ?> </div> 
            <div class="count">+<?= $darzove->kiekAugti ?></div>
        </div>

        <?php elseif ($darzove->name == 'Pomidoras'): ?>
        <div class="row darzoves">
            <div class="cucumber" > <img src="img/tomato.jpg" alt="pomidoras" ></div>
            <div class="nr"> Pomidoras nr. <?= $darzove->id ?></div> 
            <div class="count" > Pomidoru: <?= $darzove->count ?> </div> 
            <div class="count">+<?= $darzove->kiekAugti ?></div>
        </div>  
    <?php endif ?>
    <?php endforeach ?>