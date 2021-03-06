<?php
namespace Madfox\WebCrawler\Indexer;

use Madfox\WebCrawler\Contentable;
use Madfox\WebCrawler\Url\Url;

interface IndexerInterface
{
    /**
     * @param Url $url
     * @return mixed
     */
    public function has(Url $url);

    /**
     * @param Url $url
     * @param Contentable $content = null
     * @return Index
     * @throws \Madfox\WebCrawler\Exception\RuntimeException
     */
    public function add(Url $url, Contentable $content = null);

    /**
     * @param Url $url
     * @return bool
     */
    public function remove(Url $url);

    /**
     * @param Url $url
     * @return mixed
     */
    public function get(Url $url);

    /**
     * @return bool
     */
    public function purge();

}