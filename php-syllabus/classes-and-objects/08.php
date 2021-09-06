<?php


class SavingAccount{

    private int $balance;

    private int $annualInterestRate;

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
    public function balance(){
        return $this->balance;
    }

    public function setBalance(int $newBalance){
        $this->balance = $newBalance;
    }
}


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

    $oldBalance =  $savingsAccount->balance();
    $savingsAccount->addAmountOfMonthInterest();
    $interestEarned+=($savingsAccount->balance() - $oldBalance);


}

$totalDeposits = number_format($totalDeposits, 2, ".", ",") . "$";
$totalWithdraws = number_format($totalWithdraws, 2, ".", ",") . "$";
$interestEarned = number_format($interestEarned, 2 ,'.', ',') . "$";
$savingsMoney =  number_format($savingsAccount->balance(), 2 ,'.', ',') . "$";

echo "Total deposited: $totalDeposits" . PHP_EOL;
echo "Total withdrawn: $totalWithdraws" . PHP_EOL;

echo "Interest earned: " . $interestEarned . PHP_EOL;
echo "Ending balance: " . $savingsMoney . PHP_EOL;




