<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Housesgardens.com - administrators </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="{{asset('builder/logo-empty.png')}}" />

    
    <!-- Font -->
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700%7CPoppins:400,500" rel="stylesheet">
    
    <!-- Stylesheets -->
    
    <link href="{{ asset('welcome/common-css/bootstrap.css') }}" rel="stylesheet">
    
    
    <link href="{{ asset('welcome/common-css/ionicons.css') }}" rel="stylesheet">
    
    
    <link rel="stylesheet" href="{{ asset('welcome/common-css/jquery.classycountdown.css') }}" />
        
    <link href="{{ asset('welcome/01-comming-soon/css/styles.css') }}" rel="stylesheet">
    
    <link href="{{ asset('welcome/01-comming-soon/css/responsive.css') }}" rel="stylesheet">
    
</head>
<body>
    
    <div class="main-area">
        <div class="container full-height position-static">
            
            <section class="left-section full-height">
        
                <a class="logo" href="#"><img  src="{{ asset('builder/logo-house-garden.png')}}" alt="Logo"></a>
                
                <div class="display-table">
                    <div class="display-table-cell">
                        <div class="main-content">
                            <h1 class="title"><b>Start now</b></h1>
                            <p>Discover House & Garden online, your first stop for the latest interior design ideas, beautiful lifestyle inspiration and delicious food recipes.</p>

                            <div class="email-input-area">
                                <form method="post">
                                    <input class="email-input" name="email" type="text" placeholder="Enter your email"/>
                                    <button class="submit-btn" name="submit" type="submit"><b>NOTIFY US</b></button>
                                </form>
                            </div><!-- email-input-area -->
                            
                            <p class="post-desc">Sign up now to get early notification of our lauch date!</p>
                        </div><!-- main-content -->
                    </div><!-- display-table-cell -->
                </div><!-- display-table -->
                
                <ul class="footer-icons">
                    <li>Stay in touch : </li>
                    <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                    <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                    <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                    <li><a href="#"><i class="ion-social-pinterest"></i></a></li>
                </ul>
        
            </section><!-- left-section -->
        
            <section class="right-section" style="background-image: url({{asset('welcome/images/countdown-1-1000x1000.jpg')}}">
            
               <div>
                   <a href="{{route('home')}}" class="btn-login">
                       Administrators
                   </a>
               </div>
                
            </section><!-- right-section -->
        
        </div><!-- container -->
    </div><!-- main-area -->
    
    
</body>
</html>