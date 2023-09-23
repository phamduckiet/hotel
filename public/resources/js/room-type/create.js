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

// Submit button to create room type
$('#submit-btn').on('click', (e) => {
    e.preventDefault();
    const description = fullEditor.root.innerHTML;
    $('#room-type-description').val(description); // Gan gia tri description vao trong o input
    $('#add_room_type_form').submit(); // Submit form
});
