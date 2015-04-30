// antybot
$(function () {
    $('#poczta').each(function () {
        this.href = this.href.replace('http://', 'mailto:sekretariat@adres')
        this.href = this.href.replace('adres', '').replace('/', '');
    });
});
