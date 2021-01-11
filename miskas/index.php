<?php

spl_autoload_register(function($class){
    echo "bandom ieskoti klases:".$class;
include __DIR__.'/Vovere.php'; 

});


include __DIR__.'/Miskas.php';

include __DIR__.'/Lape.php';

include __DIR__.'/Egle.php';
echo 'Sveiki ateje i miska';

echo '<br>';




echo Miskas::$title; //Miskas klases vardas, tai nekintamasis ,
                    // nes neturi $ pries Miskas. Title visada bus
                    // su dolerius, nes jis kintamasis. Kazkas turi but 
                    //kintamasis,kadangi miskas ne kintamasis, tai title lieka kintamuoju

echo '<br>';

// $animal1 = new Lape;
$animal2 = new Egle;

// $animal1->makeNoise();
$animal2->makeBigNoise();

echo($animal2->getTitle());


// var_dump($animal2->getArea());



// echo '<pre>';

// var_dump($animal1);
// echo '<br>';
// var_dump($animal2);