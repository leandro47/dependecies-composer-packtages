<?php

namespace Leandro47\FetchCursesAlura;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class FetchCurses
{
    private ClientInterface $client;
    private Crawler $crawler;

    public function __construct(ClientInterface $client, Crawler $crawler)
    {
        $this->crawler = $crawler;
        $this->client = $client;
    }

    public function fetch(string $url): array
    {
        $response = $this->client->request('GET', $url);
        $html = $response->getBody();
        $this->crawler->addHtmlContent($html);

        $elements = $this->crawler->filter('span.card-curso__nome');

        $curses = [];
        foreach ($elements as $element) {
            $curses[] = $element->textContent;
        }

        return $curses;
    }
}
