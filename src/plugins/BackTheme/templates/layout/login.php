<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ECサイト管理画面</title>

  <!-- CSS -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <?= $this->Html->css([
    'BackTheme./css/sb-admin-2.min',
  ]); ?>
</head>

<body class="bg-gradient-primary">
	<div class="container">
		<!-- Contents -->
		<?= $this->fetch('content'); ?>
	</div>
	

	<!-- Scripts -->
	<?= $this->Html->script([
		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js',
		'BackTheme./js/jquery.min',
		'BackTheme./js/bootstrap.bundle.min',
		'BackTheme./js/jquery.easing.min.min',
		'BackTheme./js/sb-admin-2.min',
	]); ?>
</body>
</html>