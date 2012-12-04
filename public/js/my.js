	 $("#sub").hide();
	 $("#sub1").hide();
	 $("#sub2").hide();
	 $("#sub3").hide();
	 $("#sub4").hide();

				 //$("#basic").removeClass("active");
	 $("#about11").click(function(){
								 $("#about11").addClass("ccdrop");
								 $("ul.nish > li:gt(0)").removeClass("active");
								 $("#sub").toggle();
								 $("#sub1").hide();
								 $("#sub2").hide();
								 $("#sub3").hide();
								 $("#sub4").hide();
								 })
								 
								  
	 $("#offer").click(function(){
		                         $("ul.nish > li:lt(1)").removeClass("cc");
								 $("#offer").addClass("ccdrop");
								 $("ul.nish > li:gt(1)").removeClass("cc");
								 $("#sub1").toggle();
								 	 $("#sub").hide();
									 $("#sub2").hide();
									 $("#sub3").hide();
									 $("#sub4").hide();
								 })
								 
    $("#industry").click(function(){
		                         $("ul.nish > li:lt(2)").removeClass("active");
								 $("#industry").addClass("active");
								 $("ul.nish > li:gt(2)").removeClass("active");
								 $("#sub2").toggle();
								 	 $("#sub").hide();
									 $("#sub1").hide();
									 $("#sub3").hide();
									 $("#sub4").hide();
								 })

   $("#career").click (function(){
		                         $("ul.nish > li:lt(3)").removeClass("active");
								 $("#career").addClass("active");
								 $("ul.nish > li:gt(3)").removeClass("active");
								 $("#sub3").toggle();
								 	 $("#sub").hide();
									 $("#sub1").hide();
									 $("#sub2").hide();
									 $("#sub4").hide();

								 })

    $("#contact").click(function(){
		                         $("ul.nish > li:lt(4)").removeClass("active");
								 $("#contact").addClass("active");
								 $("ul.nish > li:gt(4)").removeClass("active");
								 $("#sub4").toggle();
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
    // to show it in an alert window
   // alert(window.location);

    // to store it in a variable
    var loc = window.location;
	
	if ( loc == "http://canopy.localhost/")
	{
	  $("#home1").addClass("ccdrop");	
	
	}
	
	if ( loc == "http://canopy.localhost/about/overview" )
	{       
		    $("#sub").show();
			 $("#a1").addClass("ccdrop");
	        $("#a").addClass("ccdrop");	
			
	}
	if ( loc == "http://canopy.localhost/about/differentiators" )
	{       
		    $("#sub").show();
			 $("#a2").addClass("ccdrop");
	        $("#a").addClass("ccdrop");	
			
	}
	if ( loc == "http://canopy.localhost/about/core" )
	{       
		    $("#sub").show();
			 $("#a3").addClass("ccdrop");
	        $("#a").addClass("ccdrop");	
			
	}
	if ( loc == "http://canopy.localhost/about/alliances" )
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
	if ( loc == "http://canopy.localhost/about/social" )
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
	if ( loc == "http://canopy.localhost/about/news" )
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
	if ( loc == "http://canopy.localhost/services/integration" )
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
	if ( loc == "http://canopy.localhost/services/application" )
	{       
		    $("#sub1").show( );
			 $("#b2").addClass("ccdrop");
	        $("#b").addClass("ccdrop");	
			
	}
	if ( loc == "http://canopy.localhost/services/dw" )
	{       
		    $("#sub1").show( );
			 $("#b3").addClass("ccdrop");
	        $("#b").addClass("ccdrop");	
			
	}
	if ( loc == "http://canopy.localhost/services/consulting" )
	{       
		    $("#sub1").show( );
			 $("#b4").addClass("ccdrop");
	        $("#b").addClass("ccdrop");	
			

	}
	if ( loc == "http://canopy.localhost/services/professional" )
	{       
		    $("#sub1").show( );
			 $("#b5").addClass("ccdrop");
	        $("#b").addClass("ccdrop");	
			
		                         
	}
	if ( loc == "http://canopy.localhost/services/staff" )
	{       
		    $("#sub1").show( );
			 $("#b6").addClass("ccdrop");
	        $("#b").addClass("ccdrop");	
			
	}
	if ( loc == "http://canopy.localhost/solution/health" )
	{       
		    $("#sub2").show( );
			 $("#c1").addClass("ccdrop");
	        $("#c").addClass("ccdrop");	
			
	}
	if ( loc == "http://canopy.localhost/solution/finance" )
	{       
		    $("#sub2").show( );
			 $("#c2").addClass("ccdrop");
	        $("#c").addClass("ccdrop");	
			
	}
	if ( loc == "http://canopy.localhost/solution/telecom" )
	{       
		    $("#sub2").show( );
			 $("#c3").addClass("ccdrop");
	        $("#c").addClass("ccdrop");	
			
	}
	if ( loc == "http://canopy.localhost/solution/logistics" )
	{       
		    $("#sub2").show( );
			 $("#c4").addClass("ccdrop");
	        $("#c").addClass("ccdrop");	
			
	}
	if ( loc == "http://canopy.localhost/solution/energy" )
	{       
		    $("#sub2").show( );
			 $("#c5").addClass("ccdrop");
	        $("#c").addClass("ccdrop");	
			
	}
	if ( loc == "http://canopy.localhost/solution/manufacturing" )
	{       
		    $("#sub2").show( );
			 $("#c6").addClass("ccdrop");
	        $("#c").addClass("ccdrop");	
			
	}
	if ( loc == "http://canopy.localhost/careers/culture" )
	{       
		    $("#sub3").show( );
			 $("#d1").addClass("ccdrop");
	        $("#d").addClass("ccdrop");	
			
	}
	if ( loc == "http://canopy.localhost/careers/current" )
	{       
		    $("#sub3").show( );
			 $("#d2").addClass("ccdrop");
	        $("#d").addClass("ccdrop");	
			
	}
	if ( loc == "http://canopy.localhost/careers/applicants" )
	{       
		    $("#sub3").show( );
			 $("#d3").addClass("ccdrop");
	        $("#d").addClass("ccdrop");	
			
	}
	if ( loc == "http://canopy.localhost/contact/vendor" )
	{       
		    $("#sub4").show( );
			 $("#e1").addClass("ccdrop");
	        $("#e").addClass("ccdrop");	
			
	}
	if ( loc == "http://canopy.localhost/contact/locations" )
	{       
		    $("#sub4").show( );
			 $("#e2").addClass("ccdrop");
	        $("#e").addClass("ccdrop");	
			
	}
	
	
	
	
	
	
	
});
// JavaScript Document