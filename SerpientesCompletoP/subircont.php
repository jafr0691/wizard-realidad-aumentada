<?php
clearstatcache();
include_once "./funciones.php";
list($carpjuego, $pbase) = explode('.', $_FILES["fileBase"]["name"]);

$juego = 'memorama';
$salto = chr(13) . chr(10);

include_once "./complementos/aindex.php";

if (!is_file("./juegobase/index.html")) {
	$find = fopen("./juegobase/index.html", "a");
	fclose($find);
}

$file = fopen("./juegobase/index.html", "w+");

fwrite($file, $headermemorama . PHP_EOL);


foreach ($_POST['acciones_m'] as $acc) {
	if ($acc=="Fin del Juego") {
		fwrite($file, $terminadomemorama . PHP_EOL);
	}

	if ($acc=="Acertar Carta") {
		fwrite($file, $acertarmemorama . PHP_EOL);
	}
	if ($acc=="Errar Carta") {
		fwrite($file, $erromemorama . PHP_EOL);
	}
	if ($acc=="Inicio del Juego") {
		fwrite($file, $loadingmemorama . PHP_EOL);
	}
}



fwrite($file, $footermemorama . PHP_EOL);

fclose($file);

include_once "./complementos/brointjs.php";

if (!is_file("./juegobase/js/BrowserInterface.js")) {
	$f = fopen("./juegobase/js/BrowserInterface.js", "a");
	fclose($f);
}

$filebijs = fopen("./juegobase/js/BrowserInterface.js", "w+");

fwrite($filebijs, $unobijs . PHP_EOL);

foreach ($_POST['acciones_m'] as $accbijs) {

	if ($accbijs=="Inicio del Juego") {
		fwrite($filebijs, $dosinicio . PHP_EOL);
	}
}


fwrite($filebijs, $tresbijs . PHP_EOL);


foreach ($_POST['acciones_m'] as $accbijs) {

	if ($accbijs=="Fin del Juego") {
		fwrite($filebijs, $cuatrofinal . PHP_EOL);
	}
}

fwrite($filebijs, $quintobijs . PHP_EOL);

foreach ($_POST['acciones_m'] as $accbijs) {

	if ($accbijs=="Fin del Juego") {
		fwrite($filebijs, $sestofinal2 . PHP_EOL);
	}
}


fwrite($filebijs, $sextobijs . PHP_EOL);

fclose($filebijs);

include_once "./complementos/megajs.php";

if (!is_file("./juegobase/js/MemoryGame.js")) {
	$fi = fopen("./juegobase/js/MemoryGame.js", "a");
	fclose($fi);
}

$filemgjs = fopen("./juegobase/js/MemoryGame.js", "w+");

fwrite($filemgjs, $unomgjs . PHP_EOL);
foreach ($_POST['acciones_m'] as $accmgjs) {

	if ($accmgjs=="Errar Carta") {
		fwrite($filemgjs, $doserrar . PHP_EOL);
	}
}


fwrite($filemgjs, $tresmgjs . PHP_EOL);
foreach ($_POST['acciones_m'] as $accmgjs) {

	if ($accmgjs=="Acertar Carta") {
		fwrite($filemgjs, $cuatroacertar . PHP_EOL);
	}
}

fwrite($filemgjs, $quintomgjs . PHP_EOL);

fclose($filemgjs);

$carpreadfina = './juegobase/readFina';
if (!file_exists($carpreadfina)) {
	mkdir($carpreadfina, 0777, true);
	chmod($carpreadfina, 0777);
}
moverCarpeta("./readFina/", $carpreadfina . "/");


$carpmarkers = './juegobase/markers';
if (!file_exists($carpmarkers)) {
	mkdir($carpmarkers, 0777, true);
	chmod($carpmarkers, 0777);
}
moverCarpeta("./markers/", $carpmarkers . "/");


$reaarcontent = './juegobase/arcontent';
if (!file_exists($reaarcontent)) {
	mkdir($reaarcontent, 0777, true);
	chmod($reaarcontent, 0777);
}

include_once "./complementos/readindex.php";

if (!is_file($carpreadfina . "/index.html")) {
	$fi = fopen($carpreadfina . "/index.html", "a");
	fclose($fi);
}

$filereind = fopen($carpreadfina . "/index.html", "w+");

$url = array('loading.patt', 'terminado.patt', 'acertar.patt', 'erro.patt');

$contenido = array('contmemoiniarch', 'contmemofinarch', 'contmemoacearch', 'contmemoerrarch');
// ,'contserpiniarch','contserpfinarch','contserpsuarch','contserpbaarch'

$oc = array('contmemoini', 'contmemofin', 'contmemoace', 'contmemoerr');
// ,'contserpini','contserpfin','contserpsu','contserpba'

fwrite($filereind, $headrein . PHP_EOL);
$u = 0;
$i = 0;
foreach ($contenido as $contnt) {
	if (!empty($_FILES[$contnt])) {
		if (move_uploaded_file($_FILES[$contnt]["tmp_name"], $reaarcontent . '/' . $_FILES[$contnt]['name'])) {
			$src = $_FILES[$contnt]['name'];
			if (!empty($_POST[$oc[$i]]) and $_POST[$oc[$i]] == '.jpg,.jpeg,.png') {
				$jpg = '<a-marker preset="custom" type="pattern" url="' . $url[$u] . '">
				<a-image src="../arcontent/' . $src . '" width="1" height="1" rotation="270 0 0"></a-image>
				</a-marker>';
				fwrite($filereind, $jpg . PHP_EOL);

			} else if (!empty($_POST[$oc[$i]]) and $_POST[$oc[$i]] == '.txt') {
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

			} else if (!empty($_POST[$oc[$i]]) and $_POST[$oc[$i]] == '.OBJ,.COLLADA,.PLY,.glTF') {
				$mode = '<a-assets>
				<a-asset-item id="tree" src="CargandoModel.dae"></a-asset-item>
				</a-assets>


				<a-marker preset="custom" type="pattern" url="' . $url[$u] . '">
				<a-entity  collada-model="url(end.dae)"></a-entity>
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
$ruta = "memoramaAR";
$zipelim = glob('./memoramazip/*');
foreach($zipelim as $elim){
  if(is_file($elim))
    unlink($elim);
}

if (!file_exists('./memoramazip/')) {
	mkdir('./memoramazip/', 0777, true);
	chmod('./memoramazip/', 0777);
}

comprimir($ruta, './memoramazip/'.$carpjuego.'AR.zip');

exit('./memoramazip/'.$carpjuego.'AR.zip');
