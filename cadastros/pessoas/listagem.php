<?php
 if (isset($_POST['gravar'])){
     try{
      $stmt - $conn->prepare(
        'INSERT INTO pessoas(nome)
        VALUES (:nome)');
     // $stmt->bindParam(':id',$id,PDO::PARAM_INT); 
      $stmt->execute(array('nome'->$_POST['nome'])); 
    //  $stmt->execute();
        }catch(PDOException $erro){
        echo "Erro: {$erro->getMessage()}";
     }
 }   
?>
<form method="POST">
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
    </div>