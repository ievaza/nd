<h1> 1 užduotis </h1>

<?php
echo '<pre>';
for ( $a = 0 ; $a <30 ; $a++){
    $masyvas[$a] = rand (5,25);
    print_r($masyvas[$a]);
    echo ' ';
}
echo count($masyvas);

$masyvas0 = [];

foreach (range(0,29) as $value ){
    $masyvas0[$value] = rand(5,25);
}
print_r($masyvas0);
?>

<h1>  2 užduotis </h1>

<?php

echo 'a) Suskaičiuokite kiek masyve yra reikšmių didesnių už 10: <br> ';
$count = 0; 
for ($b = 0 ; $b < 30 ; $b++){
    if ($masyvas[$b] >= 10){
        $count++;
    }
}
echo $count;

// $big10 = 0;
// foreach($masyvas0 as $value){
//     if ($value > 10)
//     $big10++;
// }
// echo $big10.'<br>';

echo '<br >b)  Raskite didžiausią masyvo reikšmę: <br> ';

$max = max($masyvas);
echo $max;

// $maxNum = 0;
// foreach($masyvas0 as $value){
//     if ($value > $maxNum)
//     $maxNum =$value;
// }
// echo $maxNum.'<br>';

echo '<br> c)  Suskaičiuokite visų reikšmių sumą: <br>';
$sum = 0;
for ($c = 0 ; $c < 30 ; $c++){
    $sum += $masyvas[$c];
}
echo $sum;

echo '<br> d) Sukurkite naują masyvą, kurio reikšmės yra 1 uždavinio masyvo reikšmes minus tos reikšmės indeksas: <br>';

for ($d = 0 ; $d < 30 ; $d++){
    $naujas [] = $masyvas[$d] -$d;
    echo $naujas[$d];
    echo ' ';
}

echo '<br> e) Papildykite masyvą papildomais 10 elementų su reikšmėmis nuo 5 iki 25, kad bendras masyvas padidėtų iki indekso 39: <br>';

for ($e = 0 ; $e < 10 ; $e++){
    array_push($masyvas,rand(5,25));
}
print_r($masyvas);
echo '<br>';
echo count($masyvas);

echo '<br> f) Iš masyvo elementų sukurkite du naujus masyvus. Vienas turi būti sudarytas iš neporinių indekso reikšmių, o kitas iš porinių:<br>';

$porinis = [];
$neporinis = [];
for ($f = 0 ; $f < 40 ; $f++) {
    if ($f%2==0){
        $porinis [] += $masyvas[$f];
    } else {
        $neporinis [] += $masyvas[$f];
    }
}
print_r($porinis);
echo '<br>';
print_r($neporinis);

echo ' <br> g) Masyvo elementus su poriniais indeksais padarykite lygius 0 jeigu jie didesni už 15:<br>';
$newrArray = [];
for ($g = 0 ; $g < 40 ; $g++) {
    if ($g%2==0 && $masyvas[$g]>15){    
        $newrArray [$g] = 0 ;
    }
    else 
    $newrArray[$g] = $masyvas[$g];
}
print_r($newrArray);

echo '<br> h) Suraskite pirmą (mažiausią) indeksą, kurio elemento reikšmė didesnė už 10:<br>';
$min = 0;
for ($h = 0; $h < 40 ; $h++){
    if ($masyvas[$h] > 10){
       $min = $h;
       break;
    }
}
echo $min;

echo '<br> i) Naudodami funkciją unset() iš masyvo ištrinkite visus elementus turinčius porinį indeksą: <br>';
$beporiniu = [];
 print_r($masyvas);
 echo '<br><br><br>';
 $g= 0;
while($g < 40){
    unset($masyvas[$g]);
    $g = $g +2;
}
    print_r($masyvas);
    echo'<br><br>';

    ?>

    <h1> 3 užduotis </h1>

<?php

$letter = ['A', 'B', 'C', 'D'];
$letterArray = [];
$A = $B = $C = $D = 0;

