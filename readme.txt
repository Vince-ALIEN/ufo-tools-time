=== Ufo Tools Time ===
Contributors: ufoagency
Tags: gutenberg, block, tailwind
Requires at least: 6.6
Tested up to: 6.8
Requires PHP: 7.4
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Un élément <time> stylisé avec point décoratif et séparateur.

== Description ==

Bloc `ufo-blocks/ufo-time` extrait du plugin Ufo Blocks (jusqu'à la version 1.8.0). Le nom du bloc et ses attributs sont inchangés : les contenus existants restent valides.

Attributs `datetime` (format ISO) et `text`. Couleur et taille de texte réglables dans l'éditeur ; le style gris discret par défaut s'efface dès qu'elles sont choisies.

Le bloc apparaît dans la catégorie « UFO Blocks » de l'éditeur, que Ufo Blocks soit installé ou non.

= Tailwind CSS v4 =

Le plugin ne livre aucune CSS front. Il s'appuie sur un thème Tailwind CSS v4, qui doit scanner ses sources. Dans le fichier CSS d'entrée du thème :

`@source "../../../plugins/ufo-tools-time/src/**/*.{js,php}";`

== Installation ==

Depuis une release : télécharger `ufo-tools-time.zip` depuis la [dernière release](https://github.com/Vince-ALIEN/ufo-tools-time/releases/latest) et l'envoyer dans **Extensions → Ajouter → Téléverser une extension**. Installé ainsi, le plugin se met ensuite à jour depuis les releases GitHub comme n'importe quelle extension (pas sur une copie git, pour ne jamais écraser une copie de travail).

Depuis les sources :

1. Copier le dossier `ufo-tools-time` dans `wp-content/plugins/`.
2. `npm install && npm run build` (ou installer le zip produit par `npm run plugin-zip`).
3. Activer **Ufo Tools Time**.

== Publier une release ==

Mettre à jour `Version` dans le fichier principal, `Stable tag`, `package.json` et le changelog ci-dessous, commiter, puis pousser le tag correspondant (`git tag v1.0.1 && git push origin v1.0.1`). Le workflow `Release` construit le zip et l'attache à la release GitHub.

== Changelog ==

= 1.0.0 =
* Bloc `ufo-time` sorti d'Ufo Blocks 1.8.0 dans son propre plugin, sans changement de rendu.
* Mises à jour depuis les releases GitHub.
