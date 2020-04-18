<nav class="navbar navbar-expand-md bg-dark sticky-top navbar-dark">
    <a class="navbar-brand" href="img/logoeECE.svg">
        <img src="img/logoeECE.png" alt="LogoeECE" style="width:120px; height:120px; margin-bottom:-30px;margin-top:-30px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="main-navigation">
        <ul class="navbar-nav">

            <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a> </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="catalogue.php" data-toggle="dropdown">Catalogue</a>
                <ul class="navbar-nav">
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="catalogue"> Toutes catégories</a>
                        <a class="dropdown-item" href="ferailletresor.php"> Feraille ou Trésor</a>
                        <a class="dropdown-item" href="musee.php"> Bon pour le musée</a>
                        <a class="dropdown-item" href="vip.php"> Accessoires VIP</a>
                    </div>
                </ul>
            </li>


            <?php
            if (isset($_SESSION['coAcheteur']) OR isset($_SESSION['coVendeur']) OR isset($_SESSION['coAdmin'])){
                if (isset($_SESSION['coAcheteur'])) {
                    if ($_SESSION['coAcheteur'] != '') {
                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="acheter.php" data-toggle="dropdown">Acheter</a>
                            <ul class="navbar-nav">
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="achatimm.php">Acheter-le maintenant</a>
                                    <a class="dropdown-item" href="meilleuroffre.php">Meilleure offre</a>
                                    <a class="dropdown-item" href="enchere.php">Enchères</a>
                                </div>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="compteacheteur.php" data-toggle="dropdown">Mon Compte Acheteur</a>
                            <ul class="navbar-nav">
                            <div class="dropdown-menu">
                                    <a class="dropdown-item" href="compteacheteur.php">Compte</a>
                            </div>
                            </ul>
                        </li>
                        <?php
                    }
                }
                    
                if (isset($_SESSION['coVendeur'])) {
                    if ($_SESSION['coVendeur'] != '') {
                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="vendre.php" data-toggle="dropdown">Vendre</a>
                            <ul class="navbar-nav">
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="vendre.php">Items en ventes</a>
                                    <a class="dropdown-item" href="ajouterobjet.php">Ajouter un objet</a>
                                    <a class="dropdown-item" href="vendre.php">Voir mes meilleures offres</a>
            
                                </div>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="vendre.php" data-toggle="dropdown">Mon Compte Vendeur</a>
                            <ul class="navbar-nav">
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="vendre.php">Ventes recentes</a>
                                </div>
                            </ul>
                        </li>
                        <?php
                    }
                }
                if (isset($_SESSION['coAdmin'])) {
                    if ($_SESSION['coAdmin'] != '') {
                         ?>
                         <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="admin.php" data-toggle="dropdown">Gestion des vendeurs</a>
                            <ul class="navbar-nav">
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="ajoutervendeur.php">Ajouter un vendeur</a>
                                    <a class="dropdown-item" href="supprimervendeur.php">Supprimer un vendeur</a>
                                </div>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="admin.php" data-toggle="dropdown">Gestions des items</a>
                            <ul class="navbar-nav">
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="ajouterobjet.php">Ajouter un item</a>
                                    <a class="dropdown-item" href="supprimerobjet.php">Supprimer un item</a>
                                </div>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="admin.php" data-toggle="dropdown">Mon Compte Admin</a>
                            <ul class="navbar-nav">
                                <div class="dropdown-menu">
                                    <!-- <a class="dropdown-item" href="admin.php">Dernieres modifications</a> -->
                                </div>
                            </ul>
                        </li>
                        <?php
                    }
                }
                        ?>

            <li class="nav-item"><a class="nav-link" href="deconnexion.php">Se deconnecter</a> </li>

            <?php
            }

            else{
                ?>
                <li class="nav-item"><a class="nav-link" href="connexion.php">Se connecter</a> </li>
                <?php
                }
                ?>
        </div>
    </nav>