 <?php
include 'header.php';
include 'classes/Account.php';
include 'classes/Customer.php';

$acc1 = new Account('20489446', 'Checking', -20);
$acc2 = new Account('20148896', 'Savings', 3800);
$acc3 = new Account('99887766', 'Payroll', 15000);
$acc4 = new Account('55443322', 'Investment', -500);

$accounts = [$acc1, $acc2, $acc3, $acc4];

$customer = new Customer('Ivy', 'Stone', $accounts);
?>

<h1>Name: <?php echo $customer->getFullName(); ?></h1>

<table>
    <tr>
        <th>Account Number</th>
        <th>Account Type</th>
        <th>Balance</th>
    </tr>

    <?php
    foreach ($customer->accounts as $account) {
        $cssClass = "";
        
        if ($account->balance < 0) {
            $cssClass = "overdrawn";
        }

        echo "<tr>";
        echo "<td>" . $account->number . "</td>";
        echo "<td>" . $account->type . "</td>";
        echo "<td class='" . $cssClass . "'>₱ " . $account->balance . "</td>";
        echo "</tr>";
    }
    ?>
</table>

<?php
include 'footer.php';
?>