<?php 
include 'imagethumb.php';

$galleries = array();
$thumbs = array();

require_once 'lib/Twig/Autoloader.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader, array(
  /*'cache' => 'cache',*/
));

$cats = json_decode(file_get_contents("admin/conf.json"), true);
foreach ($cats as $key => $cat) {
	$cats[$key] = loadCategorie($cat, $key);
}



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
		$rep = opendir($cat["path"]);
		while (false !== ($image = readdir($rep)))
		{  
			if ($image != "." && $image != ".." && $image != "thumb"){
				$nb = $nb+1;
				$images[] = $image;
				if(createThumbnail($cat["path"], $image)){
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
	}



?>
