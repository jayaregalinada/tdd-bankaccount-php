<?php

declare(strict_types=1);

namespace App;

use Exception;

final class BankAccount
{
    private int $fee = 20;

    public function __construct(private int $balance)
    {
    }

    public function deposit(int $amount): void
    {
        $this->balance += $amount;
    }

    public function getBalance(): int
    {
        return $this->balance;
    }

    public function withdraw(int $amount): int
    {
        if ($amount + $this->fee > $this->balance) {
            throw new Exception('Insufficient Balance');
        }

        $this->balance -= $amount;

        return $amount;
    }
}
