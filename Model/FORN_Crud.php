<?php

function cadastrarFornecedor($descricao,$estoque_minimo,$tipo) {

    $conn = F_conect();


    $sql = "INSERT INTO produto (descricao,estoque_minimo,tipo)
                VALUES('" . $descricao . "','" . $estoque_minimo . "','" . $tipo ."' )";

    if ($conn->query($sql) == TRUE) {
        include '../Model/LOGS.php';
        //LOG__________
        if (NovoLog("Produto " . $descricao . " com Estoque Minimo " . $estoque_minimo . " cadastrado.", $_SESSION['idUSU'])) {

            Alert("Oba!", "Produto cadastrado com sucesso", "success");
            echo "<a href='../view/PROP_listar.php'> Listar Produtos</a>";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

function editarPropieade($id, $descricao,$estoque_minimo,$tipo) {
    $conn = F_conect();
    $sql = " UPDATE produto SET  descricao='" . $descricao . "' , estoque_minimo='" .
            $estoque_minimo . "', tipo='" . $tipo . "' WHERE id= " . $id ;

    if ($conn->query($sql) === TRUE) {
        include '../Model/LOGS.php';
        //LOG__________
        if (NovoLog("Produto  " . $descricao . " com Estoque Minimo " . $estoque_minimo . " atualizado", $_SESSION['idUSU'])) {
            Alert("Oba!", "Produto Atualizado", "success ");
            echo "<a href='../view/PROP_listar.php'> Listar Produtos</a>";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function excluirFornecedor($id) {

    $conn = F_conect();

    $sql = "DELETE FROM fornecedor WHERE id=" . $id;

if($conn->query($sql)){
    
   
 echo "<script language='javascript' type='text/javascript'>"
        . "alert('Fornecedor excluído com sucesso!');";

        echo "</script>";
        echo "<script language='javascript' type='text/javascript'>
window.location.href = 'javascript:window.history.go(-1);';
</script>";

    
}
  $conn->close();
}

function listarFornecedor() {
    $conn = F_conect();
    $result = mysqli_query($conn, "Select * from fornecedor");

    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
            echo"<tr><td>" . $row['nome'] . "</td>";
            echo"<td>" . $row['cnpj'] . "</td>";
            echo"<td>" . $row['endereco'] . "</td>";
            echo"<td>" . $row['contato'] . "</td>";
           

            echo"<td><a href=FORN_editar.php?id=" . $row['id'] . "><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
                        <a onclick='return confirmar();' href=FORN_excluir.php?id=" . $row['id'] . "><i class='fa fa-trash-o' aria-hidden='true'></i></a></td></tr>";
        }
    }
    $conn->close();
}
