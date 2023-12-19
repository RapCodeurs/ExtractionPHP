<?php

// Utilisation de la fonction preg_match() et preg_match_all();

# on définit un texte en HTML :
$texte = "<h1>Titre</h1>
        <p>Un premier paragraphe</p>
        <p>Un deuxième paragraphe</p>"
        ;
# on définit un masque en utilisant le délimiteur %
# ce masque va rechercher les balises HTML
$masque = "%<.*?>.*?</.*?>%" ;
# par défaut, * et + correspondent avec le maximum de caractères :
# on dit qu'ils sont gourmands. Dans ce cas, on ne veut pas * gourmand,
# donc on rajoute le caractère ?
# on recherche le premier extrait :
preg_match($masque,$texte,$resultat);
print_r($resultat);
/* Affiche :
Array
(
    [0] => <h1>Titre</h1>
)
*/
# on recherche tous les extraits :
preg_match_all($masque,$texte,$resultat);
print_r($resultat);
/* Affiche :
Array
(
    [0] => Array
        (
            [0] => <h1>Titre</h1>
            [1] => <p>Un premier paragraphe</p>
            [2] => <p>Un deuxième paragraphe</p>
        )
)
*/
# on recherche tous les extraits avec leur position
preg_match_all($masque,$texte,$resultat,PREG_OFFSET_CAPTURE);
print_r($resultat);
/* Affiche :
Array
(
    [0] => Array
        (
            [0] => Array
                (
                    [0] => <h1>Titre</h1>
                    [1] => 0
                )
            [1] => Array
                (
                    [0] => <p>Un premier paragraphe</p>
                    [1] => 24
                )
            [2] => Array
                (
                    [0] => <p>Un deuxième paragraphe</p>
                    [1] => 62
                )
        )
)
*/
?>