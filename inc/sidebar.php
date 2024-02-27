    <body id="body-pd">
        <header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i></div>
            <div class="">
                <nav class="navbar navbar-expand-lg navbar-light bg-light  ">
                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav me-auto mb-2">
                            <li class="nav-item ">
                                <a class="nav-link " aria-current="page" href="http://localhost/nvappe/frmentrer/formulaire.php">Entrer</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="http://localhost/nvappe/AfficherEntrer/afficherFE.php">Afficher Entrer</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="http://localhost/nvappe/afficheSortir/afficheSortir.php">Afficher Sortir</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="http://localhost/nvappe/produits/liste_produit.php">Produits</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="http://localhost/nvappe/EtatPlace/EtatPlace.php">Place</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="http://localhost/nvappe/clients/afficheCLients.php">Place</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                
            </div>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div> <a href="#" class="nav_logo"> <i class='bx bxs-store icon'></i>
                        <h2 class="nav_logo-name">G-Stock</h2>
                    </a>
                    <div class="nav_list">
                        <a href="http://localhost/nvappe/index.php" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i><span class="nav_name">Dashboard</span></a>
                        <a class="nav_link " href="http://localhost/nvappe/frmentrer/formulaire.php"><i class='bx bxs-door-open nav_icon'></i> <span class="nav_name">Entrer </span></a>
                        <a class="nav_link " href="http://localhost/nvappe/AfficherEntrer/afficherFE.php"><i class='bx bx-store-alt nav_icon'></i><span class="nav_name">Afficher Entrer</span></a>
                        <a class="nav_link " href="http://localhost/nvappe/afficheSortir/afficheSortir.php"><i class='bx bxs-log-out-circle nav_icon'></i><span class="nav_name">Afficher Sortir</span></a>
                        <a class="nav_link " href="http://localhost/nvappe/produits/liste_produit.php"><i class='bx bxs-cart nav_icon'></i><span class="nav_name">Produits</span></a>
                        <a href="http://localhost/nvappe/clients/afficheCLients.php" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Clients</span> </a>
                        <a href="http://localhost/nvappe/EtatPlace/EtatPlace.php" class="nav_link"><i class='bx bxs-location-plus nav_icon'></i> <span class="nav_name">Place</span> </a>
                    </div>
                </div> <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
            </nav>
        </div>

        <!-- Vos scripts JavaScript -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const currentUrl = window.location.href; // Obtenez l'URL complète de la page actuelle
                const navLinks = document.querySelectorAll(".nav_link");

                // Retirez la classe "active" de tous les liens de navigation
                navLinks.forEach(link => {
                    link.classList.remove("active");
                });

                // Ajoutez la classe "active" au lien correspondant à la page actuelle
                navLinks.forEach(link => {
                    // Vérifiez si l'URL du lien correspond à l'URL de la page actuelle
                    if (link.href === currentUrl) {
                        link.classList.add("active");
                        // Si le lien est dans un sous-menu, ajoutez également la classe "active" à son parent pour afficher le sous-menu correctement
                        let parent = link.parentElement;
                        while (parent) {
                            if (parent.classList.contains("nav_list")) {
                                parent.parentElement.querySelector(".nav_link")
                                break;
                            }
                            parent = parent.parentElement;
                        }
                    }
                });
            });
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function(event) {
                const showNavbar = (toggleId, navId, bodyId, headerId) => {
                    const toggle = document.getElementById(toggleId),
                        nav = document.getElementById(navId),
                        bodypd = document.getElementById(bodyId),
                        headerpd = document.getElementById(headerId);

                    // Validate that all variables exist
                    if (toggle && nav && bodypd && headerpd) {
                        toggle.addEventListener("click", () => {
                            // show navbar
                            nav.classList.toggle("show");
                            // change icon
                            toggle.classList.toggle("bx-x");
                            // add padding to body
                            bodypd.classList.toggle("body-pd");
                            // add padding to header
                            headerpd.classList.toggle("body-pd");
                        });
                    }
                };

                showNavbar("header-toggle", "nav-bar", "body-pd", "header");
            });
        </script>