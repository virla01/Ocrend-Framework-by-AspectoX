<?php

# Seguridad
defined('INDEX_DIR') OR exit('Ocrend software says .i.');

//------------------------------------------------

class usersController extends Controllers {

    public function __construct() {
        parent::__construct(true);
        
        $data = new Users;
        
        switch($this->method){
            case 'crear':
                
                if($_POST){
                    $data->crear();
                }else{
                    echo $this->template->render('html/users/crear');
                }
                break;
                
            case 'editar':
                if($this->isset_id){
                    if($_POST){
                        $data->editar();
                    }else{
                        $user = $data->get_user();
                        echo $this->template->render('html/users/editar', array(
                            'users' => $user
                        ));
                    }
                }else{
                    Func::redir(URL . 'users/');
                }
                break;
                
            case 'perfil':
                if($this->isset_id){
                    $users = $data->get_user();
                    echo $this->template->render('html/users/perfil', array(
                        'users' => $users
                    ));
                } else {
                    Func::redir();
                }
                break;
                
            case 'eliminar':
                if($this->isset_id){
                    $data->borrar();
                }else{
                    Func::redir(URL . 'users/');
                }
                break;
                
            default:
                $users = $data->get_users();
                echo $this->template->render('html/users/users', array(
                    'data' => $users
                ));
                break;
        }

    }

}

?>
