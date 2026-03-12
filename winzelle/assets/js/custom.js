function modal_display(title, base_url, size = 'md') {

    // Set title
    $('#modal-title').text(title);

    // Handle modal size
    let sizeClass = '';

    if (size === 'sm') sizeClass = 'modal-sm';
    if (size === 'lg') sizeClass = 'modal-lg';
    if (size === 'xl') sizeClass = 'modal-xl';

    $('#globalModal .modal-dialog')
        .removeClass('modal-sm modal-lg modal-xl')
        .addClass(sizeClass);

    // Show loading first
    $('#globalModalBody').html(`
        <div class="text-center py-4">
            <div class="spinner-border"></div>
        </div>
    `);

    // FIXED: remove #
    let modal = new bootstrap.Modal(document.getElementById('globalModal'));
    modal.show();

    // Load content
    $.ajax({
        url: base_url,
        method: 'GET',
        success: function(response) {
            $('#globalModalBody').html(response);
        },
        error: function() {
            $('#globalModalBody').html(`
                <div class="alert alert-danger">
                    Failed to load content.
                </div>
            `);
        }
    });
}

$(document).ready(function () {

    $('#courses').on('click', function () {
        modal_display(
            'Employee Profile',
            '../../err.php',
            'lg'
        );
    });

});