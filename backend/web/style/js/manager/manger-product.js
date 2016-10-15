/**
 * 选择城市
 */
$('#area_id').click(function () {
    $('input[name="area_checked"]').val('');
    $('.checked_info').html('');
    var checked_box = $(this).find('input[name="area[]"]:checked');
    checked_box.each(function (i) {
        var value = $(this).val();
        var value_str = $('input[name="area_checked"]').val();
        if (value_str != '') {
            $('input[name="area_checked"]').val(value_str + ',' + value);
        } else {
            $('input[name="area_checked"]').val(value);
        }
        $('.checked_info').append('<span class="label label-info" style="margin:2px; padding:1px; display: inline">' + value + '</span>');
    });
});
/**
 * 选择城市确定
 */
$('.selectCity').click(function () {
    $('#service_area_info').html($('.checked_info').html());
    $('input[name="Product[province]"]').val($('#province_id').val());
    $('input[name="Product[city]"]').val($('#city_id').val());
    $('input[name="Product[service_area]"]').val($('input[name="area_checked"]').val());
    $('#modal-city').modal('hide');
});


var Product = {
    /**
     * 获取条件页面
     * @param id
     */
    getModelWhere: function (id) {
        if ($('#modal-where').html() == '') {
            $.get('/manager/product/get-modal-where', {id: id}, function (data) {
                $('#modal-where').html(data);
                $('#modal-where').modal('show');
                $('.modal-where-input').click(function () {
                    if ($(this).prop('checked')) {
                        $(this).parent().parent().children('ul').css('display', 'block');
                        $(this).parent().parent().parent().parent().children('label').children('input').prop('checked', true);
                    } else {
                        $(this).parent().parent().children('ul').find('li').each(function () {
                            $(this).find('input').prop('checked', false);
                        });
                        $(this).parent().parent().find('ul').css('display', 'none');
                    }
                });
            });
        }
    },

    /**
     * 确定条件
     * @returns {boolean}
     */
    modalWhereSubmit: function(){
        $.post('/manager/product/get-submit-modal-where', $('#modal-where-form').serializeArray(),function(data){
            $('.modal-where-str').html(data);
            $('.permitCase').css('display', 'block');
            $('#modal-where').modal('hide');
            console.log(data);
        });
        return false;
    }
};