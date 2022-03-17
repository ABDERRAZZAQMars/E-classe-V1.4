<table class="table table-striped bg-white">
    <thead>
        <tr style="color: grey;border-bottom: 2px solid gray;background-color:#e5e5e570;">
            <th>Name</th>
            <th class="text-nowrap">Payment Schedule</th>
            <th class="text-nowrap">Bill Number</th>
            <th class="text-nowrap">Amount Paid</th>
            <th class="text-nowrap">Balance amount</th>
            <th>Date</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        include("cnx.php");
        $sql = "SELECT id, nom, payment_schedule, bill_number, amount_paid, balance_amount, datepayment from payment_details order by id DESC;";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { 
                echo
                '<tr style="background-color: white;">
                    <td style="vertical-align: middle;">' . $row['nom'] . '</td>
                    <td style="vertical-align: middle;">' . $row['payment_schedule'] . '</td>
                    <td style="vertical-align: middle;">' . $row['bill_number'] . '</td>
                    <td style="vertical-align: middle;">DHS ' . $row['amount_paid'] . '</td>
                    <td class="text-nowrap" style="vertical-align: middle;">DHS ' . $row['balance_amount'] . '</td>
                    <td class="text-nowrap" style="vertical-align: middle;">' . $row['datepayment'] . '</td>
                    <td><img src="./Icones/view.svg" alt="view_icone"></td>
                    </tr>';
            }
        } else {
            echo "0 results";
        }
        ?>
    </tbody>
</table>