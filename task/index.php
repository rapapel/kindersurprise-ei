<!doctype html>
<html lang="nl">

        <?php
       
        require_once '../backend/conn.php';
        $query = "SELECT * FROM taken";
        $statement = $conn->prepare($query);
        $statement->execute();
        $taken = $statement->fetchAll(PDO::FETCH_ASSOC);
        
     

        ?>

<table>
            <tr>
                <th>Attractie</th>
                <th>Type</th>
                <th>Capaciteit</th>
                <th>Prioriteit</th>
                <th>Melder</th>
                <th>Gemeld op</th>
                <th>Overige info</th>
                <th>Aanpassen</th>
            </tr>
            <?php foreach($taken as $taak):?>
            <tr>
                <td><?php echo $taak['titel'];?></td>
                <td><?php echo $taak['beschrijving'];?></td>
                <td><?php echo $taak['afdeling'];?></td>
                <td><?php echo $taak['status'];?></td>
                <td><?php echo $taak['deadline'];?></td>
                <td><?php echo $taak['user'];?></td>
                <td><?php echo $taak['created_at'];?></td>

            </tr>
            <?php endforeach; ?>
        </table>

        
    </div>
</body>

</html>

