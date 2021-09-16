<?php

require_once "vendor/autoload.php";

use GuzzleHttp\Client;
use Leandro47\FetchCursesAlura\FetchCurses;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client(['base_uri' => 'https://www.alura.com.br/']);
$crawler = new Crawler();

$fetchCurses = new FetchCurses($client, $crawler);
$curses = $fetchCurses->fetch('cursos-online-programacao');

foreach ($curses as $curse) {
    echo $curse . PHP_EOL;
}