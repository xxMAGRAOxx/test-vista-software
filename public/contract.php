<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Contratos</h2>
            <!-- <small class="text-muted">Welcome to Swift application</small> -->
        </div>
        <div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>Gerar Contrato</h2>
					</div>
					<div class="body">
                        <form method="POST" action="contract/create">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group drop-custum focused">
                                        <select name="property-id" class="form-control show-tick">
                                            <option value="0">-- Escolha o imóvel --</option>
                                            <?php foreach($properties as $property) : ?>
                                                <option value="<?php echo $property->Codigo; ?>"><?php echo "Código: " . $property->Codigo; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group drop-custum focused">
                                        <select name="lessee-id" class="form-control show-tick">
                                            <option value="0">-- Escolha o cliente --</option>
                                            <?php foreach($lessees as $lessee) : ?>
                                                <option value="<?php echo $lessee->id; ?>"><?php echo $lessee->name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group drop-custum focused">
                                        <select name="landlord-id" class="form-control show-tick">
                                            <option value="0">-- Escolha o Proprietário --</option>
                                            <?php foreach($landlords as $landlord) : ?>
                                                <option value="<?php echo $landlord->id; ?>"><?php echo $landlord->name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>                       
                            </div>
                            <div class="row clearfix">                            
                                <div class="col-sm-6 ">
                                    <!-- <label for="">Data início: </label> -->
                                    <div class="form-group">                            
                                        <div class="form-line">
                                            <input type="text" name="date-begin" class="datepicker form-control filter-date-from" placeholder="-- Data início do contrato --">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <!-- <label for="">Data fim: </label> -->
                                    <div class="form-group">                            
                                        <div class="form-line">
                                            <input type="text" name="date-end" class="datepicker form-control filter-date-to" placeholder="-- Data fim do contrato --">
                                        </div>
                                    </div>
                                </div>                 
                            </div>
                            <div class="row_clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="adminstration-fee" class="form-control" placeholder="Taxa de Administração">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row_clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="rent-amount" class="form-control" placeholder="Valor do Aluguel">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row_clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="condominium-amount" class="form-control" placeholder="Valor do Condomínio">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row_clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="iptu-amount" class="form-control" placeholder="Valor do IPTU">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-raised g-bg-cyan">Criar contrato</button>
                                </div>
                            </div>
                        </form>
                    </div>
				</div>
			</div>
		</div>
        <div class="row clearfix">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h2>Lista de Contratos criados</h2>						
					</div>
					<div class="body">
                        <?php if(count($contracts)) : ?>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Client ID</th>
                                    <th>Proprietário ID</th>
                                    <th>Imóvel ID</th>
                                    <th>Data início</th>
                                    <th>Data fim</th>
                                    <th>Taxa</th>
                                    <th>Aluguel</th>
                                    <th>Condomínio</th>
                                    <th>IPTU</th>
                                    <th>Visualizar</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $index = 1; ?>
                                <?php foreach($contracts as $contract) : ?>
                                <tr>
                                    <td> <?php echo $index; ?> </td>
                                    <td> <?php echo $contract->lessee_id; ?> </td>
                                    <td> <?php echo $contract->landlord_id; ?> </td>
                                    <td> <?php echo $contract->property_id; ?> </td>
                                    <td> <?php echo $contract->date_begin; ?> </td>
                                    <td> <?php echo $contract->date_end; ?> </td>
                                    <td> <?php echo $contract->administration_fee; ?> </td>
                                    <td> <?php echo $contract->rent_amount; ?> </td>
                                    <td> <?php echo $contract->condominium_amount; ?> </td>
                                    <td> <?php echo $contract->iptu_amount; ?> </td>       
                                    <td> <button style="margin-left: 5px;" data-toggle="tooltip" title="Visualizar documentos assinados" type="button" class="view-docs btn btn-default btn-circle waves-effect waves-circle waves-float" contract-id="<?php echo $contract->id; ?>" onclick="viewContractDetail(this)"> <i class="material-icons">search</i> </button></td>       
                                </tr>
                                <?php $index++; ?>
                                <?php endforeach; ?>
                                </tbody>                                    
                            </table>
                        </div>
                        <?php else : ?>
                        <div class="alert alert-info">
                            Não há contratos criados!
                        </div>
                        <?php endif; ?>
                    </div>
				</div>
			</div>
		</div>        
    </div>
</section>

<script>
    function viewContractDetail(obj) {
        var fullscreen = "width=" + screen.availWidth + ", height=" + screen.availHeight;
        
        var myWindow = window.open("contract/view/" + $(obj).attr('contract-id'), "Detalhes do Contrato", fullscreen);
    }
</script>