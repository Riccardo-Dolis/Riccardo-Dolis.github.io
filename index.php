<html> 
<head>
	<title>Esercizi php</title>
	<meta charset="utf-8">
	
	<link href="https://fonts.googleapis.com/css?family=Oswald|Source+Sans+Pro" rel="stylesheet"> 
	<link rel="stylesheet" href="css/monitor.css" media="screen">
	<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
</head> 
<body>
<div id="container">
	<header id="header">
		<hgroup>
			<h1 style="color:#EFEFEF;" >Esercizi in PhP</h1>
			<h2>Tutti gli esercizi realizzati in php.</h2>
			<a href="index.html" id="logo"><img src="img/php.png" alt="Logo" /></a>
		</hgroup>
		
		 <ul class="topnav" id="myTopnav">
		  <li><a href="#nprimi">Numeri Primi</a></li>
		  <li><a href="#tpitagorica">Tavola Pitagorica</a></li>
		  <li><a href="#fattoriale">Fattoriale</a></li>
		  <li><a href="#fGet">Prova Form Get</a></li>
		  <li><a href="#fPost">Prova Form Post</a></li>
		  <li><a href="#bisestile">Calcoli sulla data</a></li>
		  <li><a href="#verIns">Verifica dati inseriti da tastiera</a></li>
		  <li class="icon">
		    <a href="javascript:void(0);" onclick="myFunction()">&#9776;</a>
		  </li>
		</ul>
	</header>
