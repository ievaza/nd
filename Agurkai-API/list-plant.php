<?php foreach ($store->getAll() as $darzove): ?>
    <?php if ($darzove->name == 'Agurkas'): ?>
        <div class="row darzoves">
        <div class="cucumber" > <img src="img/agurkas.jpg" alt="agurkas" ></div>
        <div class="nr"> Agurkas nr. <?= $darzove->id ?></div> 
        <div class="count" > Agurkų: <?= $darzove->count ?> </div> 
        <button class="sumbit" type="button" name="rauti" value="<?= $darzove->id ?>">Išrauti</button>
        </div>
    <?php elseif ($darzove->name == 'Pomidoras'): ?>
        <div class="row darzoves">
        <div class="cucumber" > <img src="img/tomato.jpg" alt="pomidoras" ></div>
        <div class="nr"> Pomidoras nr. <?= $darzove->id ?></div> 
        <div class="count" > Pomidorų: <?= $darzove->count ?> </div> 
            <button class="sumbit" type="button" name="rauti" value="<?= $darzove->id ?>">Išrauti</button>
        </div>
    <?php endif ?>
<?php endforeach ?>