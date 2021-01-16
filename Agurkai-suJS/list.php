 <?php foreach( $store->getAll() as $agurkas): ?>
    <div>
    Agurkas nr. <?= $agurkas->ID ?>
    Agurkų: <?= $agurkas->count ?>
    <button type="button" name="rauti" value="<?= $agurkas->ID ?>">Išrauti</button>
    </div>
    <?php endforeach ?>