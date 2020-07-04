<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
$data['alert']['type'] = 'success';
$data['alert']['content'] = "Data kelas berhasil diperbaharui";
$json = json_encode($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Document</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- <link rel="stylesheet" href="<?=base_url("assets/plugins/datatable/datatables.min.css"); ?>"> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?=base_url('assets/plugins/select2/select2.css');?>" type="text/css"/>
	<link rel="stylesheet" href="<?=base_url('assets/plugins/notifications/noty.css');?>" type="text/css"/>
	<script>
		let data = <?= $json; ?>;
		let ipAddress = "<?= $ip; ?>";
	</script>
</head>
<body>
	

	<?= $_menu; ?>

	<div class="container">
		<?php echo $_content; ?>
	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!--datatable    -->
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?=base_url('assets/themes/js/custom.js');?>"></script>
	<script src="<?=base_url('assets/plugins/select2/select2.min.js');?>"></script>
	<script src="<?=base_url('assets/plugins/notifications/noty.min.js');?>"></script>
	<script src="<?=base_url("assets/plugins/socket.io/dist/socket.io.js"); ?>"></script>
	<!--Penting disertakan -->
	<script src="https://cdn.datatables.net/plug-ins/1.10.15/api/fnReloadAjax.js"></script>

	<!-- Include Modjs -->
	<?php if (file_exists('./assets/modjs/'.$this->mod.'.js')): ?>
		<script src="<?= base_url('assets/modjs/'.$this->mod.'.js');?>"></script> 
	<?php endif ?>
</body>
</html>