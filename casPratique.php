<?php
// Exercice 

$fichier = ["01.23.45.56.78, MARTIN, PIERRE",
            "02.56.32.41.87, DURAND, MATHILDE",
            "03.23.98.87.54, LOTARD, HENRI",
            "04.32.45.65.10, GEAI, JACQUES",
            "+333.21.65.98.01, JOYEUX, JEAN-PIERRE",
            "01.65.87.41.20, TOULIN, MARIE",
            "03.58.56.21.02, DE BIEN, NOEMIE"];


/*

Explication

Tout d’abord, il convient de percevoir qu’il s’agit d’une conversion de format. 
Donc nous allons faire des remplacements. 
Pour cela, nous pourrions utiliser la fonction preg_replace(). 
Cependant, nous ne devons pas traiter l’intégralité du fichier, mais uniquement les numéros de la zone Nord. C’est pourquoi nous utiliserons la fonction preg_filter(). 
Ensuite, les données du fichier d’origine sont utilisées pour créer le nouveau fichier (qui correspond au format de votre entreprise). 
Par conséquent, il sera nécessaire d’utiliser des sous masques, à l’aide des parenthèses, et d’utiliser les variables correspondantes dans la chaîne de remplacement ($1, $2, $3, etc.). 
Après quoi, les numéros commençant parfois par « 0 » et parfois par « + 33 », il convient d’indiquer une alternative au début du masque avec la barre droite “|”. Enfin, les méta-caractères, comme le “.” ou le « + », doivent être échappés avec l’antislash “\” pour correspondre littéralement.

*/

// on recherche le masque
$recherche = "/(0|\+33)3\.(\d{2})\.(\d{2})\.(\d{2})\.(\d{2}), (.*?), (.*)/";

// on definit les remplacements
$remplace = "$6\t$7\t+333 $2 $3 $4 $5";

//On filtre les résultats
$resultat = preg_filter($recherche,$remplace,$fichier);


?>