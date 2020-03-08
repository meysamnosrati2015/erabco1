<?php


namespace App\system;


class Application
{
    /**
     * @var string
     */
    private $uri = "/";
    private $url;

    public function __construct()
    {
     $this->processUrl();
     var_dump($this);
    }

    private function processUrl()
    {
        $_GET['url'] =isset($_GET['url']) ? filter_var(trim($_GET['url'],'/'),FILTER_SANITIZE_URL) : "";
        $url = explode('/',$_GET['url']);

        //TODO ISSET LANGUAGE AND ADMIN
        $sUrl = $_GET['url'];
        //TODO ISSET LANGUAGE AND ADMIN
        $this->uri = !empty($sUrl) ? $sUrl : $this->uri;
        $this->url = URL . trim($_SERVER['REQUEST_URI'],'/');

    }

}