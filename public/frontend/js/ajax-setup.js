const baseUrl = document.querySelector("meta[name='url']").getAttribute('content')
ajaxSetup()

$(document).ajaxSuccess(function(e,x) {
    var result = $.parseJSON(x.responseText);
    $('meta[name="csrf-token"]').attr('content', result._token);
    ajaxSetup()
});

function ajaxSetup()
{
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': document.querySelector("meta[name='csrf-token']").getAttribute('content')
        },
    });
}
