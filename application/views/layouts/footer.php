<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script>

    $('.delete-item').on('click', function() {
        $.ajax({
            url: 'ajaxDeleteItem',
            method: 'post',
            data: {id: $(this).attr('data-id')},
            success: function(res){
                let data = JSON.parse(res);
                var elements = $('div[data-id="'+data.id+'"]');
                elements.remove();
            }
        });
    });

    $('.delete-category').on('click', function() {
        $.ajax({
            url: 'ajaxDeleteCategory',
            method: 'post',
            data: {id: $(this).attr('data-id')},
            success: function(res){
                let data = JSON.parse(res);
                var elements = $('div[data-id="'+data.id+'"]');
                elements.remove();
            }
        });
    });


    $('.change-status-item').on('click', function() {
        $.ajax({
            url: 'ajaxChangeStatusItem',
            method: 'post',
            data: {id: $(this).attr('data-id'), status: $(this).attr('data-status')},
            success: function(res){
                let data = JSON.parse(res);
                let elements = $('div[data-id="'+data.id+'"]');
                let btn = $('button[data-btn="'+data.id+'"]');
                let span = elements.find('span');
                console.log(data);

                if(data.status){
                    elements.addClass('bg-success bg-gradient');
                    elements.removeClass('bg-danger bg-gradient');
                    span.text('Куплено');
                    btn.attr('data-status', "1");
                    btn.text('Позначити як НЕ куплено');
                } else{
                    elements.addClass('bg-danger bg-gradient');
                    elements.removeClass('bg-success bg-gradient');
                    span.text('НЕ куплено');
                    btn.attr('data-status', "0");
                    btn.text('Позначити як куплено');
                }
            }
        });
    });

    // $('.filter').on('click', function() {
    //     $.ajax({
    //         url: '',
    //         method: 'get',
    //         data: {status: $('.status').val(), category: $('.category').val()},
    //         success: function (data){
    //            // let str1 = data.slice(547);
    //            let str1 = data.slice(2550);
    //            let str2 = str1.slice(0, str1.length - 2740);
    //            // let str2 = str1.slice(0, str1.length - 4350);
    //
    //            // console.log(str2);
    //
    //             $('.item-list').html(str2);
    //         },
    //     });
    // });



</script>
</body>
</html>
