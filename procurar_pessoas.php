<?php

    session_start();

    if (!isset($_SESSION['usuario'])) {
        header('location: index.php?erro=1');
	}
	
	  //Classe de conexão com o bd
	  require_once('db.class.php');
	  
	  //instância da classe
	  $objDb = new db();
	  $link = $objDb->conecta_mysql();
	  
	  $id_usuario = $_SESSION['id_usuario'];
   
		//Quantidades de TWEETs
	  $sql ="SELECT COUNT(*) AS qtde_tweets FROM tweet WHERE id_usuario = $id_usuario "  ;
	  $qtde_tweets = 0;	
	  //executa a query de conexão com bd
	  $resultado_id = mysqli_query($link, $sql);
	  if($resultado_id){
		$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);
		$qtde_tweets = $registro['qtde_tweets'];
	  }else{
		  echo 'Erro na query';
		}
  
		//Quantidades de Seguidores
	  $sql ="SELECT COUNT(*) AS qtde_seguidores FROM usuarios_seguidores WHERE seguindo_id_usuario = $id_usuario "  ;
	  $qtde_seguidores = 0;	
	  //executa a query de conexão com bd
	  $resultado_id = mysqli_query($link, $sql);
	  if($resultado_id){
		$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);
		$qtde_seguidores = $registro['qtde_seguidores'];
	  }else{
		  echo 'Erro na query';
		}
  

?>



<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Twitter clone</title>
		
		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		
		<script type="text/javascript">

			$(document).ready(function(){
				// associar o evento de click ao botão
				$('#btn_procurar_pessoa').click(function(){	
					if($('#nome_pessoa').val().length > 0){	
						
						$.ajax({
							url: 'get_pessoas.php',
							method: 'post',
							data: $('#form_procurar_pessoa').serialize(),
							success: function(data){
								$('#pessoas').html(data);

									$('.btn_seguir').click(function(){
										var id_usuario = $(this).data('id_usuario');

										$('#btn_seguir_'+id_usuario).hide();
										$('#btn_deixar_seguir_'+id_usuario).show();

										$.ajax({
											url: 'seguir.php',
											method: 'post',
											data: {seguir_id_usuario: id_usuario},
											success: function(data){
												data;
											}
										})
									});
									
									$('.btn_deixar_de_seguir').click(function(){
										var id_usuario = $(this).data('id_usuario');
										$('#btn_seguir_'+id_usuario).show();
										$('#btn_deixar_seguir_'+id_usuario).hide();
										
										$.ajax({
											url: 'deixar_de_seguir.php',
											method: 'post',
											data: {deixar_seguir_id_usuario: id_usuario},
											success: function(data){
												data;
											}
										})
									});
							}
						});
					}
				});				
			});
		</script>
	</head>

	<body>

		<!-- Static navbar -->
	    <nav class="navbar navbar-default navbar-static-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a href="home.php"><img src="imagens/icone_twitter.png" ></a>
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li><a href="home.php">Home</a></li>
	            <li><a href="sair.php">Sair</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    	
	    	<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<h4><?= $_SESSION['usuario']; ?></h4>
						<hr>
						<div class="col-md-6">
							Twitter <br> <?= $qtde_tweets ?>
						</div>
						<div class="col-md-6">
							Seguidores <br> <?= $qtde_seguidores ?>
						</div>
					</div>
				</div>
			 </div>
	    	 <div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-body">
						<form id="form_procurar_pessoa" class="input-group">
		   					<input type="text" id="nome_pessoa" name="nome_pessoa" class="form-control" placeholder="Quem você quer procurar?" maxlength="140">
							<span class="input-group-btn">
								<button class="btn btn-default" id="btn_procurar_pessoa" type="button">
									Procurar
								</button>
							</span>
						</form>
					</div>
				</div>

				<div id="pessoas" class="list-group">
	    	 <div class="container">
			  </div>
             </div>
 			 </div>

			 <div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-body">
				
					</div>
				</div>
			 </div>
			
		 


	     </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>