<?PHP  
    $index = "index.php";
    $timeline = "home/timeline.php";
    $nav = "components/nav-bar.php";
    $footer = "components/footer.php";
    $photography = "photography/index.php";
    $hosting = "hosting/index.php";
    $four = "404page.html";
    $base = "css/base.css";
    $dev = "css/dev.css";
    $main = "css/main.css";
    $responsive = "css/responsive.css";
    $tofeedback = "redirects/ToFeedback.html";
    $loader = "js/loader.js";
    $scrollOffset = "js/scroll-offset.js";
    $smoothScroll = "js/smooth-scroll.js";
    $likes1 = "photography/likes/img1.php";
    $robots = "robots.txt";
    $humans = "humans.txt";
    $lines = COUNT(FILE($index)) + 1 + COUNT(FILE($timeline)) + COUNT(FILE($nav)) + COUNT(FILE($footer)) + COUNT(FILE($photography)) + COUNT(FILE($hosting)) + COUNT(FILE($four)) + COUNT(FILE($base)) + COUNT(FILE($dev)) + COUNT(FILE($main)) + COUNT(FILE($responsive)) + COUNT(FILE($tofeedback)) + COUNT(FILE($loader)) + COUNT(FILE($scrollOffset)) + COUNT(FILE($smoothScroll)) + COUNT(FILE($likes1)) * 20 + 20 + COUNT(FILE($robots)) + COUNT(FILE($humans));
    
    $handle = fopen("components/counter.txt", "r"); if(!$handle){ echo "could not open the file" ; } else { $counter = (int ) fread($handle,20); fclose ($handle); $counter++; $handle = fopen("components/counter.txt", "w" ); fwrite($handle,$counter) ; fclose ($handle) ; }
    
    $captcha=$_POST['g-recaptcha-response'];
    
    if(empty($captcha)==FALSE){
    function getUserIpAddr(){
      if(!empty($_SERVER['HTTP_CLIENT_IP'])){
          	$ipA = $_SERVER['HTTP_CLIENT_IP'];
      	}elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
          	$ipA = $_SERVER['HTTP_X_FORWARDED_FOR'];
      	}else{
          	$ipA = $_SERVER['REMOTE_ADDR'];
      	}
      	return $ipA;
    }
    
    $captcha=$_POST['g-recaptcha-response'];
    $ip = getUserIpAddr(); 
    $secretkey = '6Le4GYUUAAAAADO2s8C9xNoJtOyLYedcfGr89V7D';
    $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretkey."&response=".$captcha."&remoteip=".$ip);
    $responseKeys = json_decode($response);
    
    if($responseKeys->success == true) {
    echo '<script>document.write("<h1>It looks like you are a bot. Byebye!</h1>")window.location = "google.com";</script>';
    } else {
      $servername = "localhost";
      $username = "PhotoClark";
      $password = "MeganDaisy16";
      $dbname = "comments";
      
      $name = $_POST["name"];
      $email = $_POST["email"];
      $comment = $_POST["comments"];
      $date = date("d-m-y");
      
      $name = addslashes($name);
      $email = addslashes($email);
      $comment = addslashes($comment);
      	    
      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
      	die("Connection failed: " . $conn->connect_error);
      } 
      
      $sql = "INSERT INTO comments (name, email, comment, date, ip)
      VALUES ('$name', '$email', '$comment', '$date', '$ip')";
      
      $to = "widdlywardo@hotmail.co.uk";
      $subject = "New Comment!";
      $txt = "There has been a new comment from " . $name . "./nIt says:/n" . $comment . "/n/nThank you!/n    - Your Website";
      mail($to,$subject,$txt);
      
      if ($conn->query($sql) === TRUE) {
      	echo "<script>console.log('New record created successfully');</script>";
      } else {
      	echo "Error: " . $sql . "<br>" . $conn->error;
      }		
      $conn->close();
     }
    }
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>PhotoClark - Home</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="images/favicon.ico">
        <meta name="keywords" content="photoclark, photography, verwood, cranborne middle school, qe school, queen elizabeth's school, photography britian, photography dorset, photographs, photo, photographer verwood, photographer dorset, html websites, html photography websites, photography websites, photography portfolio, portfolio, photo clark, photoclark portfolio, photo clark portfolio ,PhotoClark, Photography, Verwood, Cranborne Middle School, QE School, Queen Elizabeth's School, Photography Britian, Photography Dorset, Photographs, Photo, Photographer Verwood, Photographer Dorset, HTML Websites, HTML Photography Websites, Photography Websites, Photography Portfolio, Portfolio, Photo Clark, PhotoClark Portfolio, Photo Clark Portfolio" />
        <meta name="description" content="I'm PhotoClark. Welcome to my website. I will be sharing many of my photos here. I mostly take landscape pictures in rural areas in and around Dorset, England. I coded this website myself, and I will be updating it regularly. I would love to hear your feedback, so please leave a comment.">
        <link rel="manifest" href="pwa.webmanifest">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <link href="css/base.css" rel="stylesheet" type="text/css">
        <link href="css/main.css" rel="stylesheet" type="text/css">
        <link href="css/responsive.css" rel="stylesheet" type="text/css">
        <link href="css/dev.css" rel="stylesheet" type="text/css">
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <style>
        	body:after {
				content: "";
				position: fixed;
				top: 0;
				height: 100vh;
				left: 0;
				right: 0;
				z-index: -1;
				background: url("images/logo-bg3.png") center center;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
			}
        </style>
    </head>
    <body data-spy="scroll" data-target=".navbar" data-offset="50">
        <div class="spinner-wrapper">
            <div class="sk-cube-grid">
                <div class="sk-cube sk-cube1"></div>
                <div class="sk-cube sk-cube2"></div>
                <div class="sk-cube sk-cube3"></div>
                <div class="sk-cube sk-cube4"></div>
                <div class="sk-cube sk-cube5"></div>
                <div class="sk-cube sk-cube6"></div>
                <div class="sk-cube sk-cube7"></div>
                <div class="sk-cube sk-cube8"></div>
                <div class="sk-cube sk-cube9"></div>
			</div>
        </div>
        <div id="top"></div>
        <script>
            AOS.init();
        </script>
        <script src="js/smooth-scroll.js"></script>
        <script src="js/scroll-offset.js"></script>
        <script src="js/loader.js"></script>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="#myPage">
                        <div class="typew_container">
                            <div class="typewriter">
                                <ul class="nav navbar-left">
                                    <li>PHOTOCLARK</li>
                                </ul>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#top">HOME</a></li>
                        <li><a href="photography" class="transition">PHOTOGRAPHY</a></li>
                        <li><a href="#feedback">FEEDBACK</a></li>
                        <li><a href="https://photoclark.co.uk/hosting" class="transition">HOSTING</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="page-break"></div>
        <center>
            <div class="bounce">
                <a href="#welcome">
                <img src="images/arrow-down-white.png" width=25%>
                </a>
            </div>
        </center>
        <div class="page-content-light">
        <div id="band" class="container text-center">
            <div data-aos="zoom-out-up">
                <h3 id="welcome">WELCOME!</h3>
            </div>
            <div data-aos="zoom-out-up">
                <p><em>This website is made up of <?php echo $lines; ?> lines of code!</em></p>
                <p>I'm PhotoClark. Welcome to my website. I will be sharing many of my photos here. I mostly take landscape pictures in rural areas in and around Dorset, England. I coded this website myself, and I will be updating it regularly. I would love to hear your feedback, so please leave a comment. </p>
                <p><em>This website is still under construction.</em></p>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <p class="text-center"><strong></strong></p>
                    <a href="#dropdown" data-toggle="collapse">
                        <div data-aos="zoom-out-up"><img src="images/home.png" class="img-circle person" alt="Random Name" width="255" height="255"></div>
                    </a>
                    <div id="dropdown" class="collapse">
                        <p>Everything you need to know about me!</p>
                        <div class="smooth">
                            <a href="#top" class="smooth">
                                <p style=" font-size: 125%; ">Let's go! <span class="glyphicon glyphicon-arrow-right"></span></p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <p class="text-center"><strong></strong></p>
                    <a href="#dropdown2" data-toggle="collapse">
                        <div data-aos="zoom-out-up"><img src="images/photography.png" class="img-circle person" alt="Random Name" width="255" height="255"></div>
                    </a>
                    <div id="dropdown2" class="collapse">
                        <p>A gallery of lots of my best pictures!</p>
                        <a href="photography/">
                            <p style=" font-size: 125%; ">Let's go! <span class="glyphicon glyphicon-arrow-right"></span></p>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <p class="text-center"><strong></strong></p>
                    <a href="#dropdown4" data-toggle="collapse">
                        <div data-aos="zoom-out-up"><img src="images/feedback.png" class="img-circle person" alt="Random Name" width="255" height="255"></div>
                    </a>
                    <div id="dropdown4" class="collapse">
                        <p>Please leave any comments!</p>
                        <div class="smooth">
                            <a href="#feedback">
                                <p style=" font-size: 125%; ">Let's go! <span class="glyphicon glyphicon-arrow-right"></span></p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        </div>
        <div class="page-content-dark">
            <div data-aos="zoom-out-up">
                <h3 class="text-center">THE EVOLUTION OF THIS SITE</h3>
            </div>
            <center>
                <div data-aos="zoom-out-up"><img src="images/evolution.png" width="150"></div>
            </center>
            <p></p>
            <?PHP include 'home/timeline.php'; ?>
        </div>
        <div class="page-content-light">
        <br>
        <div id="feedback"></div>
        <div id="contact" class="container">
            <div data-aos="zoom-out-up">
                <h3 class="text-center">COMMENT</h3>
            </div>
            <div data-aos="zoom-out-up">
                <p class="text-center"><em>What do you think?</em></p>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <br>
                    <div data-aos="zoom-out-up">
                        <p><span class="glyphicon glyphicon-map-marker"></span> Dorset, UK</p>
                        <p><span class="glyphicon glyphicon-envelope"></span> Email: admin@photoclark.co.uk</p>
                        <p><span class="glyphicon glyphicon-user"></span> Twitter: @photoclark11</p>
                    </div>
                    <br>
                </div>
                <div data-aos="zoom-out-up">
                    <div class="col-md-8">
                        <form action="#feedback"  method="post">
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input class="form-control" id="email" name="email" placeholder="Email" type="email">
                                </div>
                            </div>
                            <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5" required></textarea>
                            <br>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <div class="g-recaptcha pull-left" data-sitekey="6Le4GYUUAAAAAJVqyx82m-PJRzzTlKxJy8CVinLN"></div>
                                    <button class="btn pull-right" type="submit"  id="send_message" style="margin-top: 18px;">Go!</button>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
            <br>
            <!--<div data-aos="zoom-out-up">
                <h3 class="text-center">THE FEEDBACK</h3>
            </div>
            <?php /*
                $servername = "localhost";
                $username = "PhotoClark";
                $password = "MeganDaisy16";
                $dbname = "comments";
                
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                
                $sql = "SELECT id, name, comment, date FROM comments  ORDER BY id DESC LIMIT 25"; // ORDER BY id DESC LIMIT 25
                $result = mysqli_query($conn, $sql);
                
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo '<div data-aos="zoom-out-up"><div class="comment"><div class="row">';
                        echo '<h2 class="comment-name">' . $row["name"]. '</h2></div><div class="row"><p class="comment-date"><span class="glyphicon glyphicon-hourglass"></span> ' . $row["date"]. '</p></div><div class="row"><p class="comment-text">'. $row["comment"]. '</p></div></div></div><br>';
                    }
                            
                } else {
                    echo "No comments have been made yet. :-(";
                }
                mysqli_close($conn); */
                ?>-->
        </div>
    </div>
        <footer class="page-footer font-small unique-color-dark">
            <div data-aos="zoom-out-up">
                <div class="container text-center text-md-left mt-5">
                    <br>
                    <a class="up-arrow" href="#top" data-toggle="tooltip" title="TO TOP">
                    <span class="glyphicon glyphicon-chevron-up"></span>
                    </a>
                    <div class="row mt-3">
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <h6 class="text-uppercase font-weight-bold">PhotoClark</h6>
                            <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                            <p>There have been <?PHP include 'components/counter.txt'; ?> visits to this website so far. Infomation on where they come from will be coming soon.</p>
                        </div>
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <h6 class="text-uppercase font-weight-bold">Key Places</h6>
                            <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                            <p>
                                <a href="#top">Home</a>
                            </p>
                            <p>
                                <a href="photography/">Photography</a>
                            </p>
                            <p>
                                <a href="#feedback">Feedback</a>
                            </p>                        </div>
                        <div class="hide-on-mobile">
                            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                                <h6 class="text-uppercase font-weight-bold">Other Sites I Host</h6>
                                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                                <p>
                                    <a href="https://photoclark.co.uk/hosting">Hosting</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <h6 class="text-uppercase font-weight-bold">Contact</h6>
                            <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                            <p>
                            <p><span class="glyphicon glyphicon-map-marker"></span> Dorset, UK</p>
                            <p>
                            <p><span class="glyphicon glyphicon-envelope"></span> Email: admin@photoclark.co.uk</p>
                            <p>
                            <p><span class="glyphicon glyphicon-user"></span> Twitter: @photoclark11</p>
                        </div>
                    </div>
                </div>
                <div class="footer-darker text-center py-3">© 2019 Copyright</div>
        </footer>
        </div>
    </body>
</html>
