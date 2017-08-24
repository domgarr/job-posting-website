 $(document).ready(function(){
	(function(){
		var user = {	
			path : "http://garreffd.myweb.cs.uwindsor.ca/60334/job-posting-website/html/session.php",
			init : function(){
				this.$signInNav = $("#sign-in-nav");
                                this.$postNav = $("#post-nav");
                                this.$signUpButton = $("#sign-up-button");
                                
				this.getUsername();
			},
			setUsername : function(){
			       this.$signInNav.children().hide();
                               

                               this.setDisplayPrivalege();
			},
                        setDisplayPrivalege : function(){
                             if(this.userArray[0]["userType"] == 1){
                                this.$postNav.hide();
                                this.$signUpButton.hide();
                                this.$signInNav.append("<a class='nav-link active' href='../html/profile.html'>" + this.userArray[0]["email"] + "</a>");
                             }
                        },
			getUsername : function(){
				$.ajax({
				url: this.path,
	 			type: "GET",
	 			cache: false,
	 			context: this,
	 			success: function (response) {
                       console.log(response);
			    		this.userArray = JSON.parse(response);
                                        this.setUsername();
			    },
			    async: true
			});
				
			
		}
              }
		user.init();
	})();
});