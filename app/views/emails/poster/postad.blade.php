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
      <div class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ URL::to('/'); }}">
            <img src="{{ URL::to('/'); }}/img/logo.png">
            <!--<span><strong>eshtihar</strong>.com</span>
            <p>Pakistan's first growing online classified</p>-->
          </a>
        </div>
      </div>
    </div>
   
    <div id="confirmation">
        <div class="container project-mission-scor">
          <div class="row project-mission-points">
            <div class="points">
              <p>Hi {{ $name }}</p>
            </div>
          </div>
          <div class="row project-mission-text">
            <div class="col-md-12">
              <p>Your ad {{ $title }} has been sent to verfication..</p>
              <p>Once your ad is verified and accepted it will appear immediately on the site and we will notify you this by an e-mail. This may take up to a few hours, but we always try to keep this time to minimum.</p>
              <p><strong>Important:</strong> Please do not add another ad of the same Object/ Subject.</p>              
            </div>
          </div>      
        </div>
        <div class="cb"></div>
    </div>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    {{ HTML::script('js/jquery.min.js') }}
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/custom.js') }}
  </body>
</html>

