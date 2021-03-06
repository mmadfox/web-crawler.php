<?php
namespace Madfox\WebCrawler\Http\Transfer;

use Madfox\WebCrawler\Http\Response;
use Madfox\WebCrawler\Url\Url;

class Buzz extends AbstractTransfer implements TransferInterface
{
    /**
     * @var \Buzz\Browser
     */
    private $client;

    public function __construct()
    {
        $this->client = new \Buzz\Browser(new \Buzz\Client\Curl());
    }

    /**
     * @param Url $url
     * @return Response
     */
    public function get(Url $url)
    {
        $res = $this->client->get($url->toString());
        $line = explode(";", $res->getHeader('Content-Type'));
        $contentType = isset($line[0]) ? trim($line[0]) : "text/html";
        return new Response($res->getContent(), $res->getStatusCode(), $contentType);
    }
}