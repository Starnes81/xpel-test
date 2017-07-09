
// this javascript/jquery will handle the input form the form 
(function($){
  // grab the id from the from
  var body = $('#xpelData').submit(function(event) {
    event.preventDefault();
    // get the value from the input
    var searchValue = $('#xpelSearchValue').val();
    // load some data.  site will need to be updated http://www.example.com/xpel.php see readme
    $.post("http://xpel.blackonair.com/xpel.php",
    	{ term: searchValue }).done(function(response) {
        // for debug
    	// console.log(response);	

      // get the response 
		$("#xpelResults").html(response);

    	});
  });

})(jQuery);