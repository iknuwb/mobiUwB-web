// antybot
$(function() {
	$('#poczta').each(function() {
		this.href = this.href.replace('http://', 'mailto:sekretariat@adres')
		this.href = this.href.replace('adres', '').replace('/','');
	});
});


// dynamicznie dodaje tresc do odpowiednich stron
// jsonUrl - zrodlo, z ktorego pobierany jest json
// divId - id div-a, do ktorego doczepiamy tresc;w
function addContent(jsonUrl, divId)
{

$.getJSON(jsonUrl, null, function(data){
var items = [];

$.each(data, 
    function(key, val) {
        var d = new Date(val.data);

        if(key < 5)
        {
            // data-collapsed="false" 
            items.push('<div data-role="collapsible" data-collapsed="false" data-theme="b" data-content-theme="d" data-collapsed-icon="arrow-d" data-expanded-icon="arrow-u"><h4 class="data" data-inset="true">' + d.toLocaleDateString() + '</h4><div class="title">' + val.tytul + '</div><div class="tresc">' + val.tresc + '</div></div>');          
        }
        else
        {
            // data-collapsed="true" 
            items.push('<div data-role="collapsible" data-collapsed="true" data-theme="b" data-content-theme="d" data-collapsed-icon="arrow-d" data-expanded-icon="arrow-u" data-inset="true"><h4 class="data">' + d.toLocaleDateString() + '</h4><div class="title">' + val.tytul + '</div><div class="tresc">' + val.tresc + '</div></div>');          
        }
    }); 
    //$('<div/>', {'data-role': 'content', html: items.join('')}).appendTo(divId);
    $(divId).html('<div/>', {'data-role': 'content', html: items.join('')});
});  
}


function time () {
  return Math.floor(new Date().getTime() / 1000);
}


//zliczamy zajecia odwolane
$(function() {
	$.getJSON('http://ii.uwb.edu.pl/serwis/?/json/sz', null, function(data){
	var i = 0;
	var teraz = new Date();
	var wczesniej = new Date(teraz.getFullYear(), teraz.getMonth(), teraz.getDate()-3); // z trzech dni ?
	$.each(data,
		function(key, val) {
			var d = new Date(val.data);
			if (d > wczesniej)
			  i++;
		});
		$("#licznik_sz").html(i);
	});  
});
