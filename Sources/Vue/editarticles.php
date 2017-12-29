<?php require "banderole_nonConnecte.php" ?>
<script src="onglets.js"></script>
<script src="editarticles.js"></script>
<link rel="stylesheet" type="text/css" href="editarticle.css">
<section>
	<div class="container">
		<div class="row">
			<div class="col-12 btn-toolbar justify-content-center" role="toolbar" aria-label="Toolbar with button groups">
				<div class="btn-group mr-2" role="group" aria-label="First group" data-toggle="buttons">
				  <label class="btn btn-secondary active">
				      <input type="radio" name="options" id="onglet1" class="onglet" autocomplete="off"> Ajouter un produit
				  </label>
				  <label class="btn btn-secondary">
				      <input type="radio" name="options" id="onglet2" class="onglet" autocomplete="off"> Modifier un produit
				  </label>
				  <label class="btn btn-secondary">
				      <input type="radio" name="options" id="onglet3" class="onglet" autocomplete="off"> Ajouter une catégorie
				  </label>
				  <label class="btn btn-secondary">
				      <input type="radio" name="options" id="onglet4" class="onglet" autocomplete="off"> Modifier une catégorie
				  </label>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-12" id="sub1">
				<h4>Nouveau produit</h4>
				<form>
					<div class="row justify-content-center">
						<div class="col-4">
							<input type="text" class="form-control" placeholder="Nom du produit">
						</div>
						<div class="col-4">
							<select class="custom-select">
								<option>Catégorie 1</option>
								<option>Catégorie 2</option>
								<option>Catégorie 3</option>
								<option>Catégorie 4</option>
							</select>
						</div>
					</div>
					<div class="row justify-content-around">
						<div class="col-8">
							<textarea class="form-control" rows="5" id="comment" placeholder="Description"></textarea>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-8">
							<input type="text" class="form-control" placeholder="Nom du produit">
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-4">
							<button type="button" class="btn btn-outline-success">
								Enregistrer
								<span class="oi oi-check"></span>
							</button>
						</div>
					</div>
				</form>
			</div>
			<div class="col-12" id="sub2">
				<div class="col" id="etape11">
					<h4>Sélectionner le produit à modifier</h4>
					<div class="row justify-content-center">
						<div class="col-4">
							<div class="row">
								<select class="custom-select add-marg-top">
									<option>Catégorie 1</option>
									<option>Catégorie 2</option>
									<option>Catégorie 3</option>
									<option>Catégorie 4</option>
								</select>
								<input type="text" class="form-control add-marg-top" placeholder="Nom du produit">
							</div>
						</div>
						<div class="col-4">
							<div class="list-group" id="listRes">
								<button id="001" class="list-group-item list-group-item-action">Résultat 1</button>
								<button id="002" class="list-group-item list-group-item-action">Résultat 2</button>
								<button id="003" class="list-group-item list-group-item-action">Résultat 3</button>
								<button id="004" class="list-group-item list-group-item-action">Résultat 4</button>
							</div>
							<button disabled="true" onclick="lancerEtape2('1')" type="button" class="btn btn-info" id="selectionner">Modifier la sélection</button>
						</div>
					</div>
				</div>
				<div class="col hidden" id="etape21">
					<h4 id="addId1">Modifier le produit </h4>
					<button onclick="annulerEtape2('1')" type="button" class="btn btn-danger">Annuler</button>
					<form>
						<div class="row justify-content-center">
							<div class="col-4">
								<input type="text" class="form-control" placeholder="Nom du produit">
							</div>
							<div class="col-4">
								<select class="custom-select">
									<option>Catégorie 1</option>
									<option>Catégorie 2</option>
									<option>Catégorie 3</option>
									<option>Catégorie 4</option>
								</select>
							</div>
						</div>
						<div class="row justify-content-around">
							<div class="col-8">
								<textarea class="form-control" rows="5" id="comment" placeholder="Description"></textarea>
							</div>
						</div>
						<div class="row justify-content-center">
							<div class="col-8">
								<input type="text" class="form-control" placeholder="Nom du produit">
							</div>
						</div>
						<div class="row justify-content-center">
							<div class="col-4">
								<button type="submit" class="btn btn-outline-success">
									Enregistrer
									<span class="oi oi-check"></span>
								</button>
							</div>
						</div>
					</form>
				</div>
				

			</div>
			<div class="col-8" id="sub3">
				<form>
					<input type="text" class="form-control" placeholder="Nom de la catégorie">
					<textarea class="form-control" rows="5" id="comment" placeholder="Description"></textarea>
					<button type="submit" class="btn btn-outline-success">
						Ajouter catégorie
						<span class="oi oi-plus"></span>
					</button>
				</form>
			</div>


			<div class="col-12" id="sub4">
				<div class="col" id="etape12">
					<h4>Sélectionner la catégorie à modifier</h4>
					<div class="row justify-content-center">
						<div class="col-4">
							<div class="row">
								<select class="custom-select add-marg-top">
									<option selected>Choisir cat.</option>
									<option value="Catégorie 1">Catégorie 1</option>
									<option value="Catégorie 2">Catégorie 2</option>
									<option value="Catégorie 3">Catégorie 3</option>
									<option value="Catégorie 4">Catégorie 4</option>
								</select>
								<button onclick="lancerEtape2('2')" type="button" class="btn btn-info" id="selectionner">Modifier la sélection</button>
							</div>
						</div>
					</div>
				</div>
				<div class="col hidden" id="etape22">
					<h4 id="addId2">Modifier la catégorie </h4>
					<button onclick="annulerEtape2('2')" type="button" class="btn btn-danger">Annuler</button>
					<form>
						<div class="row justify-content-center">
							<div class="col-4">
								<input type="text" class="form-control" placeholder="Nom du produit">
							</div>
							<div class="col-4">
								<select id="sel-et2" class="custom-select">
									<option>Catégorie 1</option>
									<option>Catégorie 2</option>
									<option>Catégorie 3</option>
									<option>Catégorie 4</option>
								</select>
							</div>
						</div>
						<div class="row justify-content-around">
							<div class="col-8">
								<textarea class="form-control" rows="5" placeholder="Description"></textarea>
							</div>
						</div>
						<div class="row justify-content-center">
							<div class="col-8">
								<input type="text" class="form-control" placeholder="Nom du produit">
							</div>
						</div>
						<div class="row justify-content-center">
							<div class="col-4">
								<button type="submit" class="btn btn-outline-success">
									Enregistrer
									<span class="oi oi-check"></span>
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<?php require "footer.php" ?>