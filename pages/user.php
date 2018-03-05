<div class="content">
	<table class="table">
		<tbody>
			<?php 
				$query = "SELECT * FROM users";
				$select = $conn->prepare($query);
				$select->execute();

				$result = $select->fetchAll(PDO::FETCH_OBJ);

				if($result <= 0)
					echo "<code>Nenhum usuário encontrado.</code>";
				else {
					foreach ($result as $key => $value) {
						$name = $value->name;
						$user = $value->user;
						$pass = $value->password;
						$photo = $value->photo;
				
			 ?>
			<tr>
				<td><img src="<?= $photo; ?>" class="photo-user"></td>
				<td><strong><?= $name; ?></strong></td>
				<td><a href="?page=chat&user=<?= $user; ?>" class="btn btn-info">Iniciar</a></td>
			</tr>
			<?php }} ?>
		</tbody>
	</table>
	<hr>
</div>