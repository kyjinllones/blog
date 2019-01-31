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

   //asynchronous like
  

  function ajax_like(status, url, elmObj){
 
       $.ajax({
          url: url,
          success: function(data){
            elmObj.delay(500).text(data.msg)
            elmObj.text('Unlike')
          }
       });
    }
   //asynchronous unlike
   
   
   //like functionality 
   //update status asynchronously

   

   function ajax_unlike(url, elmObj){
     $.ajax({
       url:url,
       success:function(data){
        elmObj.delay(500).text(data.msg)
        elmObj.text('Like')
       }
     })
   }
   $('a.status').click(function(e){
         var url=$(this).attr('data-url');
         var num = parseInt($(this).siblings(".number-likes").text());
         var elmObj = $(this).siblings(".number-likes")
         switch($(this).text().trim()){
            case 'Like':
              num++;
              elmObj.text(num);
              ajax_like(1,url,$(this));
              break;
            case 'Unlike':
              num--;
              url=url.replace('like','dislike')
              elmObj.text(num);
              ajax_unlike(url, $(this)); 
              break;

        }
     })
})