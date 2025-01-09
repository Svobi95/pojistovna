<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-2">
	<a class="navbar-brand" href="#">
		<img src="assets/img/logo_lifebuoy.svg" class="d-inline-block align-top" height="32" widtht="32" alt="logo Lifebuoy">
		PojištniApp <span class="visually-hidden"></span>
	</a>
	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#obsah-navigacni-listy" aria-controls="obsah-navigacni-listy" aria-expanded="false" aria-label="Rozbalit navigaci">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="obsah-navigacni-listy">
		<ul class="navbar-nav me-auto">
			<!-- odkaz -->
			<li class="nav-item ">
				<a class="nav-link active" aria-current="page" href="index.php">Klienti <span class="visually-hidden">(aktuální)</span></a>
			</li>
			<!-- odkaz 2 s ikonkou  disabled-->
			<li class="nav-item d-flex align-items-center text-nowrap">
				<img class="ikonka" src="../images/mail.png" alt="">
				<a class="nav-link disabled" href="#">Lorem</a>
			</li>
			<!--odkaz 3 disabled -->
			<li class="nav-item">
				<a class="nav-link disabled" href="#" aria-disabled="true" tabindex="-1">Eligendi</a>
			</li>
		</ul>
		<!-- dropdown formulář přihlášení -->
		<button class="btn btn-sm btn-secondary dropdown-toggle me-3" type="button" id="dropdown-prihlaseni" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Přihlášení
		</button>
		<div class="dropdown-menu dropdown-menu-lg-end me-3 obal_prihlaseni ">
			<form class="px-2 py-3 form_prihlaseni">
				<div class="mb-3">
					<label for="prihlaseni-jmeno">Jméno</label>
					<input type="text" class="form-control" id="prihlaseni-jmeno" placeholder="Jmeno">
				</div>
				<div class="mb-3">
					<label for="prihlaseni-heslo">Heslo</label>
					<input type="password" class="form-control" id="prihlaseni-heslo" placeholder="******">
				</div>
				<button type="submit" class="btn btn-secondary btn-sm disabled">Přihlásit</button>
			</form>
			<!-- místo pro chybovou hlášku -->
			<p> </p>
		</div>
	</div>
</nav>