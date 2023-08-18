<?php

include "classes/Settings.php";

class App {
	
	private $settings;

	public function __construct() {
		$this -> init();
	}

	public function init() {
		$this -> settings = new Settings();
		$this -> settings -> init_from_json_file("../settings.json");
	}

	public function settings() {
		return $this -> settings;
	}
}

$app = null;

function app() {
	global $app;

	if(!$app) {
		$app = new App();
	}

	return $app;
}