<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- If you delete this meta tag, Half Life 3 will never be released. -->
<meta name="viewport" content="width=device-width">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?=$data['empresa']['name'].':: Reseteo de Password'?></title>
<link rel="stylesheet" type="text/css" href="stylesheets/email.css">
</head>
<body bgcolor="#FFFFFF">
<!-- HEADER -->
<?=$this->element('email/defaultEmailCabecera');?>
<!-- /HEADER -->
<!-- BODY -->
<table style="width:100%" class="body-wrap">
	<tr>
		<td></td>
		<td class="container" bgcolor="#FFFFFF">
			<div class="content">
			<table style="width:100%">
				<tr>
					<td>
						<h3>Estimado(a), <?=$data['persona']['nombres'].' '.$data['persona']['apepaterno']?></h3>
						<p style="font-size:17px;">Reseteo de Password</p>
						<p>Como respuesta a su solicitud de reseteo de Password, enviamos este correo con la direccion donde podra generar su nuevo Password:</p>
						<p><?=$this->Html->link($this->Url->build('/reset?token='.$data['token'], true))?>
						</p>
						<!-- Callout Panel -->
						<p style="padding:15px;	background-color:#ECF8FF;	margin-bottom: 15px;">
							Si ud. no solicito el reseteo de su Password, ignore este correo.
						</p><!-- /Callout Panel -->					
					</td>
				</tr>
			</table>
			</div><!-- /content -->
									
		</td>
		<td></td>
	</tr>
</table><!-- /BODY -->

<!-- FOOTER -->
<?=$this->element('email/defaultEmailPie');?>
<!-- /FOOTER -->

</body>
</html>