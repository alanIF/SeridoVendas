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

function excluirProduto($id) {

    $conn = F_conect();

    $sql = "DELETE FROM produto WHERE id=" . $id;

if($conn->query($sql)){
    
        	echo "<script language='javascript' type='text/javascript'>"
        . "alert('Produto  excluído com sucesso!');";

            echo "</script>";
        echo "<script language='javascript' type='text/javascript'>
window.location.href = 'javascript:window.history.go(-1);';
</script>";

    }
      $conn->close();

}


function listarProduto() {
    $conn = F_conect();
    $result = mysqli_query($conn, "Select * from produto");

    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
            echo"<tr><td>" . $row['descricao'] . "</td>";
            echo"<td>" . $row['codigo_barras'] . "</td>";
            echo"<td>" . $row['porcetagem_lucro'] . "</td>";
            echo"<td>" . $row['preco'] . "</td>";

            echo"<td>" . $row['estoque_minimo'] . "</td>";
           

            echo"<td><a href=PROD_editar.php?id=" . $row['id'] . "><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
                        <a onclick='return confirmar();' href=PROD_excluir.php?id=" . $row['id'] . "><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>";
        }
    }
    $conn->close();
}
