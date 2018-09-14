<?php
  require ('../Model/PROD_Crud.php');
class ProdutoController{
  
    public function Cadastrar($descricao,$codigo,$lucro,$estoque){
        cadastrarProduto($descricao,$codigo,$lucro,$estoque);
    }
public function listar(){
        listarProduto();
    }
    public function excluir($id){
        excluirProduto($id);
        
        
    }
   
    public function atualizar($id, $descricao,$codigo,$lucro,$estoque_minimo){
        editarProduto($id, $descricao,$codigo,$lucro,$estoque_minimo);
    }
}

