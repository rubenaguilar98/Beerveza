<?php 

    require_once "controladores/BaseController.php";
    require_once "modelos/Usuario.php";
    require_once "libs/Sesion.php";

    class SesionController extends BaseController{

        public function __construct(){
            parent::__construct();
        }



        public function navbarSesion(){

            $ses = Sesion::getInstance() ;

            if (!$ses->checkActiveSession())
                 $ses->redirect("index.php") ;
            
                 $user = $ses->getUsuario()->getNombre() ;

                 echo $this->twig->render("navbar.php.twig", compact('user'));
            
                 
        }

    }
    