<?php

require_once "controladores/BaseController.php";

require_once "modelos/Cerveza.php";
require_once "libs/Sesion.php";

    class LoginController extends BaseController{

        public function __construct(){
            parent::__construct();
        }

        public function redir(){

            $cer = Cerveza::findAll();

            echo $this->twig->render("showCervezas.php.twig", ['dat' => $cer]);

        }
        public function sesionOn(){
       
            $ses = Sesion::getInstance();

            if($ses->checkActiveSession()){

                $admin = $ses->getUsuario()->getEsAdmin() ;

                if($admin){

                    $user = $ses->getUsuario()->getNombre() ;
                
                    $cer = Cerveza::findAll();
    
                    echo $this->twig->render("showCervezasAdmin.php.twig",['dat'=>$cer,'user' => $user]);

                }else{

   
                $user = $ses->getUsuario()->getNombre() ;
                
                $cer = Cerveza::findAll();

                echo $this->twig->render("showCervezas.php.twig",['dat'=>$cer,'user' => $user]);
                }
            }else{

                echo $this->twig->render("showLogin.php.twig");
                
            }            
        }

        public function logueo(){

                $ses = Sesion::getInstance();

                $email = $_POST['email'];
                $pass = $_POST['pass'];

                $correcto = $ses->login($email, $pass);

                if($correcto){
                   
                    $user = $ses->getUsuario()->getNombre() ;

                    $admin = $ses->getUsuario()->getEsAdmin() ;

                    if(($user)&&($admin)){

                        $cer = Cerveza::findAll();
    
                        echo $this->twig->render("showCervezasAdmin.php.twig",['dat'=>$cer,'user' => $user]);



                    }else{

                        $cer = Cerveza::findAll();
    
                        echo $this->twig->render("showCervezas.php.twig",['dat'=>$cer,'user' => $user]);

                    }
                


                }else{

                    echo $this->twig->render("showLogin.php.twig");
                    echo "USUARIO O CONTRASEÑA INCORRECTA";

                }
            
        }

    }