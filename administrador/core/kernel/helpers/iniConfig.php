<?php

# Seguridad
defined('INDEX_DIR') OR exit('Ocrend software says .i.');

//------------------------------------------------

final class iniConfig {

	//------------------------------------------------

	/**
	* Devuelve un string con el contenido de un archivo
	*
	* @param string $dir: Directorio del archivo a leer
	*
	* @return string con contenido del archivo
  */
	final public static function read_config() {
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

}
?>
