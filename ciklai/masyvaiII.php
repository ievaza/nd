<h1> 1 užduotis </h1>

<?php
echo '<pre>';
$masyvas = array();

foreach (range(0,9) as $arr){
    foreach(range(0,4) as $value)
        $masyvas[$arr][$value]= rand(5,25);
}
print_r($masyvas);

?>

<h1> 2 užduotis </h1>

<?php

echo 'a) Suskaičiuokite kiek masyve yra elementų didesnių už 10: <br>';

$more10 = 0;

foreach ($masyvas as $arr){
    foreach($arr as $value){
        if ($value>10) $more10++;
    }
}
echo $more10;
echo'<br>';
// $more10 = 0;
// for ($i = 0 ; $i <10 ; $i++){
//     for ($j = 0 ; $j<5 ; $j++){
//         if ($masyvas[$i][$j]>10)
// {
//     $more10++;
// }    }
// }

// echo $more10;
echo '<br>b) Raskite didžiausio elemento reikšmę: <br>';

$biggest = 0;
// for ($i = 0 ; $i <10 ; $i++){
//     for ($j = 0 ; $j<5 ; $j++){
//         if ($masyvas[$i][$j]>$biggest)
// {
//     $biggest = $masyvas[$i][$j];
// }    }
// }
// echo $biggest;

foreach ($masyvas as $arr){
    foreach($arr as $value){
        if ($value>$biggest)  $biggest = $value;
    }
}

echo $biggest;

echo '<br>c) Suskaičiuokite kiekvieno antro lygio masyvų su vienodais indeksais sumas:<br>';

$sumvalue = [];
 
foreach ($masyvas as $arr) {
  foreach ($arr as $key=>$value) {
      if (isset($sumvalue[$key])) {
           $sumvalue[$key]+=$value;
      } else
      $sumvalue[$key]=$value;
 
}
}
 print_r($sumvalue );

//  for ($i=0; $i < 5; $i++) 
// echo "$i suma: ", array_sum(array_column($array, "$i")), "<br>";

echo '<br>d) Visus masyvus “pailginkite” iki 7 elementų :<br>';

foreach ($masyvas as $key => $index){
    foreach(range(1,2) as $value){
        $masyvas[$key][]=rand(5,25);
    }
}
print_r($masyvas);    

echo '<br>e) Suskaičiuokite kiekvieno iš antro lygio masyvų elementų sumą atskirai ir sumas panaudokite kaip reikšmes sukuriant naują masyvą. T.y. pirma naujo masyvo reikšmė turi būti lygi mažesnio masyvo, turinčio indeksą 0 dideliame masyve, visų elementų sumai  :<br>';

$sumvalue2 = [];
 
foreach ($masyvas as $id => $arr) {
  foreach ($arr as $value) {
      if (isset($sumvalue2[$id])){
            $sumvalue2[$id]+=$value;
      } else {
          $sumvalue2[$id]=$value;
      }}}
       
 print_r($sumvalue2 );

 ?>

<h1> 3 užduotis </h1>
<?php
//Sukurkite masyvą iš 10 elementų. Kiekvienas masyvo elementas turi būti masyvas su atsitiktiniu kiekiu nuo 2 iki 20 elementų. Elementų reikšmės atsitiktinai parinktos raidės iš intervalo A-Z. Išrūšiuokite antro lygio masyvus pagal abėcėlę (t.y. tuos kur su raidėm).

$masyvas3 = [];

foreach (range(0,9) as $index1){
    foreach ( range(2, rand(2, 20)) as $index2){
        $letter = array_rand(array_flip(range('A','Z')));
        $masyvas3[$index1][] = $letter;   
        sort($masyvas3[$index1]);
    }         
}//neveikia
print_r($masyvas3);

 ?>

<h1> 4 užduotis </h1>
<?php
//Išrūšiuokite trečio uždavinio pirmo lygio masyvą taip, kad elementai kurių masyvai trumpiausi eitų pradžioje.


$masyvas3 = [];
$raides= range('A','Z');

foreach (range(0,9) as $index1){
    foreach ( range(2, rand(2, 20)) as $index2){
        $masyvas3[$index1][] = $raides[rand(0,25)];  
        sort($masyvas3[$index1]);
    }         
}//neveikia
sort($masyvas3); //arba array_multisort;
print_r($masyvas3);

 ?>

<h1> 5 užduotis </h1>
<?php
//Sukurkite masyvą iš 30 elementų. Kiekvienas masyvo elementas yra masyvas [user_id => xxx, place_in_row => xxx] user_id atsitiktinis unikalus skaičius nuo 1 iki 1000000, place_in_row atsitiktinis skaičius nuo 0 iki 100. 

$masyvas5 = [];

