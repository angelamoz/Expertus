<?php
Error_Reporting(0);
header("Content-Type: text/html; charset=utf-8");
include("dbLink.php");
include("WebForm.inc.php");

$imageSize=round($_FILES['image']['size']/1024,0);

//Tikrinam nuotraukos dydį
if($_FILES["image"]["size"] > 512000)
   { include("index.php");
    echo ("<center><font color=red> Nuotrakos dydis daugiau nei 500 KB: ".$imageSize." KB </font></center>");   
     //header("location: index.php");
   } else {

//Gaumanam ir tikrinam formos duomenis
$pname=$_POST['name'];                                                  //1. Vardas

$pyear=$_POST['year']; $pmonth=$_POST['month']; $pday=$_POST['day'];
$pbirthdate = date('Y-m-d',strtotime($pday.'-'.$pmonth.'-'.$pyear));    //2. Gimimo data

$pgender=$_POST['gender'];                                              //3. Lytis
$pprogramming=$_POST['programming'];                                    //4. Ar domitės programavimu? taip/ne

$pimage=(!empty($_FILES['image']['name']))?$_FILES['image']['name']:''; //6. Patalpinta nuotrauka
$planguages = ''; 
    
if ($_POST['programming'] == 'taip')
    {  
     if (!empty($_POST['languages']) )
     {
        foreach($_POST['languages'] as $language) 
        {
        $planguages= $planguages." ".$language;                         //5. Programavimo kalbos
        }
     };     
    };  

//Įrašom į MySQL duomenų bazę Z:\usr\local\mysql-5.5\data\questionnaire\expertus.frm
mysqli_query($link, "insert into expertus (name, birthday, gender, programming, languages, image)
values ('$pname','$pbirthdate','$pgender', '$pprogramming','$planguages','$pimage')");

//Apklausa baigta, rodom užpildyta anketa 
$table=$HeaderHTML."<center><h4>Apklausa baigta.<BR> Anketos informacija įrašyta į duomenų bazę.</h4></center><br>";
$tableNo=$table.$FooterHTML;

if ($pprogramming == 'ne') {echo $tableNo;} 
elseif (substr($planguages,1,6) == 'Nemoku') {echo $tableNo;}
else  {     
        $table=$table."<center><b>Užpildytos anketos duomenys:</b> <BR>
        1. Vardas: <b>".$pname."</b> <BR> 
        2. Gimimo data: <b>".$pbirthdate."</b> <BR>
        3. Lytis: <b>".$pgender."</b> <BR>
        4. Ar domitės programavimu? <b>".$pprogramming."</b> <BR>
        5. Kokias programavimo kalbas mokate? <b>".$planguages."</b> <BR>";         
    if (!empty($_FILES['image']['name']))        
        { 
        $table=$table."6. Patalpinta nuotrauka <b>".$_FILES['image']['name']." ".$imageSize." MB</b> <BR> ";};  
        $table=$table.$FooterHTML;
        echo $table;
        };	
 }   
?>