<?php
Error_Reporting(0);
header("Content-Type: text/html; charset=utf-8");
include("WebForm.inc.php");
include("dbLink.php");
$HeaderHTML;
?>


<form method="post" enctype="multipart/form-data" action="addRecord.php" name="expertus" id="expertusform" >    

<table width='600' height='400' border='0' align='center' cellpadding='0' cellspacing='0' >

<tr>
<td align='left'>
<b>1. Koks jūsų vardas?</b> 
	<input type='text' name='name' required > 
</td>
</tr>

<tr>
<td align='left'><b>2. Jūsų gimimo data:</b> 

    <select name="year" required> 
<?php 
    for($i=1950;$i<=2015;$i++)
    {
        echo '<option value='.$i.'>'.$i.'</option>';
    }
 ?>
    </select>
    
    <select name="month" required>
    <option value="01">Sausis</option>
    <option value="02">Vasaris</option>
    <option value="03">Kovas</option>
    <option value="04">April</option>
    <option value="05">Gegužė</option>
    <option value="06">Birželis</option>
    <option value="07">Liepa</option>
    <option value="08">Rugpjūtis</option>
    <option value="09">Rugsėjis</option>
    <option value="10">Spalis</option>
    <option value="11">Lapkritis</option>
    <option value="12">Gruodis</option>
    </select>
    
    <select name="day" required>
 <?php 
     
    for($i=1;$i<=31;$i++)
    {
        echo '<option value='.$i.'>'.$i.'</option>';
    }
  ?>   
     </select>     
</td>
</tr>
<tr>
<td align='left'><b>3. Lytis: </b>
	<input type='radio' name='gender' required value='vyras'> vyras
	<input type='radio' name='gender' required value='moteris'> moteris
</td> 
</tr>
<td align='left'><b>4. Ar domitės programavimu?</b>
	<input type='radio' name='programming' id='programming_yes' required value='taip'> taip
	<input type='radio' name='programming' id='programming_no' required value='ne' onclick="checkedRadioBtn()"> ne
</td> 
</tr>

<tr>
<td align='left'><b>5. Kokias programavimo kalbas mokate?</b><br>
	<input type='checkbox' name='languages[]' id='PHP'  value='PHP' onclick="uncheck('Nemoku');" /> PHP
	<input type='checkbox' name='languages[]' id='CSS' value='CSS' onclick="uncheck('Nemoku');" /> CSS
	<input type='checkbox' name='languages[]' id='HTML' value='HTML' onclick="uncheck('Nemoku');" /> HTML
	<input type='checkbox' name='languages[]' id='Java' value='Java' onclick="uncheck('Nemoku');" /> Java
	<input type='checkbox' name='languages[]' id='Nemoku' value='Nemoku nė vienos' 
    onclick="uncheck('PHP','CSS','HTML','Java');" /> Nemoku nė vienos    
</td>
</tr>

<tr>
<td align='left'>  
<b>6. Prašome patalpinti savo nuotrauka:</b> 
	 <input type="file" name="image" id="image" /> 
     <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
</td>
</tr>

<td colspan='2' align='center'>
<input type='submit' value='Tęsti' />
</td>
</tr>
</table>

<?php
$FooterHTML;
?>

<script type="text/javascript">
    function uncheck()
    {
        var a=uncheck.arguments,z0=0;
        for (;z0<a.length;z0++)
        {
            document.getElementById(a[z0])?document.getElementById(a[z0]).checked=false:null;
        }
    };

    function checkedRadioBtn(sGroupName)
    {   
        var radio_check_val = "";
        for (i = 0; i < document.getElementsByName('programming').length; i++) 
        {
            if (document.getElementsByName('programming')[i].checked) 
            {
                alert("Apklausa baigta"); 
                radio_check_val = document.getElementsByName('programming')[i].value;
                if (radio_check_val === "ne") 
                {
                    document.getElementById("expertusform").submit();
                }                
            }
        }
    }
    
    function checkSize(max_img_size)
{
    var input = document.getElementById("image");
    // check for browser support (may need to be modified)
    if(input.files && input.files.length == 1)
    {           
        if (input.files[0].size > max_img_size) 
        {
            alert("Nuotraukos dydis turi būti mažiau už " + (max_img_size) + "B");
            return false;
        }
    }

    return true;
}
</script>   