<?php
//incluo o arquivo "config.php" para usar o PDO
require "config.php";
//receber qual tipo de operação será realizada quando forem recebidos
$op = $_POST['operacao'];


if ($op == 1){

//crio o comando sql e monto a tabela
$sql = "SELECT * FROM tblaluno";
$linhas="";

  $dados = $pdo->query($sql);
   if ($dados->rowcount() > 0){
      foreach($dados->fetchAll() as $aluno){
      
         // TR - linhas//
         // TD - Colunas//
         $linhas .= "<tr>";
         $linhas.="<td>". $aluno['nome']. "</td>";
         $linhas.="<td>". $aluno['datanascimento']. "</td>";
         $linhas.="<td>". $aluno['cpf']. "</td>";
         $linhas.="<td>". $aluno['endereco']. "</td>";
         $linhas.="<td>". $aluno['telefone']. "</td>";       

         if ($aluno['sexo'] == 1){
               $linhas.=  "<td>Homem</td>";
         }else{
               $linhas.=  "<td>Mulher</td>";
         }

         $linhas.="<td>";
         $linhas.="<Button type= 'button' id=btnAlterar'>Editar Aluno</button>";
         $linhas.="</td>";
         $linhas.="<td>";
         $linhas.="<Button type= 'button' id=btnAlterar'>Apagar Aluno</Button>";
         $linhas.="</td>";
         $linhas.="</tr>";
      }
    echo  $linhas;
    
 }else{  
    $linhas.="<tr>";
    $linhas.= "<td>Não há alunos cadastrados....</td>";
    $linhas.="</tr>";
    echo  $linhas;
 }
}elseif($op == 2){
   if(isset ($_POST['nome']) && empty($_POST['nome']) == false){
      $nome =addslashes($_POST['nome']);
      $datanascimento = $_POST['datanascimento'];
      if(is_numeric($_POST['cpf'])){
      
          $cpf = $_POST['cpf'];
          
      }else{
          echo "ERRO, CPF INVÁLIDO";
      }
      if (is_numeric($_POST['telefone'])){
          $telefone = $_POST['telefone'];
      } else{
          echo "ERRO, TELEFONE INVÁLIDO";
      }
      $endereco = $_POST['endereco'];
      $sexo = $_POST['sexo'];
      
       $sql = "INSERT INTO tblaluno
      (mat,nome,datanascimento,cpf,endereco,telefone,sexo) VALUES (null,'$nome','$datanascimento','$cpf', '$endereco','$telefone','$sexo')";
      
      $sql = $pdo->query($sql);
      
      //print_r($sql);
      echo 1;   
   }
}
?>