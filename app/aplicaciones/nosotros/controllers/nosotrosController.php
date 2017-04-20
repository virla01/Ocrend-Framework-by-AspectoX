<?php

# Seguridad
defined('INDEX_DIR') OR exit('Ocrend software says .i.');

//------------------------------------------------

class nosotrosController extends Controllers {

	public function __construct() {
		parent::__construct();
		echo $this->template->render('html/nosotros/index');
	}

}

?>
