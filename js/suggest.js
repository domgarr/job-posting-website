 $(document).ready(function(){
 	//suggest.getSuggestion("Tor");




(function(){
 	var suggest = {
	//Return suggestion of cities containing string 
	path:"http://garreffd.myweb.cs.uwindsor.ca/60334/job-posting-website/html/getCitySuggestion.php?city_name=",
	init : function(){
		this.cacheDom();
		this.bindEvents();
	},
	cacheDom : function(){
		this.$cityInput = $("#city-input");
		this.$cityInputUserEnteredString = this.$cityInput.val();
               
	},
	render: function(){
		this.$cityInput.autocomplete({
			source: this.getSuggestion(this.$cityInputUserEnteredString)
		});
	},
	bindEvents : function(){
		this.$cityInput.keyup(this.addSuggestion.bind(this));
	},
	addSuggestion : function(){
		this.$cityInputUserEnteredString = this.$cityInput.val();
		this.render();
	},
	getSuggestion: function(string){
		//Will remove all spaces globally.
        string = string.replace(/ /g, "");
		//If empty, return emptry string.
		if(string == "") return "";

		var suggestion = [];
		//For testing.
		$.ajax({
			url: this.path + string,
 			type: "GET",
 			success: function (response) {
console.log(response);		    	
suggestion.push(response);
		    },
		    async: true
		});
		return suggestion;
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
suggest.init();

})();

	//module.exports = suggest;
});