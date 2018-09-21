<?php
  require ('../Model/ENT_Crud.php');
class EntradaController{
  
    public function Cadastrar($descricao,$codigo,$lucro,$estoque){
        cadastrarProduto($descricao,$codigo,$lucro,$estoque);
    }
public function listar(){
        listarEntrada();
    }
    public function excluir($id){
        excluirEntrada($id);   
    }
   
    public function atualizar($id, $descricao,$codigo,$lucro,$estoque_minimo){
        editarProduto($id, $descricao,$codigo,$lucro,$estoque_minimo);
    }
}

