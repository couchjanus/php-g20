<h5 class="text-uppercase mb-4">Categories</h5>
<div class="py-2 px-4 bg-dark text-white mb-3">
    <strong class="small text-uppercase font-weight-bold">Fashion &amp; Acc</strong>
</div>
<ul class="list-unstyled small text-muted pl-4 font-weight-normal">
    <?php foreach ($categories as $category):?>
    <li class="mb-2"><a class="reset-anchor category-item" data-category="clothes" href="#"><?=$category->name;?></a>
    </li>
    <?php endforeach;?>
</ul>
<div class="py-2 px-4 bg-light mb-3"><strong class="small text-uppercase font-weight-bold">Health &amp; Beauty</strong>
</div>
<ul class="list-unstyled small text-muted pl-4 font-weight-normal">
    <li class="mb-2"><a class="reset-anchor category-item" data-category="watches" href="#">Watches</a></li>
    <li class="mb-2"><a class="reset-anchor category-item" data-category="bags" href="#">bags</a></li>
    <li class="mb-2"><a class="reset-anchor category-item" data-category="cosmetics" href="#">Cosmetic</a></li>
    <li class="mb-2"><a class="reset-anchor category-item" data-category="cosmetics" href="#">Nail Art</a></li>
    <li class="mb-2"><a class="reset-anchor category-item" data-category="cosmetics" href="#">Skin Masks &amp; Peels</a></li>
    <li class="mb-2"><a class="reset-anchor category-item" data-category="cosmetics" href="#">Korean cosmetics</a></li>
</ul>
<div class="py-2 px-4 bg-light mb-3">
    <strog class="small text-uppercase font-weight-bold">Electronics</strog>
</div>
<ul class="list-unstyled small text-muted pl-4 font-weight-normal mb-5">
    <li class="mb-2"><a class="reset-anchor category-item" data-category="electronics" href="#">Electronics</a></li>
    <li class="mb-2"><a class="reset-anchor category-item" data-category="electronics" href="#">USB Flash drives</a></li>
    <li class="mb-2"><a class="reset-anchor category-item" data-category="electronics" href="#">Headphones</a></li>
    <li class="mb-2"><a class="reset-anchor category-item" data-category="electronics" href="#">Portable speakers</a></li>
    <li class="mb-2"><a class="reset-anchor category-item" data-category="electronics" href="#">Cell Phone bluetooth headsets</a></li>
    <li class="mb-2"><a class="reset-anchor category-item" data-category="electronics" href="#">Keyboards</a></li>
</ul>