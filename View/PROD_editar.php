<?php
    include("head.php");
      if(permissao()==FALSE){
             echo "<script language= 'JavaScript'>
                                            location.href='erro403.php'
                                    </script>";
                }
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        

      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
          <?php
                if (isset($_GET['id'])){
                    $id = (int)$_GET['id'];
                    $idUsu = $_SESSION['idUSU'];
                    $conn = F_conect();
                    $result = mysqli_query($conn, "SELECT * FROM produto WHERE id=".$id);
                      if (mysqli_num_rows($result) ==1){
                            while ($row = $result->fetch_assoc()) {
                                $descricao = $row['descricao'];
                                $lucro = $row['porcetagem_lucro'];
                                $codigo_barras= $row['codigo_barras'];
                                $estoque_minimo = $row['estoque_minimo'];
                                
                             }
                      }else{
                         
                          echo "<script language= 'JavaScript'>
                                        location.href='erro.php'
                                </script>";
                      }
                        $conn->close();
                }else{
                    echo "<script language= 'JavaScript'>
                                        location.href='erro.php'
                                </script>";
        
    }
          ?>
        <section class="col-lg-12 connectedSortable">
            <div class="col-xs-12">
                    <div class="box box-primary">
            <div class="box-header with-border">
              <h1 class="box-title">Editar Produto</h1>
            </div>
                                                <div class="box-body">

                 <form class="form-group" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            Descrição:<input class="form-control" name="descricao" type="text" placeholder="Descricao" value="<?php echo $descricao;?>" required>
                        </div> 
                      <div class="form-group">
                           Código de Barras: <input class="form-control" name="codigo" type="text" placeholder="Código de Barras" value="<?php echo $codigo_barras;?>"  required>
                        </div> 
                      <div class="form-group">
                            Porcentagem de Lucro:<input class="form-control" name="lucro" type="number" placeholder="Estoque Minimo" value="<?php echo $lucro;?>"required>
                        </div> 
                        <div class="form-group">
                            Estoque Mínimo:
                            <input class="form-control" name="estoque_minimo" type="number" placeholder="Estoque Minimo" value="<?php echo $estoque_minimo;?>"required>
                        </div>  
                      
                        <button type="submit" class="btn btn-success" name="botao">Atualizar</button>
                        <a href="../view/PROD_listar.php"><button type="button"  class="btn btn-info">Voltar</button>    </a>
                    </form>
        <?php
            require_once '../Controller/ProdutoController.php';
            if (isset($_POST["botao"])) {
                    $objControl = new ProdutoController();
                    $objControl->atualizar($id, $_POST["descricao"], $_POST["codigo"], $_POST["lucro"],$_POST['estoque_minimo']);
                                                       echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL='PROP_editar.php?id=".$id."'>";

                    }
        ?>     

                    <br/>

                </div>
                    </div>
                           </div>

       

          

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

          <!-- Map box -->
          
          <!-- /.box -->

         

         
          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
<?php
    include("foot.php");
?>