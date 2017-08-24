 $(document).ready(function(){
	(function(){
		var jobPosting = {
			path : "http://garreffd.myweb.cs.uwindsor.ca/60334/job-posting-website/html/getJobPosting.php", 
            json : "",
			init : function(){
				this.$jobPosting = $("#job-postings");
				console.log(this.$jobPosting);
			},
			populate : function(){
				  
				$.ajax({
					url: this.path,
					type: "GET",
					context: this,
					success: function(response){
						this.json = JSON.parse(response);

						for(var i = 0; i < this.json.length; i++)
							this.$jobPosting.append(this.generateJobPostHtml(this.json[i]));
					}
				});
			
			
			},
			generateJobPostHtml : function(array){
				var output = "";
				output += '<div class="card" id="' + array["id"]  + '">' ;
		  		output += '<div class="card-block" style= "padding:10px">' ;
				  output +=  '<h4 class="card-title">' + array["title"] + '</h4>';
				   output += '<h6 class="card-subtitle mb-2 text-muted"> Address Here </h6>';
				   output += '<p class="card-text">' + array["description"] + '</p>';
				   output += '<p class="card-text">' + array["salary"] + '</p>'
				   output += '<a href="#" class="btn btn-primary">Apply</a>'
			  output +=  '</div>';
			  output +=  '<div class="card-footer text-muted">';
			  output += 	 '2 days ago';
			 output +=   '</div>';
			output += '</div><br>';

			return output;
			
			} 


		}
	  jobPosting.init();
	 jobPosting.populate();
	})();
});