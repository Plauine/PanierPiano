var lastActive = "1";

$(document).ready(function(){
	$("#form2").hide();
	$("#form3").hide();

	$('.onglet').change( function() {
		$("#form" + lastActive).hide("slow"); // On masque l'ancien formulaire
		$("#form" + this.id.substring(6,7)).show("slow"); // On affiche le formulaire choisi
		lastActive = this.id.substring(6,7);
	});
});