<div id="main-content">
	<section>
		<article id="nprimi">
				<h2>Numeri Primi da 1 a 20</h2>
				<p align=center>
				<?php
					$primi =20;
					function primo($num){
						for($i=2;$i<$num;$i++)
							if(!($num%$i))
								return 0;
						return 1;
					}
					 
					for($i=2;$i<=$primi;$i++)
						if(primo($i))
							print $i."<br>\n";
				?>
				</p>
		</article>
		<article id="tpitagorica" class="last">
				<h2>Tavola Pitagorica</h2>
				<p align=center>
				<?php	
					print"<table style='background-color:black;'>";
					for($i=1;$i<=10;$i++){
						print"<tr>";
						$v=$i%2;
						if($v==0){
							for($r=1;$r<=10;$r++){
							$n=$i*$r;
							print "<td style='background-color:green; color:white;'> ".$n."</td>";
							}
						}
						else{
							for($r=1;$r<=10;$r++){
							$n=$i*$r;
							print "<td style='background-color:white;'> ".$n."</td>";
							}
						}
						print"</tr>";
					}
					print"</table>";
			?>
			</p>
		</article>
	</section>	
		<section style="background-color:#EFEFEF;"> 
			<h2>Fattoriale</h2>
			<article id="fattoriale">
					<h3>di 10</h3>
					<?php		
						$r=10;
						for($i=10;$i>1;$i--){
							$v=$i-1;
							$r=$r*$v;
						}
						print "<p align=center style='color:green; font-size:15px;'>".$r."</p>\n";
					?>
			</article>
			<article class="last">
					<h3>di 15</h3>
					<?php		
						$r=15;
						for($i=15;$i>1;$i--){
							$v=$i-1;
							$r=$r*$v;	
						}
						print "<p align=center style='color:purple; font-size:15px;'>".$r."</p>\n";
					?>
			</article>		
	</section>
	<section>
		<article id="fGet">
				<h2>FormGet</h2>
				<form action="index.php" method="get">
					<label>Scrivi qualcosa</label><br>
					<input type="text" name="par" value=""><br>
					<input type="submit" value="invia" name="inviaG">
				</form>
		</article>
		<article class="last">
				<h2>Visualizzazione FormGet</h2>
				<?php	
					if(isset($_GET['inviaG'])){
						$par=$_GET["par"];
						if($par==""){
							print "<p>Non hai ancora scritto nulla</p>";	
						}
						else{
							if(is_Numeric($par)){
								print "<p>Hai scritto il numero: <em>".$par."</em></p>";
								$_GET[]=[""];
							}
							else{
								print "<p>Hai scritto la parola: <em>".$par."</em></p>";
								$_GET[]=[""];
							}
						}
					}
					else print "<p>Non hai ancora scritto nulla</p>";
				?>
		</article>
	</section>
	<section style="background-color:#EFEFEF;">
		<article id="fPost">
				<h2>FormPost</h2>
				<form action="index.php" method="post">
					<label>Username:</label><br>
					<input type="text" name="user"><br>
					<label>Password:</label><br>
					<input type="password" name="pas"><br>
					<input type="submit" value="invia" name="inviaP">
				</form>
		</article>
		<article class="last">
				<h2>Visualizzazione FormPost</h2>
				<?php	
					if(isset($_POST['inviaP'])){
						$user=$_POST["user"];
						$pas=$_POST["pas"];
						if($pas==""){
							if($user==""){
								print "<p>Hai lasciato vuoto entrambi i campi</p>";
							}
							else print "<p>Hai lasciato vuoto il campo password</p>";
						}
						else if($user==""){
							print "<p>Hai lasciato vuoto il campo username</p>";
						}
						else{
							print "<p>Ciao <em>".$user."</em>, la parola <em>".$pas."</em> e' stata salvata come password</p>";
							$_POST[]=[""];
						}
					}
					else print "<p>Inserisci username e password</p>";
				?>
		</article>
	</section>
	<section>
		<article id="bisestile">
				<fieldset>
				<legend>Calcolo Fine del mese e anno bisestile</legend>
				<h3>Inserisci una data a tuo piacere</h3>
				<form action="index.php" method="post">
					<label><em>GIORNO</em></label>
						<select name="giorno">
						  <option value="01">1</option>
						  <option value="02">2</option>
						  <option value="03">3</option>
						  <option value="04" checked="checked">4</option>
						  <option value="05">5</option>
						  <option value="06">6</option>
						  <option value="07">7</option>
						  <option value="08">8</option>
						  <option value="09">9</option>
						  <option value="10">10</option>
						  <option value="11">11</option>
						  <option value="12">12</option>
						  <option value="13">13</option>
						  <option value="14">14</option>
						  <option value="15">15</option>
						  <option value="16">16</option>
						  <option value="17">17</option>
						  <option value="18">18</option>
						  <option value="19">19</option>
						  <option value="20">20</option>
						  <option value="21">21</option>
						  <option value="22">22</option>
						  <option value="23">23</option>
						  <option value="24">24</option>
						  <option value="25">25</option>
						  <option value="26">26</option>
						  <option value="27">27</option>
						  <option value="28">28</option>
						  <option value="29">29</option>
						  <option value="30">30</option>
						  <option value="31">31</option>
						</select>
					<label><em>MESE</em></label>
						<select name="mese">
						  <option value="01">Gennaio</option>
						  <option value="02">Febbraio</option>
						  <option value="03" checked="checked">Marzo</option>
						  <option value="04">Aprile</option>
						  <option value="05">Maggio</option>
						  <option value="06">Giugno</option>
						  <option value="07">Luglio</option>
						  <option value="08">Agosto</option>
						  <option value="09">Settembre</option>
						  <option value="10">Ottobre</option>
						  <option value="11">Novembre</option>
						  <option value="12">Dicembre</option> 
						</select>
					<label><em>ANNO</em></label>
						<select name="anno">
						  <option value="2017">2017</option>
						  <option value="2016">2016</option>
						  <option value="2015">2015</option>
						  <option value="2014">2014</option>
						  <option value="2013">2013</option>
						  <option value="2012">2012</option>
						  <option value="2011">2011</option>
						  <option value="2010">2010</option>
						  <option value="2009">2009</option>
						  <option value="2008">2008</option>
						  <option value="2007">2007</option>
						  <option value="2006">2006</option>
						  <option value="2005">2005</option>
						  <option value="2004">2004</option>
						  <option value="2003">2003</option>
						  <option value="2002">2002</option>
						  <option value="2001">2001</option>
						  <option value="2000">2000</option>
						  <option value="1999">1999</option>
						  <option value="1998">1998</option>
						  <option value="1997" checked="checked">1997</option>
						  <option value="1996">1996</option>
						  <option value="1995">1995</option> 
						  <option value="1994">1994</option>
						  <option value="1993">1993</option>
						  <option value="1992">1992</option>
						  <option value="1991">1991</option>
						  <option value="1990">1990</option>
						  <option value="1989">1989</option>
						  <option value="1988">1988</option> 
						  <option value="1987">1987</option>
						  <option value="1986">1986</option>
						  <option value="1985">1985</option>
						  <option value="1984">1984</option>
						  <option value="1983">1983</option>
						</select>
					<br>
					<input type="submit" value="invia" name="inviaD">
					</fieldset>
				</form>
		</article>
		<article class="last">
				<?php	
					if(isset($_POST['inviaD'])){
						$a=$_POST["anno"];
						$m=$_POST["mese"];
						$giorno=$_POST["giorno"];
						if($a==2000){
							switch($m){
								case(12): $gmancanti=31-$giorno;
										  if($gmancanti==0){
											  $scritta="Oggi è l'ultimo dell'anno. Esci e non stare su internet";
										  }
										  else $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
										break;
										
								case(11): $g=31;
										  $gmancanti=30-$giorno;
										  $gmancanti=$gmancanti+$g;
										  $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
										 break;
										 
								case(10): $g=61;
										  $gmancanti=31-$giorno;
										  $gmancanti=$gmancanti+$g;
										  $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
										break;
										
								case(9): $g=92;
										 $gmancanti=30-$giorno;
										 $gmancanti=$gmancanti+$g;
										 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
										break;
										
								case(8): $g=122;	
										 $gmancanti=31-$giorno;
										 $gmancanti=$gmancanti+$g;
										 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
										break;
										
								case(7): $g=153;	
										 $gmancanti=31-$giorno;
										 $gmancanti=$gmancanti+$g;
										 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
										break;
										
								case(6): $g=184;
										 $gmancanti=30-$giorno;
										 $gmancanti=$gmancanti+$g;
										 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
										break;
										
								case(5): $g=214;
										 $gmancanti=31-$giorno;
										 $gmancanti=$gmancanti+$g;
										 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
										break;
										
								case(4): $g=245;
										 $gmancanti=30-$giorno;
										 $gmancanti=$gmancanti+$g;
										 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
										break;
										
								case(3): $g=275;
										 $gmancanti=31-$giorno;
										 $gmancanti=$gmancanti+$g;
										 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
										break;
										
								case(2): $g=306;
										 $gmancanti=29-$giorno;
										 $gmancanti=$gmancanti+$g;
										 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
										break;
										
								case(1): $g=334;	
										 $gmancanti=31-$giorno;
										 $gmancanti=$gmancanti+$g;
										 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
										 break;
							}
							print "<h1 align=center style='color:red;'><em>".$scritta."</em></h1>";
							print "<h3 style='color:green;'><em>".$giorno."/".$m."/".$a."</em></h3>";
						}
						else{
							$resto=$a/4;
							if($resto==0){
								//anno bisestile 366 giorni
								switch($m){
									case(12): $gmancanti=31-$giorno;
											  if($gmancanti==0){
												  $scritta="Oggi è l'ultimo dell'anno. Esci e non stare su internet";
											  }
											  else $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
											break;
											
									case(11): $g=31;
											  $gmancanti=30-$giorno;
											  $gmancanti=$gmancanti+$g;
											  $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
											 break;
											 
									case(10): $g=61;
											  $gmancanti=31-$giorno;
											  $gmancanti=$gmancanti+$g;
											  $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
											break;
											
									case(9): $g=92;
											 $gmancanti=30-$giorno;
											 $gmancanti=$gmancanti+$g;
											 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
											break;
											
									case(8): $g=122;	
											 $gmancanti=31-$giorno;
											 $gmancanti=$gmancanti+$g;
											 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
											break;
											
									case(7): $g=153;	
											 $gmancanti=31-$giorno;
											 $gmancanti=$gmancanti+$g;
											 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
											break;
											
									case(6): $g=184;
											 $gmancanti=30-$giorno;
											 $gmancanti=$gmancanti+$g;
											 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
											break;
											
									case(5): $g=214;
											 $gmancanti=31-$giorno;
											 $gmancanti=$gmancanti+$g;
											 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
											break;
											
									case(4): $g=245;
											 $gmancanti=30-$giorno;
											 $gmancanti=$gmancanti+$g;
											 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
											break;
											
									case(3): $g=275;
											 $gmancanti=31-$giorno;
											 $gmancanti=$gmancanti+$g;
											 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
											break;
											
									case(2): $g=306;
											 $gmancanti=29-$giorno;
											 $gmancanti=$gmancanti+$g;
											 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
											break;
											
									case(1): $g=335;	
											 $gmancanti=31-$giorno;
											 $gmancanti=$gmancanti+$g;
											 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
											 break;
								}
								print "<h1 align=center style='color:red;'><em>".$scritta."</em></h1>";
								print "<h3 style='color:green;'><em>".$giorno."/".$m."/".$a."</em></h3>";
							}
							else{
								//anno non bisestile 365 giorni
								switch($m){
									case(12): $gmancanti=31-$giorno;
											  if($gmancanti==0){
												  $scritta="Oggi è l'ultimo dell'anno. Esci e non stare su internet";
											  }
											  else $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
											break;
											
									case(11): $g=31;
											  $gmancanti=30-$giorno;
											  $gmancanti=$gmancanti+$g;
											  $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
											 break;
											 
									case(10): $g=61;
											  $gmancanti=31-$giorno;
											  $gmancanti=$gmancanti+$g;
											  $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
											break;
											
									case(9): $g=92;
											 $gmancanti=30-$giorno;
											 $gmancanti=$gmancanti+$g;
											 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
											break;
											
									case(8): $g=122;	
											 $gmancanti=31-$giorno;
											 $gmancanti=$gmancanti+$g;
											 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
											break;
											
									case(7): $g=153;	
											 $gmancanti=31-$giorno;
											 $gmancanti=$gmancanti+$g;
											 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
											break;
											
									case(6): $g=184;
											 $gmancanti=30-$giorno;
											 $gmancanti=$gmancanti+$g;
											 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
											break;
											
									case(5): $g=214;
											 $gmancanti=31-$giorno;
											 $gmancanti=$gmancanti+$g;
											 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
											break;
											
									case(4): $g=245;
											 $gmancanti=30-$giorno;
											 $gmancanti=$gmancanti+$g;
											 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
											break;
											
									case(3): $g=275;
											 $gmancanti=31-$giorno;
											 $gmancanti=$gmancanti+$g;
											 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
											break;
											
									case(2): $g=306;
											 $gmancanti=29-$giorno;
											 $gmancanti=$gmancanti+$g;
											 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
											break;
											
									case(1): $g=334;	
											 $gmancanti=31-$giorno;
											 $gmancanti=$gmancanti+$g;
											 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
											 break;
								}
							}
							print "<h1 align=center style='color:red;'><em>".$scritta."</em></h1>";
							print "<h3 style='color:green;'><em>".$giorno."/".$m."/".$a."</em></h3>";
						}
					}
					else print "<p>Selezionare una data tramite i select dell'article e poi premere il bottone.</p>";
				?>
		</article>
	</section>
	<section style="background-color:#EFEFEF;">
		<article id="verIns">
				<fieldset>
				<legend>Verifica dati di inserimento</legend>
				<ol><h3><em>In questo esercizio attraverso l'inserimento di una data verra'</em></h3></ol>
					<li>Calcolato se l'anno e' bisestile</li>
					<li>Calcolato quanti giorni mancano alla fine dell'anno</li>
				<form action="index.php" method="post">
					<label>Giorno:</label><br>
					<input type="text" name="g" style="radius:20%;"><br>
					<label>Mese:</label><br>
					<input type="text" name="m" style="radius:20%;"><br>
					<label>Anno:</label><br>
					<input type="text" name="a" style="radius:20%;"><br>
					<input type="submit" value="invia" name="inviaDati">
				</form>
				</fieldset>
		</article>
		<article class="last">
				<h2>Visualizzazione FormPost</h2>
				<?php	
					if(isset($_POST['inviaDati'])){
						$varG=$_POST["g"];
						$varM=$_POST["m"];
						$varA=$_POST["a"];
						$varbolG=false;
						$varbolM=false;
						$varbolA=false;
						$varg1=" ";
						$varg2=" ";
						$varg3=" ";
						$varm1=" ";
						$varm2=" ";
						$varm3=" ";
						$vara1=" ";
						$vara2=" ";
						
						//CONTROLLO GIORNO
						if($varG!=""){
							if(is_Numeric($varG)){
									if($varG<=31){
										$varbolG=true;
									}	
									else{
									$varg3="Il giorno inserito non e' valido";
									$varbolG=false;
									}
							}
							else{
								$varg2="La casella giorno non contiene un numero";
								$varbolG=false;
							}
						}
						else{
							$varg1="La casella giorno non e' stata riempita";
						}
						
						//CONTROLLO MESE
						if($varM!=""){
							if(is_Numeric($varM)){
									if(($varM!=0)&&($varM<=12)){
										$varbolM=true;
									}	
									else{
									$varm3="Il mese inserito non e' valido";
									$varbolM=false;
									}
							}
							else{
								$varm2="Il mese va inserito in numero";
								$varbolM=false;
							}
						}
						else{
							$varm1="La casella mese non e' stata riempita";
						}
						
						//CONTROLLO ANNO
						if($varA=="")$vara1="La casella anno non e' stata riempita";
							else if(is_Numeric($varA)) $varbolA=true;
							else{
								$vara2="La casella anno non contiene un numero";
								$varbolA=false;
							}
						
						//VERIFICA ERRORI
						if(($varbolG==true)&&($varbolM==true)&&($varbolA==true)){
							//INIZIO CALCOLI PER RESTITUIRE IL PRODOTTO AL CLIENTE
							//VERIFICARE SE L'ANNO E' UN INIZIO DI SECOLO
							if($varM>15){}
							else{
								$resto=$varA/4;
								$giorno=$varG;
								if($resto==0){
									//anno bisestile 366 giorni
									switch($varM){
										case(12): $gmancanti=31-$giorno;
												  if($gmancanti==0){
													  $scritta="Oggi è l'ultimo dell'anno. Esci e non stare su internet";
												  }
												  else $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
												break;
												
										case(11): $g=31;
												  $gmancanti=30-$giorno;
												  $gmancanti=$gmancanti+$g;
												  $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
												 break;
												 
										case(10): $g=61;
												  $gmancanti=31-$giorno;
												  $gmancanti=$gmancanti+$g;
												  $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
												break;
												
										case(9): $g=92;
												 $gmancanti=30-$giorno;
												 $gmancanti=$gmancanti+$g;
												 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
												break;
												
										case(8): $g=122;	
												 $gmancanti=31-$giorno;
												 $gmancanti=$gmancanti+$g;
												 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
												break;
												
										case(7): $g=153;	
												 $gmancanti=31-$giorno;
												 $gmancanti=$gmancanti+$g;
												 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
												break;
												
										case(6): $g=184;
												 $gmancanti=30-$giorno;
												 $gmancanti=$gmancanti+$g;
												 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
												break;
												
										case(5): $g=214;
												 $gmancanti=31-$giorno;
												 $gmancanti=$gmancanti+$g;
												 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
												break;
												
										case(4): $g=245;
												 $gmancanti=30-$giorno;
												 $gmancanti=$gmancanti+$g;
												 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
												break;
												
										case(3): $g=275;
												 $gmancanti=31-$giorno;
												 $gmancanti=$gmancanti+$g;
												 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
												break;
												
										case(2): $g=306;
												 $gmancanti=29-$giorno;
												 $gmancanti=$gmancanti+$g;
												 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
												break;
												
										case(1): $g=335;	
												 $gmancanti=31-$giorno;
												 $gmancanti=$gmancanti+$g;
												 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
												 break;
									}
									print "<h1 align=center style='color:red;'><em>".$scritta."</em></h1>";
									print "<h3 style='color:green;'><em>".$giorno."/".$m."/".$a."</em></h3>";
								}
								else{
									//anno non bisestile 365 giorni
									switch($varM){
										case(12): $gmancanti=31-$giorno;
												  if($gmancanti==0){
													  $scritta="Oggi è l'ultimo dell'anno. Esci e non stare su internet";
												  }
												  else $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
												break;
												
										case(11): $g=31;
												  $gmancanti=30-$giorno;
												  $gmancanti=$gmancanti+$g;
												  $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
												 break;
												 
										case(10): $g=61;
												  $gmancanti=31-$giorno;
												  $gmancanti=$gmancanti+$g;
												  $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
												break;
												
										case(9): $g=92;
												 $gmancanti=30-$giorno;
												 $gmancanti=$gmancanti+$g;
												 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
												break;
												
										case(8): $g=122;	
												 $gmancanti=31-$giorno;
												 $gmancanti=$gmancanti+$g;
												 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
												break;
												
										case(7): $g=153;	
												 $gmancanti=31-$giorno;
												 $gmancanti=$gmancanti+$g;
												 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
												break;
												
										case(6): $g=184;
												 $gmancanti=30-$giorno;
												 $gmancanti=$gmancanti+$g;
												 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
												break;
												
										case(5): $g=214;
												 $gmancanti=31-$giorno;
												 $gmancanti=$gmancanti+$g;
												 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
												break;
												
										case(4): $g=245;
												 $gmancanti=30-$giorno;
												 $gmancanti=$gmancanti+$g;
												 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
												break;
												
										case(3): $g=275;
												 $gmancanti=31-$giorno;
												 $gmancanti=$gmancanti+$g;
												 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
												break;
												
										case(2): $g=306;
												 $gmancanti=29-$giorno;
												 $gmancanti=$gmancanti+$g;
												 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
												break;
												
										case(1): $g=334;	
												 $gmancanti=31-$giorno;
												 $gmancanti=$gmancanti+$g;
												 $scritta="Mancano ".$gmancanti." giorni alla fine dell'anno";
												 break;
									}
								}
								print "<h1 align=center style='color:red;'><em>".$scritta."</em></h1>";
								print "<h3 style='color:green;'><em>".$varG."/".$varM."/".$varA."</em></h3>";
							}
						}
						
						else{
								//SONO STATI COMMESSI ERRORI
								print "<fieldset>";
								print "<ol>Hai commesso i seguenti errori:</ol>";
								if($varg1!=" ") print "<li>".$varg1."</li>";
								if($varg2!=" ") print "<li>".$varg2."</li>";
								if($varg3!=" ") print "<li>".$varg3."</li>";
								if($varm1!=" ") print "<li>".$varm1."</li>";
								if($varm2!=" ") print "<li>".$varm2."</li>";
								if($varm3!=" ") print "<li>".$varm3."</li>";
								if($vara1!=" ") print "<li>".$vara1."</li>";
								if($vara2!=" ") print "<li>".$vara2."</li>";
								print "</fieldset>";						
						}	
					}
					else print "<p>Inserisci la data</p>";
				?>
		</article>
	</section>
</div>
	<footer id="footer">
		<div>
			<p>@ 2016 tutti i diritti riservati - <em>Dolis Riccardo </em>- 2016/2017</p>
		</div>		
	</footer>
</div>
<script type="text/javascript">
/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
</body>
</html>