<?php
  if(isset($_POST['submit'])){
	/*?>If submit is set, open the file to append the new information to the last line of the file.<?php*/
	$file = fopen("catalog.txt", 'a+');
    /*?>Strip the tags on the information the user has entered<?php */
	$artist=strip_tags($_POST['artist']);
   	$song=strip_tags($_POST['song']);
   	$album=strip_tags($_POST['album']);
   	$year=strip_tags($_POST['year']);
   	$genre=strip_tags($_POST['genre']);
	/*?>Trim the whitespace off the information the user has entered, before saving it into the file<?php*/
	$artist=trim($artist);
	$song=trim($song);
	$album=trim($album);
	$year=trim($year);
	$genre=trim($genre);
    /*?>Enter the information the user wants to add to the file<?php */
	fputs($file,"$artist\n$song\n$album\n$year\n$genre\n");
    fclose($file);
  }
  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Add</title>
    <link type="text/css" rel="stylesheet" href="index.css"/>
    <script type="text/javascript" src="check.js"></script>
</head>

<body>
<div id="content">
	<!--Nav Bar-->
  	<p id="navbar"><a id="current" href="index.php">add</a>
 /	<a href="sub.php">search</a></p>
    
   <!--Add to the catalog form, with javascript to indicate to the user the kinds of information required to add to the catalog, as they are typing--> 
   <div id="addform">
  <h3 id="addhead">add to the catalog</h3>
    <p>* indicates required field</p>
<form id="add" action="index.php" method="post" onsubmit="return validAll();">
  <p>
      <span class="line">artist: <input type="text" name="artist" onchange="validArtist(this.value);" />
        <span id="artistmsg">*</span></span>
        <br />
     <span class="line">song: <input type="text" name="song" onchange="validSong(this.value);" />
        <span id="songmsg">*</span></span>
        <br />
      <span class="line">album: <input type="text" name="album" onchange="validAlbum(this.value);" />
        <span id="albummsg">*</span></span>
        <br />
      <span class="line">year: <select name="year" onchange="validYear(this.value);"> 
            <option id="select">select one:</option>
                <option>before 1940</option>
                <option>1940</option>
                <option>1941</option>
                <option>1942</option>
                <option>1943</option>
                <option>1944</option>
                <option>1945</option>
                <option>1946</option>
                <option>1947</option>
                <option>1948</option>
                <option>1949</option>
                <option>1950</option>
                <option>1951</option>
                <option>1952</option>
                <option>1953</option>
                <option>1954</option>
                <option>1955</option>
                <option>1956</option>
                <option>1957</option>
                <option>1958</option>
                <option>1959</option>
                <option>1960</option>
                <option>1961</option>
                <option>1962</option>
                <option>1963</option>
                <option>1964</option>
                <option>1965</option>
                <option>1966</option>
                <option>1967</option>
                <option>1968</option>
                <option>1969</option>
                <option>1970</option>
                <option>1971</option>
                <option>1972</option>
                <option>1973</option>
                <option>1974</option>
                <option>1975</option>
                <option>1976</option>
                <option>1977</option>
                <option>1978</option>
                <option>1979</option>
                <option>1980</option>
                <option>1981</option>
                <option>1982</option>
                <option>1983</option>
                <option>1984</option>
                <option>1985</option>
                <option>1986</option>
                <option>1987</option>
                <option>1988</option>
                <option>1989</option>
                <option>1990</option>
                <option>1991</option>
                <option>1992</option>
                <option>1993</option>
                <option>1994</option>
                <option>1995</option>
                <option>1996</option>
                <option>1997</option>
                <option>1998</option>
                <option>1999</option>
                <option>2000</option>
                <option>2001</option>
                <option>2002</option>
                <option>2003</option>
                <option>2004</option>
                <option>2005</option>
                <option>2006</option>
                <option>2007</option>
                <option>2008</option>
                <option>2009</option>
                <option>2010</option>
                <option>2011</option>
                <option>2012</option>
            </select> 
            <span id="yearmsg">*</span></span>
         <br/>
      <span class="line">genre: <input type="text" name="genre" onchange="validGenre(this.value);" />
        <span id="genremsg">*</span></span>
        <br />
        <span class="line"><input type="submit" name="submit" value="add" />
        <span id="submitmsg">&nbsp;</span></span>
  </p>
  </form>
  </div>
 <div id="catalog">
  <h3 id="cataloghead">catalog</h3>
  
  <?php
  /*?>Access the file, to print out the catalog<?php */
    $file=file("catalog.txt");
	/*?>Since I addd the information to the file, with a category on each line, as the user wants to add to the catalog, the new input will enter the for loop and print out the information according to the category that is assigned to the line in the file as the information is an array in the file<?php */
	for($i=0; $i<count($file); $i+=5){
		  
			  print "+ ARTIST: ".$file[$i]."/ ";
			  print "SONG: ".$file[$i+1]."/ ";
			  print "ALBUM: ".$file[$i+2]."/ ";
			  print "YEAR: ".$file[$i+3]."/ ";
			  print "GENRE: ".$file[$i+4]."<br /><br />";
		  
	  }
  ?>
  </div>
  </div>
</body>
</html>