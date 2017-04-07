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
        $inifile_site = "../core/config.php";
		$ini = file($inifile);
        $ini_site = file($inifile_site);

		$String = str_replace(array(','),"**",$ini);
		$String = str_replace(array('\'','----','#','/*','*','*/','<?php','?>','define(',');','FIREWALL ','DEBUG ','USE_TWIG_TEMPLATE_ENGINE ',', '),"",$String);
		$String = str_replace(array('SITE_APP ','SITE_URL','TEMPLATE_NAME','TEMPLATE_NAME_SITE','date_default_timezone_set('),"",$String);
		$String = str_replace(array('  host => ','  user => ','  pass => ','  name => ','  port => ','  protocol => ','  motor => '),"",$String);
		$String = str_replace(array('**','__ROOT__ ','URL','APP','_SITE','SITE_LOGO ','SITE_SLOGAN '),"",$String);

		/* PhpMail */
		$String = str_replace(array('PHPMAILER_HOST ','PHPMAILER_USER ','PHPMAILER_PASS ','PHPMAILER_PORT '),"",$String);

		/* Paypal SDK */
		$String = str_replace(array('  sandbox ó live','PAYPAL_MODE','PAYPAL_CLIENT_ID','PAYPAL_CLIENT_SECRET'),"",$String);

		/* Template site */
		$String_site = str_replace(array(','),"**",$ini_site);
		$String_site = str_replace(array('\'','----','#','/*','*','*/','<?php','?>','define(',');','TEMPLATE_NAME_SITE'),"",$String_site);

		$arrayConfig = array(
			'timezone' => $String[13],
			'dbhost' => $String[37],
			'dbuser' => $String[38],
			'dbpass' => $String[39],
			'dbname' => $String[40],
			'dbport' => $String[41],
			'dbprotocol' => $String[42],
			'dbmotor' => $String[43],
			'siteRoot' => $String[61],
			'siteName' => $String[59],
			'siteLogo' => $String[62],
			'siteslogan' => $String[63],
			'templateAdmin' => $String[65],
			'templateSite' => $String_site[62],
			'phpmailHost' => $String[84],
			'phpmailUser' => $String[85],
			'phpmailPass' => $String[86],
			'phpmailPort' => $String[87],
			'paypalMode' => $String[92],
			'paypalId' => $String[93],
			'paypalSecret' => $String[94],
			'firewall' => $String[99],
			'debug' => $String[104],
			'twig' => $String[109]
		);

		return $arrayConfig;
	}


	final public function EditarConfig(){
		Helper::load('Mensaje');
		$arrayConfig = self::LeeConfig();

		$inifile = "core/config.php";
		$ini = file($inifile);

		/* Nombre del sitio */
		$cadena = array(59 => "define('SITE_APP', '" . $arrayConfig['siteName'] . "');\n");
		$cadena_nueva = array(59 => "define('SITE_APP', '" . $_POST['sitenom'] . "');\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);

		/* Nombre del eslogan */
		$cadena = array(63 => "define('SITE_SLOGAN', '" . $arrayConfig['siteslogan'] . "');\n");
		$cadena_nueva = array(63 => "define('SITE_SLOGAN', '" . $_POST['eslogan'] . "');\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);

		/* Nombre del logo */
		$cadena = array(62 => "define('SITE_LOGO', '" . $arrayConfig['siteLogo'] . "');\n");
		$cadena_nueva = array(62 => "define('SITE_LOGO', '" . $_POST['logo'] . "');\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);

		/* Nombre del Timezone */
		$cadena = array(13 => "date_default_timezone_set('" . $arrayConfig['timezone'] . "');\n");
		$cadena_nueva = array(13 => "date_default_timezone_set('" . $_POST['zoneregion'] . "');\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);

		/* Nombre del URL Sitio */
		$cadena = array(61 => "define('SITE_URL', '" . $arrayConfig['siteRoot'] . "');\n");
		$cadena_nueva = array(61 => "define('SITE_URL', '" . $_POST['url'] . "');\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);

		/* Nombre del template admin */
		$cadena = array(65 => "define('define('TEMPLATE_NAME', '" . $arrayConfig['templateAdmin'] . "');\n");
		$cadena_sinespacios = str_replace(' ','',$_POST['temadmin']);
		$cadena_nueva = array(65 => "define('TEMPLATE_NAME', '".$cadena_sinespacios."');\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);

		/* Nombre dbhost */
		$cadena = array(37 => "  'host' => '" . $arrayConfig['dbhost'] . "',\n");
		$cadena_nueva = array(37 => "  'host' => '" . $_POST['dbhost'] . "',\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);

		/* Nombre dbuser */
		$cadena = array(38 => "  'user' => '" . $arrayConfig['dbuser'] . "',\n");
		$cadena_nueva = array(38 => "  'user' => '" . $_POST['dbuser'] . "',\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);

		/* Nombre dbpass */
		$cadena = array(39 => "  'pass' => '" . $arrayConfig['dbpass'] . "',\n");
		$cadena_nueva = array(39 => "  'pass' => '" . $_POST['dbpass'] . "',\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);

		/* Nombre dbname */
		$cadena = array(40 => "  'name' => '" . $arrayConfig['dbname'] . "',\n");
		$cadena_nueva = array(40 => "  'name' => '" . $_POST['dbnom'] . "',\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);

		/* Nombre dbport */
		$cadena = array(41 => "  'port' => '" . $arrayConfig['dbport'] . "',\n");
		$cadena_nueva = array(41 => "  'port' => '" . $_POST['dbport'] . "',\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);

		/* Nombre dbprotocol */
		$cadena = array(42 => "  'protocol' => '" . $arrayConfig['dbprotocol'] . "',\n");
		$cadena_nueva = array(42 => "  'protocol' => '" . $_POST['dbproto'] . "',\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);

		/* Nombre dbmotor */
		$cadena = array(43 => "  'motor' => '" . $arrayConfig['dbmotor'] . "',\n");
		$cadena_nueva = array(43 => "  'motor' => '" . $_POST['dbmotor'] . "',\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);

		/* Nombre phpmailHost */
		$cadena = array(84 => "define('PHPMAILER_HOST', '" . $arrayConfig['phpmailHost'] . "');\n");
		$cadena_nueva = array(84 => "define('PHPMAILER_HOST', '" . $_POST['host'] . "',\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);

		/* Nombre phpmailUser */
		$cadena = array(85 => "define('PHPMAILER_USER', '" . $arrayConfig['phpmailUser'] . "');\n");
		$cadena_nueva = array(85 => "define('PHPMAILER_USER', '" . $_POST['usermail'] . "',\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);

		/* Nombre phpmailPass */
		$cadena = array(86 => "define('PHPMAILER_PASS', '" . $arrayConfig['phpmailPass'] ."');\n");
		$cadena_nueva = array(86 => "define('PHPMAILER_PASS', '" . $_POST['passmail'] . "');\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);

		/* Nombre phpmailPort */
		$cadena = array(87 => "define('PHPMAILER_PORT', '" . $arrayConfig['phpmailPort'] . "');\n");
		$cadena_nueva = array(87 => "define('PHPMAILER_PORT', " . $_POST['puertomail'] . ");\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);

		/* Nombre paypalMode */
		$cadena = array(92 => "define('PAYPAL_MODE', '" . $arrayConfig['paypalMode'] . "');\n");
		$cadena_nueva = array(92 => "define('PAYPAL_MODE', " . $_POST['modo'] . ");\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);

		/* Nombre paypalId */
		$cadena = array(93 => "define('PAYPAL_CLIENT_ID', '" . $arrayConfig['paypalId'] . "');\n");
		$cadena_nueva = array(93 => "define('PAYPAL_CLIENT_ID', " . $_POST['clienteId'] . ");\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);

		/* Nombre paypalSecret */
		$cadena = array(94 => "define('PAYPAL_CLIENT_SECRET', '" . $arrayConfig['paypalSecret'] . "');\n");
		$cadena_nueva = array(94 => "define('PAYPAL_CLIENT_SECRET', " . $_POST['clienteSecret'] . ");\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);

		/* Nombre firewall */
		$cadena = array(99 => "define('FIREWALL', '" . $arrayConfig['firewall'] . "');\n");
		$cadena_nueva = array(99 => "define('FIREWALL', " . $_POST['fire'] . ");\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);

		/* Nombre debug */
		$cadena = array(104 => "define('DEBUG', '" . $arrayConfig['debug'] . "');\n");
		$cadena_nueva = array(104 => "define('DEBUG', " . $_POST['debug'] . ");\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);

		/* Nombre twig */
		$cadena = array(109 => "define('USE_TWIG_TEMPLATE_ENGINE', '" . $arrayConfig['twig'] . "');\n");
		$cadena_nueva = array(109 => "define('USE_TWIG_TEMPLATE_ENGINE', " .$_POST['twig'] . ");\n");
		$remplazartexto = array_replace($ini,$cadena,$cadena_nueva);
		file_put_contents($inifile,$remplazartexto);


		/* Verifica si hay cambios en el nombre template del sitio */

		$cadena_sinespacios = str_replace(' ','',$_POST['tempsitio']);
		if ($arrayConfig['templateSite'] == $cadena_sinespacios){

			$cadena = array(62 => "define('define('TEMPLATE_NAME_SITE', '" . $arrayConfig['templateSite'] . "');\n");
			$cadena_nueva = array(62 => "define('TEMPLATE_NAME_SITE', '".$cadena_sinespacios."');\n");

			$inifile_site = "../core/config.php";
			$ini_site = file($inifile_site);
			$remplazartexto = array_replace($ini_site,$cadena,$cadena_nueva);
			file_put_contents($inifile_site,$remplazartexto);
		}

		Mensaje::msg_exito("Bien!, la configuración se actualizo con exito.");
		Func::redir(URL. 'configura/');
	}



	public function __destruct() {
		parent::__destruct();
	}
}

?>
