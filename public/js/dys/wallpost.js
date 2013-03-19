$(".reply-thread").live('click', function(){
	$(this).closest('div .text-message').siblings('.box-add-comment').show();
})

$(".reply-poster").live('click', function(){
	var identifier = $(this).attr('idf');
	var me = this;
	$.ajax({ 
	   type: "POST", 
	   url: "/model/common/postcomments", 
	   data: $(this).closest('form').serialize() ,
	   success: function(json, status){
		   if(json.attempt=='success'){
				var html = ' <li style="border-bottom: 0px; box-shadow: 0 0px"> ' +
                  '<a href="#" class="avatar-comment span1">' +
					'<img src="' + json.data.thumb_image + '">' +
				  '</a>' +
					'<div class="message-wrapper span6">' +
						'<div class="text-message">' +
							'<a href="#">' +
							json.data.name +
							'</a>' +
							'<span class="comment-data">' +
								json.data.created +
							'</span>' +
							'<span>' +
								'<p>' + json.data.message + '</p>'+
							'</span>'+
						'</div>'+
					'</div>'+
					'</li>';

					$('<li style="border-bottom: 0px; box-shadow: 0 0px"/>').appendTo('#u' + identifier).html(html);
					$(me).closest('div .box-add-comment').hide();
		   }
		   else{
		   
		   }
	   }, 
	   error:function(jqXHR, textStatus, errorThrown){ 
			alert(textStatus);
	   }
	});

});



$(".wall-poster").live('click',function(){
	var me = this;
	$.ajax({ 
	   type: "POST", 
	   url: "/model/common/postcomments", 
	   data: $(this).closest('form').serialize() ,
	   success: function(json, status){
		   if(json.attempt=='success'){
				addPost(me, json);
				$("#message-input").val('');
		   }
		   else{
		   
		   }
	   }, 
	   error:function(jqXHR, textStatus, errorThrown){ 
			alert(textStatus);
	   }
	});

});

function addPost(me, response){
     var html = '<a href="#" class="avatar-comment span1">'+
                '        <img src="' + response.data.thumb_image + '">'+
                '    </a>'+
                '    <div class="message-wrapper span8">'+
                '        <div class="text-message">'+
                '            <a href="#">'+ response.data.name + ' </a>'+
                '            <span class="comment-data">'+ response.data.created +
                '            </span>'+
                '            <span>'+
                '                <p style="min-height:60px; margin-bottom:10px;">' + response.data.message +
                '                    <br/><small><a href="javascript://" class="reply-thread">Reply</a></small>'+
                '                </p>'+
                '            </span>'+
                '        </div>'+
                '        <div class="box-add-comment" style="display:none;">'+
                '            <div>'+
                '                <div href="#" class="avatar-comment span1">'+
                '                    <img src="<?php echo $this->user->getThumbImage();?>">'+
                '                </div>'+
                '                <div class="message-wrapper span7">'+
                '                    <form class="form-comment">'+
                '                    	<input type="hidden" name="wall_user_id" value="<?php echo @$this->model->id;?>" />'+
                '                    	<input type="hidden" name="parent_thread_id" value="' + response.data.id + '" />'+
                '                        <textarea name="comment" class="span7"> </textarea>'+
                '                        <button idf="' + response.data.id + '" type="button" class="btn btn-primary pull-right reply-poster">Post</button>'+
                '                    </form>'+
                '                </div>'+
                '            </div>'+
                '        </div>'+
                '        <ul class="box-message-content" id="u' + response.data.id + '">'+
                '        </ul>'+
                '    </div>';
	
	
	$('<li/>').appendTo('#wall-post-item').html(html);
}