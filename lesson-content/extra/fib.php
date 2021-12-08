<?php

$cache = [];

function fib($x) {
    global $cache;
    if ($x < 2) {
        return $x;
    }

    if (isset($cache[$x])) {
        return $cache[$x];
    } else {
        $res = fib($x-1) + fib($x - 2);
        $cache[$x] = $res;
    }

    return $res;
}

//    x => 0, 1, 2, 3, 4, 5, 6, 7, 8
// y(x) => 0, 1, 1, 2, 3, 5, 8, 13, 21

// x = 100
//1                        ->y(x) => y(99) + y(98)
//2              ->y(98) + y(97)          |          y(97) + y(96)
//3     ->y(97) + y(96) | y(96) + y(95)   | y(96) + y(95) |  y(95) + y(94)
//4..

echo fib(100);
