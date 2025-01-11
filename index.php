<?php
require('tridy/Database.php');
require('tridy/ClientManager.php');
$connection = Database::connectTo('localhost', 'root', '', 'insurance_db');
$clientManager = new ClientManager();

// odeslání formuláře
$clientManager->insertClient();
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
					$allClients = $clientManager->getAllClients();

					foreach ($allClients as $client) {
						echo '<tr>';
						echo '<td>' . htmlspecialchars($client['client_id']) . '</td><td>' . htmlspecialchars($client['first_name']) . ' ' . htmlspecialchars($client['second_name']) . '</td> <td>' . htmlspecialchars($client['age']) . '</td><td>' . htmlspecialchars($client['phone']) . '</td>';
						echo '</tr>';
					}
					?>
				</tbody>
			</table>
		</section>
		<!-- formulář zadání nového klienta -->
		<section class="my-5">
			<h3>Nový klient</h3>
			<div class="d-flex gap-2 flex-wrap">
				<div class="avatar"><img src="assets/img/avatar.svg" alt=""></div>

				<?php
				// vloží formulář
				include('./assets/form.php');
				?>

			</div>
		</section>

		<!-- zobrazení chyby při odesílání formuláře -->
		<section>

			<span id="error"
				style="color: red; display: <?= $clientManager->isInErrorState() === true ? 'block' : 'none'; ?>">Formulář
				se nepodařilo odeslat.</span>
		</section>
	</main>
	<footer>
	</footer>
</body>

</html>