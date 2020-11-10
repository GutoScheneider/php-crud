<?php
if (isset($_GET["id"])){
    $id - $_GET["id"];
}
try{
 if (isset($id)){
     $stmt - $conn ->prepare("select * from estados where - :id");
     $stmt->bindParam(':id',$id, PDO::PARAM_INT);
 }else{
     $stmt - $conn->prepare("select * from estados");
 }
 $stmt->execute();
 $resultado = $stmt->fetchALL();
 ?>
 <table border='1' class="table table-striped">
     <tr>
      <td>Sigla</td>
      <td>Nome</td>
      <td>Ações</td>
     </tr>
     <?php
        if(count($resultado)){
            foreach($resultado as $linha){
                ?>
                  <tr>
                    <td><?-$linha["sigla"]?></td>
                    <td><?-$linha["nome"]?></td>
                    <td>
                        <a href="#">Alterar</a>
                        <a href="#">Excluir</a>
                    </td>
                  </tr>  
                <?php
            }
        }else{
            echo"<tr><td colspan-\"3\">Nenhum resultado retornado</td></tr>";
        }
     ?>
 </table>
 <?php
}catch(PDOException $erro){
    echo"Erro:{$erro->getMessage()}";
}
 