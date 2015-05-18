<tal:block metal:define-macro="gmaps">
/*
 * Ładowanie mapy (Google Maps API)
 */
function initMap(lat, lng) {
    var latlng = new google.maps.LatLng(lat, lng);
    var myOptions = {
        zoom: 16,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        title: "${nazwa_jednostki}"
    });
    google.maps.event.trigger(map, 'resize')
}

// zaladowanie mapy - mozna dopiero, jak DOM jest calkiem zaladowany
// inaczej nie dostaniemy danych od google
//$('#kontakt').on('pageshow',function(event){
$(document).on('pageshow', function (event) {
    initMap(${dlugosc}, ${szerokosc});
});
</tal:block>