<?php
require "Server.php";
require "headers.php";
require "footers.php";
?>


<div class="heading">
    <h1>Leaderboards 2020</h1>
</div>


<?php
global $conn;

$query1 ="SELECT owners.id ID , dogs.name  Name  , breeds.name Breed,ROUND(avg(score),2)  Average_score , owners.name   Owner_name  , owners.email  email  
from entries
JOIN dogs , owners ,breeds
where  entries.dog_id = dogs.id 
and dogs.owner_id = owners.id
and dogs.breed_id = breeds.id  
group by dog_id 
having count(entries.dog_id) > 1 
order by avg(score) desc 
LIMIT 10
 ";

$leaderboard = $conn ->query($query1) ->fetchAll (PDO::FETCH_ASSOC)
?>


<div class="content-table ">
    <?php
    if (count($leaderboard) > 0) {
        echo "<table>";
        echo "<thead>";
        echo "<tr><th>Dog Name</th><th>Breed</th><th>Average Score</th><th>Owners name</th><th>Email address</th>
          </tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($leaderboard as $l) {
            echo "<tr>";
            echo "<td>" . $l['Name'] . "</td>";
            echo "<td>" . $l['Breed'] . "</td>";
            echo "<td>" . $l['Average_score'] . "</td>";
            echo "<td><a href =\"Owners.php?id=" .$l['ID'] . "\">" . $l['Owner_name'] . "</a></td>";
            echo "<td>" .'<a href = "mailto:' .$l['email'] . '">' . $l['email'] . "</td>";
            echo "</tr>";

        }
        echo "</tbody>";
        echo "</table>";
    }
    else{
        echo "<p>No scores yet to display.</p>";
    }
    ?>

</div>
