<?php /* registrer-student */
/*
/* Programmet lager et html-skjema for å registrere en student
/* Programmet registrerer data i databasen
*/
?>
<h3>Registrer student </h3>
<form method="post" action="" id="registrerStudentSkjema" name="registrerStudentSkjema">
Studentnr <input type="text" id="studentnr" name="studentnr" required /> <br/>
Fornavn <input type="text" id="fornavn" name="fornavn" required /> <br/>
Etternavn <input type="text" id="etternavn" name="etternavn" required /> <br/>
Klassekode <select name="klassekode" id="klassekode">
<?php print("<option value=''>velg klasse </option>");
include("dynamiske-funksjoner.php"); listeboksKlassekode(); ?>
</select> <br/>
<input type="submit" value="Registrer student" id="registrerStudentKnapp" name="registrerStudentKnapp" />
<input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>
<?php
if (isset($_POST ["registrerStudentKnapp"]))
{
$studentnr=$_POST ["studentnr"];
$fornavn=$_POST ["fornavn"];
$etternavn=$_POST ["etternavn"];
$klassekode=$_POST ["klassekode"];
if (!$studentnr || !$fornavn || !$etternavn || !$klassekode)
{
print ("Alle felt m&aring; fylles ut");
}
else
{
include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
$sqlSetning="SELECT * FROM student WHERE studentnr='$studentnr';";
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
$antallRader=mysqli_num_rows($sqlResultat);
if ($antallRader!=0) /* studenten er registrert fra før */
{
print ("Studenten er registrert fra f&oslashr");
}
else
{
$sqlSetning="INSERT INTO student (studentnr,fornavn,etternavn,klassekode)
VALUES('$studentnr','$fornavn','$etternavn','$klassekode');";
mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; registrere data i databasen");
print ("F&oslash;lgende student er n&aring; registrert: $studentnr $fornavn $etternavn $klassekode");
}
}
}
?>


