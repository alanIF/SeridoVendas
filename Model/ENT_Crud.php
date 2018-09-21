<?php

function cadastrarProduto($descricao,$codigo,$lucro,$estoque) {

    $conn = F_conect();


    $sql = "INSERT INTO produto (descricao,codigo_barras,porcetagem_lucro,estoque_minimo)
                VALUES('" . $descricao . "','" . $codigo . "','" . $lucro ."','".$estoque."' )";

    if ($conn->query($sql) == TRUE) {
       

            Alert("Concluído!", "Produto cadastrado com sucesso", "success");
            echo "<a href='../view/PROD_listar.php'> Listar Produtos</a>";
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

function editarProduto($id, $descricao,$codigo,$lucro,$estoque_minimo) {
    $conn = F_conect();
    $sql = " UPDATE produto SET  descricao='" . $descricao . "' , estoque_minimo='" .
            $estoque_minimo . "', codigo_barras='" . $codigo . "', porcetagem_lucro='".$lucro."' WHERE id= " . $id ;

    if ($conn->query($sql) === TRUE) {
      
            Alert("Concluído!", "Produto Atualizado", "success ");
            echo "<a href='../view/PROD_listar.php'> Listar Produtos</a>";
     
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
window.location.href = 'javascript:window.history.go(-1);';
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

           

            echo"<td><a href=ENT_ver.php?id=" . $row['id'] . "><i class='fa fa-eye' aria-hidden='true'></i></a>  <a href=ENT_editar.php?id=" . $row['id'] . "><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
                        <a onclick='return confirmar();' href=ENT_excluir.php?id=" . $row['id'] . "><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>";
        }
    }
    $conn->close();
}
