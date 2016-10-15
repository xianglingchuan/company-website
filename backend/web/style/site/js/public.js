var ApplyLoan = {
    apply: function (product_id) {
        var name = $("#_applyloanform-name").val();
        var phone = $("#_applyloanform-phone").val();
        var loan_amount =  $("#_applyloanform-loan_amount").val();
        var work_status = $("#_work_status").val();
        /*var checkName = /^[\u4e00-\u9fa5]{2,5}$/;
        var checkPhone = /^1(3[0-9]|5[012356789]|8[012356789]|7[0678])\d{8}$/;
        var checkLoanAmount = /^[0-9]{1,4}$/;
        //检验姓名
        if (!checkName.test(name)) {
            alert('姓名不正确');
            return false;
        }
        //检验手机号
        if (!checkPhone.test(phone)) {
            alert('手机号不正确');
            return false;
        }  
        //贷款金额
        if(!checkLoanAmount.test(loan_amount)){
            alert("输入贷款金额不正确");
            return false;
        }*/    
        $.get('/site/product/apply-loan', {product_id: product_id, "name":name, "phone":phone, "loan_amount":loan_amount, "work_status":work_status}, function (rs) {
            $("#applyLoanModal").remove();
            $('body').append(rs);
            $('#applyLoanModal').modal('show');
        });
    },
    applyLoan: function (product_id) {
        var param = {};
        var checkName = /^[\u4e00-\u9fa5]{2,5}$/;
        var checkPhone = /^1(3[0-9]|5[012356789]|8[012356789]|7[0678])\d{8}$/;
        //检验姓名
        param.name = $('#applyloanform-name').val();
        if (!checkName.test(param.name)) {
            alert('姓名不正确');
            return false;
        }
        //检验手机号
        param.phone = $('#applyloanform-phone').val();
        if (!checkPhone.test(param.phone)) {
            alert('手机号不正确');
            return false;
        }
        var checkLoanAmount = /^[0-9]{1,4}$/;
        var checkLoanLimit = /^[0-9]{1,2}$/;
        //检验贷款金额
        param.loan_amount = $('#applyloanform-loan_amount').val();
        if (!checkLoanAmount.test(param.loan_amount)) {
            alert('输入贷款金额不正确');
            return false;
        }
        //检验贷款期限
        param.loan_limit = $('#applyloanform-loan_limit').val();
        if (!checkLoanLimit.test(param.loan_limit)) {
            alert('输入贷款期限不正确');
            return false;
        }
        //检验手机验证码
        param.sms_code = $('#applyloanform-sms_code').val();
        if (param.sms_code == '') {
            alert('手机验证码不能为空');
            return false;
        }
        if (!this.validateSmsCode(param.phone, param.sms_code)) {
            alert('手机验证码不正确');
            return false;
        }
        param._csrf = $('input[name="_csrf"]').val();
        param.product_id = product_id;
        $.post('/site/product/save-apply-loan', param, function ($rs) {
            $rs = $.parseJSON($rs);
            alert($rs.msg);
            if ($rs.ret == 1) {
                window.location.reload();
            }

        });
        return false;
    },
    getSmsCode: function () {
        //检验手机
        var checkPhone = /^1(3[0-9]|5[012356789]|8[012356789]|7[0678])\d{8}$/;
        var phone = $('#applyloanform-phone').val();
        if (phone == '') {
            alert('请填写手机号码！');
            return false;
        }
        if (!checkPhone.test(phone)) {
            alert('手机号码不正确！');
            return false;
        }

        $.get('/site/common/send-sms-code', {phone: phone}, function (rs) {
            rs = $.parseJSON(rs);
            if (rs.ret == 1) {
                var time = 60;
                var timeInterval = setInterval(function () {
                    if (time == 0) {
                        $('#getSmsCodeButton').text('获取短信验证码');
                        $('#getSmsCodeButton').css('background-color', '#ff7916');
                        $('#getSmsCodeButton').attr('disabled', false);
                        clearInterval(timeInterval);
                        return false;
                    }
                    $('#getSmsCodeButton').attr('disabled', true);
                    $('#getSmsCodeButton').css('background-color', '#ccc');
                    $('#getSmsCodeButton').text(time + '秒后重新发送');
                    time = time - 1;
                }, 1000);
            } else {
                alert('短信验证码发送失败！');
            }
        });
    },

    /**
     * 检验手机验证码
     * @param phone
     * @param code
     * @returns {boolean}
     */
    validateSmsCode: function (phone, code) {
        var is_check = false;
        $.ajax({
            type: 'get',
            url: '/site/common/validate-sms-code',
            data: {phone: phone, code: code},
            async: false,
            success: function (response) {
                if (response.ret == 1) {
                    is_check = true;
                }
            },
            dataType: 'json'
        });
        return is_check;
    }
};

var Question = {
    add: function (product_id, manager_user_id) {
        $.get('/site/product/question-modal', {product_id: product_id, manager_user_id: manager_user_id}, function (rs) {
            $("#questionModal").remove();
            $('body').append(rs);
            $('#questionModal').modal('show');
        });
    },
    
    search:function(){
       var keyword = $("#keyword").val();
       if(keyword!=""){
            location.href='/site/question/index?keyword='+keyword;           
       }
    }
}