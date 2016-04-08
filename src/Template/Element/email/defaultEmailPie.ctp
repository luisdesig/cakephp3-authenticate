<!-- social & contact -->
<table style="width:100%" style="background-color: #ebebeb;">
	<tr>
		<td>
			<!-- column 1 -->
			<table style="width:40%;margin-left: 5%;margin-right: 5%;" align="left">
				<tr>
					<td>
						<h5 class="">Contáctanos:</h5>
  						<p class="">
  						  <a href="<?=$data['empresa']['redes']['facebook']?>" style="	padding: 3px 7px; font-size:12px; margin-bottom:10px; text-decoration:none;
	    color: #FFF;font-weight:bold; display:block; text-align:center;background-color: #3B5998!important;">Facebook</a> 
							<a href="<?=$data['empresa']['redes']['twitter']?>" style="	padding: 3px 7px; font-size:12px; margin-bottom:10px; text-decoration:none;
	    color: #FFF;font-weight:bold; display:block; text-align:center;background-color: #1daced!important;">Twitter</a> 
							<a href="<?=$data['empresa']['redes']['googleplus']?>" style="	padding: 3px 7px; font-size:12px; margin-bottom:10px; text-decoration:none;
	    color: #FFF;font-weight:bold; display:block; text-align:center;background-color: #DB4A39!important;">Google+</a>
						</p>
					</td>
				</tr>
			</table><!-- /column 1 -->
			<!-- column 2 -->
			<table style="width:40%;margin-left: 5%;margin-right: 5%;" align="left">
				<tr>
					<td>				
													
						<h5 class="">Información de contacto:</h5>												
						<p>Telefono: <strong><?=$data['empresa']['telefonos']['lima']?></strong><br>
						Email: <strong>
						<?php echo $this->Html->link($data['empresa']['emails']['support'],
                                                    'mailto:'.$data['empresa']['emails']['support'],
                                                    array('target' => '_blank'));?>
                       </strong></p>
					</td>
				</tr>
			</table><!-- /column 2 -->
			
			<span class="clear"></span>	
			
		</td>
	</tr>
</table><!-- /social & contact -->

<table style=" width: 100%; background-color: #000000;">
	<tr>
		<td></td>
		<td class="container">
			
				<!-- content -->
				<div class="content" style="color: #ffffff;">
				<table style=" width: 100%; background-color: #000000;">
				<tr>
					<td align="center">
						<p>
							<a href="#" style="color: #ffffff;">Terms</a> |
							<a href="#" style="color: #ffffff;">Privacy</a> |
							<a href="#" style="color: #ffffff;"><unsubscribe>Unsubscribe</unsubscribe></a>
						</p>
					</td>
				</tr>
			</table>
				</div><!-- /content -->
				
		</td>
		<td></td>
	</tr>
</table>