(function($, undefined) {
    $(function() {
        function auth(sendToPath) {
            function sendLoginPass(sendTo) {
                var login = $("#login").val();
                var password = $("#password").val();
                $.post(sendTo, {'login': login, 'password': password});
            }

            $('#enter').click(function(event) {
                sendLoginPass(sendToPath);

                event.stopImmediatePropagation();
                return false;
            });

            $("#login, #password").bind('keypress', function(e) {
                if (e.keyCode === 13) {
                    sendLoginPass(sendToPath);
                }
            });
            
        }
        
        var pagePath = location.pathname;
        pagePath = pagePath.substr(pagePath.lastIndexOf("/") + 1);
        if (pagePath === "login.php") {
            auth('php/testreg.php');
        }
        if (pagePath === "registration.php") {
            auth('php/registration.php');
        }
    });
})(jQuery);