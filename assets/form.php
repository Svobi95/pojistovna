<?php
// formulář vložení klienta do databáze
// v neodeslaném formuláři zůstanou vyplněná pole
$first_name = (isset($_POST['first_name']) ? $_POST['first_name'] : null);
$second_name = (isset($_POST['second_name']) ? $_POST['second_name'] : null);
$age = (isset($_POST['age']) ? $_POST['age'] : null);
$phone = (isset($_POST['phone']) ? $_POST['phone'] : null);

echo ('<form method="POST" id="insertClient" class="flex-grow-1 p-3">
<div class="row  d-flex justify-content-center ">
	<div class="col-sm-auto flex-grow-1">
		<label for="first_name">Jméno</label>
		<input type="text" required maxlength="60" class="form-control" placeholder="Jméno" id="first_name" name="first_name" value="' . $first_name . '">
	</div>
	<div class="col-sm-auto flex-grow-1">
		<label for="second_name">Příjmení</label>
		<input type="text" required maxlength="60" class="form-control" placeholder="Příjmení" id="second_name" name="second_name" value="' . $second_name . '">
	</div>
</div>
<div class="row d-flex">
	<div class="col-sm-auto flex-grow-1">
		<label for="age">Věk</label>
		<input type="number" required min="1" class="form-control" placeholder="Věk klienta" id="age" name="age" value="' . $age . '">
	</div>
	<div class="col-sm-auto flex-grow-1">
		<label for="phone">Telefon</label>
		<input type="tel" required pattern="^(?:\+420)? ?[0-9]{3} ?[0-9]{3} ?[0-9]{3}$" class="form-control" id="phone" name="phone"  placeholder="+420 123 456 789" title="Zadejte platné telefonníní číslo" value="' . $phone . '">
	</div>
</div>
<div class="row d-flex justify-content-center  mt-3"><button class="btn btn-secondary btn-sm w-25" type="submit">Uložit</button></div>
<span id="errorEmpty" style="color: red; display: none;">Vyplňte, prosím,  všechna pole!</span>
<span id="errorFormat" style="color: red; display: none;">Zadejte, prosím, telefon ve správném formátu!</span>
</form>');
?>