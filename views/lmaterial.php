<?php
	@session_start();
	$menu = new materias();	
	$menus = $menu->getAllRecords();	
?>
<div class="section">
		<div class="full">
			<div class="box">
				<div class="title">
					<h2>List of materials</h2>
					<span onclick="window.location='?view=material'" class="add">Add</span>
				</div>
				<div class="content">
					<table cellspacing="0" cellpadding="0" border="0" class="all"> 
						<thead> 
							<tr> 
								<th width="15"><input type="checkbox" name="check" class="checkall" /></th>
								<th>Material Type</th>
								<th>Nombre</th>
								<th>Composed</th>
								<th>Formulation</th>
								<th width="140">Categoria</th>
								<th width="30"></th>
							</tr> 
						</thead> 
						<tbody> 
						<?php foreach($menus as $m) { ?> 
								<tr id="<?php echo $m->identificador; ?>"> 
								<td><input type="checkbox" name="check" /></td>
								<td><?php echo $m->tipo_materia_prima; ?></td>
								<td><a href="#"><?php echo utf8_encode($m->nombre); ?></a></td>
								<td><?php echo $m->	compuesto; ?></td>
								<td><a href="#"><?php echo $m->formulacion; ?></</a></td>
								<td><?php echo utf8_encode($menu->getName($m->categoria, 'categorias')); ?></td>
								<td style="padding:5px 4px;">
									<a style="float:left" href="?view=material&id=<?php echo $m->identificador; ?>"><img src="gfx/icon-edit.png" alt="edit" /></a>
									<a style="margin-left:2px;float:left" href="#" onclick="deleteMaterias('<?php echo $m->identificador; ?>')"><img src="gfx/icon-delete.png" alt="delete" /></a>
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
<script type="text/javascript" src="js/materias.js"></script>