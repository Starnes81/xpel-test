
// this javascript/jquery will handle the input form the form 
(function($){

  var body = $('').submit(function(event) {
    event.preventDefault();
    var searchValue = $('').val();

    $.post("",
    	{ term: searchValue }).done(function(response) {
    	console.log(response);	


		$("").html(response);

    	});
  });

})(jQuery);