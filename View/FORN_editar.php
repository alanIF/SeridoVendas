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
                    $result = mysqli_query($conn, "SELECT * FROM fornecedor WHERE id=".$id);
                      if (mysqli_num_rows($result) ==1){
                            while ($row = $result->fetch_assoc()) {
                               $nome = $row['nome'];
                               $cnpj = $row['cnpj'];
                               $endereco = $row['endereco'];
                               $contato = $row['contato'];                 
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
              <h1 class="box-title">Editar Fornecedor</h1>
            </div>
                                                <div class="box-body">

                 <form class="form-group" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            Nome:<input class="form-control" name="nome" type="text" placeholder="NOME" value="<?php echo $nome;?>" required>
                        </div> 
                      <div class="form-group">
                            CNPJ:<input class="form-control" name="cnpj" type="text" placeholder="CNPJ" value="<?php echo $cnpj;?>" required>
                        </div> 
                      <div class="form-group">
                           Endereco: <input class="form-control" name="endereco" type="text" placeholder="Endereço" value="<?php echo $endereco;?>"  required>
                        </div> 
                        <div class="form-group">
                            Contato:<input class="form-control" name="contato" type="text" placeholder="Contato" value="<?php echo $contato;?>"required>
                        </div>  
                      
                        <button type="submit" class="btn btn-success" name="botao">Atualizar</button>
                        <a href="../view/FORN_listar.php"><button type="button"  class="btn btn-info">Voltar</button>    </a>
                    </form>
        <?php
            require_once '../Controller/FornecedorController.php';
            if (isset($_POST["botao"])) {
                    $objControl = new FornecedorController();
                    $objControl->atualizar($id, $_POST["cnpj"], $_POST["contato"],$_POST["endereco"],$_POST["nome"]);
                                                       echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL='FORN_editar.php?id=".$id."'>";

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