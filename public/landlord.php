<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Proprietários</h2>
            <!-- <small class="text-muted">Welcome to Swift application</small> -->
        </div>
        <div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>Adicionar Proprietário</h2>
					</div>
					<div class="body">
                        <form method="POST" action="landlord/create">
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
                                    <div class="form-group drop-custum focused">
                                        <select name="day-to-receive" class="form-control show-tick">
                                            <option value="0">-- Qual melhor dia para recebimento? --</option>
                                            <?php for ($day = 1; $day <= 29; $day++) : ?>
                                                <option value="<?php echo $day; ?>"><?php echo $day; ?></option>
                                            <?php endfor; ?>
                                        </select>
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
    </div>
</section>