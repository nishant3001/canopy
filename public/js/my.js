	 $("#sub").hide();
	 $("#sub1").hide();
	 $("#sub2").hide();
	 $("#sub3").hide();
	 $("#sub4").hide();
	 
	 
	 

				 //$("#basic").removeClass("active");
	$("#about11").hover(function() {
		 
								 $("#sub").show();
								 $("#sub1").hide();
								 $("#sub2").hide();
								 $("#sub3").hide();
								 $("#sub4").hide();
								 })
								
								 

								 
								 
	
								  
	 $("#offer").hover(function(){
								 $("#sub1").show();
								 	 $("#sub").hide();
									 $("#sub2").hide();
									 $("#sub3").hide();
									 $("#sub4").hide();
								 })
								 
    $("#industry").hover(function(){
								 $("#sub2").show();
								 	 $("#sub").hide();
									 $("#sub1").hide();
									 $("#sub3").hide();
									 $("#sub4").hide();
								 })

   $("#career").hover (function(){
								 $("#sub3").show();
								 	 $("#sub").hide();
									 $("#sub1").hide();
									 $("#sub2").hide();
									 $("#sub4").hide();

								 })

    $("#contact").hover(function(){
								 $("#sub4").show();
								 	 $("#sub").hide();
									 $("#sub1").hide();
									 $("#sub2").hide();
									 $("#sub3").hide();
								 })
								 
								 
								
								 
								 
								 
								 
							 
    $('.carousel').carousel({
    interval: 5000,
	 //auto: 4000,
     fade: 400,

    })
	
	
	
	
	
	$(document).ready(function() {
		var url_path = 'http://canopy.gsquire.com';
		
		
		
		//alert(window.location);
		
    // to show it in an alert window
   // alert(window.location);

    // to store it in a variable
    var loc = window.location;
	
	if ( loc ==url_path + '/')
	{
	  $("#home1").addClass("ccdrop");
	   $(".sub-nav").mouseleave(function (event) {
								 	 $("#sub").hide();
									 $("#sub1").hide();
									 $("#sub2").hide();
									 $("#sub3").hide();
									 $("#sub4").hide();

																 })	
	
	}
	
	if ( loc == url_path + '/about/overview' )
	{       
		    $("#sub").show();
			 $("#a1").addClass("ccdrop");
	        $("#a").addClass("ccdrop");	
			
	}
	if ( loc == url_path +"/about/differentiators" )
	{       
		    $("#sub").show();
			 $("#a2").addClass("ccdrop");
	        $("#a").addClass("ccdrop");	
			
	}
	if ( loc == url_path +"/about/core" )
	{       
		    $("#sub").show();
			 $("#a3").addClass("ccdrop");
	        $("#a").addClass("ccdrop");	
			
	}
	if ( loc == url_path + "/about/alliances" )
	{       
		    $("#sub").show();
			 $("#a4").addClass("ccdrop");
	        $("#a").addClass("ccdrop");	
			
			 $("#offer").click(function(){
		                         
								 $("#sub").toggle();
								 	 $("#sub1").hide();
									 $("#sub2").hide();
									 $("#sub3").hide();
									 $("#sub4").hide();
								 })
	}
	if ( loc == url_path + "/about/social" )
	{       
		    $("#sub").show();
			 $("#a5").addClass("ccdrop");
	        $("#a").addClass("ccdrop");	
			
			 $("#offer").click(function(){
		                         
								 $("#sub").toggle();
								 	 $("#sub").hide();
									 $("#sub2").hide();
									 $("#sub3").hide();
									 $("#sub4").hide();
								 })
	}
	if ( loc == url_path +"/about/news" )
	{       
		    $("#sub").show();
			 $("#a6").addClass("ccdrop");
	        $("#a").addClass("ccdrop");	
			
			 $("#offer").click(function(){
		                         
								 $("#sub").toggle();
								 	 $("#sub").hide();
									 $("#sub2").hide();
									 $("#sub3").hide();
									 $("#sub4").hide();
								 })
	}
	if ( loc == url_path +"/services/integration" )
	{       
		    $("#sub1").show( );
			 $("#b1").addClass("ccdrop");
	        $("#b").addClass("ccdrop");	
			
			 $("#offer").click(function(){
		                         
								 $("#sub").hide();
								 	 $("#sub1").toggle();
									 $("#sub2").hide();
									 $("#sub3").hide();
									 $("#sub4").hide();
								 })
	}
	if ( loc == url_path +"/services/application" )
	{       
		    $("#sub1").show( );
			 $("#b2").addClass("ccdrop");
	        $("#b").addClass("ccdrop");	
			
	}
	if ( loc == url_path +"/services/dw" )
	{       
		    $("#sub1").show( );
			 $("#b3").addClass("ccdrop");
	        $("#b").addClass("ccdrop");	
			
	}
	if ( loc == url_path + "/services/consulting" )
	{       
		    $("#sub1").show( );
			 $("#b4").addClass("ccdrop");
	        $("#b").addClass("ccdrop");	
			

	}
	if ( loc == url_path + "/services/professional" )
	{       
		    $("#sub1").show( );
			 $("#b5").addClass("ccdrop");
	        $("#b").addClass("ccdrop");	
			
		                         
	}
	if ( loc == url_path + "/services/staff" )
	{       
		    $("#sub1").show( );
			 $("#b6").addClass("ccdrop");
	        $("#b").addClass("ccdrop");	
			
	}
	if ( loc == url_path + "/solution/health" )
	{       
		    $("#sub2").show( );
			 $("#c1").addClass("ccdrop");
	        $("#c").addClass("ccdrop");	
			
	}
	if ( loc == url_path + "/solution/finance" )
	{       
		    $("#sub2").show( );
			 $("#c2").addClass("ccdrop");
	        $("#c").addClass("ccdrop");	
			
	}
	if ( loc == url_path + "/solution/telecom" )
	{       
		    $("#sub2").show( );
			 $("#c3").addClass("ccdrop");
	        $("#c").addClass("ccdrop");	
			
	}
	if ( loc == url_path + "/solution/logistics" )
	{       
		    $("#sub2").show( );
			 $("#c4").addClass("ccdrop");
	        $("#c").addClass("ccdrop");	
			
	}
	if ( loc == url_path + "/solution/energy" )
	{       
		    $("#sub2").show( );
			 $("#c5").addClass("ccdrop");
	        $("#c").addClass("ccdrop");	
			
	}
	if ( loc == url_path + "/solution/manufacturing" )
	{       
		    $("#sub2").show( );
			 $("#c6").addClass("ccdrop");
	        $("#c").addClass("ccdrop");	
			
	}
	if ( loc == url_path + "/careers/culture" )
	{       
		    $("#sub3").show( );
			 $("#d1").addClass("ccdrop");
	        $("#d").addClass("ccdrop");	
			
	}
	if ( loc == url_path + "/careers/current" )
	{       
		    $("#sub3").show( );
			 $("#d2").addClass("ccdrop");
	        $("#d").addClass("ccdrop");	
			
	}
	if ( loc == url_path + "/careers/applicants" )
	{       
		    $("#sub3").show( );
			 $("#d3").addClass("ccdrop");
	        $("#d").addClass("ccdrop");	
			
	}
	if ( loc == url_path + "/contact/vendor" )
	{       
		    $("#sub4").show( );
			 $("#e1").addClass("ccdrop");
	        $("#e").addClass("ccdrop");	
			
	}
	if ( loc == url_path + "/contact/locations" )
	{       
		    $("#sub4").show( );
			 $("#e2").addClass("ccdrop");
	        $("#e").addClass("ccdrop");	
			
	}
	
	
	
	
	
	
	
});
// JavaScript Document