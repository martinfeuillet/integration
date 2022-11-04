<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../dist/output.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Cuprum:wght@400;600&display=swap" rel="stylesheet" />
    <title>Document</title>
</head>

<body class="font-[inter] text-[#190038]">
    <header class="flex justify-between px-4 h-16 lg:h-20 items-center bg-white shadow-md w-full">
        <div class="flex items-center gap-2 lg:max-w-400 lg:scale-125 lg:ml-4">
            <img src="./images/favicon.ico" alt="logo-omnes" class="inline w-7" />
            <h1 class="leading-3">
                <span class="font-gotham font-bold text-lg">OMNES</span>
                <span class="block font-gotham font-semibold tracking-widest text-[8px] -mt-1 spacing education">EDUCATION</span>
            </h1>
        </div>
        <button class="button-full">candidature en ligne</button>
    </header>
    <main class="flex flex-col lg:flex-row-reverse">
        <div class="left w-full lg:w-1/2  mt-12  ">
            <div id="welcome-form" class="lg:sticky lg:top-8 mx-4 lg:mx-8 xl:mx-12">
                <?php include "./integration_welcome/integration.php";
                $include_result = 'YES';
                $params = array(
                    'type' => 'demande-documentation',
                    'domaine' => 'www.heip.fr',
                    'nb_colonnes' => 1,
                    'couleur_1' => '',
                    'couleur_2' => ''
                );
                formulaire_demande_entrante($params) ?>
            </div>
        </div>
        <div class="right grid lg:w-1/2">
            <section class="mt-10 mx-4 lg:mx-8 xl:mx-12">
                <h3 class="title-second">
                    OMNES Education vous propose deux options pour votre
                    rentrée :
                </h3>
                <div class="flex gap-2 mb-6">
                    <span class="number">1.</span>
                    <p class="text-justify">
                        Intégrer, en
                        <b>rentrée décalée dès Février 2023</b>, les
                        meilleurs formations et programmes adaptés à votre
                        profil, sans perdre une année !
                    </p>
                </div>
                <div class="flex gap-2 mb-6">
                    <span class="number">2.</span>
                    <p class="text-justify">
                        Suivre un cursus simple en accédant à nos meilleures
                        formations <b>dès Septembre 2023.</b>
                    </p>
                </div>
                <img src="./images/promotion-header.jpeg" alt="étudiante diplomée" class="rounded-2xl mb-16" />
            </section>
            <section class="mx-4 lg:mx-8 xl:mx-12">
                <h2 class="title-first">
                    Vous envisagez d’étudier en Europe ?
                </h2>
                <p class="mb-6">
                    OMNES Education vous accompagne dans votre projet
                    d’études en Europe. <br />
                    Du Bachelor au MBA et Masters, nous formons les
                    professionnels de demain grâce à nos 50 programmes et
                    formations certifiées.
                </p>
                <h3 class="title-second">Votre inscription en 4 étapes</h3>
                <div class="text-center flex flex-col gap-12 items-center xl:grid xl:grid-cols-2 xl:gap-6">
                    <div class="card">
                        <img src="./images/cards/img-card-1.jpg" alt="étudiant en train de remplir un formulaire" class="w-24" />
                        <h4 class="font-semibold">
                            1. Candidature en ligne
                        </h4>
                        <p>Complétez votre dossier en ligne</p>
                    </div>
                    <div class="card">
                        <img src="./images/cards/img-card-2.jpg" alt="étudiant en train de remplir un formulaire" />
                        <h4 class="font-semibold">2. Admissibilité</h4>
                        <p>Étude de votre dossier par notre jury</p>
                    </div>
                    <div class="card xl:mb-16">
                        <img src="./images/cards/img-card-3.jpg" alt="étudiant en train de remplir un formulaire" />
                        <h4 class="font-semibold">3. Admission</h4>
                        <p>Entretien finale et inscription</p>
                    </div>
                    <div class="card xl:mb-16">
                        <img src="./images/cards/img-card-4.jpg" alt="étudiant en train de remplir un formulaire" />
                        <h4 class="font-semibold">4. Inscription</h4>
                        <p>Validation finale et inscription</p>
                    </div>
                </div>
                <div class="flex justify-center mt-10 mb-20 xl:hidden">
                    <button class="button-full mx-auto">
                        Demande de rappel
                    </button>
                </div>
            </section>
            <section class="bg-[#F2F4FA] px-4 pt-12 lg:w-full">
                <h2 class="title-first text-center">
                    Processus d’admission
                </h2>
                <p class="text-center mx-8 my-8">
                    Vous pouvez postuler directement en ligne dans l’un de
                    nos 17 campus parmi nos 7 spécialisations
                </p>
                <div class="grid grid-cols-2 text-white font-semibold gap-4 lg:grid-cols-3 xl:grid-cols-4">
                    <div style="
                                background-image: url('./images/ecole-france/management.jpeg');
                                background-size: cover;
                            " class="h-28 rounded-md shadow-lg">
                        <div class="spe">
                            <p class="opacity-100 my-auto text-lg uppercase">
                                management
                            </p>
                        </div>
                    </div>
                    <div style="
                                background-image: url('./images/ecole-france/scienceinge.jpeg');
                                background-size: cover;
                            " class="h-28 rounded-md shadow-lg">
                        <div class="spe">
                            <p class="opacity-100 my-auto text-lg uppercase">
                                Sciences de l’Ingénieur
                            </p>
                        </div>
                    </div>
                    <div style="
                                background-image: url('./images/ecole-france/sciencespo.jpeg');
                                background-size: cover;
                            " class="h-28 rounded-md shadow-lg">
                        <div class="spe">
                            <p class="opacity-100 my-auto text-lg uppercase">
                                Sciences Politiques
                            </p>
                        </div>
                    </div>
                    <div style="
                                background-image: url('./images/ecole-france/sport.jpeg');
                                background-size: cover;
                            " class="h-28 rounded-md shadow-lg">
                        <div class="spe">
                            <p class="opacity-100 my-auto text-lg uppercase">
                                Sport
                            </p>
                        </div>
                    </div>
                    <div style="
                                background-image: url('./images/ecole-france/luxe.jpeg');
                                background-size: cover;
                            " class="h-28 rounded-md shadow-lg">
                        <div class="spe">
                            <p class="opacity-100 my-auto text-lg uppercase">
                                Luxe
                            </p>
                        </div>
                    </div>
                    <div style="
                                background: url('./images/ecole-france/digital-creation.jpeg')
                                    no-repeat top -10px center;
                                background-size: cover;
                            " class="h-28 rounded-md shadow-lg">
                        <div class="spe">
                            <p class="opacity-100 my-auto text-lg uppercase">
                                Digital & Creation
                            </p>
                        </div>
                    </div>
                    <div style="
                                background-image: url('./images/ecole-france/vins.jpeg');
                                background-size: cover;
                            " class="h-28 rounded-md shadow-lg">
                        <div class="spe">
                            <p class="opacity-100 my-auto text-lg uppercase">
                                Vins & Spiritueux
                            </p>
                        </div>
                    </div>
                </div>
                <div class="xl:flex xl:justify-between">
                    <div class="flex flex-col items-center gap-6 mt-8">
                        <button class="button-full">
                            candidature en ligne
                        </button>
                        <button class="button-empty xl:hidden">Demande de rappel</button>
                    </div>
                    <img src="./images/svg/Group 43.svg" alt="groupe d'étudiants ayant leur diplome" class="mx-auto mt-12" />
                </div>
            </section>
            <section class="mx-4 lg:mx-8 xl:mx-12 pt-12">
                <h2 class="title-first text-center mb-24">
                    Nos écoles en France
                </h2>
                <div class="flex flex-col items-center gap-24 xl:grid xl:grid-cols-2">
                    <div class="school xl:h-80">
                        <div class="bg-[#01235A]">
                            <img src="./images/svg/esce.svg" alt="ESCE" />
                        </div>
                        <h4>ESCE</h4>
                        <p>
                            Pédagogie inventive et approche multiculturelle,
                            cette école est idéale pour les profits
                            internationaux, curieux, souples et ouverts.
                        </p>
                    </div>
                    <div class="school xl:h-80">
                        <div class="bg-[#002D72]">
                            <img src="./images/svg/inseec.svg" alt="INSEEC" />
                        </div>
                        <h4>INSEEC</h4>
                        <p>
                            L’école de commerce spécialisée dans le
                            management propose un parcours
                            professionnalisant sur mesure avec une
                            spécialisation progressive.
                        </p>
                    </div>
                    <div class="school xl:h-80">
                        <div class="bg-[#007179]">
                            <img src="./images/svg/ece.svg" alt="ECE" />
                        </div>
                        <h4>ECE</h4>
                        <p>
                            Pédagogie formant les ingénieurs et les experts
                            généralistes et high-tech de demain avec de
                            solides bases scientifiques tout en sachant
                            appréhender les réalités économiques des
                            entreprises et organisations.
                        </p>
                    </div>
                    <div class="school xl:h-80">
                        <div class="bg-[#E52412]">
                            <img src="./images/svg/heip.svg" alt="HEIP" />
                        </div>
                        <h4>HEIP</h4>
                        <p>
                            Offre aux étudiants un cursus qui combine
                            formation fondamentale et une grande proximité
                            avec le monde professionnel. L’école a gardé en
                            cursus diversifié, intégrant des programmes
                            issus de trois domaines de prédilection : les
                            sciences internationales et la communication
                            politique.
                        </p>
                    </div>
                    <div class="school xl:h-80">
                        <div class="bg-[#E2211C]">
                            <img src="./images/svg/ium.svg" alt="IUM" />
                        </div>
                        <h4>IUM</h4>
                        <p>
                            Une école qui est principalement sur des
                            domaines d’expertise étroitement associés à
                            Monaco : la gestion des activités de services à
                            haute valeur ajoutée, notamment dans les
                            secteurs du luxe et de la finance.
                        </p>
                    </div>
                    <div class="school xl:h-80">
                        <div class="bg-[#EE7203]">
                            <img src="./images/svg/sup-de-pub.svg" alt="Sup de Pub" />
                        </div>
                        <h4>Sup de Pub</h4>
                        <p>
                            Place l’innovation et immersion sont au coeur de
                            la pédagogie à Sup de Pub en créant des modules
                            adaptés et originaux, en phase avec l’actualité
                            et la réalité professionnelle.
                        </p>
                    </div>
                </div>
                <div class="flex flex-col items-center gap-6 my-10">
                    <button class="button-full">candidater</button>
                    <button class="button-empty xl:hidden">Demande de rappel</button>
                </div>
            </section>
            <section class="bg-[#F2F4FA] px-4">
                <h2 class="title-first py-8 text-center">
                    Nos campus en France
                </h2>
                <div class="flex flex-col items-center gap-12 lg:grid lg:grid-cols-2 xl:grid-cols-3 lg:gap-6">
                    <div>
                        <img src="./images/campus france/paris.jpg" alt="campus paris" />
                    </div>
                    <div>
                        <img src="./images/campus france/lyon.jpg" alt="campus paris" />
                    </div>
                    <div>
                        <img src="./images/campus france/bordeaux.jpg" alt="campus paris" />
                    </div>
                    <div>
                        <img src="./images/campus france/rennes.jpg" alt="campus paris" />
                    </div>
                    <div>
                        <img src="./images/campus france/chambery.jpg" alt="campus paris" />
                    </div>
                    <div>
                        <img src="./images/campus france/monaco.jpg" alt="campus paris" />
                    </div>
                </div>
                <div class="flex flex-col items-center gap-6 pt-10 pb-14">
                    <button class="button-full">candidature</button>
                    <button class="button-empty xl:hidden">Demande de rappel</button>
                </div>
            </section>
        </div>
    </main>
    <footer ">
            <section class=" bg-[#203E55] pt-12 text-white text-center">
        <div class="text-center font-bold lg:flex lg:justify-evenly lg:items-start">
            <div class="my-12 lg:my-8">
                <p class="text-6xl">13</p>
                <p class="text-xl">ÉCOLES</p>
            </div>
            <div class="my-12 lg:my-8">
                <p class="text-6xl">40 000</p>
                <p class="text-xl">ÉTUDIANTS</p>
            </div>
            <div class="my-12 lg:my-8">
                <p class="text-6xl">19</p>
                <p class="text-xl">CAMPUS</p>
            </div>
            <div class="my-12 lg:my-8">
                <p class="text-6xl">180 000</p>
                <p class="text-xl">ALUMNI</p>
            </div>
        </div>
        <p class="text-xl">en France et à l’étranger</p>
        <hr class="w-1/4 mx-auto border-2 my-8" />
        <p class="font-light my-8">BESOIN DE PLUS D'INFORMATIONS ?</p>
        <button class="button-empty mb-12">Demande de rappel</button>
        </section>
        <section class="bg-[#203E55] opacity-95 text-center text-white px-4">
            <div class="flex items-center justify-center gap-2 scale-150 max-w-[400px] m-auto py-8">
                <img src="./images/favicon.ico" alt="logo-omnes" class="inline w-7" />
                <h1 class="leading-3">
                    <span class="font-gotham font-bold text-lg">OMNES</span>
                    <span class="block font-gotham font-semibold tracking-widest text-[8px] -mt-1 spacing education">EDUCATION</span>
                </h1>
            </div>
            <p class="max-w-[800px] m-auto">
                OMNES Education est une institution privée d’enseignement
                supérieur et de recherche interdisciplinaire, implantée à Paris,
                Lyon, Bordeaux, Rennes, Chambéry et Beaune. Avec ses campus à
                Londres, Monaco, Genève, San Francisco, Munich, Barcelone,
                Abidjan et Lausanne, OMNES Education occupe une place unique
                dans le paysage éducatif français. Nous sommes le leader de
                l’enseignement supérieur privé.
            </p>
            <div class="grid grid-cols-2 mt-12 gap-8 text-xs lg:flex lg:justify-center lg:gap-16 ">
                <div class="flex flex-col items-center gap-4 lg:w-32 ">
                    <img src="./images/logo-white.svg" alt="logo-omnes" class="w-10" />
                    <p>Management</p>
                </div>
                <div class="flex flex-col items-center gap-4 lg:w-32">
                    <img src="./images/logo-white.svg" alt="logo-omnes" class="w-10" />
                    <p>Ingénieurs</p>
                </div>
                <div class="flex flex-col items-center gap-4 lg:w-32 ">
                    <img src="./images/logo-white.svg" alt="logo-omnes" class="w-10 lg:h20" />
                    <p class="">Communication, Création, Digital et Design</p>
                </div>
                <div class="flex flex-col items-center gap-4 lg:w-32">
                    <img src="./images/logo-white.svg" alt="logo-omnes" class="w-10" />
                    <p>Sciences Politiques et Relations Internationales</p>
                </div>
                <div class="flex flex-col items-center gap-4 lg:w-32">
                    <img src="./images/logo-white.svg" alt="logo-omnes" class="w-10" />
                    <p>Luxe, Real estate, Sport, Vins & Spiritueux</p>
                </div>
            </div>
            <hr class="w-10/12 lg:max-w-[800px] lg:w-full  mx-auto my-16" />
            <div class="flex justify-center items-center gap-8 h-8 pb-8 rsosocio">
                <img src="./images/facebook.png" alt="facebook" />
                <img src="./images/twitter.png" alt="twitter" />
                <img src="./images/linkedin.png" alt="linkedin" />
                <img src="./images/instagram.png" alt="instagram" />
                <img src="./images/youtube.png" alt="youtube" />
            </div>
            <div class="pb-16">
                <p class="text-xs">Copyright © 2022 OMNES Education</p>
            </div>
        </section>
    </footer>
</body>

</html>