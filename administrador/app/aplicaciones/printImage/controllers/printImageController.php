<?php

# Seguridad
defined('INDEX_DIR') OR exit('Ocrend software says .i.');

//------------------------------------------------

class printImageController extends Controllers {

	public function __construct() {
		parent::__construct();


		$data = new Trafico;

		if(!isset($this->method)){
			exit();
		}else{
			$type = $this->method;
		}

		$x = 350;
		$y = 160;

		$week = 0;
		$showtext = 1;

		if($type == "browser"){
			$datos = $data->getResult("SELECT * FROM is_browser ORDER BY count DESC");
			$total = $data->getResult("SELECT sum(count) AS	sum FROM is_browser");
			$key = "browser";
			$x = 420;
			$y = 190;
			$week = 0;
		}elseif($type == "os"){
			$datos = $data->getResult("SELECT * FROM is_os ORDER BY count DESC");
			$total = $data->getResult("SELECT sum(count) AS sum FROM is_os");
			$key = "os";
			$x = 380;
			$week = 0;
		}elseif($type == "sw"){
			$datos = $data->getResult("SELECT * FROM is_screen ORDER BY count DESC");
			$total = $data->getResult("SELECT sum(count) AS sum FROM is_screen");
			$key = "width";
			$x = 380;
			$week = 0;
		}elseif($type == "sc"){
			$datos = $data->getResult("SELECT * FROM is_color ORDER BY count DESC");
			$total = $data->getResult("SELECT sum(count) AS sum FROM is_color");
			$key = "color";
			$x = 380;
			$week = 0;
		}elseif($type == "week"){
			$datos = $data->getResult("SELECT * FROM is_week_days ORDER BY day");
			$total = $data->getResult("SELECT sum(count) AS sum FROM is_week");
			$week = 1;
		}elseif($type == "site"){
			$datos = $data->getResult("SELECT * FROM is_ref_site ORDER BY count DESC limit 8");
			$total[0]["sum"] = 0;
			for($i=0; $i<sizeof($datos); $i++){
				$total[0]["sum"] += $datos[$i]["count"];
			}
			$key = "domain";
			$x = 410;
			$y = 155;
			$showtext = 1;
		}elseif($type == "engine"){
			$datos = $data->getResult("SELECT * FROM is_engine ORDER BY count DESC limit 6");
			$total[0]["sum"] = 0;
			for($i=0; $i<sizeof($datos); $i++){
				$total[0]["sum"] += $datos[$i]["count"];
			}
			$key = "name";
			$x = 390;
			$y = 135;
			$showtext = 1;
		}elseif($type == "keyword"){
			$datos = $data->getResult("SELECT * FROM is_keyword ORDER BY count DESC limit 8");
			$total[0]["sum"] = 0;
			for($i=0; $i<sizeof($datos); $i++){
				$total[0]["sum"] += $datos[$i]["count"];
			}
			$key = "keyword";
			$x = 390;
			$y = 155;
			$showtext = 1;
		}

		$data->printImage($x, $y, $datos, $total[0]["sum"], $key, $week, $showtext);
		exit();
	}

}

?>
