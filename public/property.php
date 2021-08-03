<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>imóveis</h2>
            <!-- <small class="text-muted">Welcome to Swift application</small> -->
        </div>
        <div class="row clearfix">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h2>Lista de Imóveis disponíveis</h2>						
					</div>
					<div class="body">
                        <div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
                            <?php $index = 1; ?>
                            <?php foreach($properties as $property) : ?>
                            <div class="panel panel-primary">
                                <div class="panel-heading" role="tab" id="headingOne_<?php echo $index; ?>">
                                    <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseOne_<?php echo $index; ?>" aria-expanded="false" aria-controls="collapseOne_1" class="collapsed"> <?php echo $property->TituloSite . " - Código: " . $property->Codigo; ?> </a> </h4>
                                </div>
                                <div id="collapseOne_<?php echo $index; ?>" class="panel-collapse in collapse" role="tabpanel" aria-labelledby="headingOne_<?php echo $index; ?>" style="">
                                    <div class="panel-body"><?php echo $property->DescricaoWeb; ?></div>
                                </div>
                            </div>
                            <?php $index++; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
			</div>
		</div>
    </div>
</section>