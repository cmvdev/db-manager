<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=$this->title?></title>
</head>
<body>
<p><?= $this->message ?></p>
<form method="post">
    <label for="firstname">Vorname</label>
    <input type="text" name="firstname" value="<?= isset($_POST['firstname'])? $_POST['firstname'] : ''?>">
    <label for="name">Vorname</label>
    <input type="text" name="name" value="<?= isset($_POST['name'])? $_POST['name'] : ''?>">
    <label for="email">Email</label>
    <input type="text" name="email" value="<?= isset($_POST['email'])? $_POST['email'] : ''?>">
    <label for="telephone">Telefone</label>
    <input type="text" name="telephone" value="<?= isset($_POST['telephone'])? $_POST['telephone'] : ''?>">
    <label for="street">Strasse</label>
    <input type="text" name="street" value="<?= isset($_POST['street'])? $_POST['street'] : ''?>">
    <label for="city">City</label>
    <input type="text" name="city" value="<?= isset($_POST['city'])? $_POST['city'] : ''?>">
    <label for="plz">PLZ</label>
    <input type="text" name="plz" value="<?= isset($_POST['plz'])? $_POST['plz'] : ''?>">
    <label for="country">Land</label>
    <input type="text" name="country" value="<?= isset($_POST['country'])? $_POST['country'] : ''?>">
    <br> <br>
    <button type="submit">Speichern</button>
    <a href="<?=BASE_URL.'admin'?>">Abrechen</a>
</form>

</body>
</html>