

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Search</title>
    <script type="text/javascript" src="check.js"></script>
    <link type="text/css" rel="stylesheet" href="index.css"/>
</head>

<body>
<div id="content">
<!--Nav Bar-->
<p id="navbar"><a href="index.php">add</a> /
	<a id="current" href="sub.php">search</a></p>
    
<!--Search Form-->
<div id="search">
<h3 id="searchform">search</h3>
<p>note: enter in multiple categories if you wish to search all posible results, in each category</p>
    <form id="add" action="sub.php" method="get" onsubmit="return validForm();">
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
         <br />
        <span class="line">genre: <input type="text" name="genre" onchange="validGenre(this.value);" />
        <span id="genremsg">*</span></span>
        <br />
       <span class="line"> <input type="submit" name="submit" value="search" />
        <span id="submitmsg">&nbsp;</span></span>
      </p>
    </form>
    </div>
  <div id="results">
<h3 id="resultshead">results</h3>
  <p>
<?php
	if(!isset($_GET['submit'])){
		print "+ please enter a search";
	}
	if(isset($_GET['submit'])){
	/*?>If submit is selected, open the form<?php */
	  $file=file("catalog.txt");
	 /*?>From the form, strip the tags from the input<?php */
	  $artist=strip_tags($_GET['artist']);
	  $song=strip_tags($_GET['song']);
	  $album=strip_tags($_GET['album']);
	  $year=strip_tags($_GET['year']);
	  $genre=strip_tags($_GET['genre']);
	  /*?>If nothing is entered for the category, that category is set to klashdfihweknacm as the likelihood for that to be a entry in the form is slim<?php */
	  if($artist==""){
		  $artist="klashdfihweknacm";
	  }
	  if($song==""){
		  $song="klashdfihweknacm";
	  }
	  if($album==""){
		  $album="klashdfihweknacm";
	  }
	  if($year==""){
		  $year="klashdfihweknacm";
	  }
	  if($genre==""){
		  $genre="klashdfihweknacm";
	  }
	  /*?>Counter to see if there are entries in the catalog<?php */
	 $j=0;
	 /*?>Search: for each line, associated with the category according to how it is put into the file, print each category, if the input entered by the user in the search form above matches the information in the form<?php */
	  for($i=0; $i<count($file); $i+=5){
		  if(stristr($file[$i], $artist) || stristr($file[$i+1], $song) || stristr($file[$i+2], $album) || stristr($file[$i+3], $year) || stristr($file[$i+4], $genre)){
			
			  print "+ ARTIST: ".$file[$i]."/ ";
			  print "SONG: ".$file[$i+1]."/ ";
			  print "ALBUM: ".$file[$i+2]."/ ";
			  print "YEAR: ".$file[$i+3]."/ ";
			  print "GENRE: ".$file[$i+4]."<br /><br />";
			 $j=1;
			   
		  }
	  }
	  /*?>Because no entries matched, the if statment returned false, so the counter stays at 0<?php */
	  if($j==0){
			print "+ no matches, try another";
		}
	}
?>
</p>
</div>
</div>
</body>
</html>