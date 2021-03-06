<?php
$categoria = new categorias();	
$cats = $categoria->getAllRecords();
	
$cultivo = new cultivos();
$culti = $cultivo->getAllRecords();

$residuo = new residuos();
$residuos = $residuo->getAllRecords();

$c = new empresa_residuos();
if(isset($_GET['rediduo'])){
	$mic = $c->getRecordE($_GET['rediduo']);
} else {
	$mic = new empresa_residuos();
	$vars = $mic->getAllFields();
	//var_dump($vars); die();
	foreach($vars as $var)
		$mic->$var = '';
}
?>
<div class="formulaire users">
	<div class="box">
		<div class="title">
			<h2>Residuos y Tratamiento</h2>
			<span onclick="window.location='?view=lpcrop_wastetr'" class="add">List</span>
		</div>
		<div class="content forms tabs" style="height:280px;">
			<div class="tabmenu">
				<ul> 
					<li><a href="#tabs-1">Residuos</a></li>
				</ul>
			</div>
			<div id="message" style="display : none;">
				<div id="response" class="messages green" style="margin: 0px 0px 1px;">
					<span></span>
					This is a successful placed text message.
				</div>
			</div>
			
		<div id="tabs-1">
			<form id="userform" action="" method="post">
				<fieldset>
					<legend>Cultivo y Residuos</legend>
						<div id="lesinputs users">
							<div class="finput" id="btip">
								<label style="width:60px">Cultivo</label>
								<select id="cultivo" name="cultivo">
									<?php foreach($culti as $c) { ?>
									<option value="<?php echo $c->identificador; ?>" <?php if($c->identificador == $mic->cultivo) echo "SELECTED" ?>><?php echo utf8_encode($c->nombre); ?></option>
									<?php } ?>
								</select>
							</div>
							<fieldset>
							<legend>Residuos</legend>
							<div class="line">
								<div class="finput" id="btip">
									<label style="width:60px">Categorias</label>
									<select id="categoria" name="categoria">
										<option value="">Select Categorias</option>
										<?php foreach($cats as $t) { ?>
										<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $mic->categoria) echo "SELECTED" ?>><?php echo utf8_encode($t->nombre); ?></option>
										<?php } ?>
									</select>								
								</div>
								<div class="finput" id="btip">
									<label >Residuo</label>
									<select id="residuo" name="residuo" >
										<option value="">Select Residuo</option>
										<?php foreach($residuos as $t) { ?>
										<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $mic->residuo) echo "SELECTED" ?>><?php echo utf8_encode($t->nombre); ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="sfinput">
									<label >LER</label>
									<input id="codigo_ler" type="text" name="codigo_ler" class="small" value="" />
								</div>
								<div class="finput">
									<label >Descripcion</label>
									<input id="descripcion" type="text" name="descripcion" class="small" value="" />
								</div>
								
							</div>
							<div class="nextline">
								<div class="sfinput">
									<label >Candidad</label>
									<input id="cantidad" type="text" name="cantidad" class="small" value="" />
								</div>
								<div class="sfinput">
									<label >Unidad</label>
									<input id="unidad" type="text" name="unidad" class="small" value="" />
								</div>
								<div class="finput" id="btip">
								<label >Tipo de Gestion</label>
								<select id="tipo_gestion" name="tipo_gestion">
									<option value="">Select Tipo de Gestion</option>
									<option value="Gestor">Gestor</option>
									<option value="Quema">Quema</option>
									<option value="Campo">Campo</option>
								</select>
								</div>
								
					
								<input type="radio" name="es_fase_uso" id="radio-1" value="1" /> 
								<label for="radio-1">Fase de Uso</label>
								
								<input type="radio" name="es_fase_uso" id="radio-2" value="0" /> 
								<label for="radio-2">Transformacion</label><!--
								<input type="radio" name="es_fase_uso" id="es_fase_uso" checked /> <label for="Fase">Fase de Uso</label>
								<input type="radio" name="" style="margin-right:100px;"/> <label for="transformacion">Transformacion</label>-->
								<input type="hidden" name="es_produccion" value="1" id="es_produccion" />
								<input type="hidden" name="es_transformacion" value="0" id="es_transformacion" />
								<?php if(isset($_SESSION['u']['enterprise'])) { ?><input type="hidden" name="empresa" value="<?php echo $_SESSION['u']['enterprise']; ?>" id="empresa" /><?php } ?>
					
							</div>
							</fieldset>
						</div>
						
				</fieldset>
				<div class="centerbutton" style="width: 100%;  text-align: center;">
					<button class="green medium" type="button" <?php if(isset($_GET['rediduo'])) { ?> onclick="updateEResiduo(<?php echo $_GET['rediduo']; ?>);" <?php } else { ?>onclick="addEresiduo();"<?php } ?>><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
				</div>
			</form>
		</div>
	</div>
	
</div> 
</div>
<script type="text/javascript" src="js/pcrop-wastetr.js"></script>