<!Doctype>
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
    </head>
    <body>
        <!-- Header -->  
        <header class="header" id="header">
            <nav class="nav container">
                <a href="#" class="nav__logo">Fortune</a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list grid">
                        <li class="nav__item">
                            <a href="#home" class="nav__link">
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
                        <li class="nav__item">
                            <a href="#services" class="nav__link">
                                <i class="uil uil-briefcase-alt nav__icon"></i> Services
                            </a>
                        </li>
                        <li class="nav__item">
                            <a href="#portfolio" class="nav__link">
                                <i class="uil uil-scenery nav__icon"></i> Portfolio
                            </a>
                        </li>
                        <li class="nav__item">
                            <a href="#contact" class="nav__link">
                                <i class="uil uil-message nav__icon"></i> Contact Me
                            </a>
                        </li>
                    </ul>
                    <i class="uil uil-times nav__close" id="nav-close"></i>
                </div>

                <div class="nav__btns">
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
                            <a href="" target="_blank" class="home__social-icon">
                                <i class="uil uil-linkedin-alt"></i>
                            </a>
                            <a href="" target="_blank" class="home__social-icon">
                                <i class="uil uil-dribbble"></i>
                            </a>
                            <a href="" target="_blank" class="home__social-icon">
                                <i class="uil uil-github-alt"></i>
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
                            <h1 class="home__title">Hi, I'am Lazare Fortune</h1>
                            <h3 class="home__subtitle">Backend Web Developer</h3>
                            <p class="home__description"> Lorem ipsum dolor sit amet consectetur 
                                adipisicing elit. Eveniet assumenda minus, odio dolores 
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
                            Web Developer with a passion for building beautiful and functional websites.
                            I have a strong background in web development and have a strong passion for
                            learning new technologies.
                        </p>

                        <div class="about__info">
                            <div>
                                <span class="about__info-title">08+</span>
                                <span class="about__info-name">Years <br> experience </span>
                            </div>

                            <div>
                                <span class="about__info-title">20+</span>
                                <span class="about__info-name">Completed <br> project </span>
                            </div>

                            <div>
                                <span class="about__info-title">02+</span>
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
                                <i class="uil uil-brackets-curly skills__icon"></i>

                                <div>
                                    <h1 class="skills__title">Frontend developer</h1>
                                    <span class="skills__subtitle">More than 4 years</span>
                                </div>

                                <i class="uil uil-angle-down skills__arrow"></i>
                            </div>

                            <div class="skills__list grid">
                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">HTML</h3>
                                        <span class="skills__number">90%</span>
                                    </div>
                                    <div class="skills__bar">
                                        <span class="skills__percentage skills__html"></span>
                                    </div>
                                </div>

                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">CSS</h3>
                                        <span class="skills__number">80%</span>
                                    </div>
                                    <div class="skills__bar">
                                        <span class="skills__percentage skills__css"></span>
                                    </div>
                                </div>

                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">JavaScript</h3> 
                                        <span class="skills__number">70%</span>
                                    </div>
                                    <div class="skills__bar">
                                        <span class="skills__percentage skills__js"></span>
                                    </div>
                                </div>

                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">React</h3>
                                        <span class="skills__number">85%</span>
                                    </div>
                                    <div class="skills__bar">
                                        <span class="skills__percentage skills__react"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Skills 2 -->
                        <div class="skills__content skills__close">
                            <div class="skills__header">
                                <i class="uil uil-server-network skills__icon"></i>

                                <div>
                                    <h1 class="skills__title">Backend developer</h1>
                                    <span class="skills__subtitle">More than 3 years</span>
                                </div>

                                <i class="uil uil-angle-down skills__arrow"></i>
                            </div>

                            <div class="skills__list grid">
                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">PHP</h3>
                                        <span class="skills__number">90%</span>
                                    </div>
                                    <div class="skills__bar">
                                        <span class="skills__percentage skills__php" ></span>
                                    </div>
                                </div>

                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">Node Js</h3>
                                        <span class="skills__number">70%</span>
                                    </div>
                                    <div class="skills__bar">
                                        <span class="skills__percentage skills__node"></span>
                                    </div>
                                </div>

                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">Express</h3> 
                                        <span class="skills__number">50%</span>
                                    </div>
                                    <div class="skills__bar">
                                        <span class="skills__percentage skills__express"></span>
                                    </div>
                                </div>

                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">Python</h3>
                                        <span class="skills__number">55%</span>
                                    </div>
                                    <div class="skills__bar">
                                        <span class="skills__percentage skills__python"></span>
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
                                    <h1 class="skills__title">Designer developer</h1>
                                    <span class="skills__subtitle">More than 2 years</span>
                                </div>

                                <i class="uil uil-angle-down skills__arrow"></i>
                            </div>

                            <div class="skills__list grid">
                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">Figma</h3>
                                        <span class="skills__number">90%</span>
                                    </div>
                                    <div class="skills__bar">
                                        <span class="skills__percentage skills__figma" ></span>
                                    </div>
                                </div>

                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">Sketch</h3>
                                        <span class="skills__number">85%</span>
                                    </div>
                                    <div class="skills__bar">
                                        <span class="skills__percentage skills__sketch"></span>
                                    </div>
                                </div>

                                <div class="skills__data">
                                    <div class="skills__titles">
                                        <h3 class="skills__name">Photoshop</h3> 
                                        <span class="skills__number">50%</span>
                                    </div>
                                    <div class="skills__bar">
                                        <span class="skills__percentage skills__photoshop"></span>
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
                <span class="section__subtitle">My personnal journey</span>

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
                                    <h3 class="qualification__title">Computer Enginner</h3>
                                    <span class="qualification__subtitle">Peru - University</span>
                                    <div class="qualification__calendar">
                                        <i class="uil uil-calendar-alt"></i>
                                        2009-2014
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
                                    <h3 class="qualification__title">Web design</h3>
                                    <span class="qualification__subtitle">Spain - Institute</span>
                                    <div class="qualification__calendar">
                                        <i class="uil uil-calendar-alt"></i>
                                        2014-2017 
                                    </div>
                                </div>
                            </div>

                            <!-- Qualification 3 -->
                            <div class="qualification__data">
                                <div>
                                    <h3 class="qualification__title">Web development</h3>
                                    <span class="qualification__subtitle">Peru - Institue</span>
                                    <div class="qualification__calendar">
                                        <i class="uil uil-calendar-alt"></i>
                                        2017-2019
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
                                    <h3 class="qualification__title">Master in UI/UX</h3>
                                    <span class="qualification__subtitle">Peru - Institue</span>
                                    <div class="qualification__calendar">
                                        <i class="uil uil-calendar-alt"></i>
                                        2019-2021
                                    </div>
                                </div>
                            </div>
                        </div> 

                        <!-- Qualification content 2 -->
                        <div class="qualification__content" data-content id="work" >
                            <!-- Qualification 1 -->
                            <div class="qualification__data">
                                <div>
                                    <h3 class="qualification__title">Software Enginner</h3>
                                    <span class="qualification__subtitle">Microsoft - Peru</span>
                                    <div class="qualification__calendar">
                                        <i class="uil uil-calendar-alt"></i>
                                        2016-2018
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
                                    <h3 class="qualification__title">Frontend Developer</h3>
                                    <span class="qualification__subtitle">Apple Inc - Spain</span>
                                    <div class="qualification__calendar">
                                        <i class="uil uil-calendar-alt"></i>
                                        2018-2020 
                                    </div>
                                </div>
                            </div>

                            <!-- Qualification 3 -->
                            <div class="qualification__data">
                                <div>
                                    <h3 class="qualification__title">UI designer</h3>
                                    <span class="qualification__subtitle">Figma - Spain</span>
                                    <div class="qualification__calendar">
                                        <i class="uil uil-calendar-alt"></i>
                                        2017-2019
                                    </div>
                                </div>

                                <div>
                                    <span class="qualification__rounder"></span>
                                    <!-- <span class="qualification__line"></span> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--==================== SERVICES ====================-->
            <section class="services section" id="services">
                <h2 class="section__title">Services</h2>
                <span class="section__subtitle">What i offer</span>
                
                <div class="services__container container grid">
                    <!-- Service 1 -->
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

                    <!-- Service 2 -->
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

                    <!-- Service 3 -->
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

            <!--==================== PORTFOLIO ====================-->
            <section class="portfolio section" id="portfolio">
                <h2 class="section__title">Portfolio</h2>
                <span class="section__subtitle">Most recent work</span>

                <div class="portfolio__container container swiper">
                    <div class="swiper-wrapper">
                        <!-- Portfolio 1 -->
                        <div class="portfolio__content grid swiper-slide">
                            <img src="assets/img/portfolio/web-creation.png" alt="" class="portfolio__img">

                            <div class="portfolio__data">
                                <h3 class="portfolio__title">Modern website</h3>
                                <p class="portfolio__description">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Quisquam, quidem.
                                </p>
                                <a href="" class="button button--flex button--small portfolio__button">
                                    Demo
                                    <i class="uil uil-arrow-right button__icon"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Portfolio 2 -->
                        <div class="portfolio__content grid swiper-slide">
                            <img src="assets/img/portfolio/julie-portfolio.png" alt="" class="portfolio__img">

                            <div class="portfolio__data">
                                <h3 class="portfolio__title">Julie Mvie</h3>
                                <p class="portfolio__description">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Quisquam, quidem.
                                </p>
                                <a href="" class="button button--flex button--small portfolio__button">
                                    Demo
                                    <i class="uil uil-arrow-right button__icon"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Portfolio 3 -->
                        <div class="portfolio__content grid swiper-slide">
                            <img src="assets/img/portfolio/web-creation-boutique.png" alt="" class="portfolio__img">

                            <div class="portfolio__data">
                                <h3 class="portfolio__title">Online store</h3>
                                <p class="portfolio__description">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Quisquam, quidem.
                                </p>
                                <a href="" class="button button--flex button--small portfolio__button">
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

            <!--==================== PROJECT IN MIND ====================-->
            <section class="project section">

            </section>

            <!--==================== TESTIMONIAL ====================-->
            <section class="testimonial section">
                
            </section>

            <!--==================== CONTACT ME ====================-->
            <section class="contact section" id="contact">

            </section>
        </main>

        <!--==================== FOOTER ====================-->
        <footer class="footer">
         
        </footer>
        
        <!--==================== SCROLL TOP ====================-->
        

        <!--==================== SWIPER JS ====================-->
        <script src=""></script>


        <!-- SWIPPER JS -->
        <script src="assets/js/swiper-bundle.min.js"></script>
        <!-- MAIN JS -->
        <script src="assets/js/script.js"></script>
    </body>
</html>
