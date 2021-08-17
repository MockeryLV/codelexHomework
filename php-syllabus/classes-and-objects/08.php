<?php


class SavingAccount{

    public $balance;

    public $annualInterestRate;

    public function __construct(int $balance, int $annualInterestRate)
    {
        $this->balance = $balance;
        $this->annualInterestRate = $annualInterestRate;
    }

    public function subtractAmountOfWithdrawl(int $amount): void{
        $this->balance-=$amount;
    }

    public function addAmountOfDeposit(int $amount): void{
        $this->balance+=$amount;
    }

    public function addAmountOfMonthInterest(): void{
        $this->balance+= $this->annualInterestRate * $this->balance / 12;
    }

}

$balance = (int) readline('How much money is in the account?: ');
$annualInterestRate = (int) readline('Enter the annual interest rate: ');
$months = (int) readline('How long has the account been opened?: ');

$savingsAccount = new SavingAccount($balance, $annualInterestRate);

$deposits = 0;
$withdraws = 0;

$interestEarned = 0;

for($i = 1; $i <= $months; $i++){

    $deposits += (int) readline("Enter amount deposited for month $i: ");
    $withdraws += (int) readline("Enter amount withdrawn for month $i: ");
    $balance =  $savingsAccount->balance;
    $savingsAccount->addAmountOfMonthInterest();
    $interestEarned+=$savingsAccount->balance - $balance;

}
$savingsAccount->subtractAmountOfWithdrawl($withdraws);
$savingsAccount->addAmountOfDeposit($deposits);


echo "Total deposited: $deposits" . PHP_EOL;
echo "Total withdrawn: $withdraws" . PHP_EOL;

echo "Interest earned: " . $interestEarned . PHP_EOL;
echo "Ending balance: $savingsAccount->balance" . PHP_EOL;




