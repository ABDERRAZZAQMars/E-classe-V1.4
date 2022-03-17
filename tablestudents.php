<table class="table">
    <thead>
        <tr style="color: grey;border-bottom: 2px solid gray;">
            <th></th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th class="text-nowrap">Enroll Number</th>
            <th class="text-nowrap">Date of admission</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        include("cnx.php");
        $sql = "SELECT id, name, email, phone, enroll_number, date_of_admission from students order by id DESC;";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo
                '<tr style="background-color: white;">
                    <td><img src="./Iamges/studentimage.svg" alt=""></td>
                    <td style="vertical-align: middle;">' . $row['name'] . '</td>
                    <td style="vertical-align: middle;">' . $row['email'] . '</td>
                    <td style="vertical-align: middle;">' . $row['phone'] . '</td>
                    <td style="vertical-align: middle;">' . $row['enroll_number'] . '</td>
                    <td class="text-nowrap" style="vertical-align: middle;">' . $row['date_of_admission'] . '</td>
                    <td style="vertical-align: middle;"><a href="edit.php?edit='.$row["id"].'"  onclick="return up()"><img src="./Icones/modifier.svg" alt=""></a></td>
                    <td style="vertical-align: middle;"><a href="delete.php?delete='.$row["id"].'"  onclick="return del()" ><img src="./Icones/supprimer.svg" alt=""></a></td>
                </tr>';
            }
        } else {
            echo "0 results";
        }
        ?>
    </tbody>
    <script>
        function del(){
            return confirm("Are you sure delete this");
        }

        function up(){
            return confirm("Are you sure update this");
        }
    </script>
</table>