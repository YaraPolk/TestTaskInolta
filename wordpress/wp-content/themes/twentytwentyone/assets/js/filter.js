let $ = jQuery.noConflict();

$(document).ready(function(){
    $('#genres_filter').on('change', function() {
        $.ajax({
            url : cat_filter.ajaxurl,
            data: {
                'action': 'filter',
                'genres_filter': $('#genres_filter').val(),
            },
            method: "POST",
        }).done((data) => {
            $('main').html(data);
        }).error((jqXHR) => {
            console.log(jqXHR);
        });
        return false;
    });
});