<?php

namespace Framework;

class Application
{
    private string $projectRoot;

    /**
     * @param string $projectRoot
     */
    public function __construct(string $projectRoot)
    {
        $this->projectRoot = $projectRoot;
    }

    /**
     * @return string
     */
    public function getProjectRoot(): string
    {
        return $this->projectRoot;
    }
}