<?php

include "classes/Settings.php";
include "classes/Template/Template.php";

class App {
	private $settings_inst;
	private $template_inst;

	public function __construct() {
		$this -> init();
	}

	public function init() {
		$this -> settings_inst = new Settings();
		$this -> settings_inst -> init_from_json_file("settings.json");
	}

	public function settings() {
		return $this -> settings_inst;
	}

	public function template() {
		$this -> template_inst = new Template('template', '');
		return $this -> template_inst;
	}

	public function rendering() {
		return $this -> template() -> make("main.php");
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