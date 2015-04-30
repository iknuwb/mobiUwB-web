// antybot
$(function () {
    $('#poczta').each(function () {
        this.href = this.href.replace('http://', 'mailto:sekretariat@adres')
        this.href = this.href.replace('adres', '').replace('/', '');
    });
});

//zliczamy zajecia odwolane
$(function () {
    $.getJSON('http://ii.uwb.edu.pl/serwis/?/json/sz', null, function (data) {
        var i = 0;
        var teraz = new Date();
        var wczesniej = new Date(teraz.getFullYear(), teraz.getMonth(), teraz.getDate() - 3); // z trzech dni ?
        $.each(data,
                function (key, val) {
                    var d = new Date(val.data);
                    if (d > wczesniej)
                        i++;
                });
        $("#licznik_sz").html(i);
    });
});
