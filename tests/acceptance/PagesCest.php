<?php 

class PagesCest
{

    public function checkCallable(AcceptanceTester $I)
    {

        $I->execute(function() {$_GET['page']='index';});
        $I->amOnPage('index.php?page=index');

        $I->execute(function() {$_GET['page']='home';});
        $I->amOnPage('index.php?page=home');


        $I->amOnPage('index.php?page=newProduct');
        $I->see('Make new product');
        $I->amOnPage('index.php?page=product');
        $I->see('Product');
        $I->amOnPage('index.php?page=category');
        $I->see('Product List');

    }

    public function checkProductsPage(AcceptanceTester $I) {
        $I->amOnPage('index.php?page=category');
        $I->click('1');
        $I->amGoingTo('index.php?page=product&id=1');

        $I->amOnPage('index.php?page=category');
        $I->click('2');
        $I->amGoingTo('index.php?page=product&id=2');

        $I->amOnPage('index.php?page=category');
        $I->click('3');
        $I->amGoingTo('index.php?page=product&id=3');

        $I->amOnPage('index.php?page=category');
        $I->click('4');
        $I->amGoingTo('index.php?page=product&id=4');
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
