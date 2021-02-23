{include file="parts/header.tpl" title="Label Product"}


<div class="container">
    <div class="row h-100 justify-content-center align-items-center row-my-nr1">
        <div class="list-group ">
            <a href="http://localhost:8080/index.php?page=labelProduct&id={$product->getId()}"
               class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1 p-2">{$product->getName()}</h5>
                    <small class="p-2">Product id:{$product->getId()}</small>
                </div>
                <p class="mb-1 p-2">{$product->getDescription()}</p>
            </a>
        </div>
    </div>
</div>

{include file="parts/footer.tpl"};