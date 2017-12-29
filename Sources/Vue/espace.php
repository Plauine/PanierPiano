<?php require "banderole_nonConnecte.php" ?>
<script src="espace.js"></script>
<section>
	<div class="container">
		<div class="row">
			<div class="col-4">
				<div class="row">
					<h3>Compte id 4538383</h3>
					<div id="stars"></div>
				</div>
				<div class="row">
					<button type="button" class="btn btn-outline-info" id="modifier" onclick="changeValues()">
						Modifier
						<span class="oi oi-pencil"></span>
					</button>
					<button type="button" class="btn btn-outline-success" id="valider" onclick="validerForm()" style="visibility:hidden">
						Valider
						<span class="oi oi-check"></span>
					</button>
					<button type="button" class="btn btn-outline-danger" id="annuler" onclick="cancelChanges()" style="visibility:hidden">
						Annuler
						<span class="oi oi-x"></span>
					</button>
				</div>
			</div>
			<div class="col-8">
				<form>
					<div class="form-group">
						<label>Nom</label>
						<input type="text" class="form-control" value="John" readonly>
					</div>
					<div class="form-group">
						<label>Prénom</label>
						<input type="text" class="form-control" value="Doe" readonly>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" value="john.doe@krelj.fr" readonly>
					</div>
					<div class="form-group">
						<label>Adresse</label>
						<input type="text" class="form-control" value="25, rue du bonheur" readonly>
						<input type="text" class="form-control" value="54000" readonly>
						<input type="text" class="form-control" value="Nancy" readonly>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<?php require "footer.php" ?>