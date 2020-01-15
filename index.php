<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Slide</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>body{margin:0;</style>
</head>
<body>


<!-- 
	
	Slide em HTML/CSS/JS [ Inicio ] v0.1.0

 -->
<!--=========================
=            CSS            =
==========================-->

<style>
	#slide{text-align:center;}
	#fundo{background-color:rgba(55,55,55,.5);left:0;width:100vw;height:100vh;position:fixed;display:none;z-index:2;}
	#foto-show{height: 70vh;margin-top:5%;}
	.fotos{width:28vw;border-radius:10px;}
	.botao-fechar{background-color:red;top:30px;right:30px;width:50px;height:50px;line-height:50px;border-radius:10px;position:fixed;display:none;z-index:6;}
	.controle-fotos{background-color:#333;left:0;bottom:25px;width:100vw;height:100px;text-align:center;overflow:auto;position:fixed;display:none;z-index:5;}
	.controle-fotos img{width:100px;display:inline-block;}
</style>

<!--====  End of CSS  ====-->


<!--==========================
=            HTML            =
===========================-->

<div id="slide">
	<div id="galeria">
		<div id="fundo">
			<img id="foto-show" src="">
		</div>
		<!-- Codigo PHP -->
		<?php 
			$numeroPastas = 1;
			$verificarPastas = true;
			$pasta;

			if($verificarPastas){
				while ($numeroPastas > 0 && $verificarPastas) {
					$pasta = "galeria/projeto".$numeroPastas;
					if(is_dir($pasta)){
						$arquivos = glob("$pasta/{*.jpeg,*.JPEG}", GLOB_BRACE);
						$totalImagens = count($arquivos);
						if($totalImagens > 0){
							?>
								<img class="fotos" id="controle-fotos<?=$numeroPastas;?>" src="galeria/projeto<?=$numeroPastas;?>/imagem1.jpeg" onclick="capa(this, '<?=$numeroPastas;?>', '<?=$totalImagens?>');">
								<span class="botao-fechar" id="controle-fotos<?=$numeroPastas."_x";?>" onclick="fechar('controle-fotos<?=$numeroPastas;?>');">X</span>
								<div class="controle-fotos" id="controle-fotos<?=$numeroPastas."_c"?>">
								<?php
									for ($i=1; $i <= $totalImagens; $i++) { 
										?><img class="outras-fotos" src="galeria/projeto<?=$numeroPastas?>/imagem<?=$i?>.jpeg" onclick="trocar(this, '<?=$i;?>', '<?=$numeroPastas?>', 'capa<?=$numeroPastas;?>');">
										<?php
									}
									?>
								</div>
								<?php
						}
					} else{
						$verificarPastas = false;
					}
					$numeroPastas++;
				}
			}
		 ?>

	</div>	
</div>

<!--====  End of HTML  ====-->


<!--========================
=            JS            =
=========================-->

<script>
	var controles = true;
	function fechar(id){c = document.getElementById(id).click();}
	function capa(img, np, ti){
		if (controles) {
			document.getElementById("fundo").style.display = "inline";
			var fotoAtaual = img.id + "_c";
			var xAtual = img.id + "_x";
			for (var i = 1; i <= np; i++) {
				var f = "controle-fotos" + i + "_x";	
				var x = "controle-fotos" + i + "_c";
				if(x != fotoAtaual){
					document.getElementById(x).style.display = "none";
				}
				if(x == fotoAtaual){
					document.getElementById("foto-show").src = "galeria/projeto" + i + "/imagem" + 1 + ".jpeg";
				 	document.getElementById(fotoAtaual).style.display = "inline";
					if(f == xAtual){
						document.getElementById(f).style.display = "inline";
					}
				}
			}
		}else{
			document.getElementById("fundo").style.display = "none";
			for (var i = 1; i <= np; i++) {
				var f = "controle-fotos" + i + "_x";
				document.getElementById(f).style.display = "none";
				var x = "controle-fotos" + i + "_c";
				document.getElementById(x).style.display = "none";
			}
		}
		controles = !controles;
	}
	function trocar(id, atual, imagens, base){
		document.getElementById("foto-show").src = "galeria/projeto" + imagens + "/imagem" + atual + ".jpeg";
	}
</script>

<!--====  End of JS  ====-->
<!-- 
	
	Slide em HTML/CSS/JS [ Fim ]

 -->


</body>
</html>