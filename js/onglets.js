var lastActive = "1";

$(document).ready(function(){
	for(var i = 2; i < 20; i++) {
		$("#sub" + i).hide();
	}

    $('.onglet').change(function() {
        select(this);
    });

    // Paliatif pour l'absence de déclenchement du change
    $('.onglet').focus( function() {
        select(this);
    });
});

function select(tab){
    var id = tab.id.substring(6,7);
    if (id != lastActive) {
        $("#sub" + lastActive).hide("slow", function(){ // On masque l'ancien formulaire
            $("#sub" + id).show("slow"); // On affiche le formulaire choisi à la fin de l'animation précédente
        });
    }
    lastActive = id; // On donne la valeur du nouveau formulaire
}