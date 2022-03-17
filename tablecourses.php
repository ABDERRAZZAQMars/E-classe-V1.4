<table class="table">
    <thead>
        <tr style="color: grey;border-bottom: 2px solid gray;">
            <th></th>
            <th>Title</th>
            <th>Temps</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        include("cnx.php");
        $sql = "SELECT id, titre, temps from courses order by id DESC;";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo
                '<tr style="background-color: white;">
                    <td><img src="./Iamges/studentimage.svg" alt=""></td>
                    <td style="vertical-align: middle;">' . $row['titre'] . '</td>
                    <td style="vertical-align: middle;">' . $row['temps'] . '</td>
                    <td style="vertical-align: middle;"><a href="editcourses .php?edit='.$row["id"].'" onclick="return up()"><img src="./Icones/modifier.svg" alt=""></a></td>
                    <td style="vertical-align: middle;"><a href="deletecourses.php?delete='.$row["id"].'" onclick="return del()"><img src="./Icones/supprimer.svg" alt=""></a></td>
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