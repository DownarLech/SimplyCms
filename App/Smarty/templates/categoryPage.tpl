{include file="parts/header.tpl" title="Category page"}

<h1>Product List</h1>
Hello, {$name}!
<br><br>


<ul>
    {foreach $productList as $product}
        <br>
        <li><a href="http://localhost:8080/index.php?page=product&id={$product->getId()}&admin=true">{$product->getId()}</a></li>
        <li>{$product->getName()}</li>
        <li>{$product->getDescription()}</li>
        <br>
    {/foreach}
</ul>


{include file="parts/footer.tpl"}