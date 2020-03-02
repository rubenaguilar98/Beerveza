<?php 

    require_once "controladores/BaseController.php";
    require_once "modelos/Marca.php";
    require_once "libs/Sesion.php";

    class MarcaController extends BaseController{

        public function __construct(){
            parent::__construct();
        }

        public function listar(){
       
            $ses = Sesion::getInstance() ;

            if (!$ses->checkActiveSession())
                 $ses->redirect("index.php") ;
            
                $user = $ses->getUsuario()->getNombre() ;
            
             $marc = Marca::findAll();

            echo $this->twig->render("showMarcas.php.twig",['dat'=>$marc,'user' => $user]);
            
        }

        public function listarAdmin(){
       
            $ses = Sesion::getInstance() ;

            if (!$ses->checkActiveSession())
                 $ses->redirect("index.php") ;
            
                $user = $ses->getUsuario()->getNombre() ;
            
             $mar = Marca::findAll();

            echo $this->twig->render("showMarcasAdmin.php.twig",['dat'=>$mar,'user' => $user]);
            
        }

        public function anadir(){
            

            $marca = $_POST['marca'];
            $pais = $_POST['pais'];
            $imagen = $_POST['imagen'];


            $marc = new Marca();

            $marc->setNomMarca($marca);
            $marc->setPais($pais);
            $marc->setimgMarca($imagen);

            $marc->save();

            header("location:index.php?con=Marca&ope=listarAdmin");
        }

        public function borrar(){
            $id = $_GET['id'];
            $marc = Marca::find($id);
            
            $marc->eliminar();

          
            header("location:index.php?con=Marca&ope=listarAdmin");
        }
    }
        