<?php
include_once 'template_head.php';
?>
<meta charset="utf-8">
	<div class="body3">
		<div class="main">
<!-- content -->

			<article id="content">
			<center><h2 class="under">Busca a tu Artísta Favorito</h2></center>
			<center><form method="get" action="servicios.php">

			<input type="checkbox" name="busq_tipo">
			<strong>Tipo: </strong>
			<select name="tipo"><option value="--">--</option>
				<?php
				//Consulta para sacar los tipos
					$types=array();
            		$dataTypes = sparql_get( 
                "http://localhost:8890/sparql","
                 select distinct ?tipo from <http://localhost:8890/videos>  
                 where {
					?s <http://videosmusicales.org/ontology/belong> ?tipo .
				}	
                " );
           		//recorremos la data obtenida
	            foreach( $dataTypes as $row )
                {
                	echo "<option value='".str_replace("http://videosmusicales.org/videos/", "", $row['tipo'])."'>" . str_replace("http://videosmusicales.org/videos/", "", $row['tipo']) . "</option>";
                 }
				?></select><br>




				<input type="checkbox" name="busq_artista">
				<strong>Artista:</strong><select name="artista"><option value="--">--</option>
							<?php
					$types=array();
            		$dataTypes = sparql_get( 
                "http://localhost:8890/sparql","select distinct ?artista ?nombre from <http://localhost:8890/videos>  
                where {
				?artista <http://www.w3.org/1999/02/22-rdf-syntax-ns#type> <http://dbpedia.org/ontology/MusicalArtist> .
				?artista <http://www.w3.org/2001/vcard-rdf/3.0#FN> ?nombre .
				}" );
           		
	            foreach( $dataTypes as $row )
                {
                	echo "<option value='".str_replace("http://videosmusicales.org/videos/", "", $row['artista'])."'>" . str_replace("http://videosmusicales.org/videos/", "", $row['nombre']) . "</option>";
                  //$Victima[]=array("count"=>$row["count"]);
                  	
                 }
                 //$vic= $row['count'];
				?></select>
				<br>
				<input type="checkbox" name="busq_genero">
				<strong>Genero:</strong><select name="genero"><option value="--">--</option>
							<?php
					$types=array();
            		$dataTypes = sparql_get( 
                "http://localhost:8890/sparql","select distinct ?genero ?nombre from <http://localhost:8890/videos>  where {
?genero <http://www.w3.org/1999/02/22-rdf-syntax-ns#type> <http://dbpedia.org/ontology/Genre> .
?genero <http://www.w3.org/2000/01/rdf-schema#label> ?nombre .
}" );
           		
	            foreach( $dataTypes as $row )
                {
                	echo "<option value='".str_replace("http://videosmusicales.org/videos/", "", $row['genero'])."'>" . str_replace("http://videosmusicales.org/videos/", "", $row['nombre']) . "</option>";
                  	
                 }
				?></select>
				<br><br>
				<input type="submit">
				</form></center>

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
					<section class="col2 right">
						<h4>Buscar</h4>
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