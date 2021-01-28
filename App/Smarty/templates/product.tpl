{include file="parts/header.tpl" title="Product"}

<h1>Product</h1>
Hello, {$name}!
<br><br>

<ul>
    <li>{$product->getId()}</li>
    <li>{$product->getName()}</li>
    <li>{$product->getDescription()}</li>
</ul>

{include file="parts/footer.tpl"};