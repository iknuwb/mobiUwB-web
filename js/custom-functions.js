/*
 * fancybox - lightbox
 */
$(document).ready(function () {
    $('a[rel="lightbox"]').fancybox();
});

/*
 * Prosta ochrona przed spamem
 */
$(document).ready(function () {
    $('#poczta').each(function () {
        var email = this.href.replace('(malpa)', '@').replace(/\(kropka\)/g, '.');
        this.href = email;
        $('#poczta').html(email.replace('mailto:', ''));
    });
});

/*
 * Stan cache
 * 
 * Sprawdza czy plik manifestu został zaktualizowany, jeżeli tak,
 * strona jest odświeżana, aby załadować nowe dane
 */
window.addEventListener('load', function (e) {

    window.applicationCache.addEventListener('updateready', function (e) {
        if (window.applicationCache.status === window.applicationCache.UPDATEREADY) {
            // Przeglądarka odświeżyła cache. Przeładowujemy stronę.
            window.location.reload();
        } else {
            // Manifest nie został zmieniony.
        }
    }, false);

}, false);
