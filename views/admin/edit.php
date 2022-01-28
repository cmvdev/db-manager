<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=$this->title?></title>
</head>
<body>
<p><?= isset($_GET['success'])? (($_GET['success']==1)? "Daten wurden gespeichert":"Daten könnten nicht gespeichert werden"):""  ?></p>
<form action="<?= BASE_URL.'admin/update/'. $this->kunde['id']?>" method="post">
    <label for="firstname">Vorname</label>
    <input type="text" name="firstname" value="<?=$this->kunde['firstname']?>">
    <label for="name">Vorname</label>
    <input type="text" name="name" value="<?=$this->kunde['name']?>">
    <label for="email">Email</label>
    <input type="text" name="email" value="<?=$this->kunde['email']?>">
    <label for="telephone">Telefone</label>
    <input type="text" name="telephone" value="<?=$this->kunde['telephone']?>">
    <label for="street">Strasse</label>
    <input type="text" name="street" value="<?=$this->kunde['street']?>">
    <label for="city">City</label>
    <input type="text" name="city" value="<?=$this->kunde['city']?>">
    <label for="plz">PLZ</label>
    <input type="text" name="plz" value="<?=$this->kunde['plz']?>">
    <label for="country">Land</label>
    <input type="text" name="country" value="<?=$this->kunde['country']?>">
    <br> <br>
    <button type="submit">Speichern</button>
    <a href="../">Abrechen</a>
</form>

</body>
</html>