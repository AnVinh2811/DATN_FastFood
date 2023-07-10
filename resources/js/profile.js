$('change_password_form').validate({
    ignore:'.ignore',
    errorClass:'invalid',
    validClass:'success',
    rules:{
        old_password:{
            required:true,
            minlength:8,
            maxlength:32
        },
        new_password:{
            required:true,
            minlength:8,
            maxlength:32
        },
        confirm_password:{
            required:true,
            equalTo:'#password'
        },
    },
    messages:{
        old_password:{
            required:'Vui lòng nhập mật khẩu hiện tại của bạn.',
        },
        new_password:{
            required:'Vui lòng nhập mật khẩu của bạn.',
        },
        confirm_password:{
            required:'Vui lòng nhập lại mật khẩu của bạn.',
        },
    },
    submitHandel:function(form){
        $.LoadOverlay("show");
        form.submit();
    }
});