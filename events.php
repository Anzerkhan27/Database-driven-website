<?php
require "Server.php";
require "headers.php";
require "footers.php";
?>


<?php
global $conn;

$query =" select distinct (events.description) Name
from competitions
join events
on competitions.event_id = events.id";

$events = $conn ->query($query) ->fetchAll(PDO::FETCH_ASSOC);

?>

<section id="showcase1" >
    <div class="container" >
       <h1>Each Annual Dog show has different events, in which Dogs participate. The List of this year's events in which dogs participated is given below </h1>";
        }
    </div>

</section>

<div class ="events">

    <?php
        if (count($events) > 0) {
            foreach ($events as $e) {
                echo "<ul>";
                echo "<li>" . $e['Name'] . "</li>";
                echo "</ul>";
            }
        }else {
            echo "We had no events this year ";
        }
    ?>

</div>

