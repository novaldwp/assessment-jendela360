$(document).ready(function() {
    $('#car_id').change(function() {
        let val = $(this).val();

        if (val.length > 9)
        {
            window.open(val);
            $('#car_id').val('');
        }
    })
});
