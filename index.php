<?php

session_start();

require('vendor/autoload.php');

use Portfolio\{
    Controller,
    Form,
    Candidate,
    Compteur_visite
};

// Si le visiteur n'est pas un robot
if(strpos($_SERVER['HTTP_USER_AGENT'], 'bot') === false) {
    $compteurVisite = new Compteur_visite();
    if (!$compteurVisite->dayVisitorCheck()) {
        $compteurVisite->createEntry();
    }
}

// Création de l'objet "candidat"
$candidate = new Candidate(
    [
        'firstName'       => 'Marc',
        'surname'         => 'RAES',
        'birthDate'       => '21-11-1985',
        'email'           => 'images/email.png',
        'address'         => '5 Allée henri le navigateur 38090 Villefontaine',
        'telephoneNumber' => '+33767422616',
    ]
);

// Vérifie si le formulaire de contact à était envoyer
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller = new Controller($_POST);
}

/* Vérifie si le formulaire à déja était envoyé
 * Permettra d'afficher les erreurs du formulaire */
if (isset($_SESSION['form'])) {
    //Récupération du formulaire envoyer
    $form = unserialize($_SESSION['form']);
    unset($_SESSION['form']);
}
else {
    $form = new Form();
}

// Un email vient d'étre envoyer
if (isset($_SESSION['sendMail'])) {
    // Récupération du sujet du message dans une variable
    $subjectMessage = $_SESSION['subject'];

    // Destruction des SESSIONS
    session_unset();
}
?>
<!doctype html>
<html lang="fr">
<head>
    <!-- Meta charset -->
    <meta charset="utf-8"/>
    <!-- Meta viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- Meta description -->
    <meta name="description"
          content="Je m'appelle Marc depuis l'âge de 14 ans je suis passionné par l'informatique. J'ai commencé par apprendre les langages HTML, CSS et PHP grâce à des cours en lignes avant d'effectuer une formation de développeur intégrateur en réalisation d ’applications web, afin d'obtenir un diplôme de niveau III (Bac+2). Aujourd'hui je suis disponible pour relever de nouveaux challenges"/>
    <!-- Font Family -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="style/fontawesome/css/fontawesome-all.min.css">
    <!-- Feuille de style -->
    <link rel="stylesheet" href="style/css/style.css">

    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- Bibliothéque jquery -->
    <script src="style/js/style.js"></script> <!-- feuille de script -->
    <script src='https://www.google.com/recaptcha/api.js'></script> <!-- Script recaptcha Google -->

    <title><?= $candidate->fullName(); ?> - Un développeur Web qui saura vous satisfaire</title>
</head>

