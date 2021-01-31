{include file="parts/header.tpl" title="LogIn"}


<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center row-my-nr1">
        <div class="col-10 col-md-8 col-lg-6">

            <form class="form-example margin-bigger " action="" method="post">
                <h1 class="text-center">Welcome, please login</h1>

                <div class="form-group margin-bigger">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control username" id="username" placeholder="Username..."
                           name="username">
                </div>
                <div class="form-group margin-bigger">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control password" id="password" placeholder="Password..."
                           name="password">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-customized margin-bigger">Login</button>
                    <p>You need to login to access this page. Please enter your username and password and click
                        Login.</p>
                </div>
            </form>

        </div>
    </div>
</div>


{include file="parts/footer.tpl"};