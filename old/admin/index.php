<?php 
$galleries = array();
$thumbs = array();

require_once '../lib/Twig/Autoloader.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader, array(
  /*'cache' => 'cache',*/
));
$catsFromFile = json_decode(file_get_contents("conf.json"), true);

$i = 0;
foreach ($catsFromFile as $key => $cat) {
	$cats[$i++] = loadCategorie($cat, $key);
}
//print_r($cats);exit;



echo $twig->render('index.html', array('cats' => $cats, 'galleries' => json_encode($galleries)));



function loadCategorie($cat, $k){
	global $galleries;
	global $thumbs;
	if($subCats = $cat["sub"]){
		foreach ($subCats as $key => $subCat) {
			$subCats[$key] = loadCategorie($subCat, $key);
		}
		$cat["sub"] = $subCats;
		$cat["id"] = $k;
		return $cat;
	}
	else{
		$nb = 0;
		$images = array();
		$rep = opendir("../" . $cat["path"]);
		while (false !== ($image = readdir($rep)))
		{  
			if ($image != "." && $image != ".." && $image != "thumb"){
				$nb = $nb+1;
				$images[] = $image;
				if(createThumbnail("../" . $cat["path"], $image)){
					$thumbs[] = "/thumb/" . $image;
				}

			}
		}
		$thumbs[$k] = $thumbs;
		$galleries[$k] = $images;
		$cat["nb"] = $nb;
		$cat["id"] = $k;
		closedir($rep);
		return $cat;
	}
		
	}

	function createThumbnail($path, $pic){
		if( file_exists($path . "/thumb/" . $pic) ) return TRUE;
		if( !file_exists($path . "/thumb/") )
			mkdir($path . "/thumb/");
		imagethumb($path . "/" . $pic , $path . "/thumb/" . $pic , 40, FALSE, TRUE );
		/*
		$maxWidth = 100;
		$maxHeight = 100;
		$width = "100"; // correspond à la largeur de l'image souhaitée
		$height ="100"; // correspond à la hauteur de l'image souhaitée

		// et voici la création de la miniature...
		header("Content-Type: image/jpeg");
		$img_in = imagecreatefromjpeg($pic);
		$img_out = imagecreatetruecolor($width, $height);
		imagecopyresampled($img_out, $img_in, 0, 0, 0, 0, imagesx($img_out), imagesy($img_out), imagesx($img_in), imagesy($img_in));
		$t = imagejpeg($img_out);
		echo $t;*/
	}



?>
