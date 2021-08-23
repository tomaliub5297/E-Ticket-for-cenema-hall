<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="#">

<title>E-ticket Management System for Cinema Hall</title>

<link href="css/bootstrap.css" rel="stylesheet">
<link href="https://bootswatch.com/flatly/bootstrap.css" rel="stylesheet">
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
</head>
  <body>
    <div class="navbar-wrapper">
      <div class="">

        <nav class="navbar navbar-default navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php">E-ticket Management System for Cinema Hall</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse float-right">
              <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="showtimes.php">Showtimes</a></li>

              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li>
                  <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                  </form>
                </li>
                <li><a href="javascript:void(0)" onclick="openLoginModal();"><span class="glyphicon glyphicon-log-in"></span> Login </a></li>
              </ul>
            </div>
            
          </div>
        </nav>

      </div>
    </div>


    <section class="showtime_page">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p style="font-size: 3vw; font-weight: bold;text-align: center;"> "E-ticket Management System for Cinema Hall is build For CSE307 project"
            </p>
            <p>System Analysis and Design is mainly dealing with the software development theory. This covers system development life cycle models, system development life cycle, data flow diagram, entity relationship diagram, dynamic system development methodology, quality management, requirement analysis, structured system analysis and design methodology. These are the subjects that normally analyze the system development standards.
            </p>
	    <p>This project is to a possible solution for any cinema hall. In that case I have chosen “E-ticket Management System”.
	    </p>
          </div>
        </div>
      </div>
    </section>

    <!-- FOOTER -->
	 "<body style= 'background-color:yellow'>";
    <div class="container">
      <footer>
        <p class="pull-right"><a href="#"></a></p>
       
      </footer>
    </div>


    <div class="modal fade login" id="loginModal">
      <div class="modal-dialog login animated">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Login with</h4>
          </div>
          <div class="modal-body">  
            <div class="box">
              <div class="content">
                <div class="social">
                  <a class="circle github" href="/auth/github">
                    <i class="fa fa-github fa-fw"></i>
                  </a>
                  <a id="google_login" class="circle google" href="/auth/google_oauth2">
                    <i class="fa fa-google-plus fa-fw"></i>
                  </a>
                  <a id="facebook_login" class="circle facebook" href="/auth/facebook">
                    <i class="fa fa-facebook fa-fw"></i>
                  </a>
                </div>
                <div class="division">
                  <div class="line l"></div>
                  <span>or</span>
                  <div class="line r"></div>
                </div>
                <div class="error"></div>
                <div class="form loginBox">
                  <form method="post" action="/login" accept-charset="UTF-8">
                    <input id="email" class="form-control" type="text" placeholder="Email" name="email">
                    <input id="password" class="form-control" type="password" placeholder="Password" name="password">
                    <input class="btn btn-default btn-login" type="button" value="Login" onclick="loginAjax()">
                  </form>
                </div>
              </div>
            </div>
            <div class="box">
              <div class="content registerBox" style="display:none;">
                <div class="form">
                  <form method="post" html="{:multipart=>true}" data-remote="true" action="/register" accept-charset="UTF-8">
                    <input id="email" class="form-control" type="text" placeholder="Email" name="email">
                    <input id="password" class="form-control" type="password" placeholder="Password" name="password">
                    <input id="password_confirmation" class="form-control" type="password" placeholder="Repeat Password" name="password_confirmation">
                    <input class="btn btn-default btn-register" type="submit" value="Create account" name="commit">
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="forgot login-footer">
              <span>Looking to 
                <a href="javascript: showRegisterForm();">create an account</a>
                ?</span>
              </div>
              <div class="forgot register-footer" style="display:none">
                <span>Already have an account?</span>
                <a href="javascript: showLoginForm();">Login</a>
              </div>
            </div>        
          </div>
        </div>
      </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/holder.min.js"></script>
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script src="js/main.js"></script>
  </body>
  </html>
