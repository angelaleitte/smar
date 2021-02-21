

<?php 
	session_start();
	if(isset($_SESSION['usuario'])){

		include "../classes/conexao.php";
		include "../classes/produtos.php";
		
		   $c = new conectar();
		   $conexao=$c->conexao();
		
		   $p = new produtos();
		   $produtos=$p->exibirProdutos();







 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Início</title>
	<?php require_once "menu.php" ?>
</head>
<body>
<div id="vendasFeitas" style=""></div>

<div class="col-md-12">
   <div class="row">
      <div class="col-md-12">
	     <?php include "../view/graficos/qtdeEstoque.php"?>
	  </div>
	 
   </div>
</div>

<hr>




</body>
</html>


<?php 
} else{
	header("location:../index.php");
}

 ?>

<script type="text/javascript">
		$(document).ready(function(){

				
				$('#vendasFeitas').load('vendas/vendasRelatorios.php');
				$('#vendasFeitas').show();
				
		});

		

	</script>


