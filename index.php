<?php 

			function color($valor){
				if ($valor <= 2){
					$color = "verde";
				}else if ($valor > 2 && $valor <= 5){
					$color = "amarillo";
				}else if ($valor > 5 && $valor <= 7){
					$color = "naranja";
				}else if ($valor > 7 && $valor <= 10){
					$color = "rojo";
				}else{
					$color = "morado";
				}
				return $color;
			}

	function espacios($valor){
		if (strlen($valor)==1)
			return "$valor&nbsp;&nbsp;&nbsp;";
		else
			return "$valor&nbsp;&nbsp;";
	}


require_once('parseruv.php');
				
header('Content-Type: text/html; charset=UTF-8'); 				
?>
<!DOCTYPE html>
   <head>
   	<!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, useer-scalable=false" /> -->
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Expires" content="0" />
    <title>Predicción de radiación ultravioleta</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="lang" content="es" />
	<meta name="language" content="es" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/uv.css">
    <link rel="stylesheet" type="text/css" href="css/lists.css">
    <link rel="stylesheet" type="text/css" href="css/headers.css">
    <link rel="stylesheet" type="text/css" href="css/progress_activity.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css"/>
    <link rel="stylesheet" type="text/css" href="css/scrolling.css">

	<script>

		function about(){
				location.href="about.html";
			}

		function handleVisibilityChange() {
			    if (document.hidden) {} else {
			        window.location.href = "http://uv.leandro.org/?noinstall";
			    }
			}

		document.addEventListener("visibilitychange", handleVisibilityChange, false);
	</script>
	</head>
<body>

<section  id="respuesta">

	<section role="region">
		<header>
			<!-- <button onclick="volver()"><span class="icon icon-back">back</span></button> -->
 			 <menu type="toolbar"><button onclick="about()">?</button></menu>
			<h1>Rayos UV</h1>
		</header>
	</section>
	<br>
	<section data-type="list">
		<!-- <aside id="hora" class="pack-end">actualizado a las <time datetime="<script>document.write(hora);</script>"> <script>document.write(hora);</script></time></aside> -->
		<header id="titulo"><?php echo htmlentities(utf8_encode(strip_tags($dia[0][0])), ENT_COMPAT, 'UTF-8'); ?></header>
		  <ul>
		  
		  <div id="contenido_respuesta">
			 <?php
				foreach($res as $k => $v){
					$name = substr(html_entity_decode($k), 0, 1);
					echo  '<li><aside class="pack-end">
							<div id="'.color($v).'">
								<p id="valor"  style="color:black"><strong>'.espacios($v).'</strong></p>
							</div></aside>
							<p><a name="'.$name.'">'.$k.'</a></p></li>';
				}			
			?>
		  </div>		  
		  </ul>

</section>
<section role="region" id="main">
  <nav data-type="scrollbar">
    <p>A</p>
    <ol>
      <li><a href="#A">A</a></li>
      <li><a href="#B">B</a></li>
      <li><a href="#C">C</a></li>
      <li><a href="#D">D</a></li>
      <li><a href="#E">E</a></li>
      <li><a href="#F">F</a></li>
      <li><a href="#G">G</a></li>
      <li><a href="#H">H</a></li>
      <li><a href="#I">I</a></li>
      <li><a href="#J">J</a></li>
      <li><a href="#K">K</a></li>
      <li><a href="#L">L</a></li>
      <li><a href="#M">M</a></li>
      <li><a href="#N">N</a></li>
      <li><a href="#O">O</a></li>
      <li><a href="#P">P</a></li>
      <li><a href="#Q">Q</a></li>
      <li><a href="#R">R</a></li>
      <li><a href="#S">S</a></li>
      <li><a href="#T">T</a></li>
      <li><a href="#U">U</a></li>
      <li><a href="#V">V</a></li>
      <li><a href="#W">W</a></li>
      <li><a href="#X">X</a></li>
      <li><a href="#Y">Y</a></li>
      <li><a href="#Z">Z</a></li>
    </ol>
  </nav>
</section>
			<?php
			if (!$_SERVER['QUERY_STRING'] || $_SERVER['QUERY_STRING'] != 'noinstall'){
			?>
				<script>
				const manifest_url = "http://uv.leandro.org/manifest.webapp";

				function install() {
					var myapp = navigator.mozApps.install(manifest_url);
					myapp.onsuccess = function(data) {
						this.parentNode.removeChild(this);
					};
					myapp.onerror = function() {
						alert (this.error.name);
					};
				};

				var request = navigator.mozApps.checkInstalled (manifest_url);
				request.onsuccess = function() {
					if (!request.result)
						install ();
				};
				request.onerror = function() {
					alert('Error checking installation status: ' + this.error.message);
				};
				</script>
			<?php
			}
			?>
</body>
</html>
