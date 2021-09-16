<?php

require_once "vendor/autoload.php";

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client();
$response = $client->request('GET', 'https://www.alura.com.br/cursos-online-programacao');

$html = $response->getBody();

$crawler = new Crawler();
$crawler->addHtmlContent($html);

$curses = $crawler->filter('span.card-curso__nome');

foreach ($curses as $curse) {
    echo $curse->textContent . PHP_EOL;
}
