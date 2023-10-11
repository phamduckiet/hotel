// Description editor
var fullEditor = new Quill('#room-type-description-editor', {
    modules: {
        toolbar: [
            [{
                header: [1, 2, false]
            }],
            ['bold', 'italic', 'underline'],
            ['image', 'code-block']
        ]
    },
    theme: 'snow' // or 'bubble'
});

fullEditor.root.innerHTML = $('#room-type-description').val();

// Dropzone product images
const roomTypeId = $('#roomType-id-value').val();

var myDropzone = new Dropzone("#room_type_media_dropzone", {
    url: `/room-types/${roomTypeId}/images`, // API lay ra ds images cua room
    paramName: 'image', // The name that will be used to transfer the file
    maxFiles: 10,
    maxFilesize: 10, // MB
    addRemoveLinks: true,
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
    accept: function (file, done) {
        done();
    },
    removedfile: function (file) {
        $.ajax({
            type: 'DELETE',
            url: `/room-types/${roomTypeId}/images/${file.id}`,
            success: function (data) {
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            },
        });
    },
});

$.ajax({
    type: 'GET',
    url: `/room-types/${roomTypeId}/images`,
    success: function (data) {
        data.forEach((image) => {
            let mockFile = { name: 'Image', size: 1000, id: image.id };
            myDropzone.displayExistingFile(mockFile, image.link);
        });
    },
});

// Save room type submit
$('#submit-btn').on('click', (e) => {
    e.preventDefault();

    const description = fullEditor.root.innerHTML;
    $('#room-type-description').val(description);
    $('#edit_room_type_form').submit();
});
