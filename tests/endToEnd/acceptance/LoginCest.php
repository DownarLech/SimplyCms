<?php

class LoginCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->amOnPage('index.php?page=login&admin=true');
        $I->fillField('username', 'John');
        $I->fillField('password', 'a');
        $I->click('Login');
        $I->amGoingTo('index.php?page=category');

    }

}
