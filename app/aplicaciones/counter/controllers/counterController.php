<?php

# Seguridad
defined('INDEX_DIR') OR exit('Ocrend software says .i.');

//------------------------------------------------

class counterController extends Controllers {

	public function __construct() {
		parent::__construct();

		$data = new Counter;
		$data->getCounter();
		exit;
	}

}

?>
