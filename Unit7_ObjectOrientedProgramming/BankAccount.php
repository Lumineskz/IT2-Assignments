<?php
    class BankAccount{
        private $accountNumber;
        private $balance;
        private $accountHolder;
        private $pin;

        public function __construct($accountHolder, $accountNumber, $pin){
            $this->accountHolder = $accountHolder;
            $this->accountNumber = $accountNumber;
            $this->balance = 0;
            $this->pin = $pin;
        }

        public function deposit($amount){
            if($amount > 0){
                $this->balance += $amount;
                return "Deposited: Rs." . $amount . "<br>";
            } else {
                return "Deposit amount must be positive.<br>";
            }
        }

        public function withdraw($amount,$inputPin){
            if($inputPin!==$this->pin){
                return "Invalid PIN.<br>";
            }else{
                if($amount > 0 && $amount <= $this->balance){
                    $this->balance -= $amount;
                    return "Withdrew: Rs." . $amount . "<br>";
                } else {
                    return "Insufficient balance or invalid amount.<br>";
                }
            }
        }

        public function getBalance($inputPin){
            if($inputPin === $this->pin){
                return "Current Balance: Rs." . $this->balance . "<br>";
            } else {
                return "Invalid PIN.<br>";
            }
        }

        public function changePin($oldPin, $newPin){
            if($oldPin === $this->pin){
                $this->pin = $newPin;
                return "PIN changed successfully.<br>";
            } else {
                return "Invalid old PIN.<br>";
            }
        }
    }

    $ba = new BankAccount("John Doe", "123456789", "4321");
    echo $ba->deposit(500);
    echo $ba->getBalance("4321");
    echo $ba->withdraw(200, "4321");
    echo $ba->getBalance("4321");
    echo $ba->changePin("4321", "1234");
?>