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
	
	function setTime1(){

				 setTimeout($("#sub1").hide(),300)

				 setTimeout(function(){$("#sub2").hide()},300)

		 setTimeout(function(){$("#sub3").hide()},300)
		 setTimeout(function(){$("#sub4").hide()},300)
		}
		function setTime2(){
				 setTimeout(function(){$("#sub").hide()},300)


				 setTimeout(function(){$("#sub2").hide()},300)

		 setTimeout(function(){$("#sub3").hide()},300)
		 setTimeout(function(){$("#sub4").hide()},300)
		}
	function setTime3(){
				 setTimeout(function(){$("#sub").hide()},300)

				 setTimeout(function(){$("#sub1").hide()},300)


		 setTimeout(function(){$("#sub3").hide()},300)
		 setTimeout(function(){$("#sub4").hide()},300)
		}
	function setTime4(){
				 setTimeout(function(){$("#sub").hide()},300)

				 setTimeout(function(){$("#sub1").hide()},300)

				 setTimeout(function(){$("#sub2").hide()},300)

		 setTimeout(function(){$("#sub4").hide()},300)
		}
	function setTime5(){
				 setTimeout(function(){$("#sub").hide()},300)

				 setTimeout(function(){$("#sub1").hide()},300)

				 setTimeout(function(){$("#sub2").hide()},300)

		 setTimeout(function(){$("#sub3").hide()},300)
		}

	
	
	
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
			setTime1()
			
	}
	if ( loc == url_path +"/about/differentiators" )
	{       
		    $("#sub").show();
			 $("#a2").addClass("ccdrop");
	        $("#a").addClass("ccdrop");	
						setTime1()

			
	}
	if ( loc == url_path +"/about/core" )
	{       
		    $("#sub").show();
			 $("#a3").addClass("ccdrop");
	        $("#a").addClass("ccdrop");	
						setTime1()

			
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
								 			setTime1()

	}
	if ( loc == url_path + "/about/social" )
	{       
				setTime1()

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
				setTime1()

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
				setTime2()

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
					setTime2()

		    $("#sub1").show( );
			 $("#b2").addClass("ccdrop");
	        $("#b").addClass("ccdrop");	
			
	}
	if ( loc == url_path +"/services/dw" )
	{       
					setTime2()

		    $("#sub1").show( );
			 $("#b3").addClass("ccdrop");
	        $("#b").addClass("ccdrop");	
			
	}
	if ( loc == url_path + "/services/consulting" )
	{       
					setTime2()

		    $("#sub1").show( );
			 $("#b4").addClass("ccdrop");
	        $("#b").addClass("ccdrop");	
			

	}
	if ( loc == url_path + "/services/professional" )
	{       
					setTime2()

		    $("#sub1").show( );
			 $("#b5").addClass("ccdrop");
	        $("#b").addClass("ccdrop");	
			
		                         
	}
	if ( loc == url_path + "/services/staff" )
	{       
					setTime2()

		    $("#sub1").show( );
			 $("#b6").addClass("ccdrop");
	        $("#b").addClass("ccdrop");	
			
	}
	if ( loc == url_path + "/solution/health" )
	{       
					setTime3()

		    $("#sub2").show( );
			 $("#c1").addClass("ccdrop");
	        $("#c").addClass("ccdrop");	
			
	}
	if ( loc == url_path + "/solution/finance" )
	{       
						setTime3()

		    $("#sub2").show( );
			 $("#c2").addClass("ccdrop");
	        $("#c").addClass("ccdrop");	
			
	}
	if ( loc == url_path + "/solution/telecom" )
	{       
						setTime3()

		    $("#sub2").show( );
			 $("#c3").addClass("ccdrop");
	        $("#c").addClass("ccdrop");	
			
	}
	if ( loc == url_path + "/solution/logistics" )
	{       
						setTime3()

		    $("#sub2").show( );
			 $("#c4").addClass("ccdrop");
	        $("#c").addClass("ccdrop");	
			
	}
	if ( loc == url_path + "/solution/energy" )
	{       
						setTime3()

		    $("#sub2").show( );
			 $("#c5").addClass("ccdrop");
	        $("#c").addClass("ccdrop");	
			
	}
	if ( loc == url_path + "/solution/manufacturing" )
	{       
						setTime3()

		    $("#sub2").show( );
			 $("#c6").addClass("ccdrop");
	        $("#c").addClass("ccdrop");	
			
	}
	if ( loc == url_path + "/careers/culture" )
	{       
						setTime4()

		    $("#sub3").show( );
			 $("#d1").addClass("ccdrop");
	        $("#d").addClass("ccdrop");	
			
	}
	if ( loc == url_path + "/careers/current" )
	{       
						setTime4()

		    $("#sub3").show( );
			 $("#d2").addClass("ccdrop");
	        $("#d").addClass("ccdrop");	
			
	}
	if ( loc == url_path + "/careers/applicants" )
	{       
						setTime4()

		    $("#sub3").show( );
			 $("#d3").addClass("ccdrop");
	        $("#d").addClass("ccdrop");	
			
	}
	if ( loc == url_path + "/contact/vendor" )
	{       
							setTime5()

		    $("#sub4").show( );
			 $("#e1").addClass("ccdrop");
	        $("#e").addClass("ccdrop");	
			
	}
	if ( loc == url_path + "/contact/locations" )
	{       
	        	setTime5()

		    $("#sub4").show( );
			 $("#e2").addClass("ccdrop");
	        $("#e").addClass("ccdrop");	
			
	}
	
	
	
	
	
	
	
});
// JavaScript Document