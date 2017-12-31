var lastActive = "1";

$(document).ready(function(){
	for(var i = 2; i < 20; i++) {
		$("#sub" + i).hide();
	}

    $('.onglet').change(function() {
        console.log(1);
        $("#sub" + lastActive).hide("slow"); // On masque l'ancien formulaire
        $("#sub" + this.id.substring(6,7)).show("slow"); // On affiche le formulaire choisi
        lastActive = this.id.substring(6,7); // On donne la valeur du nouveau formulaire
    });

    // Paliatif pour l'absence de déclenchement du change
    $('.onglet').focus( function() {
        if (this.id.substring(6,7) != lastActive) {
            console.log(2);
            $("#sub" + lastActive).hide("slow"); // On masque l'ancien formulaire
            $("#sub" + this.id.substring(6,7)).show("slow"); // On affiche le formulaire choisi
        }

        lastActive = this.id.substring(6,7); // On donne la valeur du nouveau formulaire*/
    });
});
