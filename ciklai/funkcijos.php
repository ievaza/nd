<h1> 1 užduotis </h1>
<?php
//Parašykite funkciją, kurios argumentas būtų tekstas, kuris yra įterpiamas į h1 tagą;


$string = 'Laba diena';

function outputText($string){
   return "<h1 style='display:inline;'>$string</h1>";
}
echo outputText($string);
echo outputText('oho');
// kuris uzrasymas teisingas

?>
<h1> 2 užduotis </h1>
<?php
//Parašykite funkciją su dviem argumentais, pirmas argumentas tekstas, įterpiamas į h tagą, o antrasis tago numeris (1-6). Rašydami šią funkciją remkitės pirmame uždavinyje parašytą funkciją;

function outputTwoPar ($text, $nr){
    if ($nr > 6 || $nr < 1) echo "I antra parametra galima irasyti skaicius nuo 1 iki 6";
     else echo "<h$nr> $text </h$nr>";
}
outputTwoPar('Labas dar karta',3);

?>
<h1> 3 užduotis </h1>
<?php
//Generuokite atsitiktinį stringą, pasinaudodami kodu md5(time()). Visus skaitmenis stringe įdėkite į h1 tagą. Jegu iš eilės eina keli skaitmenys, juos į tagą reikią dėti kartu (h1 atsidaro prieš pirmą ir užsidaro po paskutinio) Keitimui naudokite pirmo uždavinio funkciją ir preg_replace_callback();


echo '<pre>';
$str = md5(time());
echo $str.'<br>';
// preg_match_all('/\d+/', $str, $matches,PREG_PATTERN_ORDER);
// print_r($matches);

//     foreach ($matches as $second){
//          outputText($second); 
//          }
    
   
    $newStr = preg_replace_callback('/\d+/', 
        function($matches){
            return outputText($matches[0]);
        }, $str
    );
    echo $newStr;

//     $stringas = md5(time());
// function stringoKeitimas($stringas){
//     echo preg_replace('/\d+/', outputText("$0"), $stringas);
// }
// stringoKeitimas($stringas);
  
// ?>
<h1> 4 užduotis </h1>
<?php
//Parašykite funkciją, kuri skaičiuotų, iš kiek sveikų skaičių jos argumentas dalijasi be liekanos (išskyrus vienetą ir patį save) Argumentą užrašykite taip, kad būtų galima įvesti tik sveiką skaičių;


function dividers ($argum){
 
        if(is_int($argum)){
            $count=0;
            $i=2;
         while($i < $argum) {
            if($argum%$i==0) $count++; 
            $i++;
        }  return $count;
        } else echo 'Put an integer';
}
echo dividers(20);

?>
<h1> 5 užduotis </h1>
<?php
//Sugeneruokite masyvą iš 100 elementų, kurio reikšmės atsitiktiniai skaičiai nuo 33 iki 77. Išrūšiuokite masyvą pagal daliklių be liekanos kiekį mažėjimo tvarka, panaudodami ketvirto uždavinio funkciją.

// echo '<pre>';

$masyvas=[];
$rez=[];

foreach (range(0,10) as $value){
    $masyvas[]=rand(33,77);
}
$dalikliai = [];
foreach ($masyvas as $key => $value){
        $sk = dividers($value);
        $dalikliai[] = $sk;  
}
print_r($masyvas);
asort($dalikliai);
print_r($dalikliai);

$rezul = [];

foreach ($dalikliai as $key => $value){
        $rez[]=$masyvas[$key];
}
print_r($rez);


?>
<h1> 6 užduotis </h1>
<?php
//Sugeneruokite masyvą iš 100 elementų, kurio reikšmės atsitiktiniai skaičiai nuo 333 iki 777. Naudodami 4 uždavinio funkciją iš masyvo ištrinkite pirminius skaičius.


function remove (&$arr, $key){
    unset($arr[$key]);
}

$array = [];
foreach (range(0,10) as $value){
    $array[]+=rand(333,777);
}
print_r($array);

foreach($array as $key => $index){
    if(dividers($index)==0){
        remove($array,$key);
    }
}
print_r($array);
 
?>
<h1> 7 užduotis </h1>
<?php
//Sugeneruokite atsitiktinio (nuo 10 iki 20) ilgio masyvą, kurio visi, išskyrus paskutinį, elementai yra atsitiktiniai skaičiai nuo 0 iki 10, o paskutinis masyvas, kuris generuojamas pagal tokią pat salygą kaip ir pirmasis masyvas. Viską pakartokite atsitiktinį nuo 10 iki 30  kiekį kartų. Paskutinio masyvo paskutinis elementas yra lygus 0;


// array_key_last

// function kuriammasyva ($kiekmasyvu){
//     global $masyvas = [];
//     foreach (range(1,10) as $arr){
//         $masyvas[]=rand(1,5);
//     }

//     // echo $kiekmasyvu;
//     if ($kiekmasyvu<3){
//           $masyvasmini = [];
//           foreach(range(1,5) as $index){
//             $masyvasmini[] = rand(5,10);
//            }
//     // print_r($masyvas);
//     $kiekmasyvu++;
//     $nr = array_key_last($masyvas);
//     $masyvas[$nr]= $masyvasmini;
//     kuriammasyva($kiekmasyvu);

