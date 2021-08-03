<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Clientes</h2>
            <!-- <small class="text-muted">Welcome to Swift application</small> -->
        </div>
        <div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>Adicionar Cliente</h2>
					</div>
					<div class="body">
                        <form method="POST" action="lessee/create">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="name" class="form-control" placeholder="Nome">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="email" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="telephone" class="form-control" placeholder="Telefone">
                                        </div>
                                    </div>
                                </div>                                
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-raised g-bg-cyan">Cadastrar</button>
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
						<h2>Lista de Clientes Registrados</h2>						
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
    </div>
</section>