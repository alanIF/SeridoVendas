<?php
           
        //CONECTAR          
        require_once '../Model/connect.php';            
        require_once '../Controller/UsuarioController.php';
         require_once '../Controller/EntradaController.php';
                  require_once '../Controller/ProdutoController.php';

        $objControl = new UsuarioController();
        $objControl1 = new EntradaController();
         $objControl2 = new ProdutoController();
               

        $objControl->verificarlogin();
unset($_SESSION['entradas']);

       echo "<script language='javascript' type='text/javascript'>"
        . "alert('Entrada finalizada com sucesso!');";

            echo "</script>";
        echo "<script language='javascript' type='text/javascript'>
window.location.href = 'ENT_listar.php';
</script>";
        // chamar funcao para atualizar os preços dos produtos
        $objControl2->atualizarPrecos();
        // atualizar valor e qtd total da entrada finalizada
       $objControl1->atualizarDadosEntrada();
        
    

?>