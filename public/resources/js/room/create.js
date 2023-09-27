

// Product images
var images = [];
var myDropzone = new Dropzone("#add_room_media", {
    url: '#',
    paramName: 'file', // The name that will be used to transfer the file
    maxFiles: 10,
    maxFilesize: 10, // MB
    addRemoveLinks: true,
    accept: function (file, done) {
        images.push({
            name: file.name,
            file,
        });
    }
});
$('#submit-btn').on('click', (e) => {
    e.preventDefault();
    const formData = new FormData(document.getElementById('kt_ecommerce_add_room_form'));
    images.forEach((image) => {
        formData.append('images[]', image.file, image.name);
    });

    $.ajax({
        type: 'POST',
        enctype: 'multipart/form-data',
        url: '/room',
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        success: function () {
            window.localStorage.setItem('success', 'Thêm mới thành công!');
            window.location.href = '/room';
        },
        error: function (data) {
            if (data.status === 422) {
                $('.error-message').each(function () {
                    $(this).html('');
                    const inputElement = $(this).parent().children('input');
                    if (inputElement) {
                        inputElement.removeClass('is-invalid');
                    }
                });

                Object.entries(data.responseJSON.errors).forEach(([key, val]) => {
                    $(`#error-message-${key}`).append(`<small>${val[0]}</small>`);
                    $(`#error-message-${key}`).css('display', 'block');
                    const inputElement = $(`#error-message-${key}`).parent().children('input');
                    if (inputElement) {
                        inputElement.addClass('is-invalid');
                    }
                });
            }
        },
    });
});

function validateProductVariants() {
    $('.variant-error-message').html('');

    let hasError = false;
    $('.variant').each(function() {
        let isError = false;
        $(this).find('select').each(function() {
            if (!$(this).val()) {
                // $(this).addClass('is-invalid');
                isError = true;
                return;
            }
        });
        $(this).find('input').each(function() {
            if (!$(this).val()) {
                // $(this).addClass('is-invalid');
                isError = true;
                return;
            }
        });
        if (isError) {
            hasError = true;
            $(this).find('.variant-error-message').html(`<small>Trường bắt buộc</small>`)
        }
    });

    return hasError;
}
