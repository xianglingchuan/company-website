/**
 * 选择城市
 */
$('#city_id').click(function () {
    $('input[name="city_checked"]').val('');
    $('.checked_info').html('');
    var checked_box = $(this).find('input[name="city"]:checked');
    checked_box.each(function (i) {
        var value = $(this).val();
        var value_str = $('input[name="city_checked"]').val();
        if (value_str != '') {
            $('input[name="city_checked"]').val(value_str + ',' + value);
        } else {
            $('input[name="city_checked"]').val(value);
        }
        $('.checked_info').append('<span class="label label-info" style="margin:2px; padding:1px; display: inline">' + value + '</span>');
    });
});
/**
 * 选择城市确定
 */
$('.selectCity').click(function () {
    $('#service_area_info').html($('.checked_info').html());
    $('input[name="Manager[city]"]').val($('input[name="city_checked"]').val());
    $('#modal-city').modal('hide');
});