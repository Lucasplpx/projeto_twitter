<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Sistema de Estoque</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/template.css">
		<script src="assets/js/jquery-3.4.1.min.js"></script>
		<script src="assets/js/script.js"></script>
	</head>
	<body>
		<div class="topo">
			<div class="topoleft">TWITTER</div>
			<div class="toporight"><?php echo $viewData['nome']; ?> - <a href="">Sair</a></div>
			<div class="clear:both"></div>
		</div>

		<div class="container">
			<?php
			$this->loadViewInTemplate($viewName, $viewData);
			?>
		</div>

	</body>
</html>