{include file="parts/header.tpl" title="Category page"}

<h1>Product List</h1>
Hello, {$name}!

<ul>
    {foreach $ProductList as $product}
        <br>
        {foreach $product as $value}
            <li>{$value@key}: {$value}</li>
        {/foreach}
        <br>
    {/foreach}
</ul>




{include file="parts/footer.tpl"}