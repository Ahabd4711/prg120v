<?php /* slett-studium */
/*
/* Programmet lager et skjema for å kunne slette et studium
/* Programmet sletter det valgte studiet
*/
?>
<script src="funksjoner.js"> </script>
<h3>Slett studium</h3>
<form method="post" action="" id="slettStudiumSkjema" name="slettStudiumSkjema" onSubmit="return bekreft()">
Studium
<select name="studiumkode" id="studiumkode">
<?php print("<option value=''>velg studium </option>");
include("dynamiske-funksjoner.php"); listeboksStudiumkode(); ?>
</select> <br/>
<input type="submit" value="Slett studium" name="slettStudiumKnapp" id="slettStudiumKnapp" />
</form>
<?php
if (isset($_POST ["slettStudiumKnapp"]))
{
$studiumkode=$_POST ["studiumkode"];
if (!$studiumkode)
{
print ("Det er ikke valgt noe studium");
}
else
{
include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
$sqlSetning="DELETE FROM studium WHERE studiumkode='$studiumkode';";
mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data i databasen");
/* SQL-setning sendt til database-serveren */
print ("F&oslash;lgende studium er n&aring; slettet: $studiumkode <br />");
}
}
?>
