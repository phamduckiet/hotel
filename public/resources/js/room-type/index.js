// Delete button clicked, JQuery
$('.delete-btn').click((e) => {
    const urlRequest = $(e.target).data('url');
    const roomTypeId = $(e.target).data('id');
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
                success: function(data) {
                    $(`#room-type-item-${roomTypeId}`).remove();
                    toastr.success('Xóa thành công!');
                },
                error: function() {}
            });
        }
    });
});

// Class definition
var KTAppEcommerceCategories = function () {
    // Shared variables
    var table;
    var datatable;

    // Private functions
    var initDatatable = function () {
        // Init datatable --- more info on datatables: https://datatables.net/manual/
        datatable = $(table).DataTable({
            "info": false,
            'order': [],
            'pageLength': 10, // chi hien thi 10 items trong 1 trang
            'columnDefs': [
                { orderable: false, targets: 5 }, // Disable ordering on column 3 (actions)
            ]
        });
    }

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = () => {
        const filterSearch = document.querySelector('[data-room-type-filter="search"]');
        // Xu ly su kien keyup
        filterSearch.addEventListener('keyup', function (e) {
            datatable.search(e.target.value).draw();
        });
    }

    // Public methods
    return {
        init: function () {
            table = document.querySelector('#room_type_list_table');

            if (!table) {
                return;
            }

            initDatatable();
            handleSearchDatatable();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTAppEcommerceCategories.init();
});
