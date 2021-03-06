<?php
/** 
 * Contient la division pour le sommaire, sujet à des variations suivant la 
 * connexion ou non d'un utilisateur, et dans l'avenir, suivant le type de cet utilisateur 
 * @todo  RAS
 */

?>
    <!-- Division pour le sommaire -->
    <div id="menuGauche">
     <div id="infosUtil">
    <?php      
      if (estVisiteurConnecte() ) {
          $idUser = obtenirIdUserConnecte() ;
          $lgUser = obtenirDetailVisiteur($idConnexion, $idUser);
          $nom = $lgUser['nom'];
          $prenom = $lgUser['prenom'];            
    ?>
        <h2>
    <?php  
            echo $nom . " " . $prenom ;
    ?>
        </h2>
        <h3>Visiteur médical</h3>        
    <?php
       }
    ?>  
      </div>  
<?php      
  if (estVisiteurConnecte() ) {
?>
        <ul id="menuList">
           <li class="smenu">
              <a href="cAccueil.php" title="Page d'accueil">Accueil</a>
           </li>
           <li class="smenu">
              <a href="cSeDeconnecter.php" title="Se déconnecter">Se déconnecter</a>
           </li>
           <li class="smenu">
              <a href="cSaisieFicheFrais.php" title="Saisie fiche de frais du mois courant">Saisie fiche de frais</a>
           </li>
           <li class="smenu">
              <a href="cConsultFichesFrais.php" title="Consultation de mes fiches de frais">Mes fiches de frais</a>
            <?php
              if($_SESSION["role"]==2){
            ?>
             <li class="smenu">
              <a href="cSaisieMedicamentDistribuer.php" title="Consultation des medicaments distribués">Mes distributions</a>
           </li>
            <li class="smenu">
              <a href="cConsultStock.php" title="Consultation des stocks">Consultation stock</a>
           </li>
            <?php
              }
            ?>
          
		      
           <?php
              if($_SESSION["role"]==1){
            ?>
            <li class="smenu">
              <a href="cSaisieMedicamentDistribuer.php" title="Gestion du stock">Gestion du stock général</a>
           </li>
           <li class="smenu">
              <a href="cSaisieMedicamentDistribuer.php" title="Messagerie">Alertes</a>
           </li>
            <?php
              }
            ?>
             <?php
              if($_SESSION["role"]==0){
            ?>
             <li class="smenu">
              <a href="cConsultStock.php" title="Consultation des stocks">Consultation stock</a>
           </li>
             <li class="menu">
              <a href="cRetraitEchantillonVisiteur.php" title="Retrait d'un échantillon pour un visiteur">Retrait d'un échantillon</a>
           </li>
             <li class="smenu">
              <a href="cSaisieMedicamentDistribuer.php" title="Consultation des medicaments distribués">Mes distributions</a>
           </li>
         
            <?php
              }
            ?>

         </ul>
        <?php
          // affichage des éventuelles erreurs déjà détectées
          if ( nbErreurs($tabErreurs) > 0 ) {
              echo toStringErreurs($tabErreurs) ;
          }
  }
        ?>
    </div>
    