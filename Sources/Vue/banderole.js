function search_active(){
	$("#produits").removeClass("col-4").addClass("col-2");
	$("#commandes").removeClass("col-4").addClass("col-2");
	$("#recherche").removeClass("col-2").addClass("col-6");
}

function search_desactive(){
	$("#produits").addClass("col-4").removeClass("col-2");
	$("#commandes").addClass("col-4").removeClass("col-2");
	$("#recherche").addClass("col-2").removeClass("col-6");
}