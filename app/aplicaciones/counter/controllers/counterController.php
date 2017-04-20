<?php

# Seguridad
defined('INDEX_DIR') OR exit('Ocrend software says .i.');

//------------------------------------------------

class counterController extends Controllers {

	public function __construct() {
		parent::__construct();

		$data = new Counter;
		$data->getCounter($_GET['sw'],$_GET['sc'],$_GET['referer'],$_GET['page']);
	}

}

?>
