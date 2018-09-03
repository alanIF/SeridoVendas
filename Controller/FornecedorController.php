<?php
  require ('../Model/FORN_Crud.php');
class FornecedorController{
    
  
    public function Cadastrar($descricao,$estoque_minimo,$tipo){
        cadastrarForncedor($descricao,$estoque_minimo,$tipo);
    }
public function listar(){
        listarFornecedor();
    }
    public function excluir($id){
        excluirFornecedor($id);
        
        
    }
    public function atualizar($id, $descricao,$estoque_minimo,$tipo){
        editarFornecedor($id, $descricao,$estoque_minimo,$tipo);
    }
}

