<?php require "banderole_nonConnecte.php" ?>
<link rel="stylesheet" type="text/css" href="connexion.css">
<script src="onglets.js"></script>
<section>
	<div id="global" class="container col-6">
		<div class="btn-toolbar justify-content-around" role="toolbar" aria-label="Toolbar with button groups">
		  <div class="btn-group mr-2" role="group" aria-label="First group" data-toggle="buttons">
		    <label class="btn btn-secondary active">
		        <input type="radio" name="options" id="onglet1" class="onglet" autocomplete="off" checked> Connexion
		    </label>
		    <label class="btn btn-secondary">
		        <input type="radio" name="options" id="onglet2" class="onglet" autocomplete="off"> Nouveau client
		    </label>
		    <label class="btn btn-secondary">
		        <input type="radio" name="options" id="onglet3" class="onglet" autocomplete="off"> Nouveau vendeur
		    </label>
		  </div>
		</div>
		<div id="formulaires">
			<form id="sub1">
				<div class="form-group">
					<label>Nom d'utilisateur</label>
					<input type="username" class="form-control">
					<label>Mot de passe</label>
					<input type="password" class="form-control">
				</div>
				<div class="groups-separation">OU</div>
				<div class="form-group">
					<label>Code client</label>
					<input type="username" class="form-control">
				</div>
  				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
			<form id="sub2">
				<div class="form-group">
					<label>Nom d'utilisateur</label>
					<input type="username" class="form-control">
					<label>Mot de passe</label>
					<input type="password" class="form-control">
					<label>Confirmer le mot de passe</label>
					<input type="password" class="form-control">
					<label>e-mail</label>
					<input type="email" class="form-control">
				</div>
				<h4>Adresse</h4>
				<div class="form-group">
					<label>Numero et rue</label>
					<input type="text" class="form-control">
					<label>Code postal</label>
					<input type="text" class="form-control">
					<label>Ville</label>
					<input type="text" class="form-control">
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
			<form id="sub3">
				<div class="form-group">
					<label>Nom d'utilisateur</label>
					<input type="username" class="form-control">
					<label>Mot de passe</label>
					<input type="password" class="form-control">
					<label>Confirmer le mot de passe</label>
					<input type="password" class="form-control">
					<label>e-mail</label>
					<input type="email" class="form-control">
				</div>
				<h4>Adresse</h4>
				<div class="form-group">
					<label>Numero et rue</label>
					<input type="text" class="form-control">
					<label>Code postal</label>
					<input type="text" class="form-control">
					<label>Ville</label>
					<input type="text" class="form-control">
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</section>
<?php require "footer.php" ?>