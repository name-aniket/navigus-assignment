$(document).ready(function () {

    $(document).ready(function () {
        $('form').on('submit', function (event) {
            event.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'http://localhost/navigus-assignment/api/Login/check_login.php',
                data: new FormData(this),
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    data = JSON.parse(data);
                    
                    if (data.status == 200) {
                        window.location="home.php";
                    }else {
                        alert(data.message);
                    }
                }
            });
        });
    });

    
});