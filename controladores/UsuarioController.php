<?php 

    require_once "controladores/BaseController.php";
    require_once "modelos/Usuario.php";

    class UsuarioController extends BaseController{

        public function __construct(){
            parent::__construct();
        }

        public function listar(){
       
            $ses = Sesion::getInstance() ;

            if (!$ses->checkActiveSession())
                 $ses->redirect("index.php") ;
            
                $user = $ses->getUsuario()->getNombre() ;
            
             $usu = Usuario::findAll();

            echo $this->twig->render("showUsuarios.php.twig",['dat'=>$usu,'user' => $user]);
            
        }

        public function nuevo(){

                $email = $_GET["email"] ;
                $nombre = $_GET["nombre"] ;
                $apellidos = $_GET["apellidos"] ;
                $pass = $_GET["pass"] ;
                $conf = $_GET["conf"] ;
                $fec = $_GET["fec"] ;

        
                if ($pass==$conf):
        
                    $usu = new Usuario();

                    $usu->setEmail($email);
                    $usu->setNombre($nombre);
                    $usu->setApellidos($apellidos);
                    $usu->setPass($pass);
                    $usu->setFec($fec);
                    
                    $usu->save();

                    $ses = Sesion::getInstance() ;

                    $ses->redirect("index.php") ;
                else:
                    echo "Las contraseñas no coinciden" ;
                endif ;
        
            
            
        }

        public function borrar(){
            $id = $_GET['id'];
            $usu = Usuario::find($id);
            
            $usu->eliminar();

            
            header("location:index.php?con=usuario&ope=listar");
        }
    }
        