<?php
include("head.php");
 if(permissao()==FALSE){
             echo "<script language= 'JavaScript'>
                                            location.href='erro403.php'
                                    </script>";
                }  
?>
<script type="text/javascript">
  function confirmar(){
    // só permitirá o envio se o usuário responder OK
    var resposta = window.confirm("Deseja mesmo" + 
                   " excluir esta entrada?");
    if(resposta)
      return true;
    else
      return false; 
  }
</script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="texto">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->

            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->

                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-12 connectedSortable">
                    <div class="box box-info">
                        <div class="box-header">
                                      <?php
                if (isset($_GET['id'])){
                    $id = (int)$_GET['id'];
                    $idUsu = $_SESSION['idUSU'];
                    $conn = F_conect();
                    $result = mysqli_query($conn, "SELECT * FROM entrada WHERE id=".$id);
                      if (mysqli_num_rows($result) ==1){
                            while ($row = $result->fetch_assoc()) {
                               $id = $row['id'];
                               $qtd_total= $row['qtd_total'];
                               $valor_total = $row['valor_total'];
                               $data_entrada = $row['data_entrada'];   
                               
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
                            <h3 class="box-title">Entrada : <?php echo $id;?> -<?php echo $data_entrada;?>  </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Produto</th>
                                        <th>Quantidade </th>
                                        <th>Preço Compra</th>
                                        <th>Data Fabricação</th>
                                        <th>Data Validade</th>
                                        
                                       
                                        <th>Ações</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once '../Controller/EntradaController.php';
                                    $objControl = new EntradaController();
                                    $objControl->atualizarDadosEntrada($id);
                                    $objControl->listarItem($id);
                                    
                                    ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th> <a href="ENT_cadastroitem.php?id=<?php echo $id;?>"><i class="fa fa-plus-square" aria-hidden="true"></i></a></th>
                                        <th></th>
 <th></th>
 <th></th>
 <th></th>
 <th>                                       <a href="../view/ENT_listar.php"><button type="button"  class="btn btn-warning">Voltar</button>    </a>
</th>

                                    </tr>
                                </tfoot>
                            </table>
     
                                                        
                       

                        </div>
                        <!-- /.box-body -->
                    </div>


                </section>
                <!-- right col -->
            </div>
            <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
    $(function () {
        $("#example1").DataTable({
        "language": {
      "url": "../sql/translate.json"
   }
        }
        );
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>
<?php
include("foot.php");
?>