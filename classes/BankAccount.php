<?php

class BankAccount implements IfaceBankAccount
{

    private $balance = null;

    public function __construct(Money $openingBalance)
    {
        $this->balance = $openingBalance;
    }

    public function balance()
    {
        return $this->balance;
    }

    public function deposit(Money $amount)
    {
		$this->balance = new Money($this->balance->value()+$amount->value());
        //implement this method
    }

    public function transfer(Money $amount, BankAccount $account)
    {
		if($this->balance->value()<$amount->value())
			throw new Exception('Withdrawl amount larger than balance');
			
		$this->balance =  new Money($this->balance->value()-$amount->value());
		$account->balance =  new Money($account->balance+$amount->value());
        //implement this method
    }
    public function withdraw(Money $amount)
    {
		if($this->balance->value()<$amount->value())
			throw new Exception('Withdrawl amount larger than balance');
		$this->balance = $this->balance->value()-$amount->value();  
        //implement this method
    }
}