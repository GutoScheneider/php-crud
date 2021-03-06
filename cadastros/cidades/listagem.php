<?php
if (isset($_GET["id"])){
    $id = $_GET["id"];
}
try{
 if (isset($id)){
     $stmt = $conn->prepare('SELECT cidades.*, estados.sigla as estado_sigla, estados.nome  as estado_nome FROM cidades,estados WHERE cidades.estado = estados.id and id = :id');
     $stmt->bindParam(':id',$id, PDO::PARAM_INT);
 }else{
     $stmt = $conn->prepare('SELECT cidades.*, estados.sigla as estado_sigla, estados.nome  as estado_nome FROM cidades,estados WHERE cidades.estado = estados.id ');
 }
 $stmt->execute();
 $resultado = $stmt->fetchALL();
 ?>
 <table border='1' class="table table-striped">
     <tr>
      <td>Código</td>
      <td>Nome</td>
      <td>Estado</td>
      <td>Ações</td>
     </tr>
     <?php
        if(count($resultado)){
            foreach($resultado as $linha){
                ?>
                  <tr>
                    <td><?=$linha["codigo"]?></td>
                    <td><?=$linha["nome"]?></td>
                    <td><?=$linha["estado_sigla"]?><?$linha["estado_sigla"]?></td>
                    <td>
                        <a href="#">Alterar</a><br>
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