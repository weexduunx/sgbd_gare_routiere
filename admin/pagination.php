<?php
    echo "<ul class=\"pagination margin-zero\">";
    
    // bouton pour la première page
    if($page>1){
        echo "<button class=' mdc-button mdc-button--unelevated  mdc-ripple-upgraded'>
             <i class='material-icons mdc-button__icon'>chevron_left</i>
            <a href='{$page_url}' title='Aller à la première page.' class='testPers'>";
            echo "Premiére page";
        echo "</a></button>";
    }
    
    // Calculer le nombre total de pages
    $total_pages = ceil($total_rows / $records_per_page);
    
    // gamme de liens à montrer
    $range = 2;
    
    // Afficher les liens vers 'gamme de pages' autour de 'Page actuelle'
    $initial_num = $page - $range;
    $condition_limit_num = ($page + $range)  + 1;
    
    for ($x=$initial_num; $x<$condition_limit_num; $x++) {
    
        // Assurez-vous que $x est supérieur à 0 'et' inférieur ou égal au $total_pages '
        if (($x > 0) && ($x <= $total_pages)) {
    
            // page actuelle
            if ($x == $page) {
               echo "
               <a href=\"#\" class='active mdc-button mdc-button--unelevated mdc-ripple-upgraded'> 
                <span class=\"sr-only\"> page en cours
               </span>
               </a>
               ";
            } 
    
            // PAGE NON COURANT
            else {
                echo "<a href='{$page_url}page=$x'>Page $x</a>";
            }
        }
    }
    
    // Bouton pour la dernière page
    if($page<$total_pages){
        echo "<button class='mdc-button mdc-button--raised icon-button mdc-ripple-upgraded'>
            <i class='material-icons mdc-button__icon'>chevron_right</i>
            <a href='" .$page_url . "page={$total_pages}' title='Dernière page est {$total_pages}.'>";
            echo "Dernière page";
        echo "</a></button>";
    }
    
    echo "</ul>";
?>