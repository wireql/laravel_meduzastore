import './bootstrap';

$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#addToCart').click(function() {

        $.ajax({
            url: '/cart/add/' + $(this).data('item_id'),
            type: 'POST',
            success: function(response) {
                
                document.querySelector('body').__x.$data.simpleModal = true

            },
            error: function(xhr) {

                //

            }
        });

    })

    $('#cartForm').submit(function(event) {
        event.preventDefault();

        let data = $(this).serialize();
        let delivery_type, pay_type;

        if($('#delivery-type1').hasClass('active')) {
            delivery_type = 'spb';
        }

        if($('#delivery-type2').hasClass('active')) {
            delivery_type = 'sdek';
        }

        if($('#pay-type1').hasClass('active')) {
            pay_type = 'card';
        }

        if($('#pay-type2').hasClass('active')) {
            pay_type = 'cashless';
        }
        
        console.log(delivery_type + " " + pay_type);

    })

    $('#authForm').submit(function(event) {
        event.preventDefault();

        $.ajax({
            url: '/auth/code',
            data: $(this).serialize(),
            type: 'POST',
            success: function(response) {
                $('#authForm').addClass('hidden');
                $('#authFormNext').removeClass('hidden');
                $('#authFormNext').addClass('flex');

                $('#authFormNextSuccess').html(response.message)

                let timer2 = $("#timeLeft").text();

                let interval = setInterval(function() {
                    let timer = timer2.split(':');
                    let minutes = parseInt(timer[0], 10);
                    let seconds = parseInt(timer[1], 10);
                    --seconds;
                    minutes = (seconds < 0) ? --minutes : minutes;

                    if (minutes < 0) {
                        clearInterval(interval);
                        $('#timeLeft').addClass('hidden');
                    }
                    
                    seconds = (seconds < 0) ? 59 : seconds;
                    seconds = (seconds < 10) ? '0' + seconds : seconds;

                    $('#timeLeft').html(minutes + ':' + seconds);
                    timer2 = minutes + ':' + seconds;
                }, 1000);
            },
            error: function(xhr) {

                $('#authFormError').html(xhr.responseJSON.message)

            }
        });

    });

    $('#authFormNext').submit(function(event) {
        event.preventDefault();

        $.ajax({
            url: '/auth',
            data: $(this).serialize(),
            type: 'POST',
            success: function(response) {
                $('#authFormNextError').html('');
                $('#authFormNextSuccess').html('');

                window.location.replace("/profile");
            },
            error: function(xhr) {

                $('#authFormNextError').html('');
                $('#authFormNextSuccess').html('');

                if(xhr.status == 408) {
                    $('#authForm').removeClass('hidden');
                    $('#authFormNext').removeClass('flex');
                    $('#authFormNext').addClass('hidden');
                    $('#timeLeft').removeClass('hidden');
                    $('#timeLeft').html('01:00');
                    $('#authFormError').html(xhr.responseJSON.message)
                }

                $('#authFormNextError').html(xhr.responseJSON.message)

            }
        });

    });

})