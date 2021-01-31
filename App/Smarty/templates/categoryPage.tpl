{include file="parts/header.tpl" title="Category page"}



<div class="container">
    <div class="row justify-content-center align-items-center row-my-nr1">
        <div class="list-group">
            {foreach $productList as $product}
            <a href="http://localhost:8080/index.php?page=product&id={$product->getId()}&admin=true"
               class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{$product->getName()}</h5>
                    <small>Product id:{$product->getId()}</small>
                </div>
                <p class="mb-1">{$product->getDescription()}</p>
            </a>
            {/foreach}
        </div>

    </div>
</div>





{include file="parts/footer.tpl"}