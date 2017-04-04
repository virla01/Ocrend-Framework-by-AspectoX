<?php

# Seguridad
defined('INDEX_DIR') OR exit('Ocrend software says .i.');

//------------------------------------------------

final class Visitas extends Models implements OCREND {

	public function __construct() {
		parent::__construct();
	}

	public function getuserip(){
		if (!empty($_SERVER['HTTP_CLIENT_IP'])){
			$ip=$_SERVER['HTTP_CLIENT_IP'];
		}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
		}elseif (isset($_SERVER["HTTP_CF_CONNECTING_IP"])){
			$ip=$_SERVER["HTTP_CF_CONNECTING_IP"];
		} else {
			$ip=$_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}

	public function getusercountry(){
		$country = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']));
		//d(unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR'])));
		if (is_null($country['geoplugin_countryCode'])){
			$countryC = "No reconocido";
		}else{
			$countryC = $country[7];
		}
		if (is_null($country['geoplugin_countryName'])){
			$countryN = "No reconocido";
		}else{
			$countryN = $country[8];
		}
		return array(
			'countryC' => $countryC,
			'countryN' => $countryN
		);
	}

	public function detectBrowser(){
		if(!isset( $_SERVER['HTTP_USER_AGENT'])){
			$name = "none";
		}else{
			$userAgent = strtolower($_SERVER['HTTP_USER_AGENT']);

			if(strpos($userAgent, 'maxthon') !== FALSE)
				$name = "Maxthon";
			elseif(strpos($userAgent, 'seaMonkey') !== FALSE)
				$name = "SeaMonkey";
			elseif(strpos($userAgent, 'vivaldi') !== FALSE)
				$name = "Vivaldi";
			elseif(strpos($userAgent, 'arora') !== FALSE)
				$name = "Arora";
			elseif(strpos($userAgent, 'avant browser') !== FALSE)
				$name = "Avant Browser";
			elseif(strpos($userAgent, 'beamrise') !== FALSE)
				$name = "Beamrise";
			elseif(strpos($userAgent, 'epiphany') !== FALSE)
				$name = 'Epiphany';
			elseif(strpos($userAgent, 'chromium') !== FALSE)
				$name = 'Chromium';
			elseif(strpos($userAgent, 'iceweasel') !== FALSE)
				$name = 'Iceweasel';
			elseif(strpos($userAgent, 'galeon') !== FALSE)
				$name = 'Galeon';
			elseif(strpos($userAgent, 'edge') !== FALSE)
				$name = 'Microsoft Edge';
			elseif(strpos($userAgent, 'trident') !== FALSE) //IE 11
				$name = 'Internet Explorer';
			elseif(strpos($userAgent, 'msie') !== FALSE)
				$name = 'Internet Explorer';
			elseif(strpos($userAgent, 'opera Mini') !== FALSE)
				$name = "Opera Mini";
			elseif(strpos($userAgent, 'opera') || strpos($userAgent, 'OPR') !== FALSE)
				$name = "Opera";
			elseif(strpos($userAgent, 'firefox') !== FALSE)
				$name = 'Mozilla Firefox';
			elseif(strpos($userAgent, 'chrome') !== FALSE)
				$name = 'Google Chrome';
			elseif(strpos($userAgent, 'safari') !== FALSE)
				$name = "Safari";
			elseif(strpos($userAgent, 'iTunes') !== FALSE)
				$name = 'iTunes';
			elseif(strpos($userAgent, 'konqueror') !== FALSE)
				$name = 'Konqueror';
			elseif(strpos($userAgent, 'dillo') !== FALSE)
				$name = 'Dillo';
			elseif(strpos($userAgent, 'netscape') !== FALSE)
				$name = 'Netscape';
			elseif(strpos($userAgent, 'midori') !== FALSE)
				$name = 'Midori';
			elseif(strpos($userAgent, 'eLinks') !== FALSE)
				$name = 'ELinks';
			elseif(strpos($userAgent, 'links') !== FALSE)
				$name = 'Links';
			elseif(strpos($userAgent, 'lynx') !== FALSE)
				$name = 'Lynx';
			elseif(strpos($userAgent, 'w3m') !== FALSE)
				$name = 'w3m';
			else
				$name = 'No reconocido';

			if (preg_match('/.+(?:rv|it|ra|ie)[\/: ]([\d.]+)/', $userAgent, $matches)) {
				$version = $matches[1];
			}else {
				$version = 'No reconocido';
			}

			if(strpos($userAgent, 'windows nt 10.0') !== FALSE)
				$platform = "Windows 10";
			elseif(strpos($userAgent, 'Windows nt 6.3') !== FALSE)
				$platform = "Windows 8.1";
			elseif(strpos($userAgent, 'Windows nt 6.2') !== FALSE)
				$platform = "Windows 8";
			elseif(strpos($userAgent, 'Windows nt 6.1') !== FALSE)
				$platform = "Windows 7";
			elseif(strpos($userAgent, 'Windows nt 6.0') !== FALSE)
				$platform = "Windows Vista";
			elseif(strpos($userAgent, 'Windows nt 5.1') !== FALSE)
				$platform = "Windows XP";
			elseif(strpos($userAgent, 'Windows nt 5.2') !== FALSE)
				$platform = 'Windows 2003';
			elseif(strpos($userAgent, 'Windows nt 5.0') !== FALSE)
				$platform = 'Windows 2000';
			elseif(strpos($userAgent, 'Windows me') !== FALSE)
				$platform = 'Windows ME';
			elseif(strpos($userAgent, 'Win98') !== FALSE)
				$platform = 'Windows 98';
			elseif(strpos($userAgent, 'Win95') !== FALSE)
				$platform = 'Windows 95';
			elseif(strpos($userAgent, 'WinNT4.0') !== FALSE)
				$platform = 'Windows NT 4.0';
			elseif(strpos($userAgent, 'Windows Phone') !== FALSE)
				$platform = 'Windows Phone';
			elseif(strpos($userAgent, 'Windows') !== FALSE)
				$platform = 'Windows';
			elseif(strpos($userAgent, 'iPhone') !== FALSE)
				$platform = 'iPhone';
			elseif(strpos($userAgent, 'iPad') !== FALSE)
				$platform = 'iPad';
			elseif(strpos($userAgent, 'Debian') !== FALSE)
				$platform = 'Debian';
			elseif(strpos($userAgent, 'Ubuntu') !== FALSE)
				$platform = 'Ubuntu';
			elseif(strpos($userAgent, 'Slackware') !== FALSE)
				$platform = 'Slackware';
			elseif(strpos($userAgent, 'Linux Mint') !== FALSE)
				$platform = 'Linux Mint';
			elseif(strpos($userAgent, 'Gentoo') !== FALSE)
				$platform = 'Gentoo';
			elseif(strpos($userAgent, 'Elementary OS') !== FALSE)
				$platform = 'ELementary OS';
			elseif(strpos($userAgent, 'Fedora') !== FALSE)
				$platform = 'Fedora';
			elseif(strpos($userAgent, 'Kubuntu') !== FALSE)
				$platform = 'Kubuntu';
			elseif(strpos($userAgent, 'Linux') !== FALSE)
				$platform = 'Linux';
			elseif(strpos($userAgent, 'FreeBSD') !== FALSE)
				$platform = 'FreeBSD';
			elseif(strpos($userAgent, 'OpenBSD') !== FALSE)
				$platform = 'OpenBSD';
			elseif(strpos($userAgent, 'NetBSD') !== FALSE)
				$platform = 'NetBSD';
			elseif(strpos($userAgent, 'SunOS') !== FALSE)
				$platform = 'Solaris';
			elseif(strpos($userAgent, 'BlackBerry') !== FALSE)
				$platform = 'BlackBerry';
			elseif(strpos($userAgent, 'Android') !== FALSE)
				$platform = 'Android';
			elseif(strpos($userAgent, 'Mobile') !== FALSE)
				$platform = 'Firefox OS';
			elseif(strpos($userAgent, 'Mac OS X+') || strpos($userAgent, 'CFNetwork+') !== FALSE)
				$platform = 'Mac OS X';
			elseif(strpos($userAgent, 'Macintosh') !== FALSE)
				$platform = 'Mac OS Classic';
			elseif(strpos($userAgent, 'OS/2') !== FALSE)
				$platform = 'OS/2';
			elseif(strpos($userAgent, 'BeOS') !== FALSE)
				$platform = 'BeOS';
			elseif(strpos($userAgent, 'Nintendo') !== FALSE)
				$platform = 'Nintendo';
			else
				$platform = 'No reconocido';
		}

		return array(
			'name'      => $name,
			'version'   => $version,
			'platform'  => $platform,
			'userAgent' => $userAgent
		);
	}

