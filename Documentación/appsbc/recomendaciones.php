<?php
include_once 'template_head.php';
?>
	<div class="body3">
	<meta charset="utf-8">
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
					echo "<h3>Artísta Ecuatoriano(a)</h3>";
					echo "<p>" . $row['artista'] . "</p>";
					echo "<h3>Tipo de Video de Youtube</h3>";
					echo "<p>" . $row['tipo'] . "</p>";
					echo "<h3>Fecha de Publicación del Video</h3>";
					echo "<p>" . $row['fecha'] . "</p>";
					echo "<h3>Genero Musical</h3>";
					echo "<p>" . $row['genre'] . "</p>";
					echo "<h3>Canal del Artísta en Youtube de ". $row['artista'] ."</h3>";
					echo "<p>" . $row['canal'] . "</p>";
					echo "<h3>Enlace del Canal</h3>";
					echo "<p><a href='https://www.youtube.com/channel/". $row['canal_id'] . "'>https://www.youtube.com/channel/". $row['canal_id'] . "</a></p>";
					//echo "<p> enlace a youtube " . $row['canal_id'] . "</p>";


                 }
			?>

			</center>


			</article>
		</div>
	</div>
	<div class="body4">
		<div class="main">
			<article id="content2">
				<div class="wrapper">
					<section class="col3">
						<h4>Sobre Que se Trata?</h4>
						<ul class="list1">
							<li><a href="#">Artístas</a></li>
							<li><a href="#">Cantantes</a></li>
							<li><a href="#">Cantantes Ecuatorianos</a></li>
						</ul>
					</section>
					<section class="col3 pad_left2">
						<h4>Dirección</h4>
						<ul class="address">
							<li><span>País:</span>Ecuador</li>
							<li><span>Ciudad:</span>Loja</li>
							<li><span>Teléfono:</span>0956784345</li>
							<li><span>Email:</span><a href="mailto:">wicaraguay@gmail.com</a></li>
						</ul>
					</section>
					<section class="col3 pad_left2">
						<h4>Redes Sociales</h4>
						<ul id="icons">
							<li><a href="#"><img src="images/icon1.jpg" alt="">Facebook</a></li>
							<li><a href="#"><img src="images/icon2.jpg" alt="">Twitter</a></li>
							<li><a href="#"><img src="images/icon3.jpg" alt="">LinkedIn</a></li>
							<li><a href="#"><img src="images/icon4.jpg" alt="">Delicious</a></li>
						</ul>
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