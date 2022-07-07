<?php

function extractFormData($formData) {
    $formData = array_map('trim', $formData);
    $formData = array_map('stripslashes', $formData);
    $formData = array_map('htmlspecialchars', $formData);
    return $formData;
}

$errors = array();
$messages = array();
$recaptchaSecret = "6LfVnskZAAAAAN9EyesmLRdO5HUWvFgx-bsbi6AT";
$url = "https://www.google.com/recaptcha/api/siteverify". "?secret=" . $recaptchaSecret;

if( isset($_POST["formSubmit"]) ){
    $data = extractFormData($_POST);
    if ( $data["g-recaptcha-response"] != "" ) {
        $url .= "&response=" . $data["g-recaptcha-response"];
        $response = file_get_contents($url);
        $response = json_decode($response);
        if ( $response->success ) {
            $data["g-captcha-response"];
            $data["name"] = ucfirst($data["name"]);
            $data["email"] = strtolower($data["email"]);
            $data["message"] = nl2br($data["message"]);
            $data["createdAt"] = date("Y-m-d H:i:s");

            // Save data to database

            // Connect to database with mysqli_connect 
            
            // Create a query to insert data into database

            // Execute query
            
            // Close connection

            // Send mail to admin
            $to = "lazarefortune@gmail.com";
            $subject = $data["object"];
            $message = $data["message"];
            $message .= "<br><br>Email: " . $data["email"];
            $headers = "From: Lazare Fortune <service@lazarefortune.com>\r\n";
            $headers .= "Reply-To: " . $data["email"] . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            $headers .= 'X-Mailer: PHP/' . phpversion();
            mail($to, $subject, $message, $headers, "-fservice@lazarefortune.com");

            // Send mail to user
            $to = $data["email"];
            $subject = "Message sent to Lazare Fortune";
            $message = "Hello, your message has been sent. I will answer you as soon as possible.";
            $headers = "From: Lazare Fortune <service@lazarefortune.com>\r\n";
            $headers .= "Reply-To: Lazare Fortune<lazarefortune@gmail.com> \r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            $headers .= 'X-Mailer: PHP/' . phpversion();
            mail($to, $subject, $message, $headers, "-fservice@lazarefortune.com");
            $messages["sendmail"] = "Your message has been sent. I will answer you as soon as possible.";
            // Script to alert success message 
            echo "<script>alert('Message sent successfully');</script>";
        } else {
            $errors["recaptcha"] = "Please check the captcha";
        }
    } else {
        $errors["recaptcha"] = "Please check the box 'I'm not a robot'";
    }
}

