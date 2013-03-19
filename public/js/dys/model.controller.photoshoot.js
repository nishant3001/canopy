$(document).ready(function() {
	$('.fancybox').fancybox();
});


 $(".upload-button").live('click', function(){
 	$('#fileToUpload').trigger('click');
 });
 $(".deleter").live('click',function(){
		var $a = $(this);
		if(confirm("Are you sure you want to delete this picture?")){
			$.get('/model/photoshoot/mediadel/id/' + $(this).attr('idf'), function(response) {
				if(response.attempt=='success'){
					var parent_li = $a.closest('li');
               		parent_li.fadeOut('slow', function() {$(this).remove();});
				}
				else{
					alert(response.data); 		// replace with layered dic alert	
				}
			}); 
		}
 });
 
 function startUpload(){
	$("#upload-screen").hide();
	$("#progress-bar").show(); 
	var uploader = document.getElementById("fileToUpload"); 
	for(var i=0, j=uploader.files.length; i<j; i++)	{
		var uploaderForm = new FormData(); 						// Create new FormData
		uploaderForm.append("id",PHOTOSHOOT_ID); 				// append extra parameters if you wish.
		uploaderForm.append("up_file",uploader.files[i]); 		// append the next file for upload
	
		var xhr = new XMLHttpRequest();
		xhr.addEventListener("loadstart", function(e){
			this.progressId = "progress_" + Math.floor((Math.random() * 100000)); 
			$("#progress").html('<div class="back-d"><div id="' + this.progressId + '" class="myCustomProgressBar" > ' + uploader.files[i].name +' </div></div>');
		});
		xhr.addEventListener("progress", function(e){
			var total = e.total;
			var loaded = e.loaded;
			var percent = (100 / total) * loaded; // Calculate percentage of loaded data
			$("#" + this.progressId).animate({"width":690 * (percent / 100)}, 690);
		});

		xhr.addEventListener("load", function(e){
			//$(".notify").fadeOut('slow');
			
			var response = JSON.parse(e.target.responseText);
			if(response.attempt == 'fail'){
				$(".modal-container").hide();
				$("#upload-fail").show();
				return;
			}
			$(".modal-container").hide();
			$("#crop-screen").show();
			$(".crop-target").attr("src", response.data);
			$("#skip-button").attr("idf", response.id);
			$("#media-id").val(response.id);
			
			  $('#crop-target').Jcrop({
				aspectRatio: 0,
				onSelect: updateCoords1
			 });
			
			
			/*
			var response = JSON.parse(e.target.responseText);
			if(response.attempt == 'fail'){
				$("#" + this.progressId).removeClass('myCustomProgressBar').addClass('myCustomError');
				$("#" + this.progressId).append(response.desc);
				return;
			}
			
			
			$(".notify").hide();
			$("#notify-uploaded").show();
			
			$("#" + this.progressId).append('Done');
			$("#photo-grid").prepend('<li class="span3">'
						+ '<div class="thumbnail border-radius-top">'
						+ '	<div class="bg-thumbnail-img">'
						+ '		<img class="border-radius-top" id="img-url' + response.id + '" src="' + response.data + '">'
						+ '	</div>'
						+ '	<h5><a href="detail.html">Mark cover image </a></h5>'
						+ '</div>'
						+ '<div class="box border-radius-bottom">'
						+ '	<p>'
						+ '		<span class="title_torrent pull-left"><a href="javascript://" idf="' + response.id + '" class="deleter"><i class="icon-remove icon-white"></i></a></span>'
						+ '		<a  data-toggle="modal" class="common-popover" href="#common-popover" idf-url="/widget/crop/close_modal/yes/call/refreshImage/entity/photoshoot_media/id/' + response.id + '/source/' + response.encodedMediaUrl + '"  idf="' + response.id + '" title="Crop"><i class="icon-edit icon-white"></i></a>'
						+ '		<span class="number-view pull-right"><i class="icon-white icon-eye-open"></i>0</span>'
						+ '	</p>'
						+ '</div>'
						+ '</li>'
			);
			*/
		});


		xhr.open("POST","/model/photoshoot/upload");
		xhr.send(uploaderForm);
	}
 }
$(".mark-img").live('click',function(){
	 var value=$(this).attr("idf");
	 $.ajax({
		 url: '/model/photoshoot/coverimage/id/' + PHOTOSHOOT_ID + '/idf/'+value,
		 type:"GET",
		 sucess: function(){
		 }
	});
	$(".mark-img").text(' Mark Cover image');
	$(this).text('Cover image');
});

function refreshImage(param){
	d=new Date();
	if(typeof(param) != "undefined"){
		if(typeof(param.image_url) != "undefined"){
			$('#img-url' + param.id).attr( 'src', param.image_url + '?' + d.getTime());
			return;
		}
	}
}

function updateCoords1(c){
	$('#x1').val(c.x);
	$('#y1').val(c.y);
	$('#w1').val(c.w);
	$('#h1').val(c.h);
};


$("#skip-button").live('click', function(){
	loadPhotoshootLibrary($(this).attr('idf'));
	$("#uploader").modal('hide');
});
$("#upload-fail-button").live('click', function(){
	setScreenMode('upload-screen');
});

$(".btn-upload").live('click', function(){
	setScreenMode('upload-screen');
});

function setScreenMode(scr){
	$(".modal-container"). hide();
	$("#" + scr). show();
}

$("#crop-button1").live('click',function(){
	if (parseInt($('#w1').val())) {
		$.ajax({ 
		   type: "POST", 
		   url: "/model/photoshoot/crop/", 
		   data: jQuery("#crop-form1").serialize() ,
		   success: function(json, status){
			loadPhotoshootLibrary();
			$("#uploader").modal('hide');
		   }, 
		   error:function(jqXHR, textStatus, errorThrown){ 
				alert(textStatus);
		   }
		});
		return;
	}
	alert('Please select a crop region then press submit.');
	return false;
	});

