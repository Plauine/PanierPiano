var data = [
{
  "article":"the wizard of oz",
  "marchand":"Marchand 1",
  "catégorie":"Catégorie 1",
  "quantité": 1,
  "prix":45.5
},
{
  "article":"the wizard of oz",
  "marchand":"Marchand 1",
  "catégorie":"Catégorie 1",
  "quantité": 1,
  "prix":45.5
}
];

function fillTableSub1(){
	for (var i = data.length - 1; i >= 0; i--) {
		var tag = '<tr><th scope="row">' + data[i].article + '</th><td>' + data[i].marchand + '</td><td>' + data[i].catégorie + '</td><td><input type="number" min="1" step="1" value="' + data[i].quantité + '"></td><td>' + data[i].prix + '</td></tr>';
		$("#sub1>tbody").append(tag);
	};
}

$(document).ready(function(){
	fillTableSub1();
});