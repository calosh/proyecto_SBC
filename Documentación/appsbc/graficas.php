<?php
include_once 'template_head.php';
?>
<meta charset="utf-8">
	<div class="body3">
		<div class="main">
<!-- content -->

			<article id="content">
			<center><h2 class="under">Estadísticas De Artístas</h2></center>
			
			<?php
			//Consutla de numero artístas mujeres
				$sexoF=array();
				$datasexoF = sparql_get( 
                "http://localhost:8890/sparql","
                 select  COUNT(*) as ?sexoF from <http://localhost:8890/videos>  
                 where {
					?s <http://xmlns.com/foaf/0.1/gender> ?sexoF.
					filter regex (?sexoF, 'Femenino').
				}
                " );
				foreach( $datasexoF as $row )
                {
                  $sexoF[] =array("sexoF"=>$row["sexoF"]);
                 }
                $sexoFe = $row['sexoF'];


            ////Consutla de numero artístas hombres
                $sexoM=array();
				$datasexoM = sparql_get( 
                "http://localhost:8890/sparql","
                 select  COUNT(*) as ?sexoM from <http://localhost:8890/videos>  
                 where {
					?s <http://xmlns.com/foaf/0.1/gender> ?sexoM.
					filter regex (?sexoM, 'Masculino').
				}
                " );
				foreach( $datasexoM as $row )
                {
                  $sexoM[] =array("sexoM"=>$row["sexoM"]);
                  	
                 }
                $sexoMa = $row['sexoM'];


            ///Lugar de nacimiento filtrado por guayas
                $lugarG=array();
				$datalugarG = sparql_get( 
                "http://localhost:8890/sparql","
                 select  COUNT(*) as ?lugarG from <http://localhost:8890/videos>  
                 where {
					?s <http://d-nb.info/standards/elementset/gnd#placeOfBirth> ?lugarG.
					filter regex (?lugarG, 'Guayaquil. Ecuador').
				}
                " );
				foreach( $datalugarG as $row )
                {
                  $lugarG[] =array("lugarG"=>$row["lugarG"]);
                  	
                 }
                $lugarGY = $row['lugarG'];


             /////Lugar de nacimiento filtrado por Quito
                $lugarQ=array();
				$datalugarQ = sparql_get( 
                "http://localhost:8890/sparql","
                 select  COUNT(*) as ?lugarQ from <http://localhost:8890/videos>  
                 where {
					?s <http://d-nb.info/standards/elementset/gnd#placeOfBirth> ?lugarQ.
					filter regex (?lugarQ, 'Quito. Ecuador').
				}
                " );
				foreach( $datalugarQ as $row )
                {
                  $lugarQ[] =array("lugarQ"=>$row["lugarQ"]);
                  	
                 }
                $lugarQU = $row['lugarQ'];

               /////Lugar de nacimiento filtrado por Chimborazo

                $lugarCH=array();
				$datalugarCH = sparql_get( 
                "http://localhost:8890/sparql","
                 select  COUNT(*) as ?lugarCH from <http://localhost:8890/videos>  
                 where {
					?s <http://d-nb.info/standards/elementset/gnd#placeOfBirth> ?lugarCH.
					filter regex (?lugarCH, 'Chimborazo. Ecuador').
				}
                " );
				foreach( $datalugarCH as $row )
                {
                  $lugarCH[] =array("lugarCH"=>$row["lugarCH"]);
                  	
                 }
                $lugarCHIM = $row['lugarCH'];

                ////Lugar de nacimiento filtrado por Guamote

                $lugarGU=array();
				$datalugarGU = sparql_get( 
                "http://localhost:8890/sparql","
                 select  COUNT(*) as ?lugarGU from <http://localhost:8890/videos>  
                 where {
					?s <http://d-nb.info/standards/elementset/gnd#placeOfBirth> ?lugarGU.
					filter regex (?lugarGU, 'Guamote. Ecuador').
				}
                " );
				foreach( $datalugarGU as $row )
                {
                  $lugarGU[] =array("lugarGU"=>$row["lugarGU"]);
                  	
                 }
                $lugarGUA = $row['lugarGU'];

                ///Lugar de nacimiento filtrado por Bolivar
                $lugarBO=array();
                $datalugarBO = sparql_get( 
                "http://localhost:8890/sparql","
                 select  COUNT(*) as ?lugarBO from <http://localhost:8890/videos>  
                 where {
					?s <http://d-nb.info/standards/elementset/gnd#placeOfBirth> ?lugarBO.
					filter regex (?lugarBO, 'Bolívar. Ecuador').
				}
                " );
				foreach( $datalugarBO as $row )
                {
                  $lugarBO[] =array("lugarBO"=>$row["lugarBO"]);
                  	
                 }
                $lugarBOL = $row['lugarBO'];

                ///Lugar de nacimiento filtrado por Manabi
                $lugarMA=array();
                $datalugarMA = sparql_get( 
                "http://localhost:8890/sparql","
                 select  COUNT(*) as ?lugarMA from <http://localhost:8890/videos>  
                 where {
					?s <http://d-nb.info/standards/elementset/gnd#placeOfBirth> ?lugarMA.
					filter regex (?lugarMA, 'Manabi. Ecuador.').
				}
                " );
				foreach( $datalugarMA as $row )
                {
                  $lugarMA[] =array("lugarMA"=>$row["lugarMA"]);
                  	
                 }
                $lugarMAN = $row['lugarMA'];

                ///Lugar de nacimiento filtrado por Ambato
                $lugarAM=array();
                $datalugarAM = sparql_get( 
                "http://localhost:8890/sparql","
                 select  COUNT(*) as ?lugarAM from <http://localhost:8890/videos>  
                 where {
					?s <http://d-nb.info/standards/elementset/gnd#placeOfBirth> ?lugarAM.
					filter regex (?lugarAM, 'Ambato. Ecuador').
				}
                " );
				foreach( $datalugarAM as $row )
                {
                  $lugarAM[] =array("lugarAM"=>$row["lugarAM"]);
                  	
                 }
                $lugarAMB = $row['lugarAM'];




                //Total de video segun el tipo bulletin
                $bulletin=array();
                $databulletin = sparql_get( 
                "http://localhost:8890/sparql","
                 select  COUNT(*) as ?bulletin from <http://localhost:8890/videos>  
                 where {
					?s <http://videosmusicales.org/ontology/belong> ?bulletin.
					filter regex (?bulletin, <http://videosmusicales.org/videos/bulletin>).
				}
                " );
				foreach( $databulletin as $row )
                {
                  $bulletin[] =array("bulletin"=>$row["bulletin"]);
                  	
                 }
                $Bulletin = $row['bulletin'];

                //Total de video segun el tipo bulletin playlistItem
                $playlistItem=array();
                $dataplaylistItem = sparql_get( 
                "http://localhost:8890/sparql","
                 select  COUNT(*) as ?playlistItem from <http://localhost:8890/videos>  
                 where {
					?s <http://videosmusicales.org/ontology/belong> ?playlistItem.
					filter regex (?playlistItem, <http://videosmusicales.org/videos/playlistItem>).
				}
                " );
				foreach( $dataplaylistItem as $row )
                {
                  $playlistItem[] =array("playlistItem"=>$row["playlistItem"]);
                  	
                 }
                $PlaylistItem = $row['playlistItem'];
                

                //Total de video segun el tipo  upload
                $upload=array();
                $dataupload = sparql_get( 
                "http://localhost:8890/sparql","
                 select  COUNT(*) as ?upload from <http://localhost:8890/videos>  
                 where {
					?s <http://videosmusicales.org/ontology/belong> ?upload.
					filter regex (?upload, <http://videosmusicales.org/videos/upload>).
				}
                " );
				foreach( $dataupload as $row )
                {
                  $upload[] =array("upload"=>$row["upload"]);
                  	
                 }
                $Upload = $row['upload'];
                
                //Total de video segun el tipo like
                $like=array();
                $datalike = sparql_get( 
                "http://localhost:8890/sparql","
                 select  COUNT(*) as ?like from <http://localhost:8890/videos>  
                 where {
					?s <http://videosmusicales.org/ontology/belong> ?like.
					filter regex (?like, <http://videosmusicales.org/videos/like>).
				}
                " );
				foreach( $datalike as $row )
                {
                  $like[] =array("like"=>$row["like"]);
                  	
                 }
                $Like = $row['like'];








			?>


			<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
			<script src="https://code.highcharts.com/highcharts.js"></script>

			<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

			<div id="container1" style="min-width: 410px; height: 400px; max-width: 800px; margin: 0 auto"></div>
			<center><button id="plain">Plano</button>
			<button id="inverted">Invertido</button>
			<br><br>
			<br><br>
			<center><h3>Total de todos los Vídeos de los Artistas Ecuatorianos</h3></center>
			<div id="container3" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

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

<script type="text/javascript">
	
$(document).ready(function () {

    // Build the chart
    Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Género de Artístas'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Total',
            colorByPoint: true,
            data: [{
                name: 'Hombres',
                y: <?php echo $sexoMa;?>
            }, {
                name: 'Mujeres',
                y: <?php echo $sexoFe;?>
            }]
        }]
    });
});
</script>

<script type="text/javascript">
var chart = Highcharts.chart('container1', {

    title: {
        text: 'Lugar de Nacimiento de los Artístas Ecuatorianos'
    },

    subtitle: {
        text: 'Estadísticas totales de los lugares de nacimiento en el País de Ecuador'
    },

    xAxis: {
        categories: ['Guayaquil', 'Quito', 'Chimborazo', 'Guamote', 'Bolívar', 'Manabi', 'Ambato']
    },

    series: [{
        type: 'column',
        colorByPoint: true,
        data: [<?php echo $lugarGY;?>, <?php echo $lugarQU;?>, <?php echo $lugarCHIM;?>, <?php echo $lugarGUA;?>, <?php echo $lugarBOL;?>, <?php echo $lugarMAN;?>, <?php echo $lugarAMB;?>],
        showInLegend: false
    }]

});


$('#plain').click(function () {
    chart.update({
        chart: {
            inverted: false,
            polar: false
        },
        subtitle: {
            text: 'Plain'
        }
    });
});

$('#inverted').click(function () {
    chart.update({
        chart: {
            inverted: true,
            polar: false
        },
        subtitle: {
            text: 'Inverted'
        }
    });
});

$('#polar').click(function () {
    chart.update({
        chart: {
            inverted: false,
            polar: true
        },
        subtitle: {
            text: 'Polar'
        }
    });
});

</script>
<script type="text/javascript">
	Highcharts.chart('container3', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: 0,
        plotShadow: false
    },
    title: {
        text: 'Total de Videos<br>Segun<br>Tipos',
        align: 'center',
        verticalAlign: 'middle',
        y: 40
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            dataLabels: {
                enabled: true,
                distance: -50,
                style: {
                    fontWeight: 'bold',
                    color: 'white'
                }
            },
            startAngle: -90,
            endAngle: 90,
            center: ['50%', '75%']
        }
    },
    series: [{
        type: 'pie',
        name: 'Total Videos',
        innerSize: '50%',
        data: [
            ['Bulletin',   <?php echo $Bulletin;?>],
            ['PlaylistItem',       <?php echo $PlaylistItem;?>],
            ['Upload', <?php echo $Upload;?>],
            ['Like',    <?php echo $Like;?>],
            {
                name: 'Proprietary or Undetectable',
                y: 0.2,
                dataLabels: {
                    enabled: false
                }
            }
        ]
    }]
});


</script>
</body>
</html>