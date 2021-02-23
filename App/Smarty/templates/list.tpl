{include file="parts/header.tpl" title="List of Products"}


<div class="container">
    <div class="row justify-content-center align-items-center row-my-nr1">
        <div class="list-group">
            <h5>Products List</h5>
            {foreach $productList as $product}
                <a href="http://localhost:8080/index.php?page=labelProduct&id={$product->getId()}"
                   class="list-group-item list-group-item-action flex-column align-items-start" id="link">
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