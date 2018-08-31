<?php
include("head.php");
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                         0
                        </h3>

                        <p>Usuários</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <?php
                            if(permissao()){

                  echo   '<a href="INQ_listar.php" class="small-box-footer"> Ver<i class="fa fa-arrow-circle-right"></i></a>';
                            } ?>
                            </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                          0  
                        </h3>

                        <p>Produtos</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-archive "></i>
                    </div>
                       <?php
                            if(permissao()){
                    echo '<a href="PROP_listar.php" class="small-box-footer"> Ver<i class="fa fa-arrow-circle-right"></i></a>';
                            }?>                
                            </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green-gradient">
                    <div class="inner">
                        <h3>
0
                        </h3>

                        <p>Entradas</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-plus-circle"></i>
                    </div>
                       <?php
                            if(permissao()){
                    
                             echo'   <a href="ENT_listar.php" class="small-box-footer">Ver<i class="fa fa-arrow-circle-right"></i></a>';
                            }
                            ?>
                                        </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-orange">
                    <div class="inner">
                        <h3>
0

                        </h3>

                        <p>Saidas</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-minus-circle"></i>
                    </div>
                 
                    <a href="SAI_listar.php" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <section class="">
         

            </div>
            <!-- /.box-body -->
            
          </div>

       

    
    <!-- /.content -->

<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true
        });
    });
</script>
<?php
include("foot.php");
?>

