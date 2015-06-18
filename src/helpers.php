<?php

	function setActive($path, $class = 'active') {
		return Request::is($path) ? $class : '';
	}

	function breakPath($path, $title_path, $delimiter = '/') {
		$path_arr  = explode($delimiter, $path);
		$title_arr = explode($delimiter, $title_path);
		$url_arr   = [ ];
		foreach ($path_arr as $index => $segment) {
			if ($index == 0) {
				$url_arr[0] = [
					'url'  => url($path_arr[0]),
					'title' => $title_arr[0]
				];
			} else {
				$url_arr[] = [
					'url'  => $url_arr[$index - 1]['url'] . "/" . $segment,
					'title' => $title_arr[$index]
				];
			}
		}

		return $url_arr;
	}

