<?php

$a = 0; // int
$a = 1.2; // float
$a = "hello world"; // string
$a = [1, 2, 3]; // array
$a = [
    "a" => 1,
    "b" => 2,
    "c" => 3,
];

$a = function () {
  echo 123;
}; // callable
$a(); // 123

$a = new Exception();
$a = fopen("");
$a = true;
$a = null;

$i=0;
for (; $i< 10; ) {
    echo 123;
    $i++;
}

foreach ($a as $key => $value) {
    var_dump($key, $value);
}

while (true) {
    echo 123;
}

//do {
//    echo  123;
//} while(true);

function($a, $b = 123, $c = 123)  {
    return 123;
}
