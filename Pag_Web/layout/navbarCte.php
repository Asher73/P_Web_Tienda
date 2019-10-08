    <nav>
        <div class="nav-wrapper black">
            <ul class="right hide-on-med-and-down">
                <li><a href="index.php"> <i class="fas fa-home"></i> Inicio </a></li>
                <li><a> <i class="fas fa-phone-square"></i> Contacto </a></li>
                <?php if(!isset($_SESSION["rol"])){
                    echo'<li><a href="login.php"><i class="fas fa-sign-in-alt"></i> Login  </a></li>';
                } 
                else{
                    echo'<li><a href="carrito.php"><i class="fas fa-cart-arrow-down"></i><span class="totalP new badge blue" data-badge-caption="">';
                    include("totalProductos.php");
                    echo'</span></a></li>';
                    echo'<li><a href="salir.php"><i class="fas fa-sign-out-alt"></i> Logout  </a></li>';
                }
                ?>
            </ul>
        </div>
    </nav>
