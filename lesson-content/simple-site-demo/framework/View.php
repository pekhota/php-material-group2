<?php

namespace Framework;

class View
{
    private string $defaultViewPath;

    /**
     * @param string $defaultViewPath
     */
    public function __construct(string $defaultViewPath)
    {
        $this->defaultViewPath = $defaultViewPath;
    }

    public function render2() {
        $content = file_get_contents(__DIR__."index.php");
    }

    public function render($fileName, array $params = []) {
        ob_start();

        extract($params);

//        require $this->defaultViewPath."/".$fileName.".php";
        require sprintf("%s/%s.php", $this->defaultViewPath, $fileName);

        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }
}