<?php

class Category
{
	public static $mainPath = "photos/";

	private $name = "New category";
	private $description = "";
	private $id;
	private $path;

	public function __construct($n)
    {
        $name = $n;
        $id = urlencode($n);
        $path = $mainPath . $id . "/";
    }

    public function getName(){
    	return $name;
    }

    public function setName($n){
    	$name = $n;
    	$id = urlencode($n);
    	$path = $mainPath . $id . "/";
    }

    public function getDescription(){
    	return $description;
    }

    public function getId(){
    	return $id;
    }

    public function getPath(){
    	return $path;
    }
}

class Gallery
{
	private $name = "New gallery";
	private $description = "";
	private $id;
	private $parent;

	public function __construct($n)
    {
        $name = $n;
        $id = urlencode($n);
        $path = $mainPath . $id . "/";
    }

    public function getPath(){
    	return $parent->getPath() . $id;
    }
}

?>