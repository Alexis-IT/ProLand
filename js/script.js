$(document).ready(function() {
  	$.ajax({
  		method: "GET",
  		url: "/test/api.php?type=regions"
	})
    .done(function( msg ) {
    	var items = JSON.parse(msg);

    	$("select[name='region']").append($('<option>', { 
        		value: "CHOUSE",
        		text : "CHOUSE" 
    		}));

		$.each(items, function (i, item) {
    		$("select[name='region']").append($('<option>', { 
        		value: item.District,
        		text : item.District 
    		}));
		});

  	});


    $("select[name='region']").change(function(){
    	$("select[name='district']").empty();
	$.ajax({
  		method: "GET",
  		url: "/test/api.php?type=districts&region="+$(this).children("option:selected").val()
  	})
    .done(function( msg ) {
    	var items = JSON.parse(msg);


    	$("select[name='district']").append($('<option>', { 
        		value: "CHOUSE",
        		text : "CHOUSE" 
    		}));

		$.each(items, function (i, item) {
    		$("select[name='district']").append($('<option>', { 
        		value: item.Region,
        		text : item.Region 
    		}));
		});

  	});
	});



    $("select[name='district']").change(function(){
    	$("select[name='city']").empty();
	$.ajax({
  		method: "GET",
  		url: "/test/api.php?type=cities&region="+$("select[name='region']").children("option:selected").val()+"&district="+$(this).children("option:selected").val()
  	})
    .done(function( msg ) {
    	var items = JSON.parse(msg);

		$.each(items, function (i, item) {
    		$("select[name='city']").append($('<option>', { 
        		value: item.Name,
        		text : item.Name 
    		}));
		});

  	});
	});

	$("#pushMe").click(function(e){
		e.preventDefault();
		calculateData();
	})

});


//function calculateData(e){
function calculateData(){
    //e.preventDefault();
	$.ajax({
  		method: "GET",
  		url: "/test/api.php?type=calculate&region="+$("select[name='region']").children("option:selected").val()+"&district="+$("select[name='district']").children("option:selected").val()+"&city="+$("select[name='city']").children("option:selected").val()+"&area="+$("input[name='area']").val()
  	})
    .done(function( msg ) {
    	alert(msg);
  	});
	}