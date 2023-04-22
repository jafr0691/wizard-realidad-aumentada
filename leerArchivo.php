<?php
include_once "./funciones.php";
if (file_exists('./memoramaAR/')) {
    eliminarCarpeta("./memoramaAR/");
}
crearCarpeta("./memoramaAR/");
if (file_exists('./serp-EscaAR/')) {
    eliminarCarpeta("./serp-EscaAR/");
}
crearCarpeta("./serp-EscaAR/");
clearstatcache();
if ($_FILES['fileBase']['name']) {

    $nomzip = $_FILES["fileBase"]["name"];
    $ruta   = $_FILES["fileBase"]["tmp_name"];
    $tipo   = $_FILES["fileBase"]["type"];

    if (glob('./tempbase/*')) {
		eliminarCarpeta("./tempbase/");
	}
    crearCarpeta('./tmpzip/');
    if (move_uploaded_file($ruta, './tmpzip/' . $nomzip)) {
        $info = new SplFileInfo($nomzip);

        if ($info->getExtension() == 'zip') {
            // Creamos una instancia de la clase ZipArchive:
            $zip = new ZipArchive();
            // Abrimos el archivo zip:
            if ($zip->open('./tmpzip/' . $nomzip) === true) {
                $zip->extractTo('./tempbase/');
                $zip->close();
                $descomprimir = 1;
            } else {
                $descomprimir = 0;
            }

        }

        if ($descomprimir == 1) {
            $carn = glob('./tempbase/*');
            list($p,$b,$nomcarp) = explode('/', $carn[0]);
            $listo = array('error' => 'bien', 'name' => $nomcarp);
            $numlinea = 0;
            $archivo  = fopen("./tempbase/" . $nomcarp . "/conf.txt", "r");
            while ($linea = fgets($archivo)) {
                if ($numlinea == 1) {
                    list($tipo, $juego) = explode('=', $linea);
                        $listo += ['juego' => strtolower(trim($juego))];
                }
                $numlinea++;
            }
            fclose($archivo);

            if ($listo['juego']=='memorama') {

                $images = '';
                $js     = '';
                $css    = '';
                $conf   = '';
                $ind    = '';

                if (!file_exists("./tempbase/" . $nomcarp . "/images")) {
                        $images = 'Carpeta images No se encuentra';
                }

                if (!file_exists("./tempbase/" . $nomcarp . "/js")) {
                        $js = 'Carpeta js No se encuentra';
                }

                if (!file_exists("./tempbase/" . $nomcarp . "/css")) {
                    $css = 'Carpeta css No se encuentra';
                }

                if (!is_file("./tempbase/" . $nomcarp . "/conf.txt")) {
                    $conf = 'Archivo conf.txt No se encuentra';
                }

                if (!is_file("./tempbase/" . $nomcarp . "/index.html")) {
                    $ind = 'Archivo Index.html No se encuentra';
                }

                $revision = array('css' => $css, 'images' => $images, 'js' => $js, 'conf' => $conf, 'inde' => $ind);

                $error = 0;
                foreach ($revision as $key => $value) {
                    if (!empty($value)) {
                        $listo[$key] = $value;
                        $error = 1;
                    }
                }

                if ($error == 1) {

                    $listo['error'] = 'error';
                    if (file_exists("./tmpzip/" . $nomzip)) {
                        unlink("./tmpzip/" . $nomzip);
                    }
                    exit(json_encode($listo));
                }else{
                    moverCarpeta("./tempbase/" . $nomcarp, "./memoramaAR/");
                    if (file_exists("./tmpzip/" . $nomzip)) {
                        unlink("./tmpzip/" . $nomzip);
                    }
                    exit(json_encode($listo));
                }


            }else if($listo['juego']=='serpientes y escaleras'){
                $js     = '';
                $css    = '';
                $conf   = '';
                $ind    = '';

                if (!file_exists("./tempbase/" . $nomcarp . "/js")) {
                        $js = 'Carpeta js No se encuentra';
                }

                if (!file_exists("./tempbase/" . $nomcarp . "/css")) {
                    $css = 'Carpeta css No se encuentra';
                }

                if (!is_file("./tempbase/" . $nomcarp . "/conf.txt")) {
                    $conf = 'Archivo conf.txt No se encuentra';
                }

                if (!is_file("./tempbase/" . $nomcarp . "/index.html")) {
                    $ind = 'Archivo Index.html No se encuentra';
                }

                $revision = array('css' => $css, 'js' => $js, 'conf' => $conf, 'inde' => $ind);

                $error = 0;
                foreach ($revision as $key => $value) {
                    if (!empty($value)) {
                        $listo[$key] = $value;
                        $error = 1;
                    }
                }

                if ($error == 1) {

                    $listo['error'] = 'error';
                    if (file_exists("./tmpzip/" . $nomzip)) {
                        unlink("./tmpzip/" . $nomzip);
                    }
                    exit(json_encode($listo));
                }else{
                    moverCarpeta("./tempbase/" . $nomcarp, "./serp-EscaAR/");
                    if (file_exists("./tmpzip/" . $nomzip)) {
                        unlink("./tmpzip/" . $nomzip);
                    }
                    exit(json_encode($listo));
                }

            }else{
                $listo['error'] = 'error';
                $listo += ['msj'=>'El Archivo conf.txt no indica el juego.<br>Indique Si es memorama o serpientes y escaleras. <br> No existe el Juego: '.$listo['juego']];
                exit(json_encode($listo));
            }

        }else{
        	$listo['error'] = 'error';
        	$listo += ['msj'=>'El Archivo '.$nomzip.' no se logro Descomprimir'];
        	exit(json_encode($listo));
        }
    }else{
    	$listo['error'] = 'error';
    	$listo += ['msj'=>'El Archivo '.$nomzip.' no fue Subido al Servidor'];
        	exit(json_encode($listo));
    }
}else{
	$listo['error'] = 'error';
	$listo += ['msj'=>'El Archivo no fue Subido'];
    exit(json_encode($listo));
}
