let defaultLang = "en"
let arrayLanguage = {};

/* $(document).ready(function () {
    changeLanguage(defaultLang)
}); */

function changeLanguage(language) {
    arrayLanguage = {}
    let jsonfile = "lang/" + language + ".json";

    $.getJSON(jsonfile).done(function (data) {
        arrayLanguage = data
        console.log(arrayLanguage);
        $('.translatable').each(function () {
            var translated = $(this).attr('data-trans');
            $(this).html(data[translated]);
        });
    });
}