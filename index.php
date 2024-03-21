<?php

function extractFormData($formData): array
{
    $formData = array_map('trim', $formData);
    $formData = array_map('stripslashes', $formData);
    return array_map('htmlspecialchars', $formData);
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
            $subject = "Merci pour votre message";
            $message = "Bonjour ". $data['name'] .", <br><br>";
            $message .= "Votre message a bien été envoyé. <br>";
            $message .= "Je vous répondrai dans les plus brefs délais. <br><br>";
            $message .= "Cordialement, <br>";
            $message .= "Lazare Fortune";
            $headers = "From: Lazare Fortune <service@lazarefortune.com>\r\n";
            $headers .= "Reply-To: Lazare Fortune<lazarefortune@gmail.com> \r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            $headers .= 'X-Mailer: PHP/' . phpversion();
            mail($to, $subject, $message, $headers, "-fservice@lazarefortune.com");
            $messages["sendmail"] = "Votre message a été envoyé. Je vous répondrai dès que possible.";
            // Script to alert success message
            echo "<script>alert('Message envoyé avec succès');</script>";
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
    <meta name="description" content="Je suis Lazare Fortune, développeur web PHP">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Google site verification -->
    <meta name="google-site-verification" content="cVdQDiwamc06x0st9JWYRu-lqokoHUiT2rXI8yE03Vs" />
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
    <!--==================== SWIPER JS ====================-->
    <script src="assets/js/swiper-bundle.min.js"></script>
</head>
<body>
<!-- Header -->
<header class="header" id="header">
    <nav class="nav container">
        <a href="" class="nav__logo">Lazare Fortune</a>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list grid">
                <li class="nav__item">
                    <a href="#home" class="nav__link active-link">
                        <i class="uil uil-estate nav__icon"></i> Accueil
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
                    <h1 class="home__title">Lazare Fortune</h1>
                    <h3 class="home__subtitle">Développeur web PHP</h3>
                    <p class="home__description">
                        🚀 Pour l'instant mon site est en construction, mais vous pouvez me contacter.
                        Je reviens bientôt avec un nouveau design et des fonctionnalités intéressantes 😉.
                    </p>
                    <a href="#contact" class="button button--flex">
                        Me contacter <i class="uil uil-message button__icon"></i>
                    </a>
                </div>
            </div>

            <div class="home__scroll">
                <a href="#contact" class="home__scroll-button button--flex">
                    <i class="uil uil-mouse-alt home__scroll-mouse" ></i>
                    <span class="home__scroll-name">Scroll</span>
                    <i class="uil uil-arrow-down home__scroll-arrow"></i>
                </a>
            </div>
        </div>
    </section>

    <!--==================== CONTACT ME ====================-->
    <section class="contact section" id="contact">
        <h2 class="section__title">Me contacter</h2>
        <span class="section__subtitle">Vous pouvez utiliser le formulaire ci-dessous pour me contacter</span>

        <div class="contact__container container grid">
            <div>
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
                        <h3 class="contact__title">Localisation</h3>
                        <span class="contact__subtitle">Villiers-sur-marne</span>
                    </div>
                </div>
            </div>
            <form method="post" name="formContact" class="contact__form grid">
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
                        <label for="name" class="contact__label">Nom</label>
                        <input type="text" name="name" id="name" class="contact__input" required value="<?php if(isset($oldData['name'])) echo $oldData['name']; ?>">
                    </div>
                    <div class="contact__content">
                        <label for="email" class="contact__label">Email</label>
                        <input type="email" name="email" id="email" class="contact__input" required value="<?php if(isset($oldData['email'])) echo $oldData['email']; ?>">
                    </div>
                </div>
                <div class="contact__content">
                    <label for="object" class="contact__label">Objet du message</label>
                    <input type="text" name="object" id="object" class="contact__input" required value="<?php if(isset($oldData['object'])) echo $oldData['object']; ?>">
                </div>
                <div class="contact__content">
                    <label for="message" class="contact__label">Entrez votre message</label>
                    <textarea name="message" id="message" cols="5" rows="7" class="contact__input" required><?php if(isset($oldData['message'])) echo $oldData['message']; ?></textarea>
                </div>
                <div class="g-recaptcha" data-sitekey="6LfVnskZAAAAAKWJwcbJ5xbYpXXGoikjAhxOg0p_"></div>
                <div>
                    <button type="submit" name="formSubmit" class="button button--flex contact__submit">
                        Envoyer
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
                <span class="footer__subtitle">Développeur web</span>
            </div>

            <ul class="footer__links">
                <li>
                    <a href="#about" class="footer__link"></a>
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

<!-- MAIN JS -->
<script src="assets/js/script.js"></script>
</body>
</html>
