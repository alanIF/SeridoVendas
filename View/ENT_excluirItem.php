<?php
          
        //CONECTAR          
        require_once '../Model/connect.php';            
        require_once '../Controller/UsuarioController.php';
        $objControl = new UsuarioController();

        $objControl->verificarlogin();
 if(permissao()==FALSE){
             echo "<script language= 'JavaScript'>
                                            location.href='erro403.php'
                                    </script>";
                }  
    if (isset( $_GET['id'])) {
        require_once '../Controller/EntradaController.php';

         $id=(int)$_GET['id'];
         $objControl = new EntradaController();
        $objControl->excluirItem($id);
    }else{
        
        header("Location:ENT_listar.php");
        
    }

?>