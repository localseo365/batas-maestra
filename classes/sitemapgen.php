<?php
    function sitemapGenerate(){
        try{
            $categorias = [];
            $ficheros = scandir("productos");
            foreach($ficheros as $fichero):
                if($fichero != '.' && $fichero != '..'):
                    $json = json_decode(file_get_contents("productos/".$fichero));
                    if(is_array($json)):
                        array_push($categorias, str_replace(".json", "", $fichero));
                    endif;
                endif;
            endforeach;
            $start = '<?xml version="1.0" encoding="UTF-8"?>
            <?xml-stylesheet type="text/xsl" href=""?>
            <urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
                ';
            $archivo = fopen("sitemap.xml", "w+");
            fwrite($archivo, $start);
            fwrite($archivo, "<url>
                    <loc>".URL."</loc>
                    <lastmod>".date('Y-m-d')."T".date('H:i:s')."+00:00</lastmod>
                </url>");
            foreach($categorias as $url):
            $linea = "<url>
                    <loc>".URL."$url/</loc>
                    <lastmod>".date('Y-m-d')."T".date('H:i:s')."+00:00</lastmod>
                </url>";
            fwrite($archivo, $linea);
            endforeach;
            fwrite($archivo, "</urlset>");
            fclose($archivo);
            return true;
        }catch(Exception $e){
            return $e->getMessage;
        }
    }



?>