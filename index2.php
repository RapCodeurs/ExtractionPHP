<?php

// Utilisation de la fonction preg_split();

$texte = "Voici un texte ordinaire 
contenant des numéros de téléphone marqués par des tirets : 
01-23-45-56-78, 02-34-56-87-91, 03-21-34-65-87";
$masque1 = "/ /"; # contient uniquement le caractère d'espacement
$sortie1 = preg_split($masque1,$texte); # coupe le texte à chaque espace
// print_r($sortie1);
/* Affiche :
Array
(
    [0] => Voici
    [1] => un
    [2] => texte
    [3] => ordinaire
    [4] => contenant
    [5] => des
    [6] => numéros
    [7] => de
    [8] => téléphone
    [9] => marqués
    [10] => par
    [11] => des
    [12] => tirets
    [13] => :
    [14] => 01-23-45-56-78,
    [15] => 02-34-56-87-91,
    [16] => 03-21-34-65-87
)
*/
$masque2 = "/\R| : |, /"; # 3 coupes possibles : retour à la ligne, deux points, et virgule
$sortie2 = preg_split($masque2,$texte); # coupe le texte
print_r($sortie2);
/* Affiche :
Array
(
    [0] => Voici un texte ordinaire 
    [1] => contenant des numéros de téléphone marqués par des tirets
    [2] => 
    [3] => 01-23-45-56-78
    [4] => 02-34-56-87-91
    [5] => 03-21-34-65-87
)
*/
$masque3 = "/[^0-9]/"; # coupe tout ce qui n'est pas chiffre
$sortie3 = preg_split($masque3,$texte,-1,PREG_SPLIT_NO_EMPTY); # coupe le texte sans garder les chaînes vides
//print_r($sortie3);
/* Affiche :
Array
(
    [0] => 01
    [1] => 23
    [2] => 45
    [3] => 56
    [4] => 78
    [5] => 02
    [6] => 34
    [7] => 56
    [8] => 87
    [9] => 91
    [10] => 03
    [11] => 21
    [12] => 34
    [13] => 65
    [14] => 87
)
*/
$masque4 = "/[^-0-9]/"; # coupe tout ce qui n'est pas tiret ou chiffre
$sortie4 = preg_split($masque4,$texte,-1,PREG_SPLIT_NO_EMPTY); # coupe le texte sans garder les chaînes vides
//print_r($sortie4);
/* Affiche :
Array
(
    [0] => 01-23-45-56-78
    [1] => 02-34-56-87-91
    [2] => 03-21-34-65-87
)
*/
?>