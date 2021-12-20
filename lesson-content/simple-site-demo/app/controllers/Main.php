<?php

namespace App\Controllers;

use Framework\View;
use PDO;

class Main
{
    private View $view;
    private PDO $connection;

    /**
     * @param $view
     */
    public function __construct(View $view, PDO $conn)
    {
        $this->view = $view;
        $this->connection = $conn;
    }

    public function demo($arg1, $arg2) {
        dd($arg2);
    }

    public function index() {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://blockchain.info/ticker');
        $ticker = json_decode($response->getBody()->getContents(), true);
        $usdPrice = $ticker['USD']['last'];

        $stm = $this->connection->query("SELECT * FROM posts LIMIT 5");
        $rows = $stm->fetchAll();

        $content =       $this->view->render("layout/base", [
            'bitcoinPrice' => $usdPrice,
            'content' => $this->view->render("layout/content", [
                'rows' => $rows
            ]),
        ]);

        echo $content;
    }
}