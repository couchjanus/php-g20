<div class="container">
    <section class="pt-5">
        <header class="text-center">
            <p class="small text-muted small text-uppercase mb-1">Carefully created collections</p>
            <h2 class="h5 text-uppercase mb-4">Browse our categories</h2>
        </header>
        <div class="row">
            <?php foreach ($categories as $category):?>
            <div class="col-md-4 mb-4 mb-md-0">
                <a class="category-item" href="shop.html"><img class="img-fluid" src="/assets/images/cat-img-2.jpg" alt=""><strong class="category-item-title"><?=$category->name;?></strong></a>
            </div>
            <?php endforeach;?>
        </div>
    </section>
    <section class="py-5 bg-light">
        <header>
            <p class="small text-muted small text-uppercase mb-1">Made the hard way</p>
            <h2 class="h5 text-uppercase mb-4"><?php echo $title;?></h2>
        </header>
        <div class="showcase row">
                    
        </div>
        
    </section>
</div>