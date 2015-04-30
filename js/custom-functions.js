// fancybox - lightbox
$(document).ready(function () {
    $('a[rel="lightbox"]').fancybox();
});

//ochrona przed spamem
$( document ).ready(function() {
  $('#poczta').each(function() {
    var email = this.href.replace('(malpa)', '@').replace(/\(kropka\)/g, '.');
    this.href = email;
    $('#poczta').html(email.replace('mailto:', ''));  
  });
});

// Sprawdza czy plik manifestu został zaktualizowany, jeżeli tak, strona jest odświeżana
window.addEventListener('load', function(e) {

  window.applicationCache.addEventListener('updateready', function(e) {
    if (window.applicationCache.status === window.applicationCache.UPDATEREADY) {
      // Przeglądarka odświeżyła cache. Przeładowujemy stronę.
      window.location.reload();
    } else {
      // Manifest nie został zmieniony.
    }
  }, false);

}, false);
