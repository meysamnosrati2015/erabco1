<?php


namespace App\system;


class Application
{
    /**
     * @var string
     */
    private $uri = "/";
    private $url;
    private const ADMIN_ALISE = ADMIN_ALIAS;
    private $adminRequest = false;

    public function __construct()
    {
     $this->processUrl();
     if ($this->adminRequest){
             require_once (ADMIN_PATH.DS.'config/admin_constants.php');
     }else{
         require_once (WEBL_PATH.DS.'config/web_constants.php');
     }
    }

    private function processUrl()
    {
        $_GET['url'] =isset($_GET['url']) ? filter_var(trim($_GET['url'],'/'),FILTER_SANITIZE_URL) : "";
        $url = explode('/',$_GET['url']);

        //TODO ISSET LANGUAGE AND ADMIN
        if ($url[0]==self::ADMIN_ALISE){
            $this->adminRequest = true;
            array_shift($url);
        }

        $sUrl = $_GET['url'];
        //TODO ISSET LANGUAGE AND ADMIN
        if ($this->adminRequest){
          $sUrl = substr($sUrl,strlen(self::ADMIN_ALISE)+1);
        }

        $this->uri = !empty($sUrl) ? $sUrl : $this->uri;
        $this->url = URL . trim($_SERVER['REQUEST_URI'],'/');

    }

}