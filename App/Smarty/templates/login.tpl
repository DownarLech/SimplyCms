{include file="parts/header.tpl" title="LogIn"}

<h1>LogIn</h1>
Hello, {$name}!
<br><br>

<form action = "" method = "post">
    <label for="username">Username:</label>
    <input type = "text" name = "username" required></br>
    <label for="password">Password:</label>
    <input type = "password" name = "password" required>
    <button type = "submit" name = "login">Login</button>
</form>

{include file="parts/footer.tpl"};