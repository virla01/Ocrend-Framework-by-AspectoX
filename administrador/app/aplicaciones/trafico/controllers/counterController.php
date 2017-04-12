<?php

# Seguridad
defined('INDEX_DIR') OR exit('Ocrend software says .i.');

//------------------------------------------------

class traficoController extends Controllers {

	public function __construct() {
		parent::__construct();

        $data = new Counter;
		$data->getCounter();
		echo $this->template->render('home/home');
	}

}

?>