//     }
   
//     print_r ($masyvas);
// }

// kuriammasyva(1);





//         $masyvas = [];
       
//         for ( $i = 0; $i < 5; $i++ ){
//               $masyvas[$i]=[];
//                 foreach(range(1,5) as $index){
//              $masyvas[$i] = rand(5,10);
//             }
//         $nr = array_key_last($masyvas);
//         $masyvas[$nr] = $masyvasbigger;
//         }
    

//     }

//     print_r($masyvas) ;



//  BigArray(1); 

// $masyvas1 = [];
// foreach(range(1,5) as $index){
//     $masyvas1[] = rand(5,10);
// }
// $nr = array_key_last($masyvas1);
// $masyvas1[$nr]=$masyvas;
// print_r ($masyvas1);


// $array = [];
// $rand = rand(8, 10);
// for ($i = 0; $i < $rand; $i++) {
//     $array[$i] = [];
//     $rand2 = rand(10, 30);
//     for ($u = 0; $u < $rand2; $u++) {
//         if ($i == $rand - 1 && $u == $rand2 - 1) {
//             array_push($array[$i], 0);
//         } elseif ($u == $rand2 - 1) {
//             array_push($array[$i], $array[$i][0]);
//         } else {
//             array_push($array[$i], rand(0, 10));
//         }
//     }
// }
// print_r($array);





?>
<h1> 8 užduotis </h1>
<?php
//Suskaičiuokite septinto uždavinio elementų, kurie nėra masyvai, sumą.

?>
<h1> 9 užduotis </h1>
<?php
//Sugeneruokite masyvą iš trijų elementų, kurie yra atsitiktiniai skaičiai nuo 1 iki 33. Jeigu tarp trijų paskutinių elementų yra nors vienas ne pirminis skaičius, prie masyvo pridėkite dar vieną elementą- atsitiktinį skaičių nuo 1 iki 33. Vėl patikrinkite pradinę sąlygą ir jeigu reikia pridėkite dar vieną elementą. Kartokite, kol sąlyga nereikalaus pridėti elemento. 

$array9 = [];

foreach (range(1,3) as $value){
    $array9[] = rand(10,33);
}
print_r($array9);

foreach( $array9 as $value){
    $count = 0;
    
    while ($count != 3){
        $arrlenght = count($array9);
       $last = $array9[$arrlenght-1];
       $beforelast = $array9[$arrlenght-2];
       $beforebeforelast = $array9[$arrlenght-3];

            $count=0;
             if (dividers($last)==0){
                 $count++;
             } else {
                 foreach(range(1,1) as $index){
                 $array9[]=rand(1,31);}}

        if (dividers($beforelast)==0){
                 $count++;
             } else {
                 foreach(range(1,1) as $index){
                 $array9[]=rand(1,31);}}

          if (dividers($beforebeforelast)==0){
                 $count++;
             } else {
                 foreach(range(1,1) as $index){
                 $array9[]=rand(1,31);}}
} 
}
print_r ($array9);

?>
<h1> 10 užduotis </h1>
<?php
//Sugeneruokite masyvą iš 10 elementų, kurie yra masyvai iš 10 elementų, kurie yra atsitiktiniai skaičiai nuo 1 iki 100. Jeigu tokio masyvo pirminių skaičių vidurkis mažesnis už 70, suraskite masyve mažiausią skaičių (nebūtinai pirminį) ir prie jo pridėkite 3. Vėl paskaičiuokite masyvo pirminių skaičių vidurkį ir jeigu mažesnis nei 70 viską kartokite. 


$arr10 = [];

foreach(range(1,10) as $index => $arr){
    foreach(range(1,10) as $value){
        $arr10[$index][] = rand(1,100);
     }
    }
 print_r($arr10);

function avarage ($arr){
    $piece = $sum = 0;
    foreach($arr as $index => &$array){
          foreach($array as $num => $value)
        if (dividers($value)==0){
            $piece++;
            $sum+=$value;}
    }
    echo "Array sum $sum<br>";
    echo "Piece of array $piece <br>";
    if ($piece!=0){
   $avarage = $sum / $piece;      
    }         
    echo 'Avarage of array: '.$avarage.'<br>';
    if($avarage<50){
        $newarr = minval($arr);
        avarage($newarr);
    }
    // return $avarage;
    };
    //  NULUZTA KAI NERA NEI VIENO PIRMINIO SK, REIKIA VALIDACIJOS

    function minval($arr){
        $min = $arr[0][0];
        foreach($arr as $index => $array){
            foreach($array as $num => $value){
                if ($value < $min){
                    $min = $value;
                    $x = $index;
                    $y= $num;
                }
            }          
        }
          $arr[$x][$y]+=3;
          print_r ($arr);
        //  echo "[$x][$y]musu key<br>";
        return $arr; 
    }
  avarage($arr10);
  
  ?>
<h1> 11 užduotis </h1>
<?php




 


   



    

    
    
 
    // if ($avarage<70){
    //     $min = min($arr);
    //      $key = array_search($min, $arr);
    //     $min+=3; 
    // }
    // echo $key.'key <br>';
    // echo $min;
    // return $avarage;

// echo avarage($masyvas);

// print_r($arr10);

