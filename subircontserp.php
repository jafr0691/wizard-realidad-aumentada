<?php
clearstatcache();
include_once "./funciones.php";
list($carpjuego, $pbase) = explode('.', $_FILES["fileBase"]["name"]);

$salto = chr(13) . chr(10);

include_once "./complementos/serindex.php";

if (!is_file("./serp-EscaAR/index.html")) {
	$find = fopen("./serp-EscaAR/index.html", "a");
	fclose($find);
}

$file = fopen("./serp-EscaAR/index.html", "w+");

fwrite($file, $header . PHP_EOL);

foreach ($_POST['acciones_s'] as $acc) {
	if ($acc=="Inicio del Juego") {
		fwrite($file, $inicio . PHP_EOL);
	}
	if ($acc=="Fin del Juego") {
		fwrite($file, $fin . PHP_EOL);
	}
	if ($acc=="Subir Escalera") {
		fwrite($file, $subir . PHP_EOL);
	}
	if ($acc=="Bajar Serpiente") {
		fwrite($file, $bajar . PHP_EOL);
	}
}

fwrite($file, $footer . PHP_EOL);

fclose($file);

// ////////////////////////////////////////////////////////////////////



include_once "./complementos/indexjs.php";

if (!is_file("./serp-EscaAR/js/index.js")) {
	$f = fopen("./serp-EscaAR/js/index.js", "a");
	fclose($f);
}

$fileinjs = fopen("./serp-EscaAR/js/index.js", "w+");


fwrite($fileinjs, $unoijs . PHP_EOL);
$nosu=TRUE;
foreach ($_POST['acciones_s'] as $accinjs) {
	if ($accinjs=="Subir Escalera") {
		fwrite($fileinjs, $tressubir . PHP_EOL);
		$nosu=False;
	}
}
if($nosu){
	fwrite($fileinjs, $dosnosubir . PHP_EOL);
}



fwrite($fileinjs, $cuatroijs . PHP_EOL);
$noba=TRUE;
foreach ($_POST['acciones_s'] as $accinjs) {
	if ($accinjs=="Bajar Serpiente") {
		fwrite($fileinjs, $sestobajar . PHP_EOL);
		$noba=False;
	}
}
if($noba){
	fwrite($fileinjs, $quintonobajar . PHP_EOL);
}

fwrite($fileinjs, $sextoijs . PHP_EOL);
$nofin=TRUE;
foreach ($_POST['acciones_s'] as $accinjs) {
	if ($accinjs=="Fin del Juego") {
		fwrite($fileinjs, $novenofin . PHP_EOL);
		$nofin=False;
	}
}
if($nofin){
	fwrite($fileinjs, $octavonofin . PHP_EOL);
}


fwrite($fileinjs, $diesijs . PHP_EOL);
$noini=TRUE;
foreach ($_POST['acciones_s'] as $accinjs) {
	if ($accinjs=="Inicio del Juego") {
		fwrite($fileinjs, $onceinicio . PHP_EOL);
		$noini=False;
	}
}
if($noini){
	fwrite($fileinjs, $docenoinicio . PHP_EOL);
}


fclose($fileinjs);


$carpreadfina = './serp-EscaAR/reader';
crearCarpeta($carpreadfina);

moverCarpeta("./serp/reader/", $carpreadfina . "/");

$carpmarkers = './serp-EscaAR/markers';
crearCarpeta($carpmarkers);

moverCarpeta("./serp/markers/", $carpmarkers . "/");


$reaarcontent = './serp-EscaAR/reader/arcontent';
crearCarpeta($reaarcontent);

include_once "./complementos/readindex.php";

if (!is_file($carpreadfina . "/index.html")) {
	$fi = fopen($carpreadfina . "/index.html", "a");
	fclose($fi);
}

$filereind = fopen($carpreadfina . "/index.html", "w+");

$url = array("Inicio.patt","Fin.patt","Serpiente.patt","Escalera.patt");

$contenido = array('contserpiniarch','contserpfinarch','contserpsuarch','contserpbaarch');

$oc = array('contserpini', 'contserpfin', 'contserpsu', 'contserpba');

fwrite($filereind, $headrein . PHP_EOL);
$u = 0;
$i = 0;
foreach ($contenido as $contnt) {
	if(!empty($_FILES[$contnt])) {
		if(move_uploaded_file($_FILES[$contnt]["tmp_name"], $reaarcontent . '/' . $_FILES[$contnt]['name'])) {
			$src = $_FILES[$contnt]['name'];
			if(!empty($_POST[$oc[$i]]) and $_POST[$oc[$i]] == '.jpg,.jpeg,.png') {
				$jpg = '<a-marker preset="custom" type="pattern" url="' . $url[$u] . '">
	 	 <a-image src="./arcontent/' . $src . '" width="1" height="1" rotation="270 0 0"></a-image>
	 </a-marker>';

				fwrite($filereind, $jpg . PHP_EOL);

			}else if(!empty($_POST[$oc[$i]]) and $_POST[$oc[$i]] == '.txt') {
				$value="";
				$fp = fopen($reaarcontent . '/' . $_FILES[$contnt]['name'], "r");
				while (!feof($fp)) {
					$value .= fgets($fp);
				}

				fclose($fp);
				$txt = '<a-marker preset="custom" type="pattern" url="' . $url[$u] . '">
				<a-text color="blue" value="' . $value . '" width="5" position="-.5 0 0" rotation="-90 0 0"></a-text>
				</a-marker>';
				fwrite($filereind, $txt . PHP_EOL);

			}else if(!empty($_POST[$oc[$i]]) and $_POST[$oc[$i]] == '.dae') {

				$mode='	<a-marker preset="custom" type="pattern" url="'.$url[$u] .'">
						     <a-entity  collada-model="url(./arcontent/' . $src . ')"></a-entity>
						</a-marker>';

				fwrite($filereind, $mode . PHP_EOL);
			}

		}
	}
	$u++;
	$i++;
}

fwrite($filereind, $footerrein . PHP_EOL);

fclose($filereind);

function comprimir($ruta, $zip_salida, $handle = false, $recursivo = false){

 /* Declara el handle del objeto */
 if(!$handle){
  $handle = new ZipArchive;
  if ($handle->open($zip_salida, ZipArchive::CREATE) === false){
   return false; /* Imposible crear el archivo ZIP */
  }
 }

 /* Procesa directorio */
 if(is_dir($ruta)){
  /* Aseguramos que sea un directorio sin carácteres corruptos */
  $ruta = dirname($ruta.'/arch.ext');
  $handle->addEmptyDir($ruta); /* Agrega el directorio comprimido */
  foreach(glob($ruta.'/*') as $url){ /* Procesa cada directorio o archivo dentro de el */
   comprimir($url, $zip_salida, $handle, true); /* Comprime el subdirectorio o archivo */
  }

 /* Procesa archivo */
 }else{
  $handle->addFile($ruta);
 }

 /* Finaliza el ZIP si no se está ejecutando una acción recursiva en progreso */
 if(!$recursivo){
  $handle->close();
 }

 return true; /* Retorno satisfactorio */
}


$ruta = "serp-EscaAR";
$zipelim = glob('./serpEscazip/*');
foreach($zipelim as $elim){
  if(is_file($elim))
    unlink($elim);
}
crearCarpeta('./serpEscazip/');

comprimir($ruta, './serpEscazip/'.$carpjuego.'AR.zip');

exit('./serpEscazip/'.$carpjuego.'AR.zip');
