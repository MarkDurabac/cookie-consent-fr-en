# Script - bannière de consentement de cookies bilingue (fr-en)

Ce code, qui foncitonne sous FuelCMS et autres Framework en Codeigniter, empêche le chargement des scripts responsables de la mise en place des cookies jusqu'à ce que l'utilisateur accepte explicitement les cookies. 

Seulement besoin de retirer les scripts de suivi (cookies) comme Google Analytics, Google Ads, etc. Ils se trouvent à l'intérieur de votre <header> ou dans votre <footer>. 

Ensuite, entrer la liste de scripts dans le fichier cookie-consent-fr aux bons endroits indiqués. 

Puis, avant la balise </body> dans vos ou votre layout principal (qui affecte tous vos pages), veuillez intégrer ce code :

<?php $this->load->view('cookie_banner'); ?>

Ceci permettra de bloquer sécuritaire les scripts de traçage, s'il n'y a pas consentement de l'utilisateur. 

Si l'utilisateur accepte les cookies, les scripts seront chargés dynamiquement.
