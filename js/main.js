$(document).ready(function() {
    $("a[href*='#']").mPageScroll2id();

    $("form#feedback").submit(function() {
        $('.form-success').html('');
        $('.form-error').html('');
        var th = $(this);
        var error = false;

        if ($('form#feedback input[name="phone"]').val().length < 5) {
            error = 'Телефон введен не верно!';
        } else if (validate($('form#feedback input[name="email"]').val()) === false) {
            error = 'Почта введена не верно!';
        }

        console.log(error);

        if (error != false) {
            $('.form-error').html(error);
            return false;
        }

		$.ajax({
			type: "POST",
			url: "mail.php",
			data: th.serialize()
		}).done(function(d) {
			if (d === 'ok') {
                $('.form-success').html('Заявка успешно отправлена!');
                setTimeout(function() {
                    th.trigger("reset");
                }, 1000);
            } else {
                $('.form-error').html('При отправке произошла ошибка. Повторите позже!');
            }
		});
		return false;
	});
});

function validate(address) {
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if(reg.test(address) == false) {
       return false;
    }
    return true;
 }