<?php

function handle() {
    // string
    $content = file_get_contents(__DIR__."/../public/categories.txt");
    $arr = explode("\n", $content);

    $arr3 = [];
    $c = count($arr);
    for ($i=0; $i<$c; $i++) {
//                list($key, $value) = explode("=", $arr[$i])
        $tmp = explode("=", $arr[$i]); // $tmp[0], $tmp1[1]
        if (count($tmp) > 1) {
            $key = trim($tmp[0], ",\"'");
            $value = trim($tmp[1], ",\"'");
            $arr3[$key] = $value;
        }
    }

    $content = view(__DIR__."/../layout/base.php", [
        'header' => view(__DIR__."/../layout/header.php", [
            'arr3' => $arr3
        ]),
        'content' => 123,
        'footer' => view(__DIR__."/../layout/footer.php"),
    ]);

    echo $content;
}
