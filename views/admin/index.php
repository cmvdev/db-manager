<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$this->title?></title>
</head>
<body>
	<form  method="POST">
		<label for="firstname">Vorname</label>
		<input type="text" name="firstname">
		<label for="name">Name</label>
		<input type="text" name="name" >
		<label for="email">Email</label>
		<input type="text" name="email">
		<label for="telephone">Telefone</label>
		<input type="text" name="telephone">
		<label for="street">Strasse</label>
		<input type="text" name="street">
		<label for="city">City</label>
		<input type="text" name="city">
		<label for="plz">PLZ</label>
		<input type="text" name="plz">
		<label for="country">Land</label>
		<input type="text" name="country">
		<input name="search" type="hidden">
		<br> <br>
		<button type="submit">Suchen</button>
	</form>
<table>

	<tr>
		<th>
		<td>Id</td>
		<td>Name</td>
		<td>Vorname</td>
		<td>Email</td>
		<td>Telefone</td>
		<td>Strasse</td>
		<td>Stadt</td>
		<td>PLZ</td>
		<td>Land</td>
		<td>Edit</td>
		<td>Delete</td>
		</th>
	</tr>
	<?php foreach ($this->kunden as $kunde) :?>
		<tr>
			<th>
			<td><?=$kunde['id'] ?></td>
			<td><?=$kunde['firstname'] ?></td>
			<td><?=$kunde['name']?></td>
			<td><?=$kunde['email'] ?></td>
			<td><?=$kunde['telephone'] ?></td>
			<td><?=$kunde['street'] ?></td>
			<td><?=$kunde['city'] ?></td>
			<td><?=$kunde['plz'] ?></td>
			<td><?=$kunde['country'] ?></td>
			<td><a href="<?=BASE_URL.'admin/edit/'.$kunde['id']?>">Bearbeiten</a></td>
			<td><a href="<?=BASE_URL.'admin/delete/'.$kunde['id']?>">Löschen</a></td>
			</th>
		</tr>
	<?php endforeach; ?>
</table>

<a href="<?=BASE_URL.'admin/insert'?>">Kunden hinzufügen</a>

</body>
</html>