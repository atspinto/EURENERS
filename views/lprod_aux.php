<?php
	@session_start();
	$menu = new empresa_servicios();	
	$menus = $menu->getAllRecordsE();	
	//global $lang;
	//$users = $menu->getListmenus(); 
	//var_dump($menus); die;
?>
<div class="section">
		<div class="full">
			<div class="box">
				<div class="title">
					<h2>List of Auxiliary Services for enterprise</h2>
					<span onclick="window.location='?view=prod_aux'" class="add">Add</span>
				</div>
				<div class="content">
					<table cellspacing="0" cellpadding="0" border="0" class="all"> 
						<thead> 
							<tr> 
								<th width="15"><input type="checkbox" name="check" class="checkall" /></th>
								<th>Servicio</th>
								<th>Energia</th>
								<th>Potencia</th>
								<th>Horas</th>
								<th width="180">Categoria</th>
								<th width="30"></th>
							</tr> 
						</thead> 
						<tbody> 
						<?php foreach($menus as $m) { ?> 
							<tr id="<?php echo $m->servicio_auxiliar; ?>"> 
								<td><input type="checkbox" name="check" /></td>
								<td><a href="#"><?php echo utf8_encode($menu->getName($m->servicio_auxiliar, 'servicios_auxiliares')); ?></a></td>
								<td><a href="#"><?php echo utf8_encode($menu->getName($m->energia, 'energias')); ?></a></td>
								<td><a href="#"><?php echo $m->potencia; ?></a></td>
								<td><a href="#"><?php echo $m->horas; ?></a></td>
								<td><a href="#"><?php echo utf8_encode($menu->getName($m->categoria, 'categorias')); ?></a></td>
								<td style="padding:5px 4px;">
									<a style="float:left" href="?view=prod_aux&servicio_auxiliar=<?php echo $m->servicio_auxiliar; ?>"><img src="gfx/icon-edit.png" alt="edit" /></a>
									<a style="margin-left:2px;float:left" href="#" onclick="deleteCaux('<?php echo $m->servicio_auxiliar; ?>')"><img src="gfx/icon-delete.png" alt="delete" /></a>
								</td>
							</tr>
						<?php } ?> 
						</tbody> 
					</table>
					<button type="submit" class="red"><span>Delete</span></button>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript" src="js/prod-aux.js"></script>