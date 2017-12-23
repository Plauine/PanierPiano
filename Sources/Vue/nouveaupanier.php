<?php require "banderole_nonConnecte.php" ?> 
<script src="onglets.js"></script>
<script src="nouveaupanier.js"></script>
<section>
	<div class="container">
		<div class="row">
			<div class="col-2"><h3>Mon panier</h3></div>
			<div class="col-8 btn-toolbar justify-content-left" role="toolbar" aria-label="Toolbar with button groups">
				<div class="btn-group mr-2" role="group" aria-label="First group" data-toggle="buttons">
				  <label class="btn btn-secondary active">
				      <input type="radio" name="options" id="onglet1" class="onglet" autocomplete="off" checked> Global
				  </label>
				  <label class="btn btn-secondary">
				      <input type="radio" name="options" id="onglet2" class="onglet" autocomplete="off"> Marchand 1
				  </label>
				  <label class="btn btn-secondary">
				      <input type="radio" name="options" id="onglet3" class="onglet" autocomplete="off"> Marchand 2
				  </label>
				  <label class="btn btn-secondary">
				      <input type="radio" name="options" id="onglet4" class="onglet" autocomplete="off"> Marchand 3
				  </label>
				</div>
			</div>
			<div class="col-2"><button class="btn btn-outline-danger">Vider le panier</button></div>
		</div>
		<div class="row">
			<table id="sub1" class="table table-striped">
				<thead class="thead-dark">
					<tr>
				    	<th scope="col">Article</th>
				    	<th scope="col">Marchand</th>
				    	<th scope="col">Catégorie</th>
				    	<th scope="col">Quantité</th>
				    	<th scope="col">Prix unit.</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
			<table id="sub2" class="table table-striped">
				<caption>Total marchand:</caption>
				<thead class="thead-dark">
					<tr>
				    	<th scope="col">Article</th>
				    	<th scope="col">Catégorie</th>
				    	<th scope="col">Quantité</th>
				    	<th scope="col">Prix unit.</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
			<table id="sub3" class="table table-striped">
				<caption>Total marchand:</caption>
				<thead class="thead-dark">
					<tr>
				    	<th scope="col">Article</th>
				    	<th scope="col">Catégorie</th>
				    	<th scope="col">Quantité</th>
				    	<th scope="col">Prix unit.</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
			<table id="sub4" class="table table-striped">
				<caption>Total marchand:</caption>
				<thead class="thead-dark">
					<tr>
				    	<th scope="col">Article</th>
				    	<th scope="col">Catégorie</th>
				    	<th scope="col">Quantité</th>
				    	<th scope="col">Prix unit.</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
		</div>
		<div class="row">
			<div class="col-3">
				Total: 
			</div>
			<div class="col-9">
				<button class="btn btn-success">Valider le panier</button>
				<button class="btn btn-outline-info">Ajouter d'autres articles</button>
			</div>
		</div>
	</div>
</section>
<?php require "footer.php" ?>