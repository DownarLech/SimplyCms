<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<h2>Write new article.</h2>

<form action="article.view.php" method="GET">
    <label for="title">Title:</label><br>
    <input type="text" id="title" name="title"><br>
    <label for="content">Content:</label><br>
    <textarea id="content" name="content"></textarea>
    <br><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>
