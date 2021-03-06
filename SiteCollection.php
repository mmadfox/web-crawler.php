<?php
namespace Madfox\WebCrawler\Site;

use Madfox\WebCrawler\Url\Url;

class SiteCollection implements \IteratorAggregate, \Countable
{
    /**
     * @var Site[]
     */
    private $sites = [];

    /**
     * @construct
     */
    public function __construct()
    {
        $this->sites = [];
    }

    /**
     * @param Site $site
     */
    public function add(Site $site)
    {
        $id = $site->getUrl()->host();
        unset($this->sites[$id]);

        $this->sites[$id] = $site;
    }

    /**
     * @param Url $url
     * @return Site|null
     */
    public function get(Url $url)
    {
        return isset($this->sites[$url->host()])
               ? $this->sites[$url->host()]
               : null;
    }

    /**
     * @return null|Url
     */
    public function random()
    {
        $index = array_rand($this->sites, 1);
        return isset($this->sites[$index]) ? $this->sites[$index] : null;
    }

    /**
     * @param Url $url
     * @return bool
     */
    public function has(Url $url)
    {
        $site = $this->get($url->host());
        return $site ? true : false;
    }

    /**
     * @return array|Site[]
     */
    public function all()
    {
        return $this->sites;
    }

    /**
     * @param Url $url
     */
    public function remove(Url $url)
    {
        unset($this->sites[$url->host()]);
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->sites);
    }

    /**
     * @return \ArrayIterator|\Traversable
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->sites);
    }
}