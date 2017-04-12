<?php

# Seguridad
defined('INDEX_DIR') OR exit('Ocrend software says .i.');

//------------------------------------------------

class traficoController extends Controllers {

    public function __construct() {
        parent::__construct(true);

        $data = new Trafico;

        switch($this->method){
            case 'xhora':
                $hour = $data->visitHour();
                $sum = $data->sum_visitHour();
                echo $this->template->render('html/trafico/hora', array(
                    'hour' => $hour,
                    'sum' => $sum
                ));
                break;
            case 'xdia':
                $item = $data->dayInfo();
                echo $this->template->render('html/trafico/dia', array(
                    'item' => $item
                ));
                break;
            case 'xsemana':
                $week_day = $data->weekday();
                echo $this->template->render('html/trafico/semana', array(
                    'week_day' => $week_day
                ));
                break;
            case 'xmes':
                //$week_day = $data->weekday();
                echo $this->template->render('html/trafico/mes');
                break;
            case 'xpais':

            break;
            case 'xurl':
                $url = $data->getUrl();
                echo $this->template->render('html/trafico/url',array(
                    'url' => $url
                ));
                break;
            case 'xdominio':
                echo $this->template->render('html/trafico/dominio');
                break;
            case 'xmotor':
                echo $this->template->render('html/trafico/motor');
                break;
            case 'xpalabra':
                echo $this->template->render('html/trafico/palabra');
                break;
            case 'xbrowser':
                echo $this->template->render('html/trafico/browser');
                break;
            case 'xos':
                echo $this->template->render('html/trafico/os');
                break;
            case 'xpantalla':
                echo $this->template->render('html/trafico/pantalla');
                break;
            case 'xpagina':
                echo $this->template->render('html/trafico/pagina');
                break;
            case 'xhostname':
                echo $this->template->render('html/trafico/host');
                break;
            default:
                $trafic = $data->CountDays();
                $day_visitor = $data->dayVisitor();
                $forecast = $data->forecast();
                $l_visitor = $data->lastVisitor();
                echo $this->template->render('html/trafico/trafico',array(
                    'trafic' => $trafic,
                    'day_visitor' => $day_visitor,
                    'forecast' => $forecast,
                    'l_visitor' => $l_visitor
                ));
                break;
        }

    }

}

?>
