<?php
  require ('../Model/ENT_Crud.php');
class EntradaController{
  
    public function Cadastrar($produto, $qtd, $data_entrada,$data_fabricacao,$data_validade,$preco_compra,$obs){
        cadastraritemEntrada($produto, $qtd, $data_entrada,$data_fabricacao,$data_validade,$preco_compra,$obs);
    }
   public function atualizarDadosEntrada(){
        atualizarDadosEntrada();
   }
public function listar(){
        listarEntrada();
    }
    public function listarItem($id_entrada){
        listarEntradaItem($id_entrada);
    }
    public function excluir($id){
        excluirEntrada($id);   
    }
    // do cadastrar
     public function excluirItemC($id){
        excluirEntradaItemC($id);   
    }
    // do ver
     public function excluirItemV($id){
        excluirEntradaItemV($id);   
    }
    public function atualizar($id, $descricao,$codigo,$lucro,$estoque_minimo){
        editarProduto($id, $descricao,$codigo,$lucro,$estoque_minimo);
    }
}

