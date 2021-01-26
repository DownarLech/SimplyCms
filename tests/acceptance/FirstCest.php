<?php 

class FirstCest
{
    public function frontpageWorks(AcceptanceTester $I)
    {
        $I->amOnPage('index.php?page=index');
        $I->see('Index');
    }
}
