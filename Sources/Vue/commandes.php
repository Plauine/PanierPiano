<?php require "banderole_nonConnecte.php" ?>
<script src="onglets.js"></script>
<script src="actions.js"></script>
<section>
	<div class="container">
		<div class="row">
			<h3>Mes commandes</h3>
			<div class="btn-toolbar justify-content-around" role="toolbar" aria-label="Toolbar with button groups">
			  <div class="btn-group mr-2" role="group" aria-label="First group" data-toggle="buttons">
			    <label class="btn btn-secondary active">
			        <input type="radio" name="options" id="onglet1" class="onglet" autocomplete="off" checked> Toutes les commandes
			    </label>
			    <label class="btn btn-secondary">
			        <input type="radio" name="options" id="onglet2" class="onglet" autocomplete="off"> En attente
			    </label>
			    <label class="btn btn-secondary">
			        <input type="radio" name="options" id="onglet3" class="onglet" autocomplete="off"> Prises en charge
			    </label>
			    <label class="btn btn-secondary">
			        <input type="radio" name="options" id="onglet3" class="onglet" autocomplete="off"> Validées
			    </label>
			    <label class="btn btn-secondary">
			        <input type="radio" name="options" id="onglet3" class="onglet" autocomplete="off"> Annulées
			    </label>
			  </div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<table id="sub1" class="table table-striped" id="table-right">
					<thead class="thead-light">
						<tr>
					    	<th scope="col">Id</th>
					    	<th scope="col">Client</th>
					    	<th scope="col">Date</th>
					    	<th scope="col">Prix</th>
					    	<th scope="col">Etat</th>
					    	<th scope="col">Actions</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Id</td>
							<td>Client</td>
							<td>Date</td>
							<td>Prix</td>
							<td>Etat</td>
							<td><span class="oi oi-plus action"></span></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-12">
				<table id="sub2" class="table table-striped" id="table-right">
					<thead class="thead-light">
						<tr>
					    	<th scope="col">Id</th>
					    	<th scope="col">Client</th>
					    	<th scope="col">Date</th>
					    	<th scope="col">Prix</th>
					    	<th scope="col">Actions</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Id</td>
							<td>Client</td>
							<td>Date</td>
							<td>Prix</td>
							<td><span class="oi oi-plus action"></span></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-12">
				<table id="sub3" class="table table-striped" id="table-right">
					<thead class="thead-light">
						<tr>
					    	<th scope="col">Id</th>
					    	<th scope="col">Client</th>
					    	<th scope="col">Date</th>
					    	<th scope="col">Prix</th>
					    	<th scope="col">Actions</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Id</td>
							<td>Client</td>
							<td>Date</td>
							<td>Prix</td>
							<td><span class="oi oi-plus action"></span></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-12">
				<table id="sub4" class="table table-striped" id="table-right">
					<thead class="thead-light">
						<tr>
					    	<th scope="col">Id</th>
					    	<th scope="col">Client</th>
					    	<th scope="col">Date</th>
					    	<th scope="col">Prix</th>
					    	<th scope="col">Actions</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Id</td>
							<td>Client</td>
							<td>Date</td>
							<td>Prix</td>
							<td><span class="oi oi-plus action"></span></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-12">
				<table id="sub5" class="table table-striped" id="table-right">
					<thead class="thead-light">
						<tr>
					    	<th scope="col">Id</th>
					    	<th scope="col">Client</th>
					    	<th scope="col">Date</th>
					    	<th scope="col">Prix</th>
					    	<th scope="col">Actions</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Id</td>
							<td>Client</td>
							<td>Date</td>
							<td>Prix</td>
							<td><span class="oi oi-plus action"></span></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
<?php require "footer.php" ?>