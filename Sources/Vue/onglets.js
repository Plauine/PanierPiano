var lastActive = "1";

$(document).ready(function(){
	$("#sub2").hide();
	$("#sub3").hide();
	$("#sub4").hide();
	$("#sub5").hide();

	$('.onglet').change( function() {
		$("#sub" + lastActive).hide("slow"); // On masque l'ancien formulaire
		$("#sub" + this.id.substring(6,7)).show("slow"); // On affiche le formulaire choisi
		lastActive = this.id.substring(6,7); // On donne la valeur du nouveau formulaire
	});
});