for ( $n = 0 ; $n < 10 ; $n++){
    $index = rand(0,3);
    array_push($letterArray,$letter[$index]);
    if ($letter[$index] == "A"){
        $A++;
    } else if ($letter[$index] == "B"){
        $B++;
    } else if ($letter[$index] == "C"){
        $C++;
    } else 
        $D++;
}
print_r($letterArray);
echo "<br> A = $A, B = $B , C = $C , D = $D <br>";

// $my_array_3=[];
// $range = range('A', 'D');
// for($pp = 0; $pp <= 200; $pp++){​​ 
//     $indexo = array_rand($range);
//     $my_array_3[] += $range[$indexo];
// }​​
// print_r($my_array_3); NES IS TEAMS PERRASYTI 

array_push($array0, $randStr[array_rand(range('A', 'D'))]);
print_r($array0);

   ?>

    <h1> 4 užduotis </h1>

<?php

sort($letterArray);
print_r($letterArray);

  ?>

    <h1> 5 užduotis </h1>

<?php

$letter = ['A', 'B', 'C', 'D'];
$array1 = $array2 = $array3 = [];
$unique = 0;
for ( $k = 0 ; $k < 200 ; $k++){
    array_push($array1,$letter[rand(0,3)]);
    array_push($array2,$letter[rand(0,3)]);
    array_push($array3,$letter[rand(0,3)]);
}
for ($v = 0; $v < 200-1 ; $v++){
          if ($array1[$v].$array2[$v].$array3[$v] != $array1[$v+1].$array2[$v+1].$array3[$v+1] ){
              $unique++;
          }
} //ARRAY_UNIQUE GALIME NAUDOTI PASITIKRINTI SU KITAIS
echo "<br> unikaliu  $unique is $v<br>";

  ?>

    <h1> 6 užduotis </h1>

<?php

$masyvas1 = [];
$masyvas2 = [];
while(count($masyvas1) < 100 || count($masyvas2) < 100){
    $ransomNumber = rand(100,999);
    if(count($masyvas1) < 100) {
        in_array($ransomNumber, $masyvas1) ?: array_push($masyvas1, $ransomNumber);
    }
    $ransomNumber = rand(100,999);
    if(count($masyvas2) < 100) {
        in_array($ransomNumber, $masyvas2) ?: array_push($masyvas2, $ransomNumber);
    }
}
print_r($masyvas1);
echo '<br>';
print_r($masyvas2);

  ?>

    <h1> 7 užduotis </h1>

<?php

$NewMasyvas = [];
 for ($p = 0 ; $p < 100 ; $p++){
     if (!(in_array($masyvas1[$p],$masyvas2))){
        array_push($NewMasyvas,$masyvas1[$p]);
     }
 }
 print_r($NewMasyvas);

 ?>

    <h1> 8 užduotis </h1>

<?php
$Masyvas8 = [];
 for ($ii = 0 ; $ii < 100 ; $ii++){
     if (in_array($masyvas1[$ii],$masyvas2)){
        array_push($Masyvas8,$masyvas1[$ii]);
     }
 }
 print_r($Masyvas8);

  ?>

    <h1> 9 užduotis </h1>

<?php

$masyvas9 = [];

for ($jj = 0 ; $jj < 100 ; $jj++){
    $indexx = $masyvas1[$jj];
    $masyvas9[$indexx] = $masyvas2[$jj];
}
print_r($masyvas9);


    ?>

    <h1> 10 užduotis </h1>

<?php
 $pirmas = rand(5,25);
 $antras = rand(5,25);
 $sumArray = [];

 for ($z = 1 ; $z <= 10 ; $z++){
    if ($z == 1 ){
        $sumArray[$z] = $pirmas;
    } else if ($z == 2 ){
        $sumArray[$z] = $antras;
    } else 
    $sumArray[$z]= $sumArray[$z-2]+$sumArray[$z-1];
 }
echo $sumArray[1];
 print_r($sumArray);
 ?>