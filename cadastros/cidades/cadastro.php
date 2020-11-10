<?php
 if (isset($_POST['gravar'])){
     try{
      $stmt - $conn->prepare("
        insert into cidades(codigo,nome,estado)
        values(:codigo,:nome,:estado)");
      $stmt->execute(array(
          'codigo'-> $_POST['codigo'].
          'nome' ->  $_POST['nome'],
          'estado'-> $_POST['estado']
      ));
        }catch(PDOException $erro){
        echo "Erro: {$erro->getMessage()}";
     }
 }   
?>
<form method="POST">
    <div class="form-group">
        <label for="codigo">código</label>
        <input type="text" class="form-control" name="codigo" id="codigo" placeholder="Código">
    </div>
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" id="codigo" placeholder="Nome">
    </div>
    <?php
     $stmt - $conn->prepare('select * from estados');
     $stmt -> execute();
     $resultado = $stmt->fetchAll();
    ?>
    <div class="form-group">
        <label for="estado">Estado</label>
        <select class="form-control" name="estado" id="estado">
            <option value="">**Selecione**</option>
            <?php
               foreach($resultado as $UF){
                ?>
                <option value="<?-$UF['id']?><?-$UF['nome']?><?-$UF['sigla']?>"></option>
                <?php
               }
            ?>
        </select>
    </div>
 <input type="submit" name="gravar" value="gravar">
</form>