<body>

    <img src="images/body_dev7.jpg" class="imgBg"/>

    <!-- Menu Sticky -->
    <div id="stickyNav">
        <nav>
            <ul>
                <li><a href="#header">Accueil</a></li>
                <li><a href="#about">Me concernant</a></li>
                <li><a href="#skills">Compétences/Certifications</a></li>
                <li><a href="#achievements">Réalisations</a></li>
                <li><a href="#contact">Contactez-moi</a></li>
            </ul>
        </nav>
    </div>

    <!-- Header -->
    <header id="header">
        <h1><a href="http://marcraes.fr"><?= $candidate->fullName(); ?></a></h1>

        <!-- Menu Header -->
        <nav id="navHeader">
            <ul>
                <li><a href="#about">Me concernant</a></li>
                <li><a href="#skills">Compétences/Certifications</a></li>
                <li><a href="#achievements">Réalisations</a></li>
                <li><a href="#contact">Contactez-moi</a></li>
            </ul>
        </nav>
    </header>

    <!-- Menu profils -->
    <nav id="navProfessional">
        <ul>
            <li><a href="https://github.com/marcRaes" title="GitHub" target="_blank"><span class="fab fa-github"></span></a></li> <!-- GitHub -->
            <li><a href="https://www.linkedin.com/in/marc-raes-283096142/" title="LinkedIn" target="_blank"><span class="fab fa-linkedin"></span></a></li> <!-- LinkedIn -->
            <li><a href="https://www.viadeo.com/p/00223dsyss8jfm7u" title="Viadeo" target="_blank"><span class="fab fa-viadeo-square"></span></a></li> <!-- Viadeo -->
        </ul>
    </nav>

    <!-- Section Accueil -->
    <section id="home">

        <?php
        // Aucune erreur lors de l'envoie du message
        if (isset($subjectMessage)) {
            ?>

            <p id="sendMail">
                Vous venez de m'adresser un message dont le motif était : <br>
                <span class="strong"><?= $subjectMessage; ?></span><br>
                Merci de votre intéret pour mon profil, je vous répondrez trés prochainement.<br>
                <span class="strong"><?= $candidate->fullName(); ?></span>
            </p>

            <?php
        }
        else {
            if (isset($_SESSION['errorMail'])) {
                ?>

                <p id="sendMail">
                    Une erreur est survenu lors de l'envoi de votre message<br>
                    Merci de rééssayer, si le problème persiste merci d'utiliser un autre moyen de contact.<br>
                    <span class="strong"><?= $candidate->fullName(); ?></span>
                </p>

                <?php
            }
        }
        ?>

        <article>

            <h1>Bonjour ! Je m'appelle <span><?= $candidate->getFirstName(); ?></span></h1>

            <h2><span>Passionné</span> par les nouvelles technologies, je me suis formé au métier de <span>Développeur Web</span> et je suis disponible pour relever de nouveaux challenges.
            </h2>

            <div id="buttonContact">
                <a href="curriculum_vitae.pdf" title="Télécharger mon CV au format PDF"><span class="fas fa-download"></span>Curriculum vitae</a>
                <a href="#contact" title="Envoyer moi un message via mon formulaire de contact"><span class="fas fa-envelope"></span>Contactez-moi</a>
            </div>

        </article>
    </section>

    <!-- Section "Me concernant" -->
    <section id="about">

        <article>
            <div id="introAbout">
                <h1 class="titleSection">Un peu de moi !</h1>
                <p>
                    Bonjour, je suis un jeune développeur, passionné par la programmation en général et particulièrement ce qui touche à la programmation de site web!
                </p>
                <p>
                    Curieux et autodidacte, j'ai étudié les langages de programmation <strong>HTML</strong>, <strong>CSS</strong>, <strong>PHP</strong>.
                </p>
                <p>
                    J'ai également étudié le <strong>Javascript</strong> et <strong>Symfony</strong> dans sa <i>3<sup>éme</sup> version</i> pendant ma reconversion de "<strong>Développeur
                                                                                                                                                                                Web</strong>".
                </p>
                <p>
                    Suite à l'obtention de mon diplôme de "<strong>Développeur intégrateur en réalisation d’applications web</strong>" je recherche désormais un poste de Développeur Web,
                    afin
                    de travailler dans un domaine qui me passionne.
                </p>

                <p>
                    N'hésitez pas à me contacter si vous souhaitez en savoir plus sur mes compétences et ma motivation.
                </p>

            </div>
        </article>

        <article><img src="images/photoProfile.jpg"></article>

        <article>
            <div id="personalInformation">
                <h1 class="titleSection">Informations Personnelles</h1>

                <ul>
                    <li><span class="strong">Nom : </span><?= $candidate->fullName(); ?></li>
                    <li><span class="strong">Age : </span><?= $candidate->calculationAge(); ?></li>
                    <li><span class="strong">Téléphone : </span><?= $candidate->getTelephoneNumber(); ?></li>
                    <li><span class="strong email">Email : </span></li>
                    <li><span class="strong">Adresse : </span><?= $candidate->getAddress(); ?></li>
                </ul>

            </div>
        </article>

    </section>

    <!-- Section "Compétences/Certifications" -->
    <section id="skills">

        <h1 class="titleSection">Compétences</h1>

        <p class="introSection">Voici les compétences que j'ai acquises au cours de mon expérience en autodidacte et lors de ma formation de <strong>Développeur Web</strong>.</p>

        <article>
            <!-- HTML -->
            <div class="blocSkill">

                <div class="knowledgeSkill">
                    <p>Langage indispensable lorsque l'on souhaite créer des sites web. L'ergonomie est la chose que je tente de respecter au plus lors de la conception de mes pages web.</p>
                </div>

                <div class="percentSkill" data-percent="95%">
                    <h1>HTML</h1>
                    <div class="skillBar" style="width: 95%;"></div>
                </div>

            </div>
            <!-- /HTML -->

            <!-- CSS -->
            <div class="blocSkill">

                <div class="knowledgeSkill">
                    <p>Langage complémentaire du HTML pour l'embellisement des page web. J'utilise les dernières règles CSS compatibles avec la majorité des navigateurs du marché.</p>

                    <ul>
                        <li><strong>SASS</strong></li>
                    </ul>
                </div>

                <div class="percentSkill" data-percent="95%">
                    <h1>CSS</h1>
                    <div class="skillBar" style="width: 95%;"></div>
                </div>

            </div>
            <!-- /CSS -->

            <!-- PHP -->
            <div class="blocSkill">

                <div class="knowledgeSkill">
                    <p>Langage de programmation libre principalement utilisé pour produire des pages Web dynamiques. Il est le langage orienté back-end que j'apprécie le plus.</p>

                    <ul>
                        <li><strong>Maîtrise de la POO de base</strong></li>
                        <li><strong>Architecture MVC</strong></li>
                    </ul>
                </div>

                <div class="percentSkill" data-percent="80%">
                    <h1>PHP</h1>
                    <div class="skillBar" style="width: 80%;"></div>
                </div>

            </div>
            <!-- /PHP -->

            <!-- Symfony -->
            <div class="blocSkill">

                <div class="knowledgeSkill">
                    <p>Framework MVC le plus populaire. Ma première expérience sur ce Framework m'a beaucoup appris.</p>
                </div>

                <div class="percentSkill" data-percent="50%">
                    <h1>Symfony</h1>
                    <div class="skillBar" style="width: 50%;"></div>
                </div>

            </div>
            <!-- /Symfony -->

            <!-- JavaScript -->
            <div class="blocSkill">

                <div class="knowledgeSkill">
                    <p>Langage de programmation principalement employé pour la création de pages web interactive. Mon expérience sur ce langage fu riche en connaissances.</p>

                    <ul>
                        <li><strong>Jquery</strong></li>
                    </ul>
                </div>

                <div class="percentSkill" data-percent="70%">
                    <h1>JavaScript</h1>
                    <div class="skillBar" style="width: 70%;"></div>
                </div>

            </div>
            <!-- /JavaScript -->

        </article>

        <!-- Certifications -->
        <h2 class="titleSection">Certifications</h2>

        <p class="introSection">Voici les certifications acquises au cours de mon apprentissage personnel.</p>

        <article>

            <ul id="certificates">

                <span>Novembre 2013 : </span><br/> <!-- Novembre 2013 -->

                                                   <!-- Certification HTML/CSS -->
                <li>

                    <a href="https://openclassrooms.com/fr/course-certificates/3657059"
                       title='Visualiser la certification "Apprenez à créer votre site web avec HTML5 et CSS3"' target="_blank">
                        Apprenez à créer votre site web avec HTML5 et CSS3
                    </a>

                </li>

                <span class="certificate">Avril 2014 : </span><br/> <!-- Avril 2014 -->

                                                   <!-- Certification PHP/MySQL -->
                <li>

                    <a href="https://openclassrooms.com/fr/course-certificates/393226032"
                       title='Visualiser la certification "Concevez votre site web avec PHP et MySQL"' target="_blank">
                        Concevez votre site web avec PHP et MySQL
                    </a>

                </li>

                <span class="certificate">Mars 2017 : </span><br/> <!-- Mars 2017 -->

                                                   <!-- Certification Maintenez-vous à jour en développement -->
                <li>

                    <a href="https://openclassrooms.com/fr/course-certificates/5018404782"
                       title='Visualiser la certification "Maintenez-vous à jour en développement"' target="_blank">
                        Maintenez-vous à jour en développement
                    </a>

                </li>

                                                   <!-- Certification Apprenez à coder avec JavaScript -->
                <li>

                    <a href="https://openclassrooms.com/fr/course-certificates/3773525646"
                       title='Visualiser la certification "Apprenez à coder avec JavaScript"' target="_blank">
                        Apprenez à coder avec JavaScript
                    </a>

                </li>

                <span class="certificate">Avril 2017 : </span><br/> <!-- Avril 2017 -->

                                                   <!-- Certification Créez des pages web interactives avec JavaScript -->
                <li>

                    <a href="https://openclassrooms.com/fr/course-certificates/5330210519"
                       title='Visualiser la certification "Créez des pages web interactives avec JavaScript"' target="_blank">
                        Créez des pages web interactives avec JavaScript
                    </a>

                </li>

                                                   <!-- Certification Gérez votre code avec Git et GitHub -->
                <li>

                    <a href="https://openclassrooms.com/fr/course-certificates/3141407859"
                       title='Visualiser la certification "Gérez votre code avec Git et GitHub"' target="_blank">
                        Gérez votre code avec Git et GitHub
                    </a>

                </li>

                <span class="certificate">Novembre 2018 : </span><br/> <!-- Novembre 2018 -->

                                                   <!-- Certification Démarrez votre projet avec Python -->
                <li>

                    <a href="https://openclassrooms.com/fr/course-certificates/6693764281"
                       title='Visualiser la certification "Démarrez votre projet avec Python"' target="_blank">
                        Démarrez votre projet avec Python
                    </a>

                </li>

            </ul>

        </article>
        <!-- /Certifications -->
    </section>
    <!-- /Section "Compétences/Certifications" -->

    <!-- Section Réalisations -->
    <section id="achievements">

        <h1 class="titleSection">Réalisations</h1>

        <p class="introSection">Voici les différents projets personnels qui m'ont permis l'obtention de mon diplôme de "<span class="strong">Développeur intégrateur en réalisation
                                                                                                                                             d’applications web</span>"
        </p>

        <article>

            <div class="projects"> <!-- Projet 1 -->

                <figure>

                    <a href="http://p1.marcraes.fr/" title="Visualiser le projet dans une nouvelle fenêtre" target="_blank">
                        <img src="images/projets/projet1.jpg" alt="Projet 1 formation Développeur Web Junior"/>
                        <figcaption>
                            <h2>Intégrez la maquette du site d'une agence web</h2>
                        </figcaption>
                    </a>

                </figure>

                <p class="titleProject">Projet 1</p>

            </div> <!-- /Projet 1 -->

            <div class="projects"> <!-- Projet 2 -->

                <figure>

                    <a href="http://p2.marcraes.fr/" title="Visualiser le projet dans une nouvelle fenêtre" target="_blank">
                        <img src="images/projets/projet2.jpg" alt="Projet 2 formation Développeur Web Junior"/>
                        <figcaption>
                            <h2>Créez un thème WordPress</h2>
                        </figcaption>
                    </a>

                </figure>

                <p class="titleProject">Projet 2</p>

            </div> <!-- /Projet 2 -->

            <div class="projects"> <!-- Projet 3 -->

                <figure>

                    <a href="http://p3.marcraes.fr/" title="Visualiser le projet dans une nouvelle fenêtre" target="_blank">
                        <img src="images/projets/projet3.jpg" alt="Projet 3 formation Développeur Web Junior"/>
                        <figcaption>
                            <h2>Concevez une carte interactive de location de vélos</h2>
                        </figcaption>
                    </a>

                </figure>

                <p class="titleProject">Projet 3</p>

            </div> <!-- /Projet 3 -->

            <div class="projects"> <!-- Projet 4 -->

                <figure>

                    <a href="http://p4.marcraes.fr/" title="Visualiser le projet dans une nouvelle fenêtre" target="_blank">
                        <img src="images/projets/projet4.jpg" alt="Projet 4 formation Développeur Web Junior"/>
                        <figcaption>
                            <h2>Créez un blog pour un écrivain</h2>
                        </figcaption>
                    </a>

                </figure>

                <p class="titleProject">Projet 4</p>

            </div> <!-- /Projet 4 -->

            <div class="projects"> <!-- Projet 5 -->

                <figure>

                    <a href="http://p5.marcraes.fr/" title="Visualiser le projet dans une nouvelle fenêtre" target="_blank">
                        <img src="images/projets/projet5.jpg" alt="Projet 5 formation Développeur Web Junior"/>
                        <figcaption>
                            <h2>Présentez librement un projet personnel</h2>
                        </figcaption>
                    </a>

                </figure>

                <p class="titleProject">Projet 5</p>

            </div> <!-- /Projet 5 -->

        </article>

    </section>
    <!-- /Section Réalisations -->

    <!-- Section Contact -->
    <section id="contact">

        <h1 class="titleSection">Contact</h1>

        <article>

            <p class="introSection">Vous souhaitez me proposer un poste ou avoir plus de renseignement sur mes compétences, vous pouvez me contacter via ce formulaire de contact<br></p>

            <?php
            if ($form->getMsgError() !== null) {
                echo '<p id="messageError">' . $form->getMsgError() . '</p>';
            }
            else {
                echo '<p>Tous les champs sont obligatoire</p>';
            }
            ?>

            <form method="post" action="">
                <div id="field">
                    <fieldset>
                        <!-- Champ username -->
                        <?= $form->text('username', 'Votre nom'); ?>
                        <!-- Champ email -->
                        <?= $form->email('email', 'Votre email'); ?>
                    </fieldset>
                    <fieldset>
                        <!-- Champ subject -->
                        <?= $form->text('subject', 'Sujet du message'); ?>
                        <!-- Champ message -->
                        <?= $form->textarea('message', 'Votre message'); ?>
                    </fieldset>
                </div>
                <!-- Champ captcha -->
                <?= $form->captcha(); ?>
                <!-- Bouton d'envoi -->
                <?= $form->submit('Envoyer le message'); ?>
            </form>

        </article>

    </section>
    <!-- /Section Contact -->

</body>
</html>