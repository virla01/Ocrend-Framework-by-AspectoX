<?php

# Seguridad
defined('INDEX_DIR') OR exit('Ocrend software says .i.');

//------------------------------------------------

class weekDaysTrafficController extends Controllers {

	public function __construct() {
		parent::__construct();

		$data = new Trafico;

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

		//header("Content-type: image/png");
		imagepng($im);
		imagedestroy($im);
		exit();
    }
}
