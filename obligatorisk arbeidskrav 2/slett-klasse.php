<?php /* slett-klasse */
/*
/* Programmet lager et skjema for å kunne slette en klasse
/* Programmet sletter den valgte klassen
*/
?>
<script src="funksjoner.js"> </script>
<h3>Slett klasse</h3>
<form method="post" action="" id="slettStudiumSkjema" name="slettStudiumSkjema" onSubmit="return bekreft()">
Klasse
<select name="studiumkode" id="studiumkode">
<?php print("<option value=''>velg klasse </option>");
include("dynamiske-funksjoner.php"); listeboksStudiumkode(); ?>
</select> <br/>
<input type="submit" value="Slett klasse" name="slettStudiumKnapp" id="slettStudiumKnapp" />
</form>
<?php
if (isset($_POST ["slettStudiumKnapp"]))
{
$studiumkode=$_POST ["studiumkode"];
if (!$studiumkode)
{
print ("Det er ikke valgt noe klasse");
}
else
{
include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
$sqlSetning="DELETE FROM studium WHERE studiumkode='$studiumkode';";
mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data i databasen");
/* SQL-setning sendt til database-serveren */
print ("F&oslash;lgende klasse er n&aring; slettet: $studiumkode <br />");
}
}
?>


