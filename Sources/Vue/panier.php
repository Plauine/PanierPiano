<?php require "banderole_nonConnecte.php" ?>
<link rel="stylesheet" type="text/css" href="panier.css">
<script src="panier.js"></script>
<section>
	<div class="container">
		<div class="row">
			<div class="col-8">
				<form>
					<div class="row">
						<div class="col-10">
							<h3>Filtrer les produits</h3>
						</div>
						<div class="col-2">
							<button type="submit" class="btn btn-outline-secondary">Filtrer</button>
						</div>
					</div>
					<div class="row" id="reduce">
						<label>Nom de l'article</label>
						<input type="text" class="form-control">
					</div>
					<div class="row">
						<div class="col-6">
							<label>Nom de la catégorie</label>
							<input type="text" class="form-control">
						</div>
						<div class="col-6">
							<label>Budget minimum</label>
							<div class="input-group">
								<span class="input-group-addon">€</span>
								<input type="number" class="form-control" min="1" step="1">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-6">
							<label>Nom du marchand</label>
							<input type="text" class="form-control">
						</div>
						<div class="col-6">
							<label>Budget maximum</label>
							<div class="input-group">
								<span class="input-group-addon">€</span>
								<input type="number" class="form-control" min="1" step="1">
							</div>
						</div>
					</div>
				</form>
				<table class="table table-striped">
					<thead class="thead-light">
						<tr>
					    	<th scope="col">Article</th>
					    	<th scope="col">Marchand</th>
					    	<th scope="col">Catégorie</th>
					    	<th scope="col">Prix unit.</th>
					    	<th scope="col">Actions</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">The wizard of Oz</th>
							<td>Marchand 1</td>
							<td>Catégorie 1</td>
							<td>15.00€</td>
							<td><span class="oi oi-plus"></span></td>
						</tr>
						<tr>
							<th scope="row">The wizard of Oz 2</th>
							<td>Marchand 1</td>
							<td>Catégorie 2</td>
							<td>35.00€</td>
							<td><span class="oi oi-plus"></span></td>
						</tr>
						<tr>
							<th scope="row">The wizard of Oz 3</th>
							<td>Marchand 2</td>
							<td>Catégorie 1</td>
							<td>45.00€</td>
							<td><span class="oi oi-plus action"></span></td>
						</tr>
					</tbody>
				</table>
				
			</div>
			<div class="col-4">
				<div class="row justify-content-between">
					<h3>Mon panier</h3>
					<button class="btn btn-outline-danger">Vider le panier</button>
				</div>
				<table class="table table-striped" id="table-right">
					<thead class="thead-light">
						<tr>
					    	<th scope="col">Article</th>
					    	<th scope="col">Quantité</th>
					    	<th scope="col">Prix unit.</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>The wizard of Oz</td>
							<td><input type="number" class="form-control" min="1" step="1"></td>
							<td>15.00€</td>
						</tr>
						<tr>
							<td>The wizard of Oz</td>
							<td><input type="number" class="form-control" min="1" step="1"></td>
							<td>15.00€</td>
						</tr>
						<tr>
							<td>The wizard of Oz</td>
							<td><input type="number" class="form-control" min="1" step="1"></td>
							<td>15.00€</td>
						</tr>
					</tbody>
				</table>
				<div class="row justify-content-between">
					<p>Total: </p>
					
				</div>
			</div>
		</div>
	</div>
</section>
<?php require "footer.php" ?>