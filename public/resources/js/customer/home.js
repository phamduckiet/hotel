$('input[name="daterange"]').daterangepicker({
    opens: 'right',
    autoUpdateInput: false,
    autoApply: true,
    locale: {
        format: 'DD/MM/YYYY',
    },
}, function (start, end, label) {
    const checkin = start.format('YYYY-MM-DD');
    const checkout = end.format('YYYY-MM-DD');
    $("#checkin-input").val(checkin);
    $("#checkout-input").val(checkout);
});

const urlSearchParams = new URLSearchParams(window.location.search);

$('input[name="daterange"]').on('apply.daterangepicker', function (ev, picker) {
    $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
});

$('input[name="daterange"]').on('cancel.daterangepicker', function (ev, picker) {
    $(this).val('');
});

// Go to room detail page
$('.room-detail-btn').click((e) => {
    e.preventDefault();
    const urlRequest = $(e.target).data('url');
    const urlSearchParams = new URLSearchParams(window.location.search);
    window.location.href = urlRequest + `?${urlSearchParams.toString()}`;
});
