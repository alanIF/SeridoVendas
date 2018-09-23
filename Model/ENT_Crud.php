<?php
// atualiza os valores da entrada
function atualizarDadosEntrada($id_entrada){
    $conn = F_conect();
        if(isset($id_entrada)){
        $result = mysqli_query($conn, "Select * from item_entrada where id_entrada=".$id_entrada);
        $qtd_total=0;
        $preco_total=0;
        if (mysqli_num_rows($result)) {
            while ($row = $result->fetch_assoc()) {
                $qtd_total=$row['qtd']+$qtd_total;
                $preco_total=$row['preco_compra']+$preco_total;



            }
        }
        $sql = " UPDATE entrada SET  qtd_total='" . $qtd_total . "' , valor_total='" .
                $preco_total ."' WHERE id= " . $id_entrada ;

        if ($conn->query($sql) === TRUE) {



        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
}
function cadastrarEntrada($data_entrada,$observacao) {

    $conn = F_conect();


    $sql = "INSERT INTO entrada(data_entrada,observacao)
                VALUES('" . $data_entrada . "','" . $observacao."' )";

    if ($conn->query($sql) == TRUE) {
        $result = mysqli_query($conn, "Select max(e.id) id from entrada e");

    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
            $id= $row['id'];
            
        }
        return $id;
        }
        
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

function cadastraritemEntrada($produto, $qtd, $data_entrada,$data_fabricacao,$data_validade,$preco_compra,$obs) {

    $conn = F_conect();

     if(!isset($_SESSION['entradas'])){
        
         $_SESSION['entradas']=array();
         $id_entrada=cadastrarEntrada($data_entrada, $obs);
         $_SESSION['id_entrada']=$id_entrada;
     }else{
        $id_entrada=$_SESSION['id_entrada'] ;
     }
    $sql = "INSERT INTO item_entrada(id_produto,id_entrada,qtd,preco_compra,data_fabricacao,data_validade)
                VALUES('" . $produto . "','" . $id_entrada . "','" . $qtd ."','".$preco_compra."','".$data_fabricacao."','".$data_validade."')";

    if ($conn->query($sql) == TRUE) {
       

            Alert("Concluído!", "Produto adicionado com sucesso", "success");
            $result = mysqli_query($conn, "select max(id) entrada  from item_entrada");

            if (mysqli_num_rows($result)) {
                  while ($row = $result->fetch_assoc()) {
                          array_push($_SESSION['entradas'],$row['entrada']);
                    }

            }
            
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
// atualizar item entrada
function atualizaritemEntrada($qtd,$data_fabricacao,$data_validade,$preco_compra,$id) {
     $conn = F_conect();
    $sql = " UPDATE item_entrada SET  data_fabricacao='" . $data_fabricacao . "' , data_validade='" .
            $data_validade . "', qtd='" . $qtd . "', preco_compra='".$preco_compra."' WHERE id= " . $id ;

    if ($conn->query($sql) === TRUE) {
      
            Alert("Concluído!", "Item da Entrada Atualizado", "success ");
     
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    
}


// cadastrar um item da entrada individualmente
function cadastraritemEntradaIndividual($produto, $qtd, $data_entrada,$data_fabricacao,$data_validade,$preco_compra,$obs,$id_entrada) {

    $conn = F_conect();

   
    $sql = "INSERT INTO item_entrada(id_produto,id_entrada,qtd,preco_compra,data_fabricacao,data_validade)
                VALUES('" . $produto . "','" . $id_entrada . "','" . $qtd ."','".$preco_compra."','".$data_fabricacao."','".$data_validade."')";

    if ($conn->query($sql) == TRUE) {
       

            
            
            
            // redereciona pro ver
             	echo "<script language='javascript' type='text/javascript'>"
        . "alert('Item da entrada  adicionada com sucesso!');";

            echo "</script>";
        echo "<script language='javascript' type='text/javascript'>
window.location.href = 'ENT_ver.php?id=".$id_entrada."';
</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
function excluirEntradaItemV($id) {

    $conn = F_conect();

    $sql = "DELETE FROM item_entrada WHERE id=" . $id;

if($conn->query($sql)){
    
        	echo "<script language='javascript' type='text/javascript'>"
        . "alert('Item da entrada  excluída com sucesso!');";

            echo "</script>";
        echo "<script language='javascript' type='text/javascript'>
window.location.href = 'javascript:window.history.go(-1);';
</script>";

    }
      $conn->close();

}
function excluirEntradaItemC($id) {

    $conn = F_conect();

    $sql = "DELETE FROM item_entrada WHERE id=" . $id;

if($conn->query($sql)){
    
        	echo "<script language='javascript' type='text/javascript'>"
        . "alert('Item da entrada  excluída com sucesso!');";

            echo "</script>";
        echo "<script language='javascript' type='text/javascript'>
window.location.href = 'ENT_cadastro.php';
</script>";

    }
      $conn->close();

}

function excluirEntrada($id) {

    $conn = F_conect();

    $sql = "DELETE FROM entrada WHERE id=" . $id;

if($conn->query($sql)){
    
        	echo "<script language='javascript' type='text/javascript'>"
        . "alert('Entrada  excluída com sucesso!');";

            echo "</script>";
        echo "<script language='javascript' type='text/javascript'>
window.location.href = 'ENT_cadastro.php';
</script>";

    }
      $conn->close();

}


function listarEntrada() {
    $conn = F_conect();
    $result = mysqli_query($conn, "Select * from entrada");

    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
            echo"<tr><td>" . $row['data_entrada'] . "</td>";
            echo"<td>" . $row['qtd_total'] . "</td>";
            echo"<td>" . $row['valor_total'] . "</td>";
            echo"<td>" . $row['observacao'] . "</td>";

           

            echo"<td><a href=ENT_ver.php?id=" . $row['id'] . "><i class='fa fa-eye' aria-hidden='true'></i></a>  
                        <a onclick='return confirmar();' href=ENT_excluir.php?id=" . $row['id'] . "><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>";
        }
    }
    $conn->close();
}
function listarEntradaItem($id) {
    $conn = F_conect();
    $result = mysqli_query($conn, "Select i.id id, i.qtd qtd, p.descricao produto, i.preco_compra preco,i.data_fabricacao fabricacao, i.data_validade validade from item_entrada i , produto p where id_entrada=".$id." and i.id_produto=p.id");

    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
            echo"<tr><td>" . $row['produto'] . "</td>";
            echo"<td>" . $row['qtd'] . "</td>";
            echo"<td>" . $row['preco'] . "</td>";
            echo"<td>" . $row['fabricacao'] . "</td>";
            echo"<td>" . $row['validade'] . "</td>";

           

            echo"<td><a href=ENT_editaritem.php?id=" . $row['id'] . "&id_entrada=".$id."><i class='fa fa-pencil' aria-hidden='true'></i></a>  
                        <a onclick='return confirmar();' href=ENT_excluirItemV.php?id=" . $row['id'] . "><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>";
        }
    }
    $conn->close();
}