	public function countrow(){
		$visitas = $this->db->select('*','visitas','1=1','LIMIT 1','ORDER BY id DESC');
		if (!isset($visitas)){
			foreach($visitas as $vis){
				$list = $vis['id'];
			}
		}else{
			$list = '0';
		}
		return $list;
	}

	public function nowdetect(){

		$count = self::countrow(); // count from zero . from database .
		$id = $count + 1;
		$ip = self::getuserip();
		$country = self::getusercountry();
		$useragent = self::detectBrowser();
		$time = date('d/m/Y h:i:s a', time());

		$result = $this->db->select('ip','visitas','1=1','LIMIT 1','ORDER BY id DESC');

		if ($ip == $result['ip']){
			$a=array(
				'id' => $id,
				'ip' => $ip,
				'countryCode' => $country['countryC'],
				'countryName' => $country['countryN'],
				'navegador' => $useragent['name'],
				'version' => $useragent['version'],
				'plataforma' => $useragent['platform'],
				'useragent' => $useragent['userAgent'],
				'time' => $time
			);
			$this->db->update('visitas',$a, "id='$id'", 'LIMIT 1');
		}else{
			$a=array(
				'id' => $id,
				'ip' => $ip,
				'countryCode' => $country['countryC'],
				'countryName' => $country['countryN'],
				'navegador' => $useragent['name'],
				'version' => $useragent['version'],
				'plataforma' => $useragent['platform'],
				'useragent' => $useragent['userAgent'],
				'time' => $time
			);
			$this->db->insert('counter', $a);
		}
	}

	public function showResult(){
		return $this->db->query("SELECT countid,countryName,navegador,plataforma, SUM(useragent) AS useragent FROM visitas GROUP BY countid ASC, countryName ASC, navegador ASC,plataforma ASC;");
	}

	public function countStats(){
		$visitas = $this->db->select('*','visitas','1=1','LIMIT 1','ORDER BY id DESC');
		if (isset($visitas)){
			foreach($visitas as $vis){
				$cant = $vis['id'];
			}
		}else{
			$cant = '0';
		}
		return $cant;
	}

	public function __destruct() {
		parent::__destruct();
	}

}

?>
