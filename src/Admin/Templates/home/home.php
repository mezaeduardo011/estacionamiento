<?php $breadcrumb=(object)array('actual'=>'Inicio','titulo'=>'Pantalla de Bienvenida del Sistema','ruta'=>'')?>
<?php $this->layout('base',['usuario'=>$usuario,'breadcrumb'=>$breadcrumb])?>

<?php $this->push('title') ?>
Home del Sistema Hornero
<?php $this->end() ?>


<?php $this->push('addCss')?>
<link href="<?=JPH\Core\Store\Cache::get('srcCss')?>dist/css/animation.css" rel="stylesheet">
<?php $this->end()?>

<!-- Small boxes (Stat box) -->
<div class="row" id="animation">
<div class="col-lg-12 col-xs-6">
	<div class="row">
    	<svg viewBox="0 0 960 300">
            <symbol id="s-text">
        		<text text-anchor="middle" x="50%" y="80%">JphLions </text>
        	</symbol>
    
        	<g class = "g-ants">
        		<use xlink:href="#s-text" class="text-copy"></use>
        		<use xlink:href="#s-text" class="text-copy"></use>
        		<use xlink:href="#s-text" class="text-copy"></use>
        		<use xlink:href="#s-text" class="text-copy"></use>
        		<use xlink:href="#s-text" class="text-copy"></use>
        	</g>
    	</svg>
    	
	</div>
    <div class="row">
        <h1 id="animaText" class="text-right">El lider en
            <span
                    class="txt-rotate"
                    data-period="2000"
                    data-rotate='[  "Desarrollos de Sistemas.", "Desarrollos Móviles.", "Desarrollo de Arquitecturas.", "Automatización de procesos empresariales e Industriales!" ]'>
               </span>
        </h1>
    </div>
</div>
</div>

<?php $this->push('addJs')?>
<!-- Notificciones toastr -->
<script src="/admin/dist/js/amination.js"></script>
<script src="/admin/dist/js/core.js"></script>
<script type="text/javascript">
    informar('Error de proceso','Edd');
</script>
<?php $this->end()?>
