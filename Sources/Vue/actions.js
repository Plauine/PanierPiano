

function displayActions(){
	$(this.lastElementChild.children).css('visibility', 'visible');
}

function hideActions(){
	$(this.lastElementChild.children).css('visibility', 'hidden');
}

$(document).ready(function(){
	$("tbody tr").hover(displayActions,hideActions);
	$(".action").css('visibility', 'hidden');
});