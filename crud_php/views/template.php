<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,inital-scale=1,shrink-to-fit=no"/>
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style.css"/>
		<title>Agenda de Tarefas</title>
	</head>
	<body>
		<section>
			<div class="container">
				<?php $this->loadViewInTemplate($viewName, $viewData); ?>
			</div>
		</section>

		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.bundle.min.js">
		</script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
	</body>
</html>