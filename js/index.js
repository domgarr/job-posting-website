 $(document).ready(function(){
	(function(){
		var user = {	
			path : "http://garreffd.myweb.cs.uwindsor.ca/60334/job-posting-website/html/session.php",
			init : function(){
				this.$signInNav = $("#sign-in-nav");

				this.getUsername();
			},
			setUsername : function(){
				this.$signInNav.children().hide();
				this.$signInNav.append("<p>" + this.email + "</p>");
			},
			getUsername : function(){
				$.ajax({
				url: this.path,
	 			type: "GET",
	 			success: function (response) {
			    		this.email = response;
			    },
			    async: true
			});
				console.log(this.email);
			if(!(this.email == undefined) && this.email != "")
				this.setUsername();
			}
		}
		user.init();
	})();
});