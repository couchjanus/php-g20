<!-- aside -->
<aside class="sidebar">
        <div class="sidebar-header">
            <button class="close-btn"><i class="fas fa-times"></i></button>
            <h5 class="logo">Shopping Cart</h5>
        </div>

        <!-- cart items -->
        <div class="cart-items">

        </div>
        <!-- buttons -->
        <div class="cart-footer">
            <h3>your total : $<span class="cart-total">0</span></h3>
            <button class="btn_card clear-cart">Clear Cart</button>
            <p class="checkout">
            <?php if (Helper::isGuest()) :?>
                To make your order please <a href="/sign" class="btn_card check-out">Sign In</a>
            <?php else :?>
                <a href="#" class="check-out btn_card checkout__now">Checkout</a>
            <?php endif;?>
            </p>
        </div>

    </aside>