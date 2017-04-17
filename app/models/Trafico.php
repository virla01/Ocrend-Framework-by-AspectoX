<?php

# Seguridad
defined('INDEX_DIR') OR exit('Ocrend software says .i.');

//------------------------------------------------

final class Trafico extends Models implements OCREND {

	public function __construct() {
		parent::__construct();
	}

	public $dbName = "";
	public $dbCon = "";
	public $dbQuery = "";
	public $dbResult = 0;
	public $dbRow = "";


	public function query($query, $type=0){
		if($type == 0){
			$this->dbQuery = $query;
			$this->dbResult = $this->db->query($query);
		}else{
			$this->db->query($query);
		}

		//print error message from MySQL server
		if(!$this->dbResult && $type == 0){
			echo $this->db->error() . "<br>" . $query;
			exit();
		}
	}

	public function getTotalRows($query){
		$this->db->query($query);
		return $this->db->fetchColumn($this->dbResult);
	}

	public function rows($query){
		if($this->db->rows($query) == 0){
			return $this->db->rows($query);
		}else{
			return false;
		}
	}

	public function getResult($query){
		$result = $this->db->query($query);
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$data1[] = $row;
		}
		if(isset($data1)){
			return $data1;
		}else{
			return false;
		}
	}

	#----------------------------------------------------------------
	# return URL's components for update search engine and referer.
	#----------------------------------------------------------------
	public function getHostInfo($referer){
		$host = parse_url($referer);

		$result['host'] = strtolower($host['host']);
		$result['query'] = explode("&", $host['query']);
		$result['search_engine'] = str_replace("www.", "", $result['host']);

		return $result;
	}

	#----------------------------------------------------------------
	# check the referer URL is search engine or not
	#----------------------------------------------------------------
	public function isRef($url, $siteurl){
		//foreach($siteurl as $key => $value){
		//	if(preg_match("/".str_replace("/", "\/", $value)."/i", $url)){
		//		$not_ref = true;
		//	}
		//}
		$not_ref = true;
		if(!isset($not_ref) && $url != ""){
			return true;
		}else{
			return false;
		}
	}

	#----------------------------------------------------------------
	# check the referer URL is search engine or not
	#----------------------------------------------------------------
	public function isEngine($host, $engine){
		foreach($engine as $key => $value){
			if(preg_match("/".$value.".*/i", $host)){
				$engineKey = $key;
			}
		}

		if(isset($engineKey)){
			return $engineKey;
		}else{
			return false;
		}
	}

	#----------------------------------------------------------------
	# search keyword in query array
	#----------------------------------------------------------------
	public function getSearchKey($query, $key){
		for($i=0; $i<sizeof($query); $i++){
			if(preg_match("/\b".$key['key']."=/i", $query[$i])){
				$keyword = str_replace("=", "", strstr($query[$i], "="));
				$i = sizeof($query);
			}
		}

		if(isset($keyword)){
			// covert keyword to utf8
			if($key['charset'] != "UTF-8"){
				$keyword = iconv($key['charset'], "UTF-8", $keyword);
			}
			return $keyword;
		}else{
			return false;
		}
	}

	#----------------------------------------------------------------
	# get update key for user agent
	#----------------------------------------------------------------
	public function getAgent($agent, $search_var, $other_key){
		foreach($search_var as $key => $value){
			if(preg_match("/".$value."/i", $agent)){
				$result = $key;
			}
		}

		if(!isset($result)){
			return $other_key;
		}else{
			return $result;
		}
	}

	#----------------------------------------------------------------
	# return an array for last update date
	#----------------------------------------------------------------
	public function getLastUpdate(){
		global $db;
		//global $cfg['dbPrefix'];

		$this->db->query("SELECT 'date' FROM ".$cfg['dbPrefix']."lastupdate");
		$date = explode("-", self::getRows());

		$result['year'] = $date[0];
		$result['mth'] = $date[1];
		$result['day'] = $date[2];

		return $result;
	}

	#----------------------------------------------------------------
	# count the infomration that show on summary
	#----------------------------------------------------------------
	public function CountDays(){
		$date = date("Y-m-d");
		$week = date("W");
		$mth = date("m");
		$year = date("Y");

		$total_visitas = $this->db->select('*','is_count');

		$result['total'] = $total_visitas[0]['count'];
		$result['days'] = $total_visitas[0]['days'];

		if($result['total'] > 0){
			if($result['days'] > 0){
				$result['ava_day'] = $result['total'] / $result['days'];
			}else{
				$result['ava_day'] = $result['total'];
			}
			$result['ava_hour'] = $result['ava_day'] / 24;
			$result['ava_week'] = $result['ava_day'] * 7;
			$result['ava_mth'] = $result['ava_day'] * 30;
		}else{
			$result['ava_day'] = 0;
			$result['ava_hour'] = 0;
			$result['ava_week'] = 0;
			$result['ava_mth'] = 0;
			$result['total'] = 0;
		}

		$online_time = time() - 600;
		$online_counter = $this->db->query("SELECT COUNT(*) AS total FROM is_session WHERE 'time'>'" . $online_time . "'");
		$online_counter = $online_counter->fetchAll();
		$result['online'] = $online_counter[0]['total'];

		$max_date = $this->db->query("SELECT date, daycount FROM is_daycount ORDER BY daycount DESC");
		$max_date = $max_date->fetchAll();
		if($max_date){
			$result['max_date'] = $max_date[0]['date'];
			$result['max_daycount'] = $max_date[0]['daycount'];
		}else{
			$result['max_date'] = "------";
			$result['max_daycount'] = 0;
		}

		$today = $this->db->query("SELECT daycount FROM is_daycount WHERE date='$date'");
		$today = $today->fetchAll();
		$this_week = $this->db->query("SELECT count FROM is_week WHERE week='$week' and year='$year'");
		$this_week = $this_week->fetchAll();
		$this_mth = $this->db->query("SELECT count FROM is_mth WHERE mth='$mth' and year='$year'");
		$this_mth = $this_mth->fetchAll();

		if($today){
			$result['today'] = $today[0]['daycount'];
		}else{
			$result['today'] = 0;
		}

		if($this_week){
			$result['this_week'] = $this_week[0]['count'];
		}else{
			$result['this_week'] = 0;
		}

		if($this_mth){
			$result['this_mth'] = $this_mth[0]['count'];
		}else{
			$result['this_mth'] = 0;
		}

		$max_week = $this->db->query("SELECT date, count FROM is_week ORDER BY count DESC LIMIT 1");
		$max_week = $max_week->fetchAll();
		$max_mth = $this->db->query("SELECT year, mth, count FROM is_mth ORDER BY count DESC LIMIT 1");
		$max_mth = $max_mth->fetchAll();

		if($max_week){
			$result['max_week'] = $max_week[0]['date'];
			$result['max_weekcount'] = $max_week[0]['count'];
		}else{
			$result['max_week'] = "------";
			$result['max_weekcount'] = 0;
		}

		if($max_mth){
			$result['max_mth'] = $max_mth[0]['year']."/".$max_mth[0]['mth'];
			$result['max_mthcount'] = $max_mth[0]['count'];
		}else{
			$result['max_mth'] = "------";
			$result['max_mthcount'] = 0;
		}

		if(isset($result)){
			return $result;
		}

	}

	#----------------------------------------------------------------
	# using for print image
	#----------------------------------------------------------------
	public function printImage($x, $y, $data, $total, $key, $week=0, $showtext=1){

		$days = array(DIA_LARGO_0, DIA_LARGO_1, DIA_LARGO_2, DIA_LARGO_3, DIA_LARGO_4, DIA_LARGO_5, DIA_LARGO_6);

		$image = imagecreatetruecolor($x, $y);
		$white = imagecolorallocate($image, 255, 255, 255);
		$bg_col = imagecolorallocate($image, 184, 197, 226);
		$dark_col = imagecolorallocate($image, 110, 110, 110);
		$textcolor = imagecolorallocate($image, 0x00, 0x00, 0x00);

		imagefilledrectangle($image, 0, 0, $x, $y, $white);

		$col[0] = imagecolorallocate($image, 0, 113, 189);
		$col[1] = imagecolorallocate($image, 178, 210, 52);
		$col[2] = imagecolorallocate($image, 0, 115, 106);
		$col[3] = imagecolorallocate($image, 255, 168, 81);
		$col[4] = imagecolorallocate($image, 206, 48, 0);
		$col[5] = imagecolorallocate($image, 24, 24, 173);
		$col[6] = imagecolorallocate($image, 8, 190, 195);
		$col[7] = imagecolorallocate($image, 0, 204, 51);
		$col[8] = imagecolorallocate($image, 255, 215, 66);
		$col[9] = imagecolorallocate($image, 173, 16, 165);

		// make the 3D effect
		for ($i = 75; $i > 60; $i--) {
			imagefilledarc($image, 105, $i, 200, 100, 0, 360, $dark_col, IMG_ARC_PIE);
		}

		$start = 0;
		$point_y = 10;
		if($total > 0){
			for($i=0; $i<sizeof($data); $i++){
				if ($data[$i]['count'] > 0) {
					$temp = $i + 1;
					if($temp < sizeof($data)){
						$rate = intval($data[$i]["count"] / $total * 360);
					}else{
						$rate = intval($data[$i]["count"] / $total * 360);
						$temp_rate = $rate + $start;
						if($temp_rate < 360){
							$rate = 360 - $start;
						}
					}
					$percent = sprintf("%.1f", $data[$i]["count"] / $total * 100);
					imagefilledarc($image, 105, 60, 200, 100, $start, $rate+$start, $col[$i], IMG_ARC_PIE);

					if($showtext == 1){
						imagefilledrectangle($image, 225, $point_y+7, 237, $point_y+12, $col[$i]);

						if($week > 0){
							$text = $days[$data[$i]["day"]];
						}else{
							$text = $data[$i][$key];
						}
						imagestring($image, 2, 250, $point_y+2, $text . " (" . $percent . "%)", $textcolor);
					}


					$start += $rate;
					$point_y += 18;
				}
			}
		}else{
			imagefilledarc($image, 105, 60, 200, 100, 0, 360, $col[6], IMG_ARC_PIE);
			imagestring($image, 2, 63, 53, LABEL_TRAFICO_NOREGRISTROS, $textcolor);
		}

		imagepng($image);
		imagedestroy($image);
	}

	#----------------------------------------------------------------
	# this function used by print report
	#----------------------------------------------------------------
	public function PrintStats($sum, $max, $visit, $period, $d_bar=380){
		$total_bar = $d_bar + 10;

		for($i = 0; $i < $period; $i++){
			if($max > 0){
				$percent = $visit[$i]["count"] / $sum * 100;
				$percent = sprintf("%.2f", $percent);
				$bar = $visit[$i]["count"] / $max * $d_bar;
				$bar = sprintf("%.0f", $bar);
				$bg_bar = $total_bar - $bar;
			}else{
				$percent = 0;
				$bar = 0;
				$bg_bar = $total_bar;
			}

			if($i % 2){
				$bg_color = "#E6E6E6";
			}else{
				$bg_color = "#FFFFFF";
			}

			$result[$i]["percent"] = $percent;
			$result[$i]["bar"] = $bar;
			$result[$i]["bg_bar"] = $bg_bar;
			$result[$i]["bg_color"] = $bg_color;
		}

		if(isset($result)){
			return $result;
		}
	}

	#----------------------------------------------------------------
	# return average, forecast of day and month
	#----------------------------------------------------------------
	public function getAvgForecast($total_count, $mth_count, $day_count, $start_time){

		$days = (time() - $start_time) / (3600 * 24);

		// count average number
		$result['day_avg'] = $total_count / $days;
		$result['mth_avg'] = sprintf("%.0f", $result['day_avg'] * 30);

		// count forecast number
		$result['day_forecast'] = sprintf("%.0f", ($day_count * 1440) / (date("G")*60 + date("i")));
		$result['mth_forecast'] = sprintf("%.0f", ($mth_count * 1440 * date("t")) / (((date("j")-1)*1440) + date("G")*60 + date("i")));

		return $result;
	}

	#----------------------------------------------------------------
	# make url for shorting options
	#----------------------------------------------------------------
	public function mkUrl($baseurl, $shortby, $toshort){

		// define the default url
		$result['count'] = $baseurl . "shortby=count&toshort=desc";
		$result['mthcount'] = $baseurl . "shortby=mthcount&toshort=desc";
		$result['daycount'] = $baseurl . "shortby=daycount&toshort=desc";


		if($toshort == "desc"){
			$result[$shortby] = $baseurl . "shortby=".$shortby."&toshort=asc";
		}

		return $result;
	}

	#----------------------------------------------------------------
	# delete repeat keyword in is_keyword
	#----------------------------------------------------------------
	public function rmKeyword(){
		global $db;
		$rm_sql = "";
		$insert_sql = "";

		$rows = $db->getResult("SELECT `keyword`, `mthcount`, `daycount`, start_time, `count`, count(*) as total FROM `is_keyword` GROUP BY `keyword` HAVING `total`>'1'");

		for($i=0; $i<sizeof($rows); $i++){
			$rows[$i]['keyword'] = mysql_escape_string($rows[$i]['keyword']);
			$db->query("delete from `is_keyword` where `keyword` like '".$rows[$i]['keyword']."'", 1);
			$db->query("insert into `is_keyword` values('".$rows[$i]['keyword']."', '".$rows[$i]['mthcount']."', '".$rows[$i]['daycount']."', '".$rows[$i]['start_time']."', '".$rows[$i]['count']."')", 1);
		}
	}

	public function dayVisitor(){
		$day_visitor = $this->db->query("SELECT * FROM is_daycount ORDER BY date DESC LIMIT 4");
		$day_visitor = $day_visitor->fetchAll();
		//return $day_visitor;
	}

	public function forecast(){
		$hour_info = $this->db->query("SELECT sum(count) AS sum FROM is_hour WHERE hour BETWEEN '00' AND '" . date("H", time()-3600) . "'");
		$hour_info = $hour_info->fetchAll();

		$hour_sum = $this->db->query("SELECT sum(count) AS sum FROM is_hour");
		$hour_sum = $hour_sum->fetchAll();

		$per_hour_info = $this->db->query("SELECT count FROM is_hour WHERE hour='".date("H")."'");
		$per_hour_info = $per_hour_info->fetchAll();

		return [
			'hour_info' => $hour_info,
			'hour_sum' => $hour_sum,
			'per_hour_info' => $per_hour_info
		];
	}

	public function lastVisitor(){
		$l_visitor = $this->db->query("SELECT * FROM is_last_visitor ORDER BY time DESC LIMIT 10");
		$l_visitor = $l_visitor->fetchAll();
		return $l_visitor;
	}

    public function getUrl(){
        $ref = $this->db->query("SELECT * FROM is_referer ORDER BY count DESC LIMIT 50");
		$ref = $ref->fetchAll();
        $sum = $this->db->query("SELECT sum(count) AS sum FROM is_referer");
		$sum = $sum->fetchAll();
        $max = $this->db->query("SELECT max(count) AS max FROM is_referer");
		$max = $max->fetchAll();
        $report = self::PrintStats($sum[0]["sum"], $max[0]["max"], $ref, sizeof($ref), 350);
		return [
			'ref' => $ref,
			'report' => $report
		];
    }

	public function dayInfo(){
		$day_info = $this->db->query("SELECT date , daycount FROM is_daycount ORDER BY date DESC LIMIT 30");
		$day_info = $day_info->fetchAll();
		//return $day_info;
	}

    public function visitHour(){
        $hour = $this->db->query("SELECT * FROM is_hour ORDER BY hour");
        $hour = $hour->fetchAll();
        return $hour;
    }

    public function sum_visitHour(){
        $sum = $this->db->query("SELECT sum(count) AS sum FROM is_hour");
        $sum = $sum->fetchAll();
        return $sum;
    }

	public function weekday(){
		$week_day = $this->db->query("SELECT * FROM is_week_days ORDER BY day");
		$week_day = $week_day->fetchAll();
		return $week_day;
	}

	public function __destruct() {
		parent::__destruct();
	}

}

?>
