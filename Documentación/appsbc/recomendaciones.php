<?php
include_once 'template_head.php';
?>
	<div class="body3">
		<div class="main">
<!-- content -->
			<article id="content">


			<center>
			<?php
			$sparql_query = 'select distinct ?video ?tipo ?fecha ?descripcion ?titulo ?canal ?canal_id ?artista ?genre from <http://localhost:8890/videos>  where {
				?video <http://www.w3.org/1999/02/22-rdf-syntax-ns#type> <http://www.ebu.ch/metadata/ontologies/ebucore/ebucore#YouTubeVideo> . 
				?video <http://www.ebu.ch/metadata/ontologies/ebucore/ebucore#source> "'. $_GET['video'] .'" . 
				?video <http://videosmusicales.org/ontology/belong> ?t . 
				?t <http://www.w3.org/2000/01/rdf-schema#label> ?tipo .
				?video <http://www.ebu.ch/metadata/ontologies/ebucore/ebucore#date> ?fecha . 
				?video <http://www.ebu.ch/metadata/ontologies/ebucore/ebucore#description> ?description . 
				?video <http://www.ebu.ch/metadata/ontologies/ebucore/ebucore#title> ?titulo . 
				?video <http://www.ebu.ch/metadata/ontologies/ebucore/ebucore#hasPublicationChannel> ?c .
				?c <http://www.ebu.ch/metadata/ontologies/ebucore/ebucore#publicationChannelName> ?canal .
				?c <http://www.ebu.ch/metadata/ontologies/ebucore/ebucore#source> ?canal_id .
				?a <http://www.ebu.ch/metadata/ontologies/ebucore/ebucore#hasvideos> ?video .
				?a <http://www.w3.org/2001/vcard-rdf/3.0#FN> ?artista .
				?a <http://videosmusicales.org/ontology/hasmusicGenre> ?g .
				?g <http://www.w3.org/2000/01/rdf-schema#label> ?genre .
				} LIMIT 1';

				$dataTypes = sparql_get( "http://localhost:8890/sparql", $sparql_query);
           		
	            foreach( $dataTypes as $row )
                {
                	echo "<h3>". $row['titulo'] . "</h3>";
                  //$Victima[]=array("count"=>$row["count"]);
                  	

                	?>
			<iframe width="650" height="390" src="https://www.youtube.com/embed/<?php echo $_GET['video'] ?>" frameborder="0" allowfullscreen></iframe>

			<?php
					//if (isset($row['descripcion'])) 
					//secho "<p>" . $row['descripcion'] . "</p>";
					echo "<p>" . $row['artista'] . "</p>";
					echo "<p>" . $row['tipo'] . "</p>";
					echo "<p>" . $row['fecha'] . "</p>";
					echo "<p> nombre para enlace a youtube " . $row['canal'] . "</p>";
					echo "<p> enlace a youtube " . $row['canal_id'] . "</p>";
					echo "<p>" . $row['genre'] . "</p>";


                 }
			?>

			</center>




				<!--div class="wrapper">
					<section class="cols">
						<div class="wrapper pad_bot2">
							<h3><span class="dropcap">1</span>Gerardo Morán</h3>
							<figure><img src="https://i.ytimg.com/vi/1fMIdQP94GQ/hqdefault.jpg?sqp=-oaymwEXCPYBEIoBSFryq4qpAwkIARUAAIhCGAE=&rs=AOn4CLDFRB793OqMaLaFpg4f0vAgHlGQSg" alt=""></figure>
							<p class="pad_bot1">Lejos de Ti </p>
							<a href="https://www.youtube.com/watch?v=1fMIdQP94GQ" class="link1">Ver Más</a>
						</div>
						<div class="wrapper">
							<h3><span class="dropcap">4</span>J. Luis del Hierro</h3>
							<figure><img src="https://i.ytimg.com/vi/-GjpNEWKDvg/hqdefault.jpg?sqp=-oaymwEXCPYBEIoBSFryq4qpAwkIARUAAIhCGAE=&rs=AOn4CLAnzu4NEY-_FDUdRD55XJj_fTyMNw" alt=""></figure>
							<p class="pad_bot1">Prisionero</p>
							<a href="https://www.youtube.com/watch?v=-GjpNEWKDvg&list=PLVLnLa75lCTTaho6AEPdMRnpvCgiL7_6v" class="link1">Ver Más</a>
						</div>
					</section>
					<section class="cols pad_left1">
						<div class="wrapper pad_bot2">
							<h3><span class="dropcap">2</span>Daniel Betancourth</h3>
							<figure><img src="https://i.ytimg.com/vi/0MvRQhcBiDo/hqdefault.jpg?sqp=-oaymwEXCPYBEIoBSFryq4qpAwkIARUAAIhCGAE=&rs=AOn4CLB_vvFfXt0wJXzvB02XuHrjqFEEHw" alt=""></figure>
							<p class="pad_bot1">Tus Colores</p>
							<a href="https://www.youtube.com/watch?v=0MvRQhcBiDo" class="link1">Ver Más</a>
						</div>
						<div class="wrapper">
							<h3><span class="dropcap">5</span>Daniel Betancourth</h3>
							<figure><img src="https://i.ytimg.com/vi/pCraX5gksYk/hqdefault.jpg?sqp=-oaymwEXCPYBEIoBSFryq4qpAwkIARUAAIhCGAE=&rs=AOn4CLAJ07X3ri6vgU3UXU5q2eB9mNc8JA" alt=""></figure>
							<p class="pad_bot1">Exótica.</p>
							<a href="https://www.youtube.com/watch?v=pCraX5gksYk" class="link1">Ver Más</a>
						</div>
					</section>
					<section class="cols pad_left1">
						<div class="wrapper pad_bot2">
							<h3><span class="dropcap">3</span>J. Fernando Velasco</h3>
							<figure><img src="https://i.ytimg.com/vi/aEFUuksN3SM/hqdefault.jpg?sqp=-oaymwEXCPYBEIoBSFryq4qpAwkIARUAAIhCGAE=&rs=AOn4CLBzrUH9b9lyITF8sIeRtKo-pDMK9A" alt=""></figure>
							<p class="pad_bot1">Hoy que no estás</p>
							<a href="https://www.youtube.com/watch?v=aEFUuksN3SM" class="link1">Ver Más</a>
						</div>
						<div class="wrapper">
							<h3><span class="dropcap">6</span>J. Fernando Velasco</h3>
							<figure><img src="https://i.ytimg.com/vi/VIBJpFURBSg/hqdefault.jpg?sqp=-oaymwEXCPYBEIoBSFryq4qpAwkIARUAAIhCGAE=&rs=AOn4CLB_3MC7oekeUbFSE9Z_Erv_WJhrhw" alt=""></figure>
							<p class="pad_bot1">Tu no me perteneces</p>
							<a href="https://www.youtube.com/watch?v=VIBJpFURBSg" class="link1">Ver Más</a>
						</div>
					</section>
				</div-->

			</article>
		</div>
	</div>
	<div class="body4">
		<div class="main">
			<article id="content2">
				<div class="wrapper">
					
					
					<section class="col3 pad_left2">
						<h4>Follow Us</h4>
						<ul id="icons">
							<li><a href="#"><img src="images/icon1.jpg" alt="">Facebook</a></li>
							<li><a href="#"><img src="images/icon2.jpg" alt="">Twitter</a></li>
							<li><a href="#"><img src="images/icon3.jpg" alt="">LinkedIn</a></li>
							<li><a href="#"><img src="images/icon4.jpg" alt="">Delicious</a></li>
						</ul>
					</section>
					<section class="col2 right">
						<h4>Newsletter</h4>
						<form id="newsletter" method="post">
							<div>
								<div class="wrapper">
									<input class="input" type="text" value="Type Your Email Here"  onblur="if(this.value=='') this.value='Type Your Email Here'" onFocus="if(this.value =='Type Your Email Here' ) this.value=''" >
								</div>
								<a href="#" class="button" onClick="document.getElementById('newsletter').submit()">Subscribe</a>
							</div>
						</form>
					</section>
				</div>
			</article>
<!-- content end -->
		</div>
	</div>
		<div class="main">
<!-- footer -->
			<footer>
				<a rel="nofollow" href="#" target="_blank">Sistema Recomendador</a> Cultura yt Música<br>
			</footer>
<!-- footer end -->
		</div>
<script type="text/javascript"> Cufon.now(); </script>
<script>
	$(document).ready(function() {
		tabs.init();
	})
</script>
</body>
</html>