<?php

# Seguridad
defined('INDEX_DIR') OR exit('Ocrend software says .i.');

//------------------------------------------------

class configuraController extends Controllers {

	public function __construct() {
		parent::__construct(true);

		$data = new Configura;

		switch($this->method){

			case 'editar':
				if($_POST){
					$data->EditarConfig();
				}
                
				break;

			default:
				$stringConfig = $data->LeeConfig();
				echo $this->template->render('html/configura/index', array(
					'strConfig' => $stringConfig
				));
				break;
		}

	}
}
?>
