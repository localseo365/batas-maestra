<?php
    class report_log
    {
        public function __construct(){

        }
        function reportLog($error = null){
            $logFile = fopen("../logs/error_log.txt", 'a') or die("Error creando archivo");
            fwrite($logFile, "\n".date("d/m/Y H:i:s")." $error") or die("Error escribiendo en el archivo");fclose($logFile);
        }
    }
?>