
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
   //submit button default disabled
   $("#comment-submit").click(function(e){

    $(this).siblings(".status").text("Sending comment to..."+$("#comment-submit").attr('data-url'));
     
     //ajax goes here
     $.ajax({
      url:$("#comment-submit").attr('data-url'),
        type:'POST',
        data: {text: $('textarea[name="text"]').val()},
        // dataType:'json',
        success: function(data){
           $(this).siblings(".status").text(data.message)
        }
     }).always(function(){
      location.reload()
     });
   })
    function ajax_like(status){
      alert(url)
        $.ajax({
            url:url,
          
            data:{status:status},
            success:function(data){
                alert(data.msg)
            }
        });
    }
    function ajax_dislike(status){
      alert(url)
        $.ajax({
            url:url,
          ,
            success:function(data){
                alert(data.msg)
            }
        });
    }


       //like functionality
    //update status asynchronouisly

    $('a.status').click(function(e){
        var url = $(this).attr('data-url');
        var num=parseInt($(this)).siblings(".number_likes")
        switch($("#status").text().trim()){
            case 'Like':
                $(this).text('Unike');
                num++;
                $(this).siblings(".number_likes").text(num);
                ajax_like(1)
                
                break;
            case'Unlike':
                $(this).text('Like');
                new_url=url.replace('like','dislike');
                num--;
                 $(this).siblings(".number_likes").text(num);
                ajax_dislike(new_url);
                break;
        }

    })
})