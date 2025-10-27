<?php /* slett-student */
/*
/* Programmet lager et skjema for å kunne slette en student
/* Programmet sletter den valgte studenten
*/
?>
<script src="funksjoner.js"> </script>
<h3>Slett student</h3>
<form method="post" action="" id="slettStudentSkjema" name="slettStudentSkjema" onSubmit="return bekreft()">
Student <select name="studentnr" id="studentnr">
<?php print("<option value=''>velg student </option>");
include("dynamiske-funksjoner.php"); listeboksStudentnr(); ?>
</select> <br/>
<input type="submit" value="Slett student" name="slettStudentKnapp" id="slettStudentKnapp" />
</form>
<?php
if (isset($_POST ["slettStudentKnapp"]))
{
include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
$studentnr=$_POST ["studentnr"];
if (!$studentnr)
{
print ("Det er ikke valgt noen student");
}
else
{
include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
$sqlSetning="DELETE FROM student WHERE studentnr='$studentnr';";
mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data i databasen");
/* SQL-setning sendt til database-serveren */
print ("F&oslash;lgende student er n&aring; slettet: $studentnr <br />");
}
}
?>