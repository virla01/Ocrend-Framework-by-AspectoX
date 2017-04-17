<?php

# Seguridad
defined('INDEX_DIR') OR exit('Ocrend software says .i.');

//------------------------------------------------

class graficosController extends Controllers {

	public function __construct() {
		parent::__construct();

		$data = new Trafico;

		switch($this->method){
			case 'graficoxhora':
				$per_hour_info = $data->getResult("SELECT * FROM is_hour ORDER BY hour");
				$sum_hour = $data->getResult("SELECT sum(count) AS sum FROM is_hour");
				$max_hour = $data->getResult("SELECT max(count) AS max FROM is_hour");
				$days = $data->getResult("SELECT count(distinct date) AS days FROM is_daycount");
				$today_max = $data->getResult("SELECT max(count) AS max FROM is_today_hour");
				$today_info = $data->getResult("SELECT * FROM is_today_hour ORDER BY hour");

				if($sum_hour[0]['sum'] > 0){
					$max_percent = $max_hour[0]['max'] / $sum_hour[0]['sum'];
                    if($days[0]['days'] != 0){
						$max_visit = intval($sum_hour[0]['sum'] * $max_percent / $days[0]['days']);
					}else{
						$max_visit = intval($sum_hour[0]['sum'] * $max_percent);
					}


					// compare with today max's hour
					if($max_visit < $today_max[0]['max']){
						$max_visit = $today_max[0]['max'];
					}

					// do with forecast for current hour
					if(date("i") < 2){
						$hour_forecast = intval($today_info[date("G")]['count'] * 60);
					}else{
						$hour_forecast = intval($today_info[date("G")]['count'] * 60 / date("i"));
					}
					if($max_visit < $hour_forecast){
						$max_visit = $hour_forecast;
					}
				}else{
					$max_visit = 0;
					if(date("i") < 2){
						$hour_forecast = intval($today_info[date("G")]['count'] * 60);
					}else{
						$hour_forecast = intval($today_info[date("G")]['count'] * 60 / date("i"));
					}
				}

				$remain = $max_visit % 5;
				$max_visit = $max_visit + 5 - $remain;

				$im = imagecreatetruecolor(590, 225);
				$col = ImageColorAllocate($im, 189, 199, 231);
				$line_col = ImageColorAllocate($im, 180, 180, 180);
				$red = ImageColorAllocate($im, 239, 16, 16);
				$blue = ImageColorAllocate($im, 90, 142, 255);
				$green = ImageColorAllocate($im, 115, 195, 24);
				$color_black = ImageColorAllocate($im, 0, 0, 0);
				$color_white = ImageColorAllocate($im, 255, 255, 255);
				$color_border = ImageColorAllocate($im, 123, 121, 181);

				imagefilledrectangle ($im, 0, 0, 590, 225, $color_white);

				$count = 0;
				for($i=30; $i<160; $i=$i+15){
					imageline($im, 45, $i, 574, $i, $line_col);
					imageline($im, 45, $i, 40, $i, $color_black);
					$count++;
				}
				for($i=68; $i<560; $i=$i+23){
					imageline($im, $i, 14, $i, 164, $line_col);
					imageline($im, $i, 164, $i, 169, $color_black);
				}

				// draw average line
				$x = 46;
				for($i=0; $i<23; $i++){
					if($max_visit > 0){
						if ($days[0]['days'] != 0){
							$y = 165 - (($per_hour_info[$i]['count'] / $days[0]['days']) / $max_visit * 150);
						}else{
							$y = 165;
						}
					}else{
						$y = 165;
					}

					$y_id = $i+1;

					if($max_visit > 0){
						if ($days[0]['days'] != 0){
							$y2 = ($per_hour_info[$y_id]['count'] / $days[0]['days']) / $max_visit * 150;
						}else{
							$y2 = 0;
						}
					}else{
						$y2 = 0;
					}

					$y2 = 165 - $y2;
					$x2 = $x + 22;
					imageline($im, $x, $y, $x2, $y2, $green);
					imageline($im, $x, $y - 1, $x2, $y2 - 1, $green);
					imageline($im, $x - 1, $y, $x2 - 1, $y2, $green);

					$x += 23;
				}

				// draw today's line
				$x = 46;
				for($i=0; $i<24; $i++){
					if($max_visit > 0){
						$y = 165 - ($today_info[$i]['count'] / $max_visit * 150);
					}else{
						$y = 165;
					}

					$y_id = $i;

					if($max_visit > 0){
						if ($today_info[$y_id]['count'] != 0){
							$y2 = $today_info[$y_id]['count'] / $max_visit * 150;
						}else{
							$y2 = 0;
						}
					}else{
						$y2 = 0;
					}

					$s_x1 = $x - 7;
					$y2 = 165 - $y2;
					$x2 = $x + 22;

					if($today_info[$i]['hour'] < 23){
						imageline($im, $x, $y, $x2, $y2, $blue);
						imageline($im, $x, $y - 1, $x2, $y2 - 1, $blue);
						imageline($im, $x - 1, $y, $x2 - 1, $y2, $blue);
					}

					// draw forecast for current hour
					if($today_info[$i]['hour'] == date("H")){
						if($max_visit > 0){
							$y = 165 - ($hour_forecast / $max_visit * 150);
						}else{
							$y = 165;
						}

						imageline($im, $x-4, $y-3, $x+2, $y+3, $red);
						imageline($im, $x-4, $y+3, $x+2, $y-3, $red);
					}

					// string with each hours for today
					$text_loca = $x - imagefontwidth($today_info[$i]['count'])/2;

					// string with hour and visitors
					imagestring($im, 2, $text_loca, 173, $today_info[$i]['count'], $color_black);
					imagestring($im, 2, $s_x1+2, 185, $today_info[$i]['hour'], $color_black);

					$x += 23;
				}

				// draw border of this image
				imageline($im, 45, 14, 574, 14, $color_black);
				imageline($im, 45, 164, 574, 164, $color_black);
				imageline($im, 45, 14, 45, 164, $color_black);
				imageline($im, 574, 14, 574, 164, $color_black);

				// draw border of this image
				imageline($im, 1, 224, 590, 224, $color_black);
				imageline($im, 1, 1, 590, 1, $color_black);
				imageline($im, 1, 1, 1, 225, $color_black);
				imageline($im, 589, 1, 589, 225, $color_black);

				imageline($im, 45, 14, 40, 14, $color_black);
				imageline($im, 45, 164, 40, 164, $color_black);
				imageline($im, 45, 164, 45, 169, $color_black);
				imageline($im, 574, 164, 574, 169, $color_black);

				// write number of line
				imagestring($im, 2, 20, 9, $max_visit, $color_black);
				imagestring($im, 2, 20, 38, intval($max_visit*8/10), $color_black);
				imagestring($im, 2, 20, 68, intval($max_visit*6/10), $color_black);
				imagestring($im, 2, 20, 98, intval($max_visit*4/10), $color_black);
				imagestring($im, 2, 20, 128, intval($max_visit/5), $color_black);
				imagestring($im, 2, 20, 158, 0, $color_black);
				imagestringup($im, 5, 1, 132, "", $color_black);

				// write hour and visitors text
				imagestring($im, 2, 4, 173, LABEL_TRAFICO_HITS, $color_black);
				imagestring($im, 2, 4, 185, LABEL_TRAFICO_HORA, $color_black);

				imagepng($im);
				imagedestroy($im);
				exit;
			break;

			case 'graficoxdia':

				$day_info = $data->getResult("SELECT distinct daycount AS count, date FROM is_daycount ORDER BY date DESC LIMIT 30");
				$max_visit = 0;
				for($i=0; $i<sizeof($day_info); $i++){
					if($day_info[$i]["count"] > $max_visit){
						$max_visit = $day_info[$i]["count"];
					}
				}

				$im = imagecreatetruecolor(585, 240);
				$col = ImageColorAllocate($im, 189, 199, 231);
				$line_col = ImageColorAllocate($im, 180, 180, 180);
				$white = ImageColorAllocate($im, 255, 255, 255);
				$red = ImageColorAllocate($im, 239, 16, 16);
				$blue = ImageColorAllocate($im, 66, 69, 107);
				$color_black = ImageColorAllocate($im, 0, 0, 0);
				$color_border = ImageColorAllocate($im, 123, 121, 181);
				imagefilledrectangle($im, 0, 0, 585, 240, $white);
				for($i=20; $i<205; $i=$i+20){
					imageline($im, 40, $i, 582, $i, $line_col);
					imageline($im, 40, $i, 35, $i, $color_black);
				}

				imageline($im, 40, 10, 582, 10, $color_black);
				imageline($im, 40, 220, 582, 220, $color_black);
				imageline($im, 40, 10, 40, 220, $color_black);
				imageline($im, 582, 10, 582, 220, $color_black);

				imagestring($im, 2, 2, 12, $max_visit, $color_black);
				imagestring($im, 2, 2, 33, intval($max_visit*9/10), $color_black);
				imagestring($im, 2, 2, 53, intval($max_visit*8/10), $color_black);
				imagestring($im, 2, 2, 73, intval($max_visit*7/10), $color_black);
				imagestring($im, 2, 2, 93, intval($max_visit*6/10), $color_black);
				imagestring($im, 2, 2, 113, intval($max_visit/2), $color_black);
				imagestring($im, 2, 2, 133, intval($max_visit*4/10), $color_black);
				imagestring($im, 2, 2, 153, intval($max_visit*3/10), $color_black);
				imagestring($im, 2, 2, 173, intval($max_visit/5), $color_black);
				imagestring($im, 2, 2, 193, intval($max_visit/10), $color_black);
				imagestring($im, 2, 2, 212, 0, $color_black);

				imagestring($im, 2, 2, 225, "Days", $color_black);


				$x = 50;
				$last_line_x = 50;

				for($i = 29; $i >= 0; $i--){
					if ($i < count($day_info)){
						$day = explode("-", $day_info[$i]['date']);
					}else{
						$day = 0;
					}

					if($max_visit > 0 && $i < count($day_info)){
						$y = 220 - ($day_info[$i]['count'] / $max_visit * 200);
					}else{
						$y = 220;
					}

					$s_x1 = $x - 6;
					$s_x2 = $x + 6;
					imagefilledrectangle($im, $s_x1, $y, $s_x2, 220, $blue);
					imageline($im, $s_x2 + 1, $y, $s_x2 + 1, 220, $color_black);
					imageline($im, $s_x2 + 2, $y, $s_x2 + 2, 220, $color_black);
					imageline($im, $s_x1 - 1, $y + 1, $s_x1 - 1, 220, $color_border);
					imageline($im, $s_x1 - 1, $y - 1, $s_x2 + 2, $y - 1, $color_border);
					imageline($im, $s_x1 - 2, $y, $s_x1 - 2, 220, $color_border);

					// draw the red line
					if($i < 29){
						if(!isset($day_info[$i])){
							$curr_y = 220;
						}elseif(!isset($last_line_y)){
							$last_line_y = $y - 1;
							$curr_y = $y - 1;
						}else{
							$curr_y = intval(($y - 1 + $last_line_y) / 2);
						}
						imageline($im, $x, $curr_y, $last_line_x, $last_line_y, $red);
						imageline($im, $x, $curr_y-1, $last_line_x, $last_line_y-1, $red);
						imageline($im, $x, $curr_y+1, $last_line_x, $last_line_y+1, $red);

						$last_line_y = $curr_y;
					}else{
						$last_line_y = $y;
					}

					$last_line_x = $x;

					// write days
					imageline($im, $x, 220, $x, 225, $color_black);
					imagestring($im, 2, $s_x1+1, 225, $day[2], $color_black);

					$x += 18;
				}

				imagepng($im);
				imagedestroy($im);
				exit;
			break;

			case 'graficoxsemana':

				$day_info = $data->getResult("SELECT count FROM is_week_days ORDER BY day");
				$max_visit = $data->getResult("SELECT max(count) AS max FROM is_week_days");

				$im = imagecreatetruecolor(350, 220);
				$col = ImageColorAllocate($im, 189, 199, 231);
				$line_col = ImageColorAllocate($im, 180, 180, 180);
				$white = ImageColorAllocate($im, 255, 255, 255);
				$red = ImageColorAllocate($im, 239, 16, 16);
				$blue = ImageColorAllocate($im, 66, 69, 107);
				$color_black = ImageColorAllocate($im, 0, 0, 0);
				$color_border = ImageColorAllocate($im, 123, 121, 181);
				imagefilledrectangle($im, 0, 0, 585, 240, $white);

				for($i=20; $i<200; $i=$i+40){
					imageline($im, 50, $i, 346, $i, $line_col);
					imageline($im, 50, $i, 45, $i, $color_black);
				}

				imageline($im, 50, 10, 347, 10, $color_black);
				imageline($im, 50, 200, 347, 200, $color_black);
				imageline($im, 50, 10, 50, 200, $color_black);
				imageline($im, 347, 10, 347, 200, $color_black);

				imagestring($im, 2, 2, 12, $max_visit[0]['max'], $color_black);
				imagestring($im, 2, 2, 53, intval($max_visit[0]['max']*8/10), $color_black);
				imagestring($im, 2, 2, 93, intval($max_visit[0]['max']*6/10), $color_black);
				imagestring($im, 2, 2, 133, intval($max_visit[0]['max']*4/10), $color_black);
				imagestring($im, 2, 2, 173, 0, $color_black);

				imagestring($im, 2, 2, 205, LABEL_TRAFICO_DIAS, $color_black);

				$x = 79;
				$week_days = Array(DIA_0, DIA_1, DIA_2, DIA_3, DIA_4, DIA_5, DIA_6);
				for($i=0; $i<7; $i++){
					//$day = explode("-", $day_info[$i]['day']);

					if($max_visit[0]['max'] > 0){
						$y = 200 - ($day_info[$i]['count'] / $max_visit[0]['max'] * 180);
					}else{
						$y = 200;
					}

					$s_x1 = $x - 15;
					$s_x2 = $x + 15;
					imagefilledrectangle($im, $s_x1, $y, $s_x2, 200, $blue);
					imageline($im, $s_x2 + 1, $y, $s_x2 + 1, 200, $color_black);
					imageline($im, $s_x2 + 2, $y, $s_x2 + 2, 200, $color_black);
					imageline($im, $s_x1 - 1, $y + 1, $s_x1 - 1, 200, $color_border);
					imageline($im, $s_x1 - 1, $y - 1, $s_x2 + 2, $y - 1, $color_border);
					imageline($im, $s_x1 - 2, $y, $s_x1 - 2, 200, $color_border);

					// write days
					imagestring($im, 2, $x-8, 205, $week_days[$i], $color_black);

					$x += 40;
				}

				imagepng($im);
				imagedestroy($im);
				exit();
			break;

			case 'graficoxmes':

			$day_info =	$data->getResult("SELECT * FROM is_mth_days ORDER BY day");
			$max_visit = 0;
			for($i=0; $i<sizeof($day_info); $i++){
				if($day_info[$i]["count"] > $max_visit){
					$max_visit = $day_info[$i]["count"];
				}
			}

			$im = imagecreatetruecolor(585, 240);
			$col = ImageColorAllocate($im, 189, 199, 231);
			$line_col = ImageColorAllocate($im, 180, 180, 180);
			$white = ImageColorAllocate($im, 255, 255, 255);
			$red = ImageColorAllocate($im, 239, 16, 16);
			$blue = ImageColorAllocate($im, 66, 69, 107);
			$color_black = ImageColorAllocate($im, 0, 0, 0);
			$color_border = ImageColorAllocate($im, 123, 121, 181);
			imagefilledrectangle($im, 0, 0, 585, 240, $white);

			for($i=20; $i<205; $i=$i+20){
				imageline($im, 50, $i, 582, $i, $line_col);
				imageline($im, 50, $i, 45, $i, $color_black);
			}

			imageline($im, 50, 10, 582, 10, $color_black);
			imageline($im, 50, 220, 582, 220, $color_black);
			imageline($im, 50, 10, 50, 220, $color_black);
			imageline($im, 582, 10, 582, 220, $color_black);

			imagestring($im, 2, 2, 12, $max_visit, $color_black);
			imagestring($im, 2, 2, 33, intval($max_visit*9/10), $color_black);
			imagestring($im, 2, 2, 53, intval($max_visit*8/10), $color_black);
			imagestring($im, 2, 2, 73, intval($max_visit*7/10), $color_black);
			imagestring($im, 2, 2, 93, intval($max_visit*6/10), $color_black);
			imagestring($im, 2, 2, 113, intval($max_visit/2), $color_black);
			imagestring($im, 2, 2, 133, intval($max_visit*4/10), $color_black);
			imagestring($im, 2, 2, 153, intval($max_visit*3/10), $color_black);
			imagestring($im, 2, 2, 173, intval($max_visit/5), $color_black);
			imagestring($im, 2, 2, 193, intval($max_visit/10), $color_black);
			imagestring($im, 2, 2, 212, 0, $color_black);

			imagestring($im, 2, 2, 225, LABEL_TRAFICO_DIAS, $color_black);

			$x = 62;
			$last_line_x = 62;
			for($i=0; $i<31; $i++){
				$day = $i + 1;
				if($day < 10){
					$day = "0" . $day;
				}

				if($max_visit > 0){
					$y = 220 - ($day_info[$i]["count"] / $max_visit * 200);
				}else{
					$y = 220;
				}

				$s_x1 = $x - 5;
				$s_x2 = $x + 6;
				imagefilledrectangle($im, $s_x1, $y, $s_x2, 220, $blue);
				imageline($im, $s_x2 + 1, $y, $s_x2 + 1, 220, $color_black);
				imageline($im, $s_x2 + 2, $y, $s_x2 + 2, 220, $color_black);
				imageline($im, $s_x1 - 1, $y + 1, $s_x1 - 1, 220, $color_border);
				imageline($im, $s_x1 - 1, $y - 1, $s_x2 + 2, $y - 1, $color_border);
				imageline($im, $s_x1 - 2, $y, $s_x1 - 2, 220, $color_border);

				// draw the red line
				if(date("j") > $i){
					if(!isset($last_line_y)){
						$last_line_y = $y - 1;
					}else{
						$curr_y = intval(($y - 1 + $last_line_y) / 2);
						imageline($im, $x, $curr_y, $last_line_x, $last_line_y, $red);
						imageline($im, $x, $curr_y-1, $last_line_x, $last_line_y-1, $red);
						imageline($im, $x, $curr_y+1, $last_line_x, $last_line_y+1, $red);
						$last_line_y = $curr_y;
						$last_line_x = $x;
					}
				}

				// write day
				imageline($im, $x, 220, $x, 225, $color_black);
				imagestring($im, 2, $s_x1+1, 225, $day, $color_black);

				$x += 17;
			}

			imagepng($im);
			imagedestroy($im);
			exit;
			break;

			case 'graficoxdominio':

				$x = 350;
				$y = 160;
				$week = 0;
				$showtext = 1;

				$datos = $data->getResult("SELECT * FROM is_ref_site ORDER BY count DESC limit 8");
				$total[0]["sum"] = 0;
				for($i=0; $i<sizeof($datos); $i++){
					$total[0]["sum"] += $datos[$i]["count"];
				}
				$key = "domain";
				$x = 410;
				$y = 155;
				$showtext = 1;

				$data->printImage($x, $y, $datos, $total[0]["sum"], $key, $week, $showtext);
				exit();
			break;

			case 'graficoxbusqueda':

				$x = 350;
				$y = 160;
				$week = 0;
				$showtext = 1;

				$datos = $data->getResult("SELECT * FROM is_engine ORDER BY count DESC limit 6");
				$total[0]["sum"] = 0;
				for($i=0; $i<sizeof($datos); $i++){
					$total[0]["sum"] += $datos[$i]["count"];
				}
				$key = "name";
				$x = 390;
				$y = 135;
				$showtext = 1;

				$data->printImage($x, $y, $datos, $total[0]["sum"], $key, $week, $showtext);
				exit();
			break;

			case 'graficoxbrowser':

				$x = 350;
				$y = 160;
				$week = 0;
				$showtext = 1;

				$datos = $data->getResult("SELECT * FROM is_browser ORDER BY count DESC");
				$total = $data->getResult("SELECT sum(count) AS	sum FROM is_browser");
				$key = "browser";
				$x = 420;
				$y = 190;
				$week = 0;
				$data->printImage($x, $y, $datos, $total[0]["sum"], $key, $week, $showtext);
				exit();
			break;

			case 'graficoxos':

				$x = 350;
				$y = 160;
				$week = 0;
				$showtext = 1;

				$datos = $data->getResult("SELECT * FROM is_os ORDER BY count DESC");
				$total = $data->getResult("SELECT sum(count) AS sum FROM is_os");
				$key = "os";
				$x = 380;
				$week = 0;

				$data->printImage($x, $y, $datos, $total[0]["sum"], $key, $week, $showtext);
				exit();
			break;

			case 'graficoxpantalla':

				$x = 350;
				$y = 160;
				$week = 0;
				$showtext = 1;

				$datos = $data->getResult("SELECT * FROM is_screen ORDER BY count DESC");
				$total = $data->getResult("SELECT sum(count) AS sum FROM is_screen");
				$key = "width";
				$x = 380;
				$week = 0;

				$data->printImage($x, $y, $datos, $total[0]["sum"], $key, $week, $showtext);
				exit();
			break;

			case 'graficoxpalabras':

				$x = 350;
				$y = 160;
				$week = 0;
				$showtext = 1;

				$datos = $data->getResult("SELECT * FROM is_keyword ORDER BY count DESC limit 8");
				$total[0]["sum"] = 0;
				for($i=0; $i<sizeof($datos); $i++){
					$total[0]["sum"] += $datos[$i]["count"];
				}
				$key = "keyword";
				$x = 390;
				$y = 155;
				$showtext = 1;

				$data->printImage($x, $y, $datos, $total[0]["sum"], $key, $week, $showtext);
				exit();
			break;

		}
	}
}