foreach(range(0,10) as $index5){
    $masyvas5[$index5]= ['user_id' => rand(1,10000),'place_in_row' =>rand(0,100)]; }
print_r($masyvas5);

 ?>

<h1> 6 užduotis </h1>
<?php
//Išrūšiuokite 5 uždavinio masyvą pagal user_id didėjančia tvarka. Ir paskui išrūšiuokite pagal place_in_row mažėjančia tvarka.


echo "didejancia tvarka pagal user_id";

array_multisort( array_column($masyvas5, 'user_id'), SORT_ASC, $masyvas5 );
print_r($masyvas5);
echo "mazejancia tvarka pagal place_in_row<br>";
array_multisort( array_column($masyvas5, 'place_in_row'), SORT_DESC, $masyvas5 );
print_r($masyvas5);


// rusiavimas
// $mazasmasyvas = [9, -10, 38, 0 ,16];
// function rusiavimas($a, $b)
// {
//     echo "lyginamm $a su $b <br>";
//     return $a<=>$b;
// }
// unsort($mazasmasyvas, 'rusiavimas');
// print_r($mazasmasyvas);



// function cmp($arrA, $arrB)
// {
// $a = $arrA["place_in_row"];
// $b = $arrB["place_in_row"];
// return $b <=> $a; // cia rusiuoja mazejancia tvarka
// return $a <=> $b; // cia rusiuoja didejancia tvarka
// // -1 1 0 
// }
// usort($array, "cmp");
   ?>
<h1> 7 užduotis </h1>
<?php
//Prie 6 uždavinio masyvo antro lygio masyvų pridėkite dar du elementus: name ir surname. Elementus užpildykite stringais iš atsitiktinai sugeneruotų lotyniškų raidžių, kurių ilgiai nuo 5 iki 15.

// function generateRandomString($length ) {
//     $str = range('a','z');

//     $name ='';
//     $surname = '';
//     $name = 


// }
// foreach($masyvas5 as &$user){
//     $user['name'] = generateRandomString;
//     $user['surname'] = 'B';

// }
// print_r($masyvas5);

  ?>

<h1> 8 užduotis </h1>
<?php
//Sukurkite masyvą iš 10 elementų. Masyvo reikšmes užpildykite pagal taisyklę: generuokite skaičių nuo 0 iki 5. Ir sukurkite tokio ilgio masyvą. Jeigu reikšmė yra 0 masyvo nekurkite. Antro lygio masyvo reikšmes užpildykite atsitiktiniais skaičiais nuo 0 iki 10. Ten kur masyvo nekūrėte reikšmę nuo 0 iki 10 įrašykite tiesiogiai.

$masyvas8 = [];

foreach (range(0, 9) as $value) {
    $rand = rand(0, 5);
    if($rand === 0){
        $masyvas8[] = rand(0, 10);
    } else {
        $array8 = [];
        foreach (range(1, $rand) as $value){
            $array8[] = rand(0,10);
        }
        $masyvas8[] = $array8;
    }
}
print_r($masyvas8);

  ?>

<h1> 9 užduotis </h1>
<?php
//Paskaičiuokite 8 uždavinio masyvo visų reikšmių sumą ir išrūšiuokite masyvą taip, kad pirmiausiai eitų mažiausios masyvo reikšmės arba jeigu reikšmė yra masyvas, to masyvo reikšmių sumos.


// function rusiavimas($A, $B)
// {
//     $a = is_array($A) ? array_sum($A) : $A;
//     $B = is_array($B) ? array_sum($B) : $B;
// }
// unsort($masyvas8,'rusiavimas');
// print_r($masyvas8);

//kazkas su unsort negerai


  ?>

<h1> 10 užduotis </h1>
<?php
//Sukurkite masyvą iš 10 elementų. Jo reikšmės masyvai iš 10 elementų. Antro lygio masyvų reikšmės masyvai su dviem elementais value ir color. Reikšmė value vienas iš atsitiktinai parinktų simbolių: #%+*@裡, o reikšmė color atsitiktinai sugeneruota spalva formatu: #XXXXXX. Pasinaudoję masyvų atspausdinkite “kvadratą” kurį sudarytų masyvo reikšmės nuspalvintos spalva color.


$masyvas10 = [];

foreach (ra)






 ?>
 <h1> 11 užduotis </h1>

<?php

do {
    $a = rand(0, 1000);
    $b = rand(0, 1000);
} while ($a == $b);
$long = rand(10,30);
$sk1 = $sk2 = 0;
echo '<h3>Skaičiai '.$a.' ir '.$b.'</h3>';
$c = [];
for ($i=0; $i<$long; $i++) {
    $c[] = array_rand(array_flip([$a, $b]));
}
echo '<h4>Masyvas:</h4>';
echo '<pre>';
print_r($c);
echo '</pre>';