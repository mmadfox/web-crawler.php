<?php
namespace Madfox\WebCrawler\Site;

class Page
{
    private $url;
    private $links = [];
    private $content;
    private $id;

    public function __construct(Url $url, array $links = [], $content = "")
    {
        $this->links = $links;
        $this->url = $url;
        $this->content = $content;
        $this->id = $url->getId();
    }

    public function id()
    {
        return $this->id;
    }

    public function url()
    {
        return $this->url;
    }

    public function links()
    {
         return $this->links;
    }

    public function content()
    {
         return $this->content;
    }


}