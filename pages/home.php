<div class="content">
	<form action="" method="POST" enctype="multipart/form-data">

		<div class="form-group">
			<label for="input-user">Usuário</label>
			<input type="text" name="input-user" id="input-user" data-js="input-user" placeholder="Digite o nome de usuário" class="form-control">	
		</div>

		<div class="form-group">
			<label for="input-password">Senha</label>
			<input type="password" name="input-password" id="input-password" data-js="input-password" placeholder="Digite uma senha" class="form-control">	
		</div>

		<div class="form-group">
			<input type="submit" name="btn-enter" class="btn btn-outline-primary" value="Entrar">
		</div>

		<div class="form-group">
			<input type="hidden" name="env" value="login">
		</div>
		
	</form>

	<?php 
		if(isset($_POST['env']) && $_POST['env'] == "login") {
			$user = $_POST['input-user'];
			$pass = $_POST['input-password'];

			if(empty($user) || empty($pass))
				echo "<code>Preencha todos os campos</code>";
			else {
				$query = "SELECT * FROM users WHERE user = :user AND password = :pass";
				$create = $conn->prepare($query);
				$create->bindValue(':user', $user);
				$create->bindValue(':pass', $pass);				
				$create->execute();

				$result = $create->fetch();

				if($result > 0) {
					$_SESSION['name'] = $result['name'];
					$_SESSION['user'] = $result['user'];

					echo '<meta http-equiv="Refresh" content="1; url=?page=user"';
				} else {
					echo "<code>Usuário ou senha inválidos!</code>";
				} 
			}
		}
	 ?>
</div>