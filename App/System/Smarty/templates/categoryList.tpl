{include file="parts/header.tpl" title="Category List"}


<div class="container">
    <div class="row justify-content-center align-items-center row-my-nr1">
        <div class="list-group">
            <h5>Category List</h5>
            {foreach $categoryList as $category}
                <a href="http://localhost:8080/index.php?page=category&id={$category->getId()}&admin=true"
                   class="list-group-item list-group-item-action flex-column align-items-start" id="link">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{$category->getName()}</h5>
                        <small>Category id:{$category->getId()}</small>
                    </div>
                </a>
            {/foreach}
        </div>

    </div>
    <div class="row justify-content-center align-items-center row-my-nr1">
        <div class="col-10 col-md-8 col-lg-6">

            <form class="form-example margin-bigger" action="http://localhost:8080/index.php?page=category&id=0&admin=true" method="post" id="update_form">>
                <h1 class="text-center">Please add new category</h1>

                <div class="form-group margin-bigger">
                    <label for="categoryName">Category name:</label>
                    <input type="text" class="form-control password" placeholder="name..." name="categoryName">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-customized margin-bigger" name="save"
                            value="0">Save
                    </button>
                </div>
            </form>

        </div>

    </div>

</div>


{include file="parts/footer.tpl"}