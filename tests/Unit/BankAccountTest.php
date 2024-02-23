<?php

declare(strict_types=1);

use App\BankAccount;

it('should be able to get balance', function () {
    $account = new BankAccount(1000);

    expect($account->getBalance())->toBe(1000);
});

it('should be able to deposit', function () {
    $account = new BankAccount(1000);
    $account->deposit(5000);

    expect($account->getBalance())->toBe(6000);
});

it('should be able to withdraw', function () {
    // Initial Balance: 1000
    // Withdraw: 500 -> 500
    // Current Balance: 500
    $account = new BankAccount(1000);
    $amount = $account->withdraw(500);

    expect($amount)->toBe(500);
    expect($account->getBalance())->toBe(500);
});

it('should NOT be able to withdraw because of insufficient balance', function () {
    // Initial Balance: 1000
    // Attempting to Withdraw: 5000
    // Should throw an error
    // Current Balance: 1000 (same as before)
    $account = new BankAccount(1000);

    expect(fn() => $account->withdraw(5000))->toThrow('Insufficient Balance');
    expect($account->getBalance())->toBe(1000);
});

it('should NOT be able to withdraw because of fee', function () {
    // Initial Balance: 5000
    // Withdraw: 5000
    // Throw an error
    // Every withdraw may fee: 20
    // Current Balance: 5000
    $account = new BankAccount(5000);

    expect(fn() => $account->withdraw(5000))->toThrow('Insufficient Balance');
    expect($account->getBalance())->toBe(5000);
});

// [6] Add denomation x999 100/500/1000
// [7] Have minimum withdraw 500
// [8] Show all transactions
