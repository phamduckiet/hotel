
$('.delete-btn').click((e) => {
    const urlRequest = $(e.target).data('url');
    const roomId = $(e.target).data('id');
    Swal.fire({
        title: 'Bạn có chắc chắn muốn xóa?',
        icon: 'warning',
        buttonsStyling: false,
        showCancelButton: true,
        confirmButtonText: 'Xác nhận',
        cancelButtonText: 'Hủy',
        customClass: {
            confirmButton: "btn btn-danger",
            cancelButton: 'btn btn-light',
        }
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'DELETE', // method
                url: urlRequest,
                success: function (data) {
                    $(`#room-type-item-${roomId}`).remove();
                    toastr.success('Xóa thành công!');
                    location.reload();
                },
                error: function () { }
            });
        }
    });
});

const currentURL = window.location.href;
const url = new URL(currentURL);
const date = url.searchParams.get('date');

const element = document.querySelector('#rooms_flatpickr');
flatpickr = $(element).flatpickr({
    altInput: true,
    altFormat: "d/m/Y",
    dateFormat: "Y-m-d",
    defaultDate: date,
    onChange: function(selectedDates, dateStr, instance) {
        window.location.href = `/rooms?date=${dateStr}`;
    },
});
