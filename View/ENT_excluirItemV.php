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
        require_once '../Controller/ProdutoController.php';

         $id=(int)$_GET['id'];
         $objControl1 = new EntradaController();
          $objControl2 = new ProdutoController();
        $objControl1->excluirItemV($id);
         // chamar funcao para atualizar os preços dos produtos
        $objControl2->atualizarPrecos();
        // atualizar valor e qtd total da entrada finalizada
       $objControl1->atualizarDadosEntrada();
        
        
    }else{
        
        header("Location:ENT_listar.php");
        
    }

?>