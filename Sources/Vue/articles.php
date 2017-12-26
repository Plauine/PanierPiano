<?php require "banderole_nonConnecte.php" ?>
<script src="onglets.js"></script>
<script src="actions.js"></script>
<section>
	<div class="container">
		<div class="btn-toolbar justify-content-around row" role="toolbar" aria-label="Toolbar with button groups">
		  <div class="btn-group mr-2" role="group" aria-label="First group" data-toggle="buttons">
		    <label class="btn btn-secondary active">
		        <input type="radio" name="options" id="onglet1" class="onglet" autocomplete="off" checked> Tous les articles
		    </label>
		    <label class="btn btn-secondary">
		        <input type="radio" name="options" id="onglet2" class="onglet" autocomplete="off"> Catégorie 1
		    </label>
		    <label class="btn btn-secondary">
		        <input type="radio" name="options" id="onglet3" class="onglet" autocomplete="off">  Catégorie 2
		    </label>
		  </div>
		</div>
		<div class="row justify-content-center">
			<div class="col-3">
				<button type="button" class="btn btn-outline-info">
					Nouveau produit
					<span class="oi oi-plus"></span>
				</button>				
			</div>
			<div class="col-3">
				<button type="button" class="btn btn-outline-info">
					Nouvelle catégorie
					<span class="oi oi-star"></span>
				</button>				
			</div>
		</div>
		<div class="row">
			<table id="sub1" class="table table-striped">
				<thead class="thead-light">
					<tr>
				    	<th scope="col">ID</th>
				    	<th scope="col">Produit</th>
				    	<th scope="col">Catégorie</th>
				    	<th scope="col">Date d'ajout</th>
				    	<th scope="col">Prix unit.</th>
				    	<th scope="col">Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">1</th>
						<td>Blabla 1</td>
						<td>Cat. 1</td>
						<td>28/07/2017</td>
						<td>15.00€</td>
						<td>
							<span class="oi oi-pencil action"></span>
							<span class="oi oi-delete action"></span>
						</td>
					</tr>
				</tbody>
			</table>
			<table id="sub2" class="table table-striped">
				<thead class="thead-light">
					<tr>
				    	<th scope="col">ID</th>
				    	<th scope="col">Produit</th>
				    	<th scope="col">Date d'ajout</th>
				    	<th scope="col">Prix unit.</th>
				    	<th scope="col">Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">1</th>
						<td>Blabla 1</td>
						<td>28/07/2017</td>
						<td>15.00€</td>
						<td>
							<span class="oi oi-pencil action"></span>
							<span class="oi oi-delete action"></span>
						</td>
					</tr>
				</tbody>
			</table>
			<table id="sub3" class="table table-stripped">
				<thead class="thead-light">
					<tr>
				    	<th scope="col">ID</th>
				    	<th scope="col">Produit</th>
				    	<th scope="col">Date d'ajout</th>
				    	<th scope="col">Prix unit.</th>
				    	<th scope="col">Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">1</th>
						<td>Blabla 1</td>
						<td>28/07/2017</td>
						<td>15.00€</td>
						<td>
							<span class="oi oi-pencil action"></span>
							<span class="oi oi-delete action"></span>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</section>
<?php require "footer.php" ?>