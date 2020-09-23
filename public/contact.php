<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us</title>
    <link href="/assets/css/style.css" rel="stylesheet">

</head>

<body>
    <!-- navbar-->
    <header class="bg-white">
        <nav id="nav">
            <div class="nav-center">
                <div class="nav-header">
                    <span class="font-weight-bold text-uppercase text-dark logo">Shopaholic</span>
                </div>
                <div class="links-container">
                    <ul class="links effect-brackets">
                        <li>
                            <a href="#home" class="scroll-link">Home</a>
                        </li>
                        <li>
                            <a href="shop.html" class="scroll-link">Shop</a>
                        </li>
                        <li>
                            <a href="contact.html" class="scroll-link">Contact</a>
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
                        <a class="cart-toggle" href="#"> <i class="fas fa-dolly-flatbed text-gray"></i>(<small
                                class="text-gray count-items">0</small>)</a>
                    </li>
                    <li>
                        <a class="" href="#"> <i class="far fa-heart"></i><small class="text-gray"> (0)</small></a>
                    </li>
                    <li>
                        <a class="" href="login.html"> <i class="fas fa-user-alt text-gray"></i></a>
                    </li>
                </ul>
                <button class="nav-toggle">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </nav>
    </header>

    <!-- Contact SECTION-->

    <!-- container -->
    <div class="container">
        <h1 class="text-center pb-3 m-auto">Contact Us</h1>
        <!-- row -->
        <div class="row">
            
            <div class="col-lg-6">
                <!-- form contact -->
                <form class="text-center border border-light p-5 m-auto" action="#">

                    <h4 class="h4 mb-4">Feedback form</h4>
                    
                    <!-- Name -->
                    <input type="text" class="form-control mb-4" placeholder="Name" required name="name">
                    
                    <!-- Email -->
                    <input type="email" class="form-control mb-4" placeholder="E-mail" required name="email">
                    
                    <!-- Subject -->
                    <label>Subject</label>
                    <select class="custom-select mb-4" name="subject">
                        <option value="" disabled>Choose option</option>
                        <option value="1" selected>Feedback</option>
                        <option value="2">Report a bug</option>
                        <option value="3">Feature request</option>
                        <option value="4">Feature request</option>
                    </select>

                    <!-- Message -->
                    <div class="form-group">
                        <textarea class="form-control rounded-0" rows="3" placeholder="Message" name="message" required></textarea>
                    </div>

                    <!-- Copy -->
                    <div class="custom-control custom-checkbox mb-4">
                        <input type="checkbox" class="custom-control-input" id="contactFormCopy" name="contact-copy">
                        <label class="custom-control-label" for="contactFormCopy">Send me a copy of this message</label>
                    </div>

                    <!-- Send button -->
                    <div class="btn-block">
                        <button class="btn btn-submit" name="submit" type="submit">Send</button>
                        <button class="btn btn-reset" name="reset" type="reset">Reset</button>
                    </div>

                </form>
                <!-- ./form contact -->
            </div>

            <div class="col-lg-6">
                <h2>Address</h2>
            </div>
        </div>
    

    <!-- NEWSLETTER-->
    <section class="text-center border border-light p-5 my-3">
        <!-- Subscribe -->
        <h2 class="h4 mb-3">Let's be friends!</h2>


        <div class="text-center border border-light p-5">
            <form class="flex-form mb-5">
                <label for="from">
                    <i class="fas fa-info-circle"></i>
                </label>
                <input type="email" placeholder="Enter your email address">
                <input type="submit" value="Subscribe">
            </form>
        </div>
        <p class="mt-3">Join our mailing list. We write rarely, but only the best content.</p>
        <p class="my-3">
            <a href="" target="_blank">See the last newsletter</a>
        </p>
    </section>
    </div>
    <!-- Footer -->
    <footer class="bg-dark text-white">
        <!-- container -->
        <div class="container py-4">
            <!-- row -->
            <div class="row py-5">
                <!-- 3 columns -->
                <div class="col-md-4 mb-3 mb-md-0">
                    <h6 class="text-uppercase">Customer services</h6>
                    <ul class="list-unstyled">
                        <li><a class="footer-link" href="#">Help &amp; Contact Us</a></li>
                        <li><a class="footer-link" href="#">Returns &amp; Refunds</a></li>
                        <li><a class="footer-link" href="#">Online Stores</a></li>
                        <li><a class="footer-link" href="#">Terms &amp; Conditions</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <h6 class="text-uppercase">Company</h6>
                    <ul class="list-unstyled">
                        <li><a class="footer-link" href="#">What We Do</a></li>
                        <li><a class="footer-link" href="#">Available Services</a></li>
                        <li><a class="footer-link" href="#">Latest Posts</a></li>
                        <li><a class="footer-link" href="#">FAQs</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h6 class="text-uppercase">Social media</h6>
                    <ul class="list-unstyled">
                        <li><a class="footer-link" href="#"><i class="fab fa-twitter"></i> Twitter</a></li>
                        <li><a class="footer-link" href="#"><i class="fab fa-facebook"></i> Facebook</a></li>
                        <li><a class="footer-link" href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
                        <li><a class="footer-link" href="#"><i class="fab fa-google-plus"></i> Google</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-top pt-4">
                <!-- 2 columns -->
                <div class="row">
                    <div class="col-lg-6">
                        <p class="small text-muted mb-0">&copy; 2020 All rights reserved.</p>
                    </div>
                    <div class="col-lg-6 text-lg-right">
                        <p class="text-white reset-anchor">Template designed by <a href="#">My Temple</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>