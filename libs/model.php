<?php
class Model
{
    public function __construct(){
        $this->db = new Database();
    }
    public function get_domain($url) 
    {
        $url = strtok(trim($url), ' ');
        $url = strtolower(strtok(preg_replace("|^https?://(www.)?|i", "", $url), "/"));
        $url = preg_replace("/\?(.*)/i", "", $url);
        $url = preg_replace("/\#(.*)/i", "", $url);
        $url = str_replace("www.", "", $url);
        $url = preg_replace("/[^a-zA-Z0-9\-\_\.]+/", "", $url);
        $url = trim($url);
        if(substr($url, 0, 1)=='.') {
            $url = substr($url ,1);
        }
        return $url;
    }
}
?>