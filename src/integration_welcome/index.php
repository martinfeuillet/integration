<!DOCTYPE html>
<html lang="fr">
    <head>
    <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KK6LWHZ');</script>
    <!-- End Google Tag Manager -->
    </head>
    <body>
        <?php
    if (include('integration.php')){
        $include_result='YES';
    }else{
        $include_result='NO';
    }
    $params=array(
            'type' => 'demande-documentation',
            'domaine' => 'www.heip.fr',
            'nb_colonnes' => 2,
            'couleur_1' => '777777',
            'couleur_2' => 'f89b1c'
        );
    formulaire_demande_entrante($params);
 ?>
</body>
</html>