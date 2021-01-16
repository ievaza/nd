 <?php foreach( $store->getAll() as $agurkas): ?>
    <div class="agurkas">
    Agurkas nr. <?= $agurkas->id ?>
    Agurkų: <?= $agurkas->count ?>
    <button type="button" name="rauti" value="<?= $agurkas->id ?>">Išrauti</button>
    </div>
    <?php endforeach ?>
    


