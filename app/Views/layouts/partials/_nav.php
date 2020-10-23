<header class="bg-white">
        <nav id="nav">
            <div class="nav-center">
                <div class="nav-header">
                    <span class="font-weight-bold text-uppercase text-dark logo">Shopaholic</span>
                </div>
                <div class="links-container">
                    <ul class="links effect-brackets">
                        <li>
                            <a href="/" class="scroll-link">Home</a>
                        </li>
                        <li>
                            <a href="/shop" class="scroll-link">Shop</a>
                        </li>
                        <li>
                            <a href="/contact" class="scroll-link">Contact</a>
                        </li>
                        <li>
                            <a href="#pages" class="scroll-link">Pages</a>
                            <div hidden>
                                <a href="blog.html">Blog</a>
                                <a href="about.html">About</a>
                                <a href="services.html">Services</a>
                                <a href="help.html">Help</a>
                                <a href="faq.html">FAQs</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-tool effect-ease">
                    <li>
                        <a class="cart-toggle" href="#"> <i class="fas fa-dolly-flatbed text-gray"></i>(<small class="text-gray count-items">0</small>)</a>
                    </li>
                    <li>
                        <a class="" href="#"> <i class="far fa-heart"></i><small class="text-gray"> (0)</small></a>
                    </li>
                    <?php if (Helper::isGuest()) :?>
                    <li>
                        <a class="" href="/sign"> <i class="fas fa-user-alt text-gray"></i></a>
                    </li>
                    <?php else :?>
                        <li class="navbar__item user"><a href="/profile" title="User Profile"><i class="fas fa-address-card"></i></a></li>
                        <li class="navbar__item user"><a href="/logout" title="Sign Out"><i class="fas fa-sign-out-alt"></i></a></li>
                    <?php endif;?>

                </ul>
                <button class="nav-toggle">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </nav>
    </header>