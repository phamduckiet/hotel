// Show success toast message
const message = window.localStorage.getItem('success');
if (message) {
    window.localStorage.removeItem('success');
    toastr.success(message);
}

if ($('#success-message').val()) {
    toastr.success($('#success-message').val());
}

// Logout button clicked
$('#logout-btn').click((e) => {
    e.preventDefault();
    $('#logout-form').submit();
});
