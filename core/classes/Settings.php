<?php

class Settings {
	private $data = [];

	public function __construct(Array $d = []) {
		$this -> data = $d;
	}

	public function init_from_json_file(String $path_to_settings_file) {
		$this -> data = json_decode(file_get_contents($path_to_settings_file), true);
	}

	public function value() {
		return $this -> data;
	}

	public function get(String $name) {
		if(!isset($this -> data[$name])) {
			return die("Settings, undefined parameter `{$name}`");
		}

		return new Settings($this -> data[$name]);
	}
}