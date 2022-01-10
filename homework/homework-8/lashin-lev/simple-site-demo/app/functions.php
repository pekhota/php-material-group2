<?php

function view($fileName, array $params = []) {
    ob_start();

    extract($params);

    require $fileName;

    $content = ob_get_contents();
    ob_end_clean();

    return $content;
}

