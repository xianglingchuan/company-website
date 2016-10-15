var Index = {
    changeLoanType: function (type_id) {
        if (type_id == 1) {
            var str = '<option value="">贷款用途</option><option value="2">购车贷</option>'
                + '<option value="3">购房贷</option><option value="4">担保贷</option><option value="5">装修贷</option>'
                + '<option value="6">旅游贷</option>';
        }
        if (type_id == 2) {
            var str = '<option value="">贷款用途</option><option value="1">企业贷</option><option value="2">购车贷</option>'
                + '<option value="3">购房贷</option>';
        }
        $('select[name="product_type"]').html(str);
    }
}