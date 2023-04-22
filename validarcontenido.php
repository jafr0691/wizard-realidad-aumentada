<?php


$info = new SplFileInfo($_POST['arch']);

$_POST['ext'];

if ($_POST['ext']==".jpg,.jpeg,.png") {
	if($info->getExtension() == 'jpg' or $info->getExtension() == 'jpeg' or $info->getExtension() == 'png'){
		exit(TRUE);
	}else{
		exit(FALSE);
	}
}else if($_POST['ext']==".txt"){
	if($info->getExtension() == 'txt'){
		exit(TRUE);
	}else{
		exit(FALSE);
	}
}else if($_POST['ext']==".dae"){
	if($info->getExtension() == 'dae'){
		exit(TRUE);
	}else{
		exit(FALSE);
	}
}



 ?>