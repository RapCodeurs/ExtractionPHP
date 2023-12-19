<?php

// Utilisation des fonctions preg_replace() et preg_filter();


$texte = "J'ai beaucoup de travail.";
$recherche = "%(beau)(coup)%"; # on définit 2 sous-masques
$remplace = "peu";
$resultat = preg_replace($recherche,$remplace,$texte); # on effectue le remplacement
print_r($resultat); # on affiche le résultat
# Affiche : J'ai peu de travail.
echo "\n";
$remplace = "$2$1"; # on fait référence aux sous-masques
$resultat = preg_replace($recherche,$remplace,$texte); # on effectue le remplacement
print_r($resultat); # on affiche le résultat
# Affiche : J'ai coupbeau de travail.
echo "\n";
# on définit un tableau de textes
$texte = [
    "J'ai beaucoup de travail.",
    "J'ai beaucoup de vacances.",
    "J'ai beaucoup d'amis.",
    "J'ai peu de travail.",
    "J'ai peu de vacances.",
    "J'ai peu d'amis.",
];
# on définit un tableau de masques de recherche
$recherche = [
    "/vacances/",
    "/(beaucoup)/"
];
# on définit un tableau de chaînes de remplacement
$remplace = [
    "jours de congés",
    "vraiment $1"
];
# donc "vacances" sera remplacé par "jours de congés"
# et "beaucoup" sera remplacé par "vraiment beaucoup"
$resultat = preg_replace($recherche,$remplace,$texte,-1,$compteur); # on utilise un compteur
echo $compteur," remplacements effectués\n";
print_r($resultat); # on affiche le résultat
/* Affiche :
5 remplacements effectués
Array
(
    [0] => J'ai vraiment beaucoup de travail.
    [1] => J'ai vraiment beaucoup de jours de congés.
    [2] => J'ai vraiment beaucoup d'amis.
    [3] => J'ai peu de travail.
    [4] => J'ai peu de jours de congés.
    [5] => J'ai peu d'amis.
)
*/
# "filter" ne retourne que les extraits remplacés :
$resultat = preg_filter($recherche,$remplace,$texte); # on effectue le remplacement
print_r($resultat); # on affiche le résultat
/* Affiche :
Array
(
    [0] => J'ai vraiment beaucoup de travail.
    [1] => J'ai vraiment beaucoup de jours de congés.
    [2] => J'ai vraiment beaucoup d'amis.
    [4] => J'ai peu de jours de congés.
)
*/
?>