<section class="content home">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Dashboard</h2>
        </div>
        
        <div class="row clearfix">
            <div class="col-lg-4 col-md-4 col-sm-8">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-blue"></i> </div>
                    <div class="content">
                        <div class="text">Total de Clientes</div>
                        <div class="number"><?php echo $totals->total_lessee; ?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-8">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-green"></i> </div>
                    <div class="content">
                        <div class="text">Total de Proprietários</div>
                        <div class="number"><?php echo $totals->total_landlord; ?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-8">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-file-text"></i> </div>
                    <div class="content">
                        <div class="text">Total de Contratos</div>
                        <div class="number"><?php echo $totals->total_contract; ?></div>
                    </div>
                </div>
            </div>
        </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2> Lista de Clientes <small></small> </h2>
                        </div>                    
                        <div class="body">
                            <?php if(count($lessees)) : ?>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Telefone</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $index = 1; ?>
                                    <?php foreach($lessees as $lessee) : ?>
                                    <tr>
                                        <td> <?php echo $index; ?> </td>
                                        <td> <?php echo $lessee->name; ?> </td>
                                        <td> <?php echo $lessee->email; ?> </td>
                                        <td> <?php echo $lessee->telephone; ?> </td>
                                    </tr>
                                    <?php $index++; ?>
                                    <?php endforeach; ?>
                                    </tbody>                                    
                                </table>
                            </div>
                            <?php else : ?>
                            <div class="alert alert-info">
                                Não há Clientes registrados!
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2> Lista de Proprietários <small></small> </h2>
                        </div>                    
                        <div class="body">
                            <?php if(count($landlords)) : ?>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Telefone</th>
                                        <th>Dia para recebimento</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $index = 1; ?>
                                    <?php foreach($landlords as $landlord) : ?>
                                    <tr>
                                        <td> <?php echo $index; ?> </td>
                                        <td> <?php echo $landlord->name; ?> </td>
                                        <td> <?php echo $landlord->email; ?> </td>
                                        <td> <?php echo $landlord->telephone; ?> </td>
                                        <td> <?php echo $landlord->day_to_receive; ?> </td>
                                    </tr>
                                    <?php $index++; ?>
                                    <?php endforeach; ?>
                                    </tbody>                                    
                                </table>
                            </div>
                            <?php else : ?>
                            <div class="alert alert-info">
                                Não há Clientes registrados!
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2> Lista de Contratos <small></small> </h2>
                        </div>                    
                        <div class="body">
                            
                        </div>
                    </div>
                </div>
            </div>
	</div>
</section>