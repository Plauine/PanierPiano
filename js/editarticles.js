var currentSelEt2 = null;

$(document).ready(function(){
	$("#etape21").hide();
	$("#etape22").hide();

	$('#listRes button').on('click', function (e) {
		e.preventDefault();
		$(this).tab('show');
		$("#selectionner").prop("disabled", false);
	});
});

function lancerEtape2(idOnglet){
	if(idOnglet == '1'){
		var idSelected = $('#listRes .active').attr('id');
	} else if(idOnglet == '2'){
		var idSelected = $("#sel-et2 option:selected").attr('id'); // marche pas
	}
	$("#etape1" + idOnglet).hide();
	$("#etape2" + idOnglet).show();
	$("#addId" + idOnglet).append(idSelected);
	// Préremplir le formulaire avec les données en récupérant la catégorie du select
}

function annulerEtape2(idOnglet){
	$("#etape1" + idOnglet).show();
	$("#etape2" + idOnglet).hide();
	if(idOnglet == '1'){
		$("#addId" + idOnglet)[0].innerText = "Modifier le produit ";
	} else if(idOnglet == '2'){
		$("#addId" + idOnglet)[0].innerText = "Modifier la catégorie ";
	}
}