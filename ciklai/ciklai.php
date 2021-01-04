<h1> 1 užduotis </h1>

<?php
echo 'a) kad visos * tilptu ekrane<br>';
$stars ='';
for ($a = 1 ; $a <=420 ; $a ++){
$stars .= '*';
}
echo '<p style="line-break: anywhere;">' .$stars. '</p>';

echo 'b) suskldyti *, kad vienoje eiluteje nebutu daugiau 50*<br>';

echo chunk_split($stars, 50)."\n";


 ?>

<h1> 2 užduotis </h1>
 <?php
$item = 300;
$count = 0;
for ( $b = 0 ; $b <=$item ; $b++ ){
    $c = rand(0,300);
     if ( $c > 275){
        echo "<span style='color:red;'>  $c </span>";
    } else echo $c.' ' ;
    if ($c>150)$count++;
}
 echo "<br> skaiciu didesniu uz 150 yra: $count ";

 ?>
  <h1> 3 užduotis </h1>

 <?php

// $to = rand (3000,4000);
// $rez = '';    
// for ( $k= 1; $k<$to ; $i++){
//     if ($k% 77 === 0){
//         $rez .= $k. ', ';
//     }       
// }
// $lastSymbol = substr($rez, 0 , -2); //rtrim($rez, ', ');
// echo $lastSymbol;



 ?>
  <h1> 4 užduotis </h1>

 <?php
 $lineheight = 10;
 $line = '';
 $s = '*';

  for ($j = 1 ; $j <=$lineheight ; $j++ ){
      for ($m =1; $m <=$lineheight; $m++)
          $line .= "<span style='line-height: 8px;'>$s</span>"; // or margin :5px
          $line .= '<br>';
      }
      echo $line;

// $lineLength = 10;
// $line = '';
// $simbolis = '*';

// for ($k= 1; $k<= $lineLength; $k++) {
//     $line .= "<span style='display: inline-block; height: 10px; width: 10px;'>$simbolis</span>";
    
// }
// for ($k= 1; $k<= $lineLength; $k++){
//     echo $line . '<br>';
// }

 ?>
  <h1> 5 užduotis </h1>

 <?php

$lineheight = 10;
 $line = '';
 $s = '*';
 $min= 1;
 $max =10;

  for ($j = 1 ; $j <=$lineheight ; $j++ ){
      for ($m =1; $m <=$lineheight; $m++){
      if ($j == $m ){
          $line .= "<span style='line-height: 8px; color:red'>$s</span>";
      }else if ($j == $min && $m == $max ){
           $line .= "<span style='line-height: 8px; color:red'>$s</span>";   
           $min++;
           $max--;
      } 
      else
          $line .= "<span style='line-height: 8px;'>$s</span>"; // or margin :5px
          }
          $line .= '<br>';
          
      }
      echo $line;

 ?>
  <h1> 6 užduotis </h1>

 <?php

 // stabdom cikla, kai iskrenta herbas
 // 0 - herbas, 1 - skaicius

 $obverse = rand (0,1);
 $reverse =rand (0,1);

$coin = rand(0,1);
while ($coin == 1){
    echo 'S <br>';
    $coin = rand(0,1);
}
echo 'H <br>';
echo '----------------<br>';


$coin = rand(0,1);
$countBlazon = 0;
while ($countBlazon < 3){
    if ($coin == 0){
    echo "H <br>";
    $countBlazon++;
} else
echo 'S <br>';
$coin = rand(0,1);
}

echo '----------------<br>';


$coin = rand(0,1);
$countBlazon = 0;
$first = '';
$second = '';
$third = '';


$coin = rand(0,1);


echo 'PABAIGTI----------------<br>';



 ?>
  <h1> 7 užduotis </h1>

 <?php

$petras = rand (10,20);
$kazys = rand (5 ,25);

$pointPetras = 0;
$pointKazys = 0;

