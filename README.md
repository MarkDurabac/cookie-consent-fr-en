# Script - Bannière de consentement pour les cookies | bilingue (fr-en)

Ce code, compatible avec FuelCMS et d'autres frameworks CodeIgniter, retarde le chargement des scripts qui gèrent les cookies jusqu'à ce que l'utilisateur donne son accord explicite pour l'utilisation des cookies.

Vous devez d'abord retirer les scripts de suivi (cookies) tels que Google Analytics, Google Ads, etc. Ces scripts sont généralement situés dans votre balise <header> ou <footer>.

Ensuite, saisissez la liste des scripts dans le fichier "cookie-consent-fr" aux emplacements appropriés indiqués.

Après cela, avant la balise </body> de votre ou de vos layouts principaux (qui sont utilisés sur toutes vos pages), veuillez intégrer le code suivant :

<?php $this->load->view('cookie_banner'); ?>

Cette étape permettra de bloquer de manière sécurisée les scripts de suivi tant que l'utilisateur n'a pas donné son consentement.

Si l'utilisateur accepte les cookies, les scripts seront alors chargés de manière dynamique.
