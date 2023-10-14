$('input[name="daterange"]').daterangepicker({
    opens: 'left',
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
console.log(urlSearchParams.get('daterange'))

$('input[name="daterange"]').on('apply.daterangepicker', function (ev, picker) {
    $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
});

$('input[name="daterange"]').on('cancel.daterangepicker', function (ev, picker) {
    $(this).val('');
});
