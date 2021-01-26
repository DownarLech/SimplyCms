<?php 

class PagesCest
{

    public function checkCallable(AcceptanceTester $I)
    {
        $I->amOnPage('index.php?page=index');
        $I->see('Index');
        $I->amOnPage('index.php?page=newProduct');
        $I->see('Make new product');
        $I->amOnPage('index.php?page=product');
        $I->see('Product');
        $I->amOnPage('index.php?page=home');
        $I->see('Home');
        $I->amOnPage('index.php?page=category');
        $I->see('Product List');

    }

    public function checkProductsPage(AcceptanceTester $I) {
        $I->amOnPage('index.php?page=category');
        $I->see('Product List');
        $I->click('1');
        $I->amOnPage('index.php?page=product&id=1');
        $I->see('Shirt');

        $I->amOnPage('index.php?page=category');
        $I->see('Product List');
        $I->click('2');
        $I->amOnPage('index.php?page=product&id=2');
        $I->see('Game');

        $I->amOnPage('index.php?page=category');
        $I->see('Product List');
        $I->click('3');
        $I->amOnPage('index.php?page=product&id=3');
        $I->see('Cake');

        $I->amOnPage('index.php?page=category');
        $I->see('Product List');
        $I->click('4');
        $I->amOnPage('index.php?page=product&id=4');
        $I->see('Coffee');

    }

    public  function checkError(AcceptanceTester $I) {
        $I->amOnPage('index.php?page=error');
        $I->see('404 ');
        $I->amOnPage('index.php?page=product&id=0');
        $I->see('404');
        $I->amOnPage('index.php?page=product&id=5');
        $I->see('404');

    }

}
