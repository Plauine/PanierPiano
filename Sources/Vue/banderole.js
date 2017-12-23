
/**	Fonction qui gère le menu pour la page non connecté
  * param panier boolean qui dit si l'utilisateur a ou non déjà commencé un panier
  */ 

function choseMenuNonConnecte(panier){
  if(panier){
    $('#choseMenuNonConnecte').append('Mon panier <span class="oi oi-basket align-middle" title="basket" aria-hidden="true"></span>');
  } else {
    $('#choseMenuNonConnecte').append('Nouveau panier <span class="oi oi-plus align-middle" title="plus" aria-hidden="true"></span>');
  }
}

/**	Fonction qui gère le menu pour la page client
  * param panier boolean qui dit si l'utilisateur a ou non déjà commencé un panier
  */ 
  
function choseMenuClient(panier){
	if(!panier){
		$('#choseMenuClient').hide();
	}
}

window.onload = function(){
	$('#choseMenuNonConnecte').onload = choseMenuNonConnecte(false);
	$('#choseMenuClient').onload = choseMenuClient(false);
}