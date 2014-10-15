<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>eshtihar.com-Pakistan's first growing online classified</title>
    <link rel="shortcut icon" href="img/favicon.ico">

    <!-- Bootstrap -->
    
    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/custom.css') }}
    {{ HTML::style('css/mystyle.css') }}      
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  
  	@include('layouts.header')

    <div class="container-fluid searchArea">
      <div class="container">
        <div class="row">
        <form>
          <ul>
          	<li><select><option>Location</option></select></li>
            <li><select><option>Category</option></select></li>
            <li><input type="text" placeholder="I am looking for..." /></li>
            <li><input type="button" value="Search"></li>
          </ul>
          </form>
        </div>
      </div>      
    </div>
    
    @yield('content') 
	   

    @include('layouts.footer')
    
    
    



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    {{ HTML::script('js/jquery.min.js') }}
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/custom.js') }}
    <script type="text/javascript">
    $(document).ready( function() {
    $('#myCarousel').carousel({
      interval:   1000
  });
  
  var clickEvent = false;
  $('#myCarousel').on('click', '.nav a', function() {
      clickEvent = true;
      $('.nav li').removeClass('active');
      $(this).parent().addClass('active');    
  }).on('slid.bs.carousel', function(e) {
    if(!clickEvent) {
      var count = $('.nav').children().length -1;
      var current = $('.nav li.active');
      current.removeClass('active').next().addClass('active');
      var id = parseInt(current.data('slide-to'));
      if(count == id) {
        $('.nav li').first().addClass('active');  
      }
    }
    clickEvent = false;
  });
});

    </script>
  </body>
</html>