# Thème Astra

## Modifications effectuées
- **Footer personnalisé** :  
  Création d’un footer sur mesure via la fonction `astra_child_footer()` avec trois colonnes :  
  - About  
  - Links  
  - Follow Us  

- **Logo personnalisé** :  
  Remplacement du logo par une image externe via le filtre `astra_logo`.

- **Menu principal modifié** :  
  Utilisation du filtre `wp_nav_menu_objects` pour :  
  - Supprimer les items de menu contenant `reviews`, `review`, `about` ou `about us`.  
  - Renommer le menu `Why Us` en `Why Me`.

- **Ajout d’un bouton “Services”** :  
  Dans le contenu des articles, après la mention `results.`, insertion d’un bouton rouge cliquable vers la page `/services` via le filtre `the_content`.

- **Styles CSS personnalisés** :  
  - Footer sombre avec texte clair et mise en page en grille.  
  - Bouton personnalisé `.custom-btn` avec hover effect.  
  - Sections “why” avec padding et grille responsive.


## Hooks et templates utilisés
- `add_filter('astra_logo', …)` → pour modifier le logo du site.  
- `add_filter('wp_nav_menu_objects', …)` → pour personnaliser le menu principal.  
- `add_filter('the_content', …)` → pour injecter un bouton dans le contenu.  
- Fonction `astra_child_footer()` → pour afficher le footer personnalisé.


