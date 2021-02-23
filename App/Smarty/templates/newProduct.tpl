{include file="parts/header.tpl" title="New ProductDataTransferObject"}

<h1>Make new product</h1>
Hello, {$name}!

<div class="container">
    <form method="post" action="">

        <label for="productId">Product ID:</label>
        <input type="text" name="productId">

        <label for="productname">Product name:</label>
        <input type="text" name="productname">

        <label for="description">Description:</label>
        <input type="text" name="description">

        <input type="submit" name="save" value="submit">
    </form>
</div>


{include file="parts/footer.tpl"};