<?php 

    require_once "controladores/BaseController.php";
    require_once "modelos/Cerveza.php";
    require_once "modelos/Marca.php";
    require_once "libs/Sesion.php";

    class CervezaController extends BaseController{

        public function __construct(){
            parent::__construct();
        }

        public function listar(){
       
            $ses = Sesion::getInstance() ;

            if (!$ses->checkActiveSession())
                 $ses->redirect("index.php") ;
            
                $user = $ses->getUsuario()->getNombre() ;
            
             $cer = Cerveza::findAll();

            echo $this->twig->render("showCervezas.php.twig",['dat'=>$cer,'user' => $user]);
            
        }

        public function listarAdmin(){
       
            $ses = Sesion::getInstance() ;

            if (!$ses->checkActiveSession())
                 $ses->redirect("index.php") ;
            
                $user = $ses->getUsuario()->getNombre() ;
            
             $cer = Cerveza::findAll();

            echo $this->twig->render("showCervezasAdmin.php.twig",['dat'=>$cer,'user' => $user]);
            
        }

        public function anadir(){
            
            $marc = Marca::findAll();
            
            echo $this->twig->render("anadirCerveza.php.twig",['marc'=> $marc]);
        }

        public function guardar(){
            

            $nombre = $_GET['nombre'];
            $graduacion = $_GET['graduacion'];
            $composicion = $_GET['composicion'];
            $capacidad = $_GET['capacidad'];
            $imagen = $_GET['imagen'];

            $cer = new Cerveza();

            $cer->setNomTipo($nombre);
            $cer->setGraduacion($graduacion);
            $cer->setComposicion($composicion);
            $cer->setCapacidad($capacidad);
            $cer->setimgTipo($imagen);

            $marca = $_GET['marca'];
            
            $marcId = Marca::obtenerId($marca);

            $cer->setCodMarca($marcId->getCodMarca());

            $cer->save();

            header("location:index.php?con=cerveza&ope=listarAdmin");
        }

        public function borrar(){
            $id = $_GET['id'];
            $cer = Cerveza::find($id);
            
            $cer->eliminar();

            
            header("location:index.php");
        }
    }
        