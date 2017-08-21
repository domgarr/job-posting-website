 	const assert = require("chai").assert;

	const jsdom = require("jsdom");
	const { JSDOM } = jsdom;
	const dom = new JSDOM(`<!DOCTYPE html><p>Hello world</p>`);

	global.$ = require('jquery')(dom.window);
	global.document = dom.window.document;

	//var jquery = require('jquery');

   	var suggest = require("../js/suggest");

 	/*
	 before(function () {
	    setTimeout(function(){
	   
	  	    }, 999);
	  });	
*/


	describe("Suggest", function(){

			it("When 'Tor' is given function should return 'Toronto'", function(){	
				assert.equal(suggest.getSuggestion("Tor"), "Toronto");
			});

			it("When an empty string is entered, and empty string is returned", function(){
				assert.equal(suggest.getSuggestion(""), "");
			})

			it("When multiple spaces are given an emptry string should be returned", function(){
				assert.equal(suggest.getSuggestion("  "), "");
			})
	});



