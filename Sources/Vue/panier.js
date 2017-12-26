function displayActions(){
	$(this.lastElementChild.firstElementChild).css('visibility', 'visible');
}

function hideActions(){
	$(this.lastElementChild.firstElementChild).css('visibility', 'hidden');
}

$(document).ready(function(){
	$("tbody tr").hover(displayActions,hideActions);
});