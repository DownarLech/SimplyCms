{include file="parts/header.tpl" title="Product"}



<div class="container">
    <div class="row h-100 justify-content-center align-items-center row-my-nr1">
        <div class="list-group ">
                <a href="http://localhost:8080/index.php?page=product&id={$product->getId()}&admin=true"
                   class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{$product->getName()}</h5>
                        <small>Product id:{$product->getId()}</small>
                    </div>
                    <p class="mb-1">{$product->getDescription()}</p>
                </a>
        </div>

    </div>
</div>

{include file="parts/footer.tpl"};