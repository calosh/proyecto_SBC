<?php
include_once 'template_head.php';
?>
	<div class="body3">
		<div class="main">
<!-- content -->
			<article id="content">
				<?php
				$sparql_query = "select distinct ?video ?source ?title from <http://localhost:8890/videos>  where {" . 
((isset($_GET['busq_tipo']) && $_GET['busq_tipo'] === "on") ?
	(
		// caso verdadero
		"?video <http://videosmusicales.org/ontology/belong> <http://videosmusicales.org/videos/" .
		$_GET['tipo'] .
		"> . "
	) : 
		"" // caso falso
	) .
((isset($_GET['busq_artista']) && $_GET['busq_artista'] === "on") ?
	(
		// caso verdadero
		"<http://videosmusicales.org/videos/" . $_GET['artista'] . "> <http://www.ebu.ch/metadata/ontologies/ebucore/ebucore#hasvideos> " .
		"?video . "
	) : 
		"" // caso falso
	) .
((isset($_GET['busq_genero']) && $_GET['busq_genero'] === "on") ?
	(
		// caso verdadero
		"?artista <http://videosmusicales.org/ontology/hasmusicGenre> <http://videosmusicales.org/videos/" . $_GET['genero'] . "> . 
?artista <http://www.ebu.ch/metadata/ontologies/ebucore/ebucore#hasvideos> ?video . "
	) : 
		"" // caso falso
	) .
"?video ?p ?o . " .
"?video <http://www.ebu.ch/metadata/ontologies/ebucore/ebucore#title> ?title . " .
"?video <http://www.ebu.ch/metadata/ontologies/ebucore/ebucore#source> ?source . " .
"}";
				//echo $sparql_query;

				$types=array();
            		$dataTypes = sparql_get("http://localhost:8890/sparql", $sparql_query);
           		
	            foreach( $dataTypes as $row )
                {
                	echo "<a href='recomendaciones.php?video=". $row['source'] . "'>" . $row['title'] . "</a><br>";
                  //$Victima[]=array("count"=>$row["count"]);
                  	
                 }

				?>

			</article>
		</div>
	</div>
	<div class="body4">
		<div class="main">
			<article id="content2">
				<div class="wrapper">
					<section class="col3">
						<h4>Why Us?</h4>
						<ul class="list1">
							<li><a href="#">Lorem ipsum dolor sit</a></li>
							<li><a href="#">Dmet, consectetur</a></li>
							<li><a href="#">Adipisicing elit eiusmod </a></li>
							<li><a href="#">Tempor incididunt ut</a></li>
						</ul>
					</section>
					<section class="col3 pad_left2">
						<h4>Address</h4>
						<ul class="address">
							<li><span>Country:</span>USA</li>
							<li><span>City:</span>San Diego</li>
							<li><span>Phone:</span>8 800 154-45-67</li>
							<li><span>Email:</span><a href="mailto:">progress@mail.com</a></li>
						</ul>
					</section>
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
				<a rel="nofollow" href="http://www.templatemonster.com/" target="_blank">Website Template</a> by TemplateMonster.com<br>
				<a href="http://www.templates.com/product/3d-models/" target="_blank">3D Models</a> provided by Templates.com
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