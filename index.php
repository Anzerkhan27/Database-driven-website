<?php
require "Server.php";
require "headers.php";
require "footers.php";

?>
<?php
global $conn ;

$query = "SELECT COUNT(DISTINCT(dog_id))  Dogs ,COUNT(DISTINCT(dogs.owner_id))  Owners , COUNT(DISTINCT(competitions.event_id))  Events
FROM entries
JOIN DOGS , competitions
where entries.dog_id = dogs.id
and entries.competition_id = competitions.id";
$details = $conn ->query($query) ->fetchAll(PDO::FETCH_ASSOC);

?>



<section id="showcase" >
    <div class="container" >
        <?php
        if (count($details) > 0){
            foreach ($details as $d);
            echo "<h1>Welcome to poppleton dog show.
             An elite competition of best dogs in the city . 
             This year ".$d['Owners']." Owners brought ".$d['Dogs']." Dogs participating in ".$d['Events']."  Events</h1>";
        }
       else {
           echo "<p>No data to display yet</p>";
       }
        ?>
    </div>


    <div class="block">
        <h2><a href="leaderboard.php"> Leaderboards</a></h2>
        <p>This year we had a good competition.
            To check out which dogs came on top,
            click on leaderboards above</p>
    </div>
    <div class="block">
        <h2><a href="events.php">Events</a></h2>
        <p>Each year we have different events.
            To check out full details of the events which took place this year ,
            click on events above</p>
    </div>




</section>
