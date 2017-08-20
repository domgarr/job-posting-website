 $(document).ready(function(){
 	//suggest.getSuggestion("Tor");


});


 	var suggest = {
	//Return suggestion of cities containing string 
	path:"http://garreffd.myweb.cs.uwindsor.ca/60334/job-posting-website/html/getCitySuggestion.php?city_name=",
	getSuggestion: function(string){
		if(string == "") return "";

		var suggestion = [];
		//For testing.
		$.ajax({
			url: this.path + string,
 			type: "GET",
 			success: function (response) {
		        console.log("RESULT" + response );
	    	suggestion.push(response);
		    },
		    async: false
		});
		return suggestion[0];
	    /*
	    //For production.
	    $.get("http://garreffd.myweb.cs.uwindsor.ca/60334/job-posting-website/html/getCitySuggestion.php", function(data, status){
	    	console.log("RESULT" + data );
	    	suggestion.push(data);
	    	 return "Toronto";
	    	     });

	   // return "Toronto";
		*/		   
	}



}


	module.exports = suggest;
