<?php
include_once 'header.php';
include_once 'database.php';
?>

<h1>Pregled projektov</h1>

<table border="1" cellspacing="0" cellpadding="0">
    <tr>
        <th>Št.</th>
        <th>Ime</th>
        <th>Lastnik: </th>
<<<<<<< HEAD
		<?php
		//poskus 1
		$user = $_POST[user_id];
		echo ("SELECT u.email FROM users u INNER JOIN project p ON p.user_id=u.id WHERE("$user"=u.id"););
		?>
=======

>>>>>>> 8a6b7df2adfbb9b07e1549756464b59621f45c41
        <th>Akcije</th>
    </tr>
    <?php 
        $query = "SELECT *, p.id AS project_id 
                  FROM projects p INNER JOIN users u
                  ON u.id = p.user_id";
        $result = mysqli_query($link, $query);
        //izpisal bom vse projekte
        $st = 0;
        while ($row = mysqli_fetch_array($result)) {
            $st++;
            echo "<tr>";
            echo "<td>$st</td>";
            echo "<td>".$row['title']."</td>";
            echo "<td>".$row['first_name'].' '
                         .$row['last_name']."</td>";
            echo "<td>";
            if ($_SESSION['user_id'] == $row['user_id']) {
                echo '<a href="project_edit.php?id='.$row['project_id'].'">Uredi</a> ';
                echo '<a href="project_delete.php?id='.$row['project_id'].'">Izbriši</a>';
            }
			
			else
			{
				echo '<form method="POST" action="ponudba.php">';
				echo '<input type="submit" value="Oddaj ponudbo">';
				echo '</form>';
			}
            echo "</td>";
            echo '</tr>';
        }
    ?>
</table>

<?php
include_once 'footer.php';
?>