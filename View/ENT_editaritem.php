<?php
include("head.php");
 if(permissao()==FALSE){
             echo "<script language= 'JavaScript'>
                                            location.href='erro403.php'
                                    </script>";
                }
?>
<script type="text/javascript">
  function confirmar_i(){
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
<div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
                     <?php
                if ((isset($_GET['id']))&&(isset($_GET['id_entrada']))){
                    $id = (int)$_GET['id'];
                    $id_entrada= (int)$_GET['id_entrada'];
                    $idUsu = $_SESSION['idUSU'];
                    $conn = F_conect();
                    $result = mysqli_query($conn, "SELECT * FROM item_entrada WHERE id=".$id);
                      if (mysqli_num_rows($result) ==1){
                            while ($row = $result->fetch_assoc()) {
                               $id = $row['id'];
                               $qtd= $row['qtd'];
                               $fabricacao = $row['data_fabricacao'];
                               $validade = $row['data_validade'];
                               $preco= $row['preco_compra'];
                               
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

        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
                <div class="col-xs-12">
                      <div class="box box-primary">
            <div class="box-header with-border">
              <h1 class="box-title">Editar item da Entrada</h1>
            </div>
                                                  <div class="box-body">

                    <form class="form-group" action="" method="post" enctype="multipart/form-data">
                         
                         <div class="form-group">
                            <input class="form-control" name="qtd" type="number" placeholder="Quantidade" value="<?php echo $qtd;?>" required>
                        </div>
                <div class="form-group">
                    <input class="form-control" name="preco_compra" type="number"  step="0.01" placeholder="Preço de Compra" value="<?php echo $preco;?>" required>
                        </div>
                 <div class="form-group">

                        
                            <!-- /.input group -->
                        </div> 
                            <div class="form-group">

                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" name="data_fabricacao" placeholder="Data de Fabricação"  data-inputmask="'alias': 'dd/mm/yyyy'" value="<?php echo $fabricacao;?>" data-mask required>
                            </div>
                            <!-- /.input group -->
                        </div> 
                         <div class="form-group">

                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" name="data_validade" placeholder="Data de Validade"  data-inputmask="'alias': 'dd/mm/yyyy'" value="<?php echo $validade;?>" data-mask required>
                            </div>
                            <!-- /.input group -->
                        </div> 


               <button type="submit" class="btn btn-info" name="botao">Atualizar Entrada</button>
                                       <a href="ENT_ver.php?id=<?php echo $id_entrada; ?>"><button type="button"  class="btn btn-warning">Voltar</button>    </a>




                    </form>
                    <?php
                    require_once '../Controller/EntradaController.php';
                    if (isset($_POST["botao"])) {
                        
                        $objControl = new EntradaController();
                        if(($_POST["qtd"]>0)&&($_POST['preco_compra']>0)){
                        $objControl->AtualizarItem($_POST["qtd"], $_POST["data_fabricacao"],$_POST["data_validade"],$_POST['preco_compra'],$id);
                        }else{
                            Alert("ERROR!", "Digite uma quantidade positiva!","danger");
                        }
                    }
                    ?>     

                    <br/>
                                                  </div>
                </div>

                    
                
                
                        
                    </div>
                
                 </section>
                
                </div>


            </section>
         
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->

  
<?php
include("foot.php");
?>
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script>
    $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
                {
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
        function (start, end) {
            $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        });
 $('#datepicker1').datepicker({
            autoclose: true
        });
         $('#datepicker2').datepicker({
            autoclose: true
        });
        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
            showInputs: false
        });
    });
</script>