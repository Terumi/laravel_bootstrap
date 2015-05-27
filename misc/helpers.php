<?php

	function helper(){
		echo "help!";
	}

	function slugify($str){
		$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $str);
		return strtolower($slug);
	}