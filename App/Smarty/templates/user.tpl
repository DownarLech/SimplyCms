{include file="parts/header.tpl" title="Product"}

<div class="container">
    <div class="row h-100 justify-content-center align-items-center row-my-nr1">
        <div class="list-group col-sm-4">
            <a href="http://localhost:8080/index.php?page=user&id={$user->getId()}&admin=true"
               class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1 p-2">{$user->getUserName()}</h5>
                    <small class="p-2">User id:{$user->getId()}</small>
                </div>
                <p class="mb-1 p-2">{$user->getUserRole()}</p>
                <p class="mb-1 p-2">{$user->getPassword()}</p>
            </a>
            <form class="form-example margin-bigger" action="" method="post" id="update_form">
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-customized margin-bigger" name="delete"
                            value={$user->getId()}>Delete
                    </button>
                </div>
            </form>
        </div>

    </div>

    <div class="row h-100 justify-content-center align-items-center row-my-nr1">
        <div class="col-10 col-md-8 col-lg-6">

            <form class="form-example margin-bigger" action="" method="post" id="update_form">
                <h1 class="text-center">Please update user</h1>

                <div class="form-group margin-bigger">
                    <label for="username">User name:</label>
                    <input type="text" class="form-control password" placeholder="name..." name="username">
                </div>
                <div class="form-group margin-bigger">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control password" placeholder="password..." name="password">
                </div>
                <div class="form-group margin-bigger">
                    <label for="userrole">User role:</label>
                    <select id="cars" name="userrole">
                        <option value="Admin">Admin</option>
                        <option value="Costumer">Costumer</option>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-customized margin-bigger" name="save"
                            value={$user->getId()}>Update
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

{include file="parts/footer.tpl"};