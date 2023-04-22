<?php

function crearCarpeta($carpeta){
	if (!file_exists($carpeta)) {
	    mkdir($carpeta, 0777, true);
	    chmod($carpeta, 0777);
	}
}



function eliminarCarpeta($dir) {
    if(!$dh = @opendir($dir)) return;
    while (false !== ($current = readdir($dh))) {
        if($current != '.' && $current != '..') {
            if (!@unlink($dir.'/'.$current))
                eliminarCarpeta($dir.'/'.$current);
        }
    }
    closedir($dh);
    @rmdir($dir);
}



    function moverCarpeta($src, $dst)
{
        $dir = opendir($src);
        @mkdir($dst);
        while (false !== ($file = readdir($dir))) {
            if (($file != '.') && ($file != '..')) {
                if (is_dir($src . '/' . $file)) {
                    moverCarpeta($src . '/' . $file, $dst . '/' . $file);
                } else {
                    copy($src . '/' . $file, $dst . '/' . $file);
                }
            }
        }
        closedir($dir);
    }
