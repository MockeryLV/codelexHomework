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
        $this->balance = $this->balance + ($this->balance * ($this->annualInterestRate / 12));
    }

}
//
//function moneyFormat($money){
//    $money = str_split((string) $money);
//    array_unshift($money, '$');
//    return join('',$money);
//}

$balance = (int) readline('How much money is in the account?: ');
$annualInterestRate = (int) readline('Enter the annual interest rate: ');
$months = (int) readline('How long has the account been opened?: ');

$savingsAccount = new SavingAccount($balance, $annualInterestRate);

$totalDeposits = 0;
$totalWithdraws = 0;

$interestEarned = 0;



for($i = 1; $i <= $months; $i++){

    $deposits = (int) readline("Enter amount deposited for month $i: ");
    $withdraws = (int) readline("Enter amount withdrawn for month $i: ");

    $totalDeposits+=$deposits;
    $totalWithdraws+=$withdraws;

    $savingsAccount->subtractAmountOfWithdrawl($withdraws);
    $savingsAccount->addAmountOfDeposit($deposits);

    $oldBalance =  $savingsAccount->balance;
    $savingsAccount->addAmountOfMonthInterest();
    $interestEarned+=($savingsAccount->balance - $oldBalance);


}



echo "Total deposited: $deposits" . PHP_EOL;
echo "Total withdrawn: $withdraws" . PHP_EOL;

echo "Interest earned: " . round($interestEarned, 2) . PHP_EOL;
echo "Ending balance: " . round($savingsAccount->balance,2 ) . PHP_EOL;




