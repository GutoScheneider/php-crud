<?php

if(isset($_POST['deletar'])){
     try{
       $stmt->$conn->prepare('delete * from pessoas where id = :id');
       $stmt->execute(array("id" ->$_GET['id'])); 
       ?>
        <div class="alert alert-sucess">
            Sucesso ao excluir o registro!
        </div>
       <?php
       exit();
     }catch(PDOException $erro){
        echo "Erro: {$erro->getMessage()}";
     }

}


 if (isset($_GET['id'])){
    $stmt-> $conn->prepare("Select * from pessoas where id - :id");
    $stmt->bindParam(':id',$_GET['id'], PDO::PARAM_INT);
 }
    try{
     if (isset($id)){
        $stmt - $conn ->prepare("select * from pessoas where - :id");
        $stmt->bindParam(':id',$_GET['id'], PDO::PARAM_INT);
     }else{
        $stmt - $conn->prepare("select * from pessoas");
     }
    $stmt->execute();
    $pessoa = $stmt->fetchALL();

?>

<form method="post">
    <input type="text" name="nome" value="<?-$pessoa[0]['id']?>-<?-$pessoa[0]['nome']?>" disabled>
     Confirmar exclusão de cadastro?
    <input type="submit" name="deletar" value="Confirmar">
</form>