if( count($errors) > 0 ){
    $oldData = $data;
}

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Lazare Fortune</title>
        <meta name="description" content="Je suis Lazare Fortune, développeur web junior">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSS only -->
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> -->
        <!-- JavaScript Bundle with Popper -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script> -->
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <!-- SWIPER CSS -->
        <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
        <!-- CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
        <!-- Favicon -->
        <link rel="icon" href="assets/img/favicons/favicon.ico">
        <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
        <link rel="manifest" href="assets/img/favicons/site.webmanifest">
        <!-- UNICONS -->
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <!-- DEVICONS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css">
        <!-- Google reCAPTCHA -->
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>
    <body>
        <!-- Header -->  
        <header class="header" id="header">
            <nav class="nav container">
                <a href="#" class="nav__logo">Lazare Fortune</a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list grid">
                        <li class="nav__item">
                            <a href="#home" class="nav__link active-link">
                                <i class="uil uil-estate nav__icon"></i> Home
                            </a>
                        </li>
                        <li class="nav__item">
                            <a href="#about" class="nav__link">
                                <i class="uil uil-user nav__icon"></i> About
                            </a>
                        </li>
                        <li class="nav__item">
                            <a href="#skills" class="nav__link">
                                <i class="uil uil-file-alt nav__icon"></i> Skills
                            </a>
                        </li>
                        <!-- <li class="nav__item">
                            <a href="#services" class="nav__link">
                                <i class="uil uil-briefcase-alt nav__icon"></i> Services
                            </a>
                        </li> -->
                        <li class="nav__item">
                            <a href="#portfolio" class="nav__link">
                                <i class="uil uil-scenery nav__icon"></i> Portfolio
                            </a>
                        </li>
                        <li class="nav__item">
                            <a href="#contact" class="nav__link">
                                <i class="uil uil-message nav__icon"></i> Contact
                            </a>
                        </li>
                    </ul>
                    <i class="uil uil-times nav__close" id="nav-close"></i>
                </div>

                <div class="nav__btns">
                    <!-- Theme change button  -->
                    <i class="uil uil-moon change-theme" id="theme-button"></i>
                    <!-- Menu button -->
                    <div class="nav__toggle" id="nav-toggle">
                        <i class="uil uil-apps"></i>
                    </div>
                </div>
            </nav>
        </header>


        <!--==================== MAIN ====================-->
        <main class="main">
            <!--==================== HOME ====================-->
            <section class="home section" id="home">
                <div class="home__container container grid">
                    <div class="home__content grid">
                        <div class="home__social">
                            <a href="https://github.com/lazarefortune" target="_blank" class="home__social-icon">
                                <i class="uil uil-github-alt"></i>
                            </a>
                            <a href="https://www.linkedin.com/in/lazare-fortune/" target="_blank" class="home__social-icon">
                                <i class="uil uil-linkedin-alt"></i>
                            </a>
                            <a href="https://twitter.com/lazarefortune" target="_blank" class="home__social-icon">
                                <i class="uil uil-twitter-alt"></i>
                            </a>
                        </div>

                        <div class="home__img">
                            <svg class="home__blob" viewBox="0 0 479 467" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <mask id="mask0" mask-type="alpha">
                                    <path d="M9.19024 145.964C34.0253 76.5814 114.865 54.7299 184.111 29.4823C245.804 6.98884 311.86 -14.9503 370.735 14.143C431.207 44.026 467.948 107.508 477.191 174.311C485.897 237.229 454.931 294.377 416.506 344.954C373.74 401.245 326.068 462.801 255.442 466.189C179.416 469.835 111.552 422.137 65.1576 361.805C17.4835 299.81 -17.1617 219.583 9.19024 145.964Z"/>
                                </mask>
                                <g mask="url(#mask0)">
                                    <path d="M9.19024 145.964C34.0253 76.5814 114.865 54.7299 184.111 29.4823C245.804 6.98884 311.86 -14.9503 370.735 14.143C431.207 44.026 467.948 107.508 477.191 174.311C485.897 237.229 454.931 294.377 416.506 344.954C373.74 401.245 326.068 462.801 255.442 466.189C179.416 469.835 111.552 422.137 65.1576 361.805C17.4835 299.81 -17.1617 219.583 9.19024 145.964Z"/>
                                    <image class="home__blob-img" x="50" y="90" href="assets/img/avatar.png"/>
                                </g>
                            </svg>
                        </div>

                        <div class="home__data">
                            <h1 class="home__title">Hi, I'm Lazare Fortune</h1>
                            <h3 class="home__subtitle">Backend Web Developer</h3>
                            <p class="home__description">
                                I have a passion for creating web applications and 
                                I'm always looking for new challenges to learn and grow.
                            </p>
                            <a href="#contact" class="button button--flex">
                                Contact Me <i class="uil uil-message button__icon"></i>
                            </a>
                        </div>
                    </div>

                    <div class="home__scroll">
                        <a href="#about" class="home__scroll-button button--flex">
                            <i class="uil uil-mouse-alt home__scroll-mouse" ></i>
                            <span class="home__scroll-name">Scroll down</span>
                            <i class="uil uil-arrow-down home__scroll-arrow"></i>
                        </a>
                    </div>
                </div>
            </section>

            <!--==================== ABOUT ====================-->
            <section class="about section" id="about">
                <h2 class="section__title">About Me</h2>
                <span class="section__subtitle">My introduction</span>

                <div class="about__container container grid">
                    <img src="assets/img/lazarefortune.jpeg" alt="" class="about__img">

                    <div class="about__data">
                        <p class="about__description">
                            Junior Web Developer with a passion for building beautiful and functional websites.
                            I have a background in web development and have a strong passion for
                            learning new technologies.
                        </p>

                        <div class="about__info">
                            <div>
                                <span class="about__info-title">3</span>
                                <span class="about__info-name">Years <br> experience </span>
                            </div>

                            <div>
                                <span class="about__info-title">4</span>
                                <span class="about__info-name">Completed <br> project </span>
                            </div>

                            <div>
                                <span class="about__info-title">2</span>
                                <span class="about__info-name">Companies <br> worked </span>
                            </div>
                        </div>

                        <div class="about__buttons test" id="abo">
                            <a href="assets/pdf/CV_Fortune_KOMBILA.pdf" download="CV_Fortune_KOMBILA" class="button button--flex">
                                Download CV <i class="uil uil-download-alt button__icon"></i> 
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <!--==================== SKILLS ====================-->
            <section class="skills section" id="skills">
                <h2 class="section__title">Skills</h2>
                <span class="section__subtitle">My technical level</span>

                <div class="skills__container container grid">
                    <div>
                        <!-- Skills 1 -->
                        <div class="skills__content skills__open">
                            <div class="skills__header">
                                <i class="uil uil-server-network skills__icon"></i>

                                <div>
                                    <h1 class="skills__title">Backend developer</h1>
                                    <span class="skills__subtitle"> Languages and frameworks </span>
                                </div>

                                <i class="uil uil-angle-down skills__arrow"></i>
                            </div>

                            <div class="skills__list grid">
                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">PHP</h3>
                                        <i class="devicon-php-plain skills__icon"></i>
                                    </div>
                                </div>

                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">Java</h3>
                                        <i class="devicon-java-plain skills__icon"></i>
                                    </div>
                                </div>

                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">Python</h3>
                                        <i class="devicon-python-plain skills__icon"></i>
                                    </div>
                                </div>

                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">Symfony</h3>
                                        <i class="devicon-symfony-plain skills__icon"></i>
                                    </div>
                                </div>

                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">Node.js</h3>
                                        <i class="devicon-nodejs-plain skills__icon"></i>
                                    </div>
                                </div>

                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">Express.js</h3>
                                        <i class="devicon-express-original-wordmark skills__icon"></i>
                                    </div>
                                </div>

                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">Doctrine</h3>
                                        <i class="devicon-doctrine-plain skills__icon"></i>
                                    </div>
                                </div>

                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">Spring</h3>
                                        <i class="devicon-spring-plain skills__icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Skills 2 -->
                        <div class="skills__content skills__close">
                            <div class="skills__header">
                                <i class="uil uil-brackets-curly skills__icon"></i>

                                <div>
                                    <h1 class="skills__title">Frontend developer</h1>
                                    <span class="skills__subtitle">Languages and frameworks</span>
                                </div>

                                <i class="uil uil-angle-down skills__arrow"></i>
                            </div>

                            <div class="skills__list grid">
                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">HTML 5</h3>
                                        <i class="uil uil-html5 skills__icon"></i>
                                    </div>
                                </div>

                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">CSS 3</h3>
                                        <i class="uil uil-css3-simple skills__icon"></i>
                                    </div>
                                </div>

                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">JavaScript (ES6) </h3>
                                        <i class="uil uil-java-script skills__icon"></i>
                                    </div>
                                </div>

                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">Bootstrap</h3>
                                        <i class="devicon-bootstrap-plain skills__icon"></i>
                                    </div>
                                </div>

                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">React</h3>
                                        <i class="uil uil-react skills__icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <!-- Skills 3 -->
                        <div class="skills__content skills__close">
                            <div class="skills__header">
                                <i class="uil uil-swatchbook skills__icon"></i>

                                <div>
                                    <h1 class="skills__title">Tools</h1>
                                    <span class="skills__subtitle"> My other skills </span>
                                </div>

                                <i class="uil uil-angle-down skills__arrow"></i>
                            </div>

                            <div class="skills__list grid">
                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">Docker</h3>
                                        <i class="devicon-docker-plain skills__icon"></i>
                                    </div>
                                </div>

                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">Git</h3>
                                        <i class="devicon-git-plain skills__icon"></i>
                                    </div>
                                </div>

                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">MySQL</h3>
                                        <i class="devicon-mysql-plain skills__icon"></i>
                                    </div>
                                </div>

                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">MongoDB</h3>
                                        <i class="devicon-mongodb-plain skills__icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--==================== QUALIFICATION ====================-->
            <section class="qualification section">
                <h2 class="section__title">Qualification</h2>
                <span class="section__subtitle">My personal journey</span>

                <div class="qualification__container container">
                    <div class="qualification__tabs">
                        <div class="qualification__button button--flex qualification__active" data-target="#education">
                            <i class="uil uil-graduation-cap qualification__icon"></i>
                            Education
                        </div>
                        <div class="qualification__button button--flex" data-target="#work">
                            <i class="uil uil-briefcase-alt qualification__icon"></i>
                            Work
                        </div>
                    </div>

                    <div class="qualification__sections">
                        <!-- Qualification content 1 -->
                        <div class="qualification__content qualification__active" data-content id="education">
                            <!-- Qualification 1 -->
                            <div class="qualification__data">
                                <div>
                                    <h3 class="qualification__title">Bachelor 3 en développement <br>(In progress)</h3>
                                    <span class="qualification__subtitle">France - 
                                        <a href="https://www.supdevinci.fr/" class="qualification__link" target="_blank">Sup de vinci</a>
                                    </span>
                                    <div class="qualification__calendar">
                                        <i class="uil uil-calendar-alt"></i>
                                        2021-2022
                                    </div>
                                </div>

                                <div>
                                    <span class="qualification__rounder"></span>
                                    <span class="qualification__line"></span>
                                </div>
                            </div>

                            <!-- Qualification 2 -->
                            <div class="qualification__data">
                                <div></div>

                                <div>
                                    <span class="qualification__rounder"></span>
                                    <span class="qualification__line"></span>
                                </div>

                                <div>
                                    <h3 class="qualification__title">DUT Informatique</h3>
                                    <span class="qualification__subtitle">France - 
                                        <a href="https://iut-metz.univ-lorraine.fr/" class="qualification__link" target="_blank">IUT de Metz</a>
                                    </span>
                                    <div class="qualification__calendar">
                                        <i class="uil uil-calendar-alt"></i>
                                        2020-2021
                                    </div>
                                </div>
                            </div>

                            <!-- Qualification 3 -->
                            <div class="qualification__data">
                                <div>
                                    <h3 class="qualification__title">1st year of DUT Informatique</h3>
                                    <span class="qualification__subtitle">Gabon - I.S.T</span>
                                    <div class="qualification__calendar">
                                        <i class="uil uil-calendar-alt"></i>
                                        2018-2019
                                    </div>
                                </div>

                                <div>
                                    <span class="qualification__rounder"></span>
                                    <span class="qualification__line"></span>
                                </div>
                            </div>

                            <!-- Qualification 4 -->
                            <div class="qualification__data">
                                <div></div>

                                <div>
                                    <span class="qualification__rounder"></span>
                                    <!-- <span class="qualification__line"></span> -->
                                </div>

                                <div>
                                    <h3 class="qualification__title">Math Sup & Math Spé (Preparatory class for high schools)</h3>
                                    <span class="qualification__subtitle">Gabon - LEON MBA</span>
                                    <div class="qualification__calendar">
                                        <i class="uil uil-calendar-alt"></i>
                                        2016-2018
                                    </div>
                                </div>
                            </div>
                        </div> 

                        <!-- Qualification content 2 -->
                        <div class="qualification__content" data-content id="work" >
                            <!-- Qualification 1 -->
                            <div class="qualification__data">
                                <div>
                                    <h3 class="qualification__title">Full-stack web developer <br> (In progress)</h3>
                                    <span class="qualification__subtitle"> 
                                        <a href="https://www.cambium-media.com/solutions/" class="qualification__link" target="_blank">
                                            Cambium Media Solutions
                                        </a> - France
                                    </span>
                                    <div class="qualification__calendar">
                                        <i class="uil uil-calendar-alt"></i>
                                        Sep 2021 - Now
                                    </div>
                                </div>

                                <div>
                                    <span class="qualification__rounder"></span>
                                    <span class="qualification__line"></span>
                                </div>
                            </div>

                            <!-- Qualification 2 -->
                            <div class="qualification__data">
                                <div></div>

                                <div>
                                    <span class="qualification__rounder"></span>
                                    <span class="qualification__line"></span>
                                </div>

                                <div>
                                    <h3 class="qualification__title">Full-stack web developer</h3>
                                    <span class="qualification__subtitle">
                                        <a href="https://www.cambium-media.com/solutions/" class="qualification__link" target="_blank">
                                            Cambium Media Solutions
                                        </a> - France
                                    </span>
                                    <div class="qualification__calendar">
                                        <i class="uil uil-calendar-alt"></i>
                                        Jun 2021 - Aug 2021
                                    </div>
                                </div>
                            </div>

                            <!-- Qualification 3 -->
                            <div class="qualification__data">
                                <div>
                                    <h3 class="qualification__title">CEO Web Creation</h3>
                                    <span class="qualification__subtitle">
                                        Web Creation - Gabon
                                    </span>
                                    <div class="qualification__calendar">
                                        <i class="uil uil-calendar-alt"></i>
                                        Apr 2020 - Jul 2020 
                                    </div>
                                </div>
                                
                                <div>
                                    <span class="qualification__rounder"></span>
                                    <span class="qualification__line"></span>
                                </div>
                            </div>

                            <!-- Qualification 4 -->
                            <div class="qualification__data">
                                <div></div>
                                <div>
                                    <span class="qualification__rounder"></span>
                                </div>

                                <div>
                                    <h3 class="qualification__title">Full-stack web developer</h3>
                                    <span class="qualification__subtitle"><a href="https://naura.solutions/" class="qualification__link" target="_blank">Na'ura solutions</a> - Gabon</span>
                                    <div class="qualification__calendar">
                                        <i class="uil uil-calendar-alt"></i>
                                        Dec 2019 - Mar 2020
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--==================== SERVICES ====================-->
            <!--
            <section class="services section" id="services">
                <h2 class="section__title">Services</h2>
                <span class="section__subtitle">What i offer</span>
                
                <div class="services__container container grid">
                    <div class="services__content">
                        <div>
                            <i class="uil uil-web-grid services__icon"></i>
                            <h3 class="services__title">UI/UX <br> Designer </h3>
                        </div>

                        <span class="button button--flex button--small button--link services__button">
                            View more
                            <i class="uil uil-arrow-right button__icon"></i>
                        </span>

                        <div class="services__modal">
                            <div class="services__modal-content">
                                <h4 class="services__modal-title">UI/UX <br> Designer </h4>
                                <i class="uil uil-times services__modal-close"></i>

                                <ul class="services__modal-servies grid">
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal-icon"></i>
                                        <p>I develop the user interface.</p>
                                    </li>
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal-icon"></i>
                                        <p>Web page development.</p>
                                    </li>
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal-icon"></i>
                                        <p>I create ux element interactions.</p>
                                    </li>
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal-icon"></i>
                                        <p>I position your company brand .</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="services__content">
                        <div>
                            <i class="uil uil-arrow services__icon"></i>
                            <h3 class="services__title">Frontend <br> Developer </h3>
                        </div>

                        <span class="button button--flex button--small button--link services__button">
                            View more
                            <i class="uil uil-arrow-right button__icon"></i>
                        </span>

                        <div class="services__modal">
                            <div class="services__modal-content">
                                <h4 class="services__modal-title">Frontend <br> Developer </h4>
                                <i class="uil uil-times services__modal-close"></i>

                                <ul class="services__modal-servies grid">
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal-icon"></i>
                                        <p>I develop the user interface.</p>
                                    </li>
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal-icon"></i>
                                        <p>Web page development.</p>
                                    </li>
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal-icon"></i>
                                        <p>I create ux element interactions.</p>
                                    </li>
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal-icon"></i>
                                        <p>I position your company brand .</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="services__content">
                        <div>
                            <i class="uil uil-pen services__icon"></i>
                            <h3 class="services__title">Branding <br> Designer </h3>
                        </div>

                        <span class="button button--flex button--small button--link services__button">
                            View more
                            <i class="uil uil-arrow-right button__icon"></i>
                        </span>

                        <div class="services__modal">
                            <div class="services__modal-content">
                                <h4 class="services__modal-title">Branding <br> Designer  </h4>
                                <i class="uil uil-times services__modal-close"></i>

                                <ul class="services__modal-servies grid">
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal-icon"></i>
                                        <p>I develop the user interface.</p>
                                    </li>
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal-icon"></i>
                                        <p>Web page development.</p>
                                    </li>
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal-icon"></i>
                                        <p>I create ux element interactions.</p>
                                    </li>
                                    <li class="services__modal-service">
                                        <i class="uil uil-check-circle services__modal-icon"></i>
                                        <p>I position your company brand .</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            -->

            <!--==================== PORTFOLIO ====================-->
            <section class="portfolio section" id="portfolio">
                <h2 class="section__title">Portfolio</h2>
                <span class="section__subtitle"> Now you can see my works</span>

                <div class="portfolio__container container swiper">
                    <div class="swiper-wrapper">
                        <!-- Portfolio 1 -->
                        <div class="portfolio__content grid swiper-slide">
                            <img src="assets/img/portfolio/nodejs-blog-api.png" alt="API Github page" class="portfolio__img">

                            <div class="portfolio__data">
                                <h3 class="portfolio__title">Node JS Blog API</h3>
                                <p class="portfolio__description">
                                    I was able to set up an API for managing a blog
                                    as part of a school project.
                                </p>
                                <a href="https://github.com/lazarefortune/supdevinci-projetblog-nodejs-api" target="_blank" class="button button--flex button--small portfolio__button">
                                    Show
                                    <i class="uil uil-arrow-right button__icon"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Portfolio 2 -->
                        <div class="portfolio__content grid swiper-slide">
                            <img src="assets/img/portfolio/julie-portfolio.png" alt="Julie Mvie website" class="portfolio__img">

                            <div class="portfolio__data">
                                <h3 class="portfolio__title">Julie Mvie</h3>
                                <p class="portfolio__description">
                                    I set up the portfolio of an artist photographer
                                    with back office interface management with Laravel.
                                </p>
                                <a href="https://julie.my-space.fr" target="_blank" class="button button--flex button--small portfolio__button">
                                    Demo
                                    <i class="uil uil-arrow-right button__icon"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Portfolio 3 -->
                        <div class="portfolio__content grid swiper-slide">
                            <img src="assets/img/portfolio/forum-lazarefortune.png" alt="Forum interface" class="portfolio__img">

                            <div class="portfolio__data">
                                <h3 class="portfolio__title">Simple forum</h3>
                                <p class="portfolio__description">
                                    In my free time, I was able to set up a very lightweight forum using Laravel. 
                                    Without focusing on the design aspect but rather the back-end.
                                </p>
                                <a href="https://forum.lazarefortune.com" target="_blank" class="button button--flex button--small portfolio__button">
                                    Demo
                                    <i class="uil uil-arrow-right button__icon"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Portfolio 4 -->
                        <div class="portfolio__content grid swiper-slide">
                            <img src="assets/img/portfolio/projet-univ-lorraine-interface.png" alt="Login interface" class="portfolio__img">

                            <div class="portfolio__data">
                                <h3 class="portfolio__title">School project</h3>
                                <p class="portfolio__description">
                                    As part of a graduation project,
                                    I was able to set up a management interface for tutored projects.
                                    Especially on the backend part with Symfony. <br>
                                    Login : <b>roka</b> / password : <b>zsuzsanna</b>
                                </p>
                                <a href="https://projets.lazarefortune.com/synthese/public" target="_blank" class="button button--flex button--small portfolio__button">
                                    Demo
                                    <i class="uil uil-arrow-right button__icon"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Portfolio 5 -->
                        <div class="portfolio__content grid swiper-slide">
                            <img src="assets/img/portfolio/my-space-login-page.png" alt="Login interface" class="portfolio__img">

                            <div class="portfolio__data">
                                <h3 class="portfolio__title">Personnal project</h3>
                                <p class="portfolio__description">
                                    My Space is a personnal project I created for my own use.
                                    And it is a website I made with Symfony.
                                </p>
                                <a href="https://my-space.fr/connexion" target="_blank" class="button button--flex button--small portfolio__button">
                                    Demo
                                    <i class="uil uil-arrow-right button__icon"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Swiper Arrows -->
                    <div class="swiper-button-next">
                        <i class="uil uil-angle-right-b swiper-portfolio-icon"></i>
                    </div>
                    <div class="swiper-button-prev">
                        <i class="uil uil-angle-left-b swiper-portfolio-icon"></i>
                    </div>
                    
                    <!-- Swiper Pagination -->
                    <div class="swiper-pagination"></div>
                    
                </div>
            </section>

            <!--==================== Hobbies ====================-->
            <section class="hobbies section" >
                <h2 class="section__title">My YouTube channel</h2>
                <span class="section__subtitle">
                    Check out my YouTube channel, I like to share my knowledge.
                </span>

                <div class="hobbies__container container">
                    <iframe width="560" height="315"
                             src="https://www.youtube.com/embed/videoseries?list=PLDZiR055I-4zDBQX2aEgIp85gTg74mubN"
                             title="YouTube video player" frameborder="0"
                             allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                             allowfullscreen></iframe>
                </div>
            </section>
            
            <!--==================== PROJECT IN MIND ====================-->
            <!-- <section class="project section">

            </section> -->

            <!--==================== TESTIMONIAL ====================-->
            <!-- <section class="testimonial section">
                
            </section> -->

            <!--==================== CONTACT ME ====================-->
            <section class="contact section" id="contact">
                <h2 class="section__title">Contact Me</h2>
                <span class="section__subtitle">Get in touch</span>

                <div class="contact__container container grid">
                    <div>
                        <div class="contact__information">
                            <i class="uil uil-phone contact__icon"></i>
                            
                            <a href="tel:+33661434799">
                                <h3 class="contact__title">Call Me</h3>
                                <span class="contact__subtitle">+33 6 61 43 47 99</span>
                            </a>
                        </div>

                        <div class="contact__information">
                            <i class="uil uil-envelope contact__icon"></i>
                            
                            <a href="mailto:lazarefortune@gmail.com">
                                <h3 class="contact__title">Email</h3>
                                <span class="contact__subtitle">lazarefortune@gmail.com</span>
                            </a>
                        </div>

                        <div class="contact__information">
                            <i class="uil uil-map-marker contact__icon"></i>
                            
                            <div>
                                <h3 class="contact__title">Location</h3>
                                <span class="contact__subtitle">11 Av. Auguste Rodin 94350 Villiers-sur-marne</span>
                            </div>
                        </div>
                    </div>
                    <form action="" method="post" name="formContact" class="contact__form grid">
                        <?php if(isset($errors) && !empty($errors)): ?>
                        <div class="contact__error">
                            <?php foreach($errors as $error): ?>
                                <p class="contact__error-message"><i class="uil uil-exclamation-triangle"></i> <?= $error ?></p>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                        <?php if(isset($messages) && !empty($messages["sendmail"])): ?>
                        <div class="contact__success">
                            <p class="contact__success-message"><i class="uil uil-check-circle"></i> <?= $messages["sendmail"] ?></p>
                        </div>
                        <?php endif; ?>
                        <div class="contact__inputs grid">
                            <div class="contact__content">
                                <label for="name" class="contact__label">Name</label>
                                <input type="text" name="name" id="name" class="contact__input" required value="<?php if(isset($oldData['name'])) echo $oldData['name']; ?>">
                            </div>
                            <div class="contact__content">
                                <label for="email" class="contact__label">Email</label>
                                <input type="email" name="email" id="email" class="contact__input" required value="<?php if(isset($oldData['email'])) echo $oldData['email']; ?>">
                            </div>
                        </div>
                        <div class="contact__content">
                            <label for="object" class="contact__label">Object</label>
                            <input type="text" name="object" id="object" class="contact__input" required value="<?php if(isset($oldData['object'])) echo $oldData['object']; ?>">
                        </div> 
                        <div class="contact__content">
                            <label for="message" class="contact__label">Message</label>
                            <textarea name="message" id="message" cols="0" rows="7" class="contact__input" required><?php if(isset($oldData['message'])) echo $oldData['message']; ?></textarea>
                        </div>
                        <div class="g-recaptcha" data-sitekey="6LfVnskZAAAAAKWJwcbJ5xbYpXXGoikjAhxOg0p_"></div>                        
                        <div>
                            <button type="submit" name="formSubmit" class="button button--flex contact__submit">
                                Send Message
                                <i class="uil uil-message button__icon"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </section>
        </main>

        <!--==================== FOOTER ====================-->
        <footer class="footer">
            <div class="footer__bg">
                <div class="footer__container container grid">
                    <div>
                        <h1 class="footer__title">Lazare Fortune</h1>
                        <span class="footer__subtitle">Backend developer</span>
                    </div>

                    <ul class="footer__links">
                        <li>
                            <a href="#services" class="footer__link">Services</a>
                        </li>
                        <li>
                            <a href="#portfolio" class="footer__link">Portfolio</a>
                        </li>
                        <li>
                            <a href="#contact" class="footer__link">Contact</a>
                        </li>
                    </ul>

                    <div class="footer__socials">
                        <a href="https://github.com/lazarefortune" target="_blank" class="footer__social">
                            <i class="uil uil-github-alt"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/lazare-fortune/" target="_blank" class="footer__social">
                            <i class="uil uil-linkedin-alt"></i>
                        </a>
                        <a href="https://www.twitter.com/lazarefortune" target="_blank" class="footer__social">
                            <i class="uil uil-twitter-alt"></i>
                        </a>
                    </div>
                </div>

                <p class="footer__copy">&#169; LazareFortune. All right reserved</p>
            </div>
        </footer>
        
        <!--==================== SCROLL TOP ====================-->
        <a href="#" class="scrollup" id="scroll-up">
            <i class="uil uil-arrow-up scrollup__icon"></i>
        </a>

        <!--==================== SWIPER JS ====================-->
        <script src="assets/js/swiper-bundle.min.js"></script>
        <!-- MAIN JS -->
        <script src="assets/js/script.js"></script>
    </body>
</html>
