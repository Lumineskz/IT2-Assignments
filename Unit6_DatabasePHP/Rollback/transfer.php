<?php
include 'connect.php';

// 1. Turn off "Auto-Commit" (This starts the transaction)
$conn->begin_transaction();

try {
    // STEP 1: Take $50 from User 1
    $conn->query("UPDATE accounts SET balance = balance - 50 WHERE id = 1");

    // ---------------------------
    // Check if balance is below 0
    $result = $conn->query("SELECT balance FROM accounts WHERE id = 1");
    $row = $result->fetch_assoc();
    if ($row['balance'] < 0) {
        throw new Exception("Insufficient funds!");
    }

    // STEP 2: Give $50 to User 2
    $conn->query("UPDATE accounts SET balance = balance + 50 WHERE id = 2");

    // 2. If we got here, save everything!
    $conn->commit();
    echo "Success! Money transferred.";

} catch (Exception $e) {
    // 3. If ANY error happened, undo STEP 1
    $conn->rollback();
    echo "Transaction Failed: " . $e->getMessage() . ". Database rolled back.";
}
?>