(function($, undefined) {
    $(function() {
        $('#enter').click(function(event) {
            var login = $("#login").val();
            var password = $("#password").val();
            $.post('php/registration.php',
                    {'login': login, 'password': password
                    });

            event.stopImmediatePropagation();
            return false;
        });
    });
})(jQuery);