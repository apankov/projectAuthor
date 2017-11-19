$(function(){
    
   $('.add_comment').bind('click',function(){
      
      $(this).closest('.comment_box').find('.comment_container').show();
      $(this).hide();
    
    });
   
    $('.comment-form #sendBtn').on('click',function(){


      var objCont=$(this).closest('.comment_container');
      var objText=$(this).closest('.comment-form').find('textarea');
      var  id=$(this).closest('.comment-form').find('input[name=id]').val(); 
      var  text=$(this).closest('.comment-form').find('textarea').val(); 
          console.log(id);
       console.log(text);
       
       	$.ajax({
		url: '/projectauthor/ajax.php',
		type: 'post',
		data: 'id='+id+'&text='+text,
		dataType: 'html',
		success: function(html) {
		  objCont.find('.media_box').append(html);
         // objCont.hide();
          //objCont.next().show();
          objText.val('');
		  	   console.log(html);
            
		}
        
	});
       
       
    });
 
    
});