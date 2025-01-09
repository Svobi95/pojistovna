<?php
require('tridy/Database.php');
require('tridy/ClientManager.php');
$connection = Database::connectTo('localhost', 'root', '', 'insurance_db');
// odeslání formuláře
$inserted = new ClientManager();
$inserted->insertClient();
?>
<!DOCTYPE html>
<html lang="cs">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<script src="./assets/js/bootstrap.bundle.js"></script>
	<title>PojištěníApp - home</title>
	<style>
		
	</style>
</head>

<body>
	<header>
		<?php
		include('assets/navigace.php');
		?>
	</header>
	<main class="container">
		<!-- tabulka výpis klientů -->
		<section class="my-5">
			<h3>Klienti</h3>

			<table class="table table-responsive  table-bordered table-hover table-sm ">
				<thead class="table-secondary ">
					<tr>
						<th>ID</th>
						<th>Jméno a příjmení</th>
						<th>Věk</th>
						<th>Telefon</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$lister = new ClientManager();
					$lister->listAllClients();
					?>
				</tbody>
			</table>
		</section>
		<!-- formulář zadání nového klienta -->
		<section class="my-5" >
			<h3>Nový klient</h3>
			<div class="d-flex gap-2 flex-wrap">
				<div class="avatar"><img src="assets/img/avatar.svg" alt=""></div>

				<?php
				// vloží formulář
				include('./assets/form.php');
				?>

			</div>
		</section>
		
		<section>
			<?php
			// výpis klientů
			$listerClients = new ClientManager();

			
			?>
			<span id="errorEmpty" style="color: red; display: none;">Vyplňte, prosím,  všechna pole!</span>
				<span id="errorFormat" style="color: red; display: none;">Zadejte, prosím, telefon ve správném formátu!</span>
		</section>
	</main>
	<footer>
	</footer>
	<script src="./assets/js/form_control.js"></script>
</body>

</html>