{include file="parts/header.tpl" title="Product"}

<div class="container">
    <div class="row h-100 justify-content-center align-items-center row-my-nr1">
        <div class="list-group ">
            <a href="http://localhost:8080/index.php?page=product&id={$product->getId()}&admin=true"
               class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1 p-2">{$product->getName()}</h5>
                    <small class="p-2">Product id:{$product->getId()}</small>
                </div>
                <p class="mb-1 p-2">{$product->getDescription()}</p>

                <p class="mb-1 p-2">{$product->getCategory()->getName()}</p>
            </a>
            <form class="form-example margin-bigger" action="" method="post" id="update_form">
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-customized margin-bigger" name="delete"
                            value={$product->getId()}>Delete
                    </button>
                </div>
            </form>
        </div>

    </div>

    <div class="row h-100 justify-content-center align-items-center row-my-nr1">
        <div class="col-10 col-md-8 col-lg-6">

            <form class="form-example margin-bigger" action="" method="post" id="update_form">>
                <h1 class="text-center">Please update product</h1>

                <div class="form-group margin-bigger">
                    <label for="productname">Product name:</label>
                    <input type="text" class="form-control password" placeholder="name..." name="productname">
                </div>
                <div class="form-group margin-bigger">
                    <label for="description">Description:</label>
                    <input type="text" class="form-control password" placeholder="description..." name="description">
                </div>
                <div class="form-group margin-bigger">
                    <label for="categoryName">Category:</label>
                    <input type="text" class="form-control password" placeholder="category..." name="categoryName">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-customized margin-bigger" name="save"
                            value={$product->getId()}>Update
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

{include file="parts/footer.tpl"};