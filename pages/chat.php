<?php 
	$_SESSION['idFor'] = $_GET['user'];
 ?>
<div class="content">
	<div id="list"></div>
	<hr>

	<form action="" method="POST" enctype="multipart/form-data" data-js="form-chat">
		<div class="col-lg-12">
			<div class="input-group">
				<input type="text" data-js="message" name="message" id="message" class="form-control" placeholder="Digite uma mensagem">
				<span class="input-group-btn">
					<input type="submit" value="&rang;&rang;" class="btn btn-success">
					<input type="hidden" name="env" value="envMsg">
				</span>
			</div>
		</div>
	</form>
	<?php 
		if(isset($_POST['env']) && $_POST['env'] == 'envMsg') {
			$message = $_POST['message'];
			$idFor = $_GET['user'];
			$idOf = $actualUser;

			if(empty($message)) 
				echo "<code>Digite uma mensagem</code>";
			else  {
				$query = "INSERT INTO messages (id_de, id_para, message) VALUES(:id_de, :id_para, :message)";
				$insert = $conn->prepare($query);
				$insert->bindValue(':id_de', $idOf);
				$insert->bindValue(':id_para', $idFor);
				$insert->bindValue(':message', $message);

				if($insert->execute()) {
					
				} else 
					echo "<code>Erro ao enviar mensagem</code>";
			}
		}
	 ?>
</div>