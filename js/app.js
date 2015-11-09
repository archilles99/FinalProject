/**
 * Javascript for FinalProject Application
 * 
 */

/**
 * On Documment ready
 */
$(function() {
    bindLinkOnTr();
});


// Link for table row
function bindLinkOnTr() {
    var tbody = $('tbody');
    tbody.css('cursor', 'pointer');
    tbody.on('click', 'tr[href]', function(e) {
        window.location = $(this).attr('href');
    });
}