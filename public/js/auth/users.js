$(() => {

   $(document).on('click','#submit-login', function () {
       Users.handleLoading(Users.handleSubmitLogin,'#submit-login');
   });

   $(document).on('focus','#form-login input', function () {
       Users.handleFocusInput(this);
   });

});

const Users = (() => {

    const handleLoading = (callback, element) => {
        if(typeof callback === "function" ) {
            $(element).html($('script[data-template="loading"]')
                .text())
                .addClass('disabled');
            setTimeout(callback, 1500);
        }
    }

    const handleSubmitLogin = () => {
        $('#form-login').submit();
    }

    const handleFocusInput = (selectors) => {
        $(selectors).removeClass('is-invalid');
    }

    return {
        handleLoading,
        handleSubmitLogin,
        handleFocusInput
    }

})();
