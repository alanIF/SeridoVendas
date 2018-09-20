<?php
  require ('../Model/FORN_Crud.php');
class FornecedorController{ 
    public function Cadastrar($cnpj,$contato,$endereco,$nome){
        cadastrarFornecedor($cnpj,$contato,$endereco,$nome);
    }
public function listar(){
        listarFornecedor();
    }
    public function excluir($id){
        excluirFornecedor($id);
    }
    public function atualizar($id,$cnpj,$contato,$endereco,$nome){
        editarFornecedor($id,$cnpj,$contato,$endereco,$nome);
    }
}

