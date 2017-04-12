<?php

# Seguridad
defined('INDEX_DIR') OR exit('Ocrend software says .i.');

//------------------------------------------------

final class Counter extends Models implements OCREND {

	public function __construct() {
		parent::__construct();
	}


	public function getCounter(){
		// including search engine URL
		$searchEngine = Array(
			"Google" => "google",
			"DMOZ" => "dmoz\.org",
			"Yahoo" => "yahoo",
			"MSN" => "msn\.com",
			"Sina (CN)" => "sina\.com\.cn",
			"Sina" => "sina\.com",
			"Baidu" => "baidu\.com",
			"SOHU" => "sohu\.com",
			"LookSmart" => "looksmart\.com",
			"AlltheWeb" => "alltheweb\.com",
			"Lycos" => "lycos\.com",
			"Netscape" => "netscape\.com",
			"HotBot" => "hotbot\.com",
			"Altavista" => "altavista\.com",
			"Google (HK)" => "google\.com\.hk",
			"Google (TW)" => "google\.com\.tw",
			"Yahoo (HK)" => "hk.*.yahoo\.com",
			"Yahoo (CN)" => "cn.*.yahoo\.com",
			"Yahoo (TW)" => "tw.*.yahoo\.com",
			"Yam (TW)" => "yam\.com",
			"PCHome (TW)" => "pchome\.com\.tw",
			"Openfind" => "openfind\.com",
			"Timway" => "timway\.com"
		);

		// URL appear in $searchEngine, but actully not search engine
		$notEngineKey = Array(
			"Yahoo" => "mail\.yahoo",
			"MSN" => "hotmail\.msn"
		);

		// define search engines has coded in UTF8
		$EngineUTF = Array("google", "msn", "alltheweb");

		// the rules to extract keywords and charset from a referrer URL
		$searchKeyword = Array(
			"Google" => Array("key" => "q", "charset" => "UTF-8"),
			"DMOZ" => Array("key" => "search", "charset" => "UTF-8"),
			"Yahoo" => Array("key" => "p", "charset" => "UTF-8"),
			"MSN" => Array("key" => "q", "charset" => "UTF-8"),
			"Sina (CN)" => Array("key" => "_searchkey|word", "charset" => "GB2312"),
			"Sina" => Array("key" => "_searchkey|word", "charset" => "BIG5"),
			"Baidu" => Array("key" => "word|w", "charset" => "GB2312"),
			"SOHU" => Array("key" => "key_word", "charset" => "GB2312"),
			"LookSmart" => Array("key" => "r_search", "charset" => "UTF-8"),
			"AlltheWeb" => Array("key" => "q", "charset" => "UTF-8"),
			"Lycos" => Array("key" => "query", "charset" => "ISO-8859-1"),
			"Netscape" => Array("key" => "where|query", "charset" => "ISO-8859-1"),
			"HotBot" => Array("key" => "query", "charset" => "ISO-8859-1"),
			"Altavista" => Array("key" => "q", "charset" => "UTF-8"),
			"Google (HK)" => Array("key" => "q", "charset" => "UTF-8"),
			"Google (TW)" => Array("key" => "q", "charset" => "UTF-8"),
			"Yahoo (HK)" => Array("key" => "p", "charset" => "UTF-8"),
			"Yahoo (CN)" => Array("key" => "p", "charset" => "GB2312"),
			"Yahoo (TW)" => Array("key" => "p", "charset" => "BIG5"),
			"Yam (TW)" => Array("key" => "k", "charset" => "UTF-8"),
			"PCHome (TW)" => Array("key" => "key", "charset" => "BIG5"),
			"Openfind" => Array("key" => "Query", "charset" => "BIG5"),
			"Timway" => Array("key" => "keyword", "charset" => "BIG5")
		);

		$userOS = Array(
			"Windows 10" => "Windows NT 10",
			"Windows 8" => "Windows NT 8",
			"Windows 7" => "Windows NT 6.1",
			"Windows Vista" => "Windows NT 6.0",
			"Windows XP" => "Windows NT 5.1",
			"Windows 2000" => "Windows NT 5.0",
			"Windows NT 4.0" => "Windows NT 4",
			"Windows 9x" => "Windows 9",
			"Windows 9x" => "Win 9",
			"Windows Me" => "Windows Me",
			"Linux" => "Linux",
			"Macintosh" => "Macintosh"
		);

		$userBrowser = Array(
			"Internet Explorer" => "MSIE",
            "Chrome" => "Chrome",
			"Firefox" => "Firefox",
			"Safari" => "Safari",
			"Opera" => "Opera"
            "Edge" => "EDGE",
		);

		$userScreen = Array(
			"640 x 480" => "640",
			"800 x 600" => "800",
			"1024 x 768" => "1024",
			"1152 x 864" => "1152",
			"1280 x 1024" => "1280",
            "1280 x 720" => "1280",
            "1768 x 992" => "1768",
            "1920 x 1080" => "1920"
		);

		$userColor = Array(
			"256 color" => "8",
			"16 bit" => "16",
			"24 bit" => "24",
			"32 bit" => "32"
		);

		// clear ' on all $_GET variables
		$_GET['sw'] = trim(str_replace("'", "", $_GET['sw']));
		$_GET['sc'] = trim(str_replace("'", "", $_GET['sc']));
		$_GET['referer'] = trim(str_replace("'", "", $_GET['referer']));
		$_GET['page'] = trim(str_replace("'", "", $_GET['page']));

		/* update online counter */
		if(!isset($_COOKIE['is_hash'])){
			$hash = md5(time());
		}else{
			$hash = $_COOKIE['is_hash'];
		}

		if(count($this->db->query("SELECT hash FROM is_session WHERE hash='" . $hash . "'")) > 0){
			$this->db->query("UPDATE is_session SET time='" . time() . "' WHERE hash='" . $hash . "'");
		}else{
			$this->db->query("INSERT INTO is_session values('" . $hash . "', '" . time() . "')");
		}

		setcookie("is_hash", $hash, time()+43200);

		/* update page counter here */
		if($cfg['pagestats'] == "fulladd"){
			$page = parse_url($_GET['page']);
			$page_info = $page['path'];
			if($page['query'] != "")  $page_info .= "?" . $page['query'];
		}elseif($cfg['pagestats'] == "filename"){
			$page = parse_url($_GET['page']);
			if($page['path'] == ""){
				$page_info = "/";
			}else{
				$page_info = $page['path'];
			}
		}elseif($cfg['pagestats'] == "title"){
			$html_content = file_get_contents($_GET['page']);
			preg_match("/<title>(.*)<\/title>/i", $html_content, $match);
			$page_info = $match[1];
		}else{
			$page = parse_url($_GET['page']);
			$page_info = $page['path'];
			if($page['query'] != "")  $page_info .= "?" . $page['query'];
		}

		if(count($this->db->query("SELECT count FROM is_page WHERE page='" . $page['path'] . "'")) > 0){
			$this->db->query("UPDATE is_page SET count = count+'1' WHERE page='" . $page['path'] . "'");
		}else{
			$this->db->query("INSERT INTO is_page values('" . $page['path'] . "', '1')");
		}

		// it will not count the same visitor when he/she reload
		$check_ip = $this->db->query("SELECT ip FROM is_ip WHERE time='" . date("YmdH") . "' and ip='" . $_SERVER['REMOTE_ADDR'] . "'");
		$check_ip = $check_ip->fetchAll();

		if(isset($_COOKIE['is_visitor']) || $check_ip){
			exit();
		}

		// remember visitor's ip address and using cookie remember him/her 12 hours
		$this->db->query("INSERT INTO is_ip values('" . $_SERVER['REMOTE_ADDR']  ."', '" . date("YmdH") . "')");
		setcookie("is_visitor", 1, time()+43200);

		/* update counter data: day visitors, pageviews and total visit */
		$date = date("Y-m-d");
		if(count($this->db->query("SELECT daycount FROM is_daycount WHERE date='" . $date . "'") > 0)){
			$this->db->query("UPDATE is_daycount SET daycount=daycount+'1' WHERE date='" . date("Y-m-d") . "'");
		}else{
			$this->db->query("INSERT INTO is_daycount values('" . $date . "', '1')");
			$this->db->query("UPDATE is_count SET days = days+'1'");
			$this->db->query("UPDATE is_today_hour SET count='0'");
			// delete all session, ip, referer, last_visitor and hostname inforamtion
			$this->db->query("TRUNCATE table is_session");
			$this->db->query("TRUNCATE table is_ip");
			$this->db->query("TRUNCATE table is_page");
			$this->db->query("TRUNCATE table is_hostname");

			// update search country, engine, keyword and referer website's information
			$this->db->query("TRUNCATE table is_referer");
			$this->db->query("UPDATE is_engine SET daycount='0'");
			$this->db->query("UPDATE is_keyword SET daycount='0'");
			$this->db->query("UPDATE is_ref_site SET daycount='0'");

			$this->db->query("INSERT INTO is_page values('" . $page['path'] . "', '1')");
		}

		$this->db->query("UPDATE is_count SET count = count+1");

		/* update monthly counter information */
		// these variables using on "week" also
		$year = date("Y");
		$mth = date("m");
		$day = date("d");

		if(count($this->db->query("SELECT count FROM is_mth WHERE mth='" . $mth . "' and year='" . $year . "'") > 0)){
			$this->db->query("UPDATE is_mth SET count = count+1 WHERE mth='" . $mth . "' and year='" . $year . "'");
			$this->db->query("UPDATE is_mth_days SET count = count+1 WHERE day='" . $day . "'");
		}else{
			$this->db->query("INSERT INTO is_mth values('" . $mth . "', '". $year ."', '1')");
			$this->db->query("UPDATE is_mth_days SET count='1' where `day`='".$day."'");
			$this->db->query("UPDATE is_mth_days SET count='0' where `day`!='".$day."'");
			// update search country, engine, keyword and referer website's information
			$this->db->query("UPDATE is_engine SET mthcount='0'");
			$this->db->query("UPDATE is_keyword SET mthcount='0'");
			$this->db->query("UPDATE is_ref_site SET mthcount='0'");
		}

		/* update week information */
		if(count($this->db->query("SELECT count FROM is_week WHERE week='" . date("W") . "' and year='" . $year . "'") > 0)){
			$this->db->query("UPDATE is_week SET count = count+1 WHERE week='" . date("W") . "' and year='" . $year . "'");
		}else{
			$this->db->query("INSERT INTO is_week values('" . date("W") . "', '" . $year . "', '" . time() . "', '1')");
		}
		// update week days counter
		$this->db->query("UPDATE is_week_days SET count = count+1 WHERE day='" . date("w") . "'");

		/* update referer data: referer url, search engine and keyword */
		$_GET['referer'] = str_replace("[i-Stats]", "&", addslashes($_GET['referer']));
		if(isRef($_GET['referer'], $cfg['siteurl']) && strstr($_GET['referer'], ".")){
			if(count($this->db->query("SELECT count FROM is_referer WHERE url='" . $_GET['referer'] . "'") > 0)){
				$this->db->query("UPDATE is_referer SET count = count+'1' WHERE url='" . $_GET['referer'] . "'");
			}else{
				$this->db->query("INSERT INTO is_referer values('" . $_GET['referer'] . "', '1')");
			}

			/* start search engine and keyword section */
			$ref_data = getHostInfo($_GET['referer']);

			if($engine_key = isEngine($ref_data['host'], $searchEngine)){
				// update search engine counter
				if(count($this->db->query("SELECT name FROM is_engine WHERE name='" . $engine_key . "'") > 0)){
					$this->db->query("UPDATE is_engine SET mthcount = mthcount+'1', daycount = daycount+'1', count = count+'1' WHERE name='" . $engine_key . "'");
				}else{
					$this->db->query("INSERT INTO is_engine values('" . $engine_key . "', '1', '1', '" . time() . "', '1')");
				}

				// update keyword counter
				if($keyword = getSearchKey($ref_data['query'], $searchKeyword[$engine_key])){
					if(count($this->db->query("SELECT count FROM is_keyword WHERE keyword LIKE '" . $keyword . "'") > 0)){
						$this->db->query("UPDATE is_keyword SET mthcount = mthcount+'1', daycount = daycount+'1', count = count+'1' WHERE keyword LIKE '" . $keyword . "'");
					}else{
						$this->db->query("INSERT INTO is_keyword values('" . $keyword . "', '1', '1', '" . time() . "', '1')");
					}
				}
			}else{
				// update referer website
				$ref_data['host'] = str_replace("www.", "", $ref_data['host']);
				if(count($this->db->query("SELECT count FROM is_ref_site WHERE domain='" . $ref_data['host'] . "'") > 0)){
					$this->db->query("UPDATE is_ref_site SET mthcount = mthcount+'1', daycount = daycount+'1', count = count+'1' WHERE domain ='" . $ref_data['host'] . "'");
				}else{
					$this->db->query("INSERT INTO is_ref_site values('" . $ref_data['host'] . "', '1', '1', '" . time() . "', '1')");
				}
			}
		}

		/* update OS, browser, screen sizse and color resolution */
		// update os
		$os_key = getAgent($_SERVER['HTTP_USER_AGENT'], $userOS, "Other");
		$this->db->query("UPDATE is_os SET count = count+1 WHERE os ='" . $os_key . "'");

		// update browser
		$browser_key = getAgent($_SERVER['HTTP_USER_AGENT'], $userBrowser, "Other");
		$this->db->query("UPDATE is_browser SET count = count+1 WHERE browser ='" . $browser_key . "'");

		// update screen
		$screen_key = getAgent($_GET['sw'], $userScreen, "Unknow");
		$this->db->query("UPDATE is_screen SET count = count+1 WHERE width = '" . $screen_key . "'");

		// update color
		$color_key = getAgent($_GET['sc'], $userColor, "Unknow");
		$this->db->query("UPDATE is_color SET count = count+1 WHERE color ='" . $color_key . "'");

		/* update hour counter */
		$this->db->query("UPDATE is_today_hour SET count = count+1 WHERE hour ='" . date("H") . "'");
		$this->db->query("UPDATE is_hour SET count = count+1 WHERE hour ='" . date("H") . "'");

		/* update hostname counter */
		// hostname also using for last 10 visitors
		$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
		if($hostname == $_SERVER['REMOTE_ADDR']){
			$hostname = "IP Only";
		}else{
			$hostname = explode(".", $hostname);
			$host_size = sizeof($hostname);
			if($host_size > 3){
				$hostname = $hostname[$host_size-3] . "." . $hostname[$host_size-2] . "." . $hostname[$host_size-1];
			}else{
				$hostname = $hostname[$host_size-2] . "." . $hostname[$host_size-1];
			}
		}

		if(count($this->db->query("SELECT hostname FROM is_hostname WHERE hostname ='" . $hostname . "'") > 0)){
			$this->db->query("UPDATE is_hostname SET count = count+1 WHERE hostname ='" . $hostname . "'");
		}else{
			$this->db->query("INSERT INTO is_hostname values('" . $hostname . "', '1')");
		}

		/* update last 10 visitors */
		$this->db->query("INSERT INTO is_last_visitor values('" . $_SERVER['HTTP_USER_AGENT'] . "', '" . $hostname . "', '" . $country_code . "', '" . $country_name . "', '" . $_GET['referer'] . "', '" . time() . "')");

		// delete old data from is_last_visitor table
		$this->db->query("SELECT @del_time:='time' FROM is_last_visitor ORDER BY time DESC LIMIT 9, 1;
			DELETE FROM is_last_visitor WHERE time < @del_time;");
	}

	public function __destruct() {
		parent::__destruct();
	}

}

?>
