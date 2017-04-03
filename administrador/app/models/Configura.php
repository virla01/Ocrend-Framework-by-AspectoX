<?php

# Seguridad
defined('INDEX_DIR') OR exit('Ocrend software says .i.');

//------------------------------------------------

final class Configura extends Models implements OCREND {

	public function __construct() {
		parent::__construct();
	}


	final public function LeeConfig(){
		$inifile = "core/config.php";
		$ini = file($inifile);

		$String = str_replace(array(','),"**",$ini);
		$String = str_replace(array('\'','----','#','/*','*','*/','<?php','?>','define(',');','FIREWALL ','DEBUG ','USE_TWIG_TEMPLATE_ENGINE ',', '),"",$String);
		$String = str_replace(array('SITE_APP ','SITE_URL','TEMPLATE_NAME','TEMPLATE_NAME_SITE','date_default_timezone_set('),"",$String);
		$String = str_replace(array('  host => ','  user => ','  pass => ','  name => ','  port => ','  protocol => ','  motor => '),"",$String);
		$String = str_replace(array('**','__ROOT__ ','URL','APP','_SITE','SITE_LOGO ','SITE_SLOGAN '),"",$String);

		//PhpMail
		$String = str_replace(array('PHPMAILER_HOST ','PHPMAILER_USER ','PHPMAILER_PASS ','PHPMAILER_PORT '),"",$String);

		//Paypal SDK
		$String = str_replace(array('  sandbox ó live','PAYPAL_MODE','PAYPAL_CLIENT_ID','PAYPAL_CLIENT_SECRET'),"",$String);

		$arrayConfig = array(
			'timezone' => $String[13],//
			'dbhost' => $String[37],//
			'dbuser' => $String[38],//
			'dbpass' => $String[39],//
			'dbname' => $String[40],//
			'dbport' => $String[41],//
			'dbprotocol' => $String[42],//
			'dbmotor' => $String[43],//
			'adminRoot' => $String[52],
			'adminUrl' => $String[57],
			'siteRoot' => $String[61],//
			'siteName' => $String[59],//
			'siteLogo' => $String[62],//
			'siteslogan' => $String[63],//
			'templateAdmin' => $String[65],//
			'templateSite' => $String[66],//
			'phpmailHost' => $String[85],//
			'phpmailUser' => $String[86],//
			'phpmailPass' => $String[87],//
			'phpmailPort' => $String[88],//
			'paypalMode' => $String[93],
			'paypalId' => $String[94],
			'paypalSecret' => $String[95],
			'firewall' => $String[100],
			'debug' => $String[105],
			'twig' => $String[110]
		);

		return $arrayConfig;
	}


	final public function EditarConfig(){
		Helper::load('iniConfig');
		$arrayConfig = iniConfig::read_config();

		$inifile = "core/config.php";
		$ini = file($inifile);

		//Nombre del sitio
		$cadena = array(59 => "define('SITE_APP', '" . $arrayConfig['siteName'] . "');\n");
		$cadena_nueva = array(59 => "define('SITE_APP', '" .$_POST['sitenom'] . "');\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);

		//Nombre del eslogan
		$cadena = array(63 => "define('SITE_SLOGAN', '" . $arrayConfig['siteslogan'] . "');\n");
		$cadena_nueva = array(63 => "define('SITE_SLOGAN', '" .$_POST['eslogan'] . "');\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);

		//Nombre del logo
		$cadena = array(62 => "define('SITE_LOGO', '" . $arrayConfig['siteLogo'] . "');\n");
		$cadena_nueva = array(62 => "define('SITE_LOGO', '" .$_POST['logo'] . "');\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);

		//Nombre del Timezone
		$cadena = array(13 => "date_default_timezone_set('" . $arrayConfig['timezone'] . "');\n");
		$cadena_nueva = array(13 => "date_default_timezone_set('" .$_POST['zoneregion'] . "');\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);

		//Nombre del URL Sitio
		$cadena = array(61 => "define('SITE_URL', '" . $arrayConfig['siteRoot'] . "');\n");
		$cadena_nueva = array(61 => "define('SITE_URL', '" .$_POST['url'] . "');\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);

		//Nombre del template admin
		$cadena = array(65 => "define('define('TEMPLATE_NAME', '" . $arrayConfig['templateAdmin'] . "');\n");
		$cadena_nueva = array(65 => "define('TEMPLATE_NAME', '" .$_POST['temadmin'] . "');\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);

		//Nombre del template site
		$cadena = array(66 => "define('define('TEMPLATE_NAME_SITE', '" . $arrayConfig['templateSite'] . "');\n");
		$cadena_nueva = array(66 => "define('TEMPLATE_NAME_SITE', '" .$_POST['tempsitio'] . "');\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);

		//Nombre del host db
		$cadena = array(37 => "  'host' => '" . $arrayConfig['dbhost'] . "',\n");
		$cadena_nueva = array(37 => "  'host' => '" .$_POST['dbhost'] . "',\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);

		//Nombre del user db
		$cadena = array(38 => "  'user' => '" . $arrayConfig['dbuser'] . "',\n");
		$cadena_nueva = array(38 => "  'user' => '" .$_POST['dbuser'] . "',\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);

		//Nombre del pass db
		$cadena = array(39 => "  'pass' => '" . $arrayConfig['dbpass'] . "',\n");
		$cadena_nueva = array(39 => "  'pass' => '" .$_POST['dbpass'] . "',\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);

		//Nombre del name db
		$cadena = array(40 => "  'name' => '" . $arrayConfig['dbname'] . "',\n");
		$cadena_nueva = array(40 => "  'name' => '" .$_POST['dbnom'] . "',\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);

		//Nombre del puerto db
		$cadena = array(41 => "  'port' => '" . $arrayConfig['dbport'] . "',\n");
		$cadena_nueva = array(41 => "  'port' => '" .$_POST['dbport'] . "',\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);

		//Nombre del protocolo db
		$cadena = array(42 => "  'protocol' => '" . $arrayConfig['dbprotocol'] . "',\n");
		$cadena_nueva = array(42 => "  'protocol' => '" .$_POST['dbproto'] . "',\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);

		//Nombre del motor db
		$cadena = array(43 => "  'motor' => '" . $arrayConfig['dbmotor'] . "',\n");
		$cadena_nueva = array(43 => "  'motor' => '" .$_POST['dbmotor'] . "',\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);

		//Nombre del site phpmailHost
		$cadena = array(85 => "define('PHPMAILER_HOST', '" . $arrayConfig['phpmailHost'] . "');\n");
		$cadena_nueva = array(85 => "define('PHPMAILER_HOST', '" .$_POST['host'] . "',\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);

		//Nombre del site phpmailUser
		$cadena = array(86 => "define('PHPMAILER_USER', '" . $arrayConfig['phpmailUser'] . "');\n");
		$cadena_nueva = array(86 => "define('PHPMAILER_USER', '" .$_POST['host'] . "',\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);

		//Nombre del site phpmailPass
		$cadena = array(87 => "define('PHPMAILER_PASS', '" . $arrayConfig['phpmailPass'] ."');\n");
		$cadena_nueva = array(87 => "define('PHPMAILER_PASS', '" .$_POST['passmail'] . "');\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);

		//Nombre del site phpmailPort
		$cadena = array(88 => "define('PHPMAILER_PORT', '" . $arrayConfig['phpmailPort'] . "');\n");
		$cadena_nueva = array(88 => "define('PHPMAILER_PORT', " .$_POST['puertomail'] . ");\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);




		Func::redir(URL. 'configura/');
	}



	public function __destruct() {
		parent::__destruct();
	}
}

?>