while ($pointKazys <222 && $pointPetras <222){
    $pointPetras += $petras;
    $pointKazys += $kazys;
    echo "Petras turi $pointPetras <br>";
    echo "Kazys turi $pointKazys <br>";
    echo '-----------<br>';
    $petras = rand (10,20);
    $kazys = rand (5 ,25);
}
  if ( $pointKazys < $pointPetras){
        echo 'Laimejo Petras <br>';
    } else {
        echo 'Laimejo Kazys';
    }
 
 ?>
  <h1> 8 užduotis </h1>

 <?php


// $height = 21;
// $diamond = '';
// $space = '&nbsp&nbsp';
// $spacecount = 10;
// $symbol = '*';
// $bottom = 21;



//   for ($j = 1 ; $j <= $height ; $j++ ){
//       $r = rand (0,255);
//         $b = rand (0,255);
//     $g = rand (0,255);
//       if ($j < 12){
//           $diamond .=  str_repeat ($space, $spacecount );
//           $diamond .=  str_repeat ("<a style = 'color: rgb($r,$g,$b)';>$symbol</a>", 2 * $j-1);
//           $spacecount--;

//         }
//         if ( $j >= 12 ){
//         $spacecount++;
//         $diamond .= $space;
//         $diamond .=  str_repeat ($space, $spacecount );
//         $diamond .=  str_repeat ($symbol, 2 * $bottom -1);
  
//         }
//         $diamond .= '<br>';
//         $bottom--;

//   }
//   echo $diamond;

$r = rand(0, 255);
$g = rand(0, 255);
$b = rand(0, 255);
for ($i = 0; $i < 21 / 2; $i++) {​​​​​
    echo str_repeat ('&nbsp&nbsp', 11 - $i -1).str_repeat("<span style= color:rgb($r,$g,$b);</span>",$i*2+1);
echo '<br>';
}​​​​​
for ($i = 20 / 2; $i > 0; $i--) {​​​​​
echo str_repeat('&nbsp&nbsp', 12 - $i - 1).str_repeat("<span style=color:rgb($r,$g,$b);>*</span>", $i * 2 - 1);
echo '<br>';
}​​​​​
  
 ?>
  <h1> 9 užduotis </h1>

 <?php

 $time = -microtime(true);
 for ($s = 1 ; $s <=1000000; $s++){
     $c = "10 bezdzioniu suvalge 20 bananu.";
 }
 $time += microtime(true);

 $time2 = -microtime(true);
 for ($z = 1 ; $z <=1000000; $z++){
     $v = '10 bezdzioniu suvalge 20 bananu.';
 }
 $time2 += microtime(true);

echo "Stringas dvigubose kabutese uztruko: ", sprintf('%f', $time);
echo "<br> Strignas viengubose kabutese uztruko: ", sprintf('%f', $time2);

 ?>
  <h1> 10 užduotis </h1>

 <?php

echo "a) <br>";

 $ilgis = 85;
 $ikale = $KiekIkalemm =  $uzsimojo =  0;

 while ($ikale != 5){
     while ($KiekIkalemm <= $ilgis){
      
        $KiekIkalemm += rand(5,20); 
        $uzsimojo++;
        
     }  
     echo "Viso uzsimojimu:  $uzsimojo <br>"; 
     $KiekIkalemm = 0;
     $ikale++;
     
 }
   echo "uzsimojo $uzsimojo<br>";
   echo 'b) <br>';

   $ilgis = 85;
    $ikale = $KiekIkalemm =  $uzsimojo = $smugiai= $nepataike= $pateika =  0;

 while ($ikale != 5){
     while ($KiekIkalemm <= $ilgis){
        $smugiai = rand(0,1);
        if ($smugiai == 0){
        $KiekIkalemm += rand(20,30); 
        $uzsimojo++;  
        $pateika++;
        }
        else {
             $uzsimojo++;  
             $nepataike++;
        }
     }  
     echo "Viso uzsimojimu:  $uzsimojo <br>
     nepataike $nepataike <br>
     pataike $pateika<br>"; 
     $KiekIkalemm = 0;
     $ikale++;
     
 }
   echo "uzsimojo $uzsimojo<br>"; 
     
 ?>
  <h1> 11 užduotis </h1>

 <?php


$kazkas = substr(str_shuffle(range(1,200)),0,50) ;
echo $kazkas;








