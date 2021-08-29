$(function(){
    var like = $('.like-toggle');
    var likeCampId;

    like.on('click', function () {
        var $this = $(this);
        likeCampId = $this.data('camp_id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/like',
            type: 'POST', 
            data: {
                'camp_id': likeCampId
            },
        })

    // Ajaxリクエストが成功した場合
    .done(function (data) {
        $this.toggleClass('liked'); 
        $this.next('.likes-counter').html(data.camp_likes_count); 
        })
        // Ajaxリクエストが失敗した場合
        .fail(function (data, xhr, err) {
            console.log('エラー');
            console.log(err);
            console.log(xhr);
        });
            
        return false;
        });
    })