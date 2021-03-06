<?php
namespace Madfox\WebCrawler\Url\Factory\Strategy;

use Madfox\WebCrawler\Url\Url;
use Madfox\WebCrawler\Url\UrlUtil;

class MergeTwoInstance extends AbstractMerge
{
    /**
     * @param string|Url $url1
     * @param string |Url $url2
     * @return bool
     */
    public function valid($url1, $url2)
    {
        return $url1 instanceof Url
            && $url2 instanceof Url;
    }

    /**
     * @param Url $url1
     * @param Url $url2
     * @return Url
     */
    public function build($url1, $url2)
    {
        $components = [];

        foreach ($this->getUrlMetaMethods() as $method => $key) {
            $val2 = call_user_func(array($url2, $method));
            $val1 = call_user_func(array($url1, $method));

            if (empty($val1)) {
                $components[$key] = $val2;
            } else {
                $components[$key] = $val1;
            }
        }

        $url = UrlUtil::buildUrl($components);

        return $url;
    }
} 