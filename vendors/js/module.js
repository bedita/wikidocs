/* linked inside the module (if file exists) */

$(document).ready(function(){

	$(".wikimenu .edit").click(function(){
		
		var hash = window.location.hash;
		var currentid = hash.replace("#", "");
		if(currentid == '') {
			currentid = firstId;
		}
		// TODO: far funzionare con: baseUrl + "/documents/view/"+currentid;
		window.location.href = "/documents/view/"+currentid;
		
	});
	
	var coeff = 960;

	$(".navigator LI").click(function(){
		
		var listItem = $(this).index();
		var scrollto = listItem*coeff;
		var currentid = $(this).attr("rel");
		
		$(".panelscontainer").animate({
			    left: '-'+scrollto+''    
		  }, 800, function() {
		    // Animation complete.
			$("#m_"+currentid).addClass("mon");
		});
		
		window.location.hash = ""+currentid;
		  
	});
	
	$(".panel").not(":last").find('.nextP').addClass("active").click(function(){		
		var currentid = $(this).parent().attr("rel");
		$("#m_"+currentid).next("LI").css("color","black").click();	
	});

	$(".panel").not(":first").find('.prevP').addClass("active").click(function(){		
		var currentid = $(this).parent().attr("rel");
		$("#m_"+currentid).prev("LI").css("color","black").click();	
	});
	
	
	/*
	if(window.location.hash != "")
		currentPanelID = window.location.hash;
	else
		currentPanelID = "#" + firstPanelID;
	*/
		
});

	