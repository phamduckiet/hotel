// Dropzone product images
const roomId = $('#room-id-value').val();

var myDropzone = new Dropzone("#add_room_media", {
    url: `/rooms/${roomId}/images`, // API lay ra ds images cua room
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
            url: `/rooms/${roomId}/images/${file.id}`,
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
    url: `/rooms/${roomId}/images`,
    success: function (data) {
        data.forEach((image) => {
            let mockFile = { name: 'Image', size: 1000, id: image.id };
            myDropzone.displayExistingFile(mockFile, image.link);
        });
    },
});

