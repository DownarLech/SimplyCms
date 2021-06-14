{include file="parts/header.tpl" title="Category"}

<div class="container">
    <div class="row h-100 justify-content-center align-items-center row-my-nr1">
        <div class="list-group ">
            <a href="http://localhost:8080/index.php?page=category&id={$category->getId()}&admin=true"
               class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1 p-2">{$category->getName()}</h5>
                    <small class="p-2">Category id:{$category->getId()}</small>
                </div>
            </a>
            <form class="form-example margin-bigger" action="" method="post" id="update_form">
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-customized margin-bigger" name="delete"
                            value={$category->getId()}>Delete
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="row h-100 justify-content-center align-items-center row-my-nr1">
        <div class="col-10 col-md-8 col-lg-6">

            <form class="form-example margin-bigger" action="" method="post" id="update_form">>
                <h1 class="text-center">Please update category</h1>

                <div class="form-group margin-bigger">
                    <label for="productname">Category name:</label>
                    <input type="text" class="form-control password" placeholder="name..." name="categoryName">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-customized margin-bigger" name="save"
                            value={$category->getId()}>Update
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

{include file="parts/footer.tpl"};