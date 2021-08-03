<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<base href="<?php echo BASE_URL; ?>">
<meta name="robots" content="noindex, nofollow">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title>Detalhes do contrato</title>
<link rel="icon" href="assets/images/favicon.png" type="image/x-icon">
<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" type="text/css">
<link rel="stylesheet" href="assets/css/main.css"/>
<link href="assets/css/jquery.signaturepad.css" rel="stylesheet">
<link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
</head>

<body class="theme-cyan">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-cyan">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Por favor, aguarde...</p>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <!-- <h1>Documentos para Assinar</h1> -->
            <h2><span>Detalhes do contrato</span></h2>
        </div>

        <div class="row clearfix">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h2>Aluguel</h2>						
					</div>
					<div class="body">
                        <?php if(count($monthlyPaments["aluguel"])) : ?>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Contrato ID</th>
                                    <th>Data para Pagamento</th>
                                    <th>Valor</th>
                                    <th>Pago</th>
                                    <th>Pagar</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $index = 1; ?>
                                <?php foreach($monthlyPaments["aluguel"] as $aluguel) : ?>
                                <tr>
                                    <td> <?php echo $index; ?> </td>
                                    <td> <?php echo $aluguel->contract_id; ?> </td>
                                    <td> <?php echo $aluguel->date; ?> </td>
                                    <td> <?php echo $aluguel->amount; ?> </td>
                                    <td class="is-payed"> <?php echo $aluguel->is_payed == 0 ? "Não" : "Sim"; ?> </td>
                                    <td> <button style="margin-left: 5px;" data-toggle="tooltip" title="Visualizar documentos assinados" type="button" class="view-docs btn <?php echo $aluguel->is_payed == 0 ? "btn-default" : "btn-success"; ?> btn-circle waves-effect waves-circle waves-float" monthly-pament-id="<?php echo $aluguel->id; ?>" onclick="markAsPayed(this)"> <i class="material-icons">done</i> </button></td>
                                </tr>
                                <?php $index++; ?>
                                <?php endforeach; ?>
                                </tbody>                                    
                            </table>
                        </div>
                        <?php else : ?>
                        <div class="alert alert-info">
                            Não há registros!
                        </div>
                        <?php endif; ?>
                    </div>
				</div>
			</div>
		</div>       
        
        <div class="row clearfix">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h2>Repasse</h2>						
					</div>
					<div class="body">
                        <?php if(count($monthlyPaments["aluguel"])) : ?>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Contrato ID</th>
                                    <th>Data referência</th>
                                    <th>Valor</th>
                                    <th>Pago</th>
                                    <th>Repassar</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $index = 1; ?>
                                <?php foreach($monthlyPaments["repasse"] as $repasse) : ?>
                                <tr>
                                    <td> <?php echo $index; ?> </td>
                                    <td> <?php echo $repasse->contract_id; ?> </td>
                                    <td> <?php echo $repasse->date; ?> </td>
                                    <td> <?php echo $repasse->amount; ?> </td>
                                    <td class="is-payed"> <?php echo $repasse->is_payed == 0 ? "Não" : "Sim"; ?> </td>
                                    <td> <button style="margin-left: 5px;" data-toggle="tooltip" title="Visualizar documentos assinados" type="button" class="view-docs btn <?php echo $repasse->is_payed == 0 ? "btn-default" : "btn-success"; ?> btn-circle waves-effect waves-circle waves-float" monthly-pament-id="<?php echo $repasse->id; ?>" onclick="markAsPayed(this)"> <i class="material-icons">done</i> </button></td>
                                </tr>
                                <?php $index++; ?>
                                <?php endforeach; ?>
                                </tbody>                                    
                            </table>
                        </div>
                        <?php else : ?>
                        <div class="alert alert-info">
                            Não há registros!
                        </div>
                        <?php endif; ?>
                    </div>
				</div>
			</div>
		</div>       
        
        <!-- #END# Unordered List --> 
    </div>
</section>

<div class="color-bg"></div>
<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
 
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 

<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->

<script>
    function markAsPayed(obj) {
        $.ajax({
            type: "POST",
            url: 'contract/pay/' + $(obj).attr('monthly-pament-id'),
            dataType: "json",
            success: function(data) {
                $(obj).removeClass("btn-default").addClass("btn-success");

                $(obj).parent("tr").find(".is-payed").html("Sim");
            },
            error: function(data) {
                
            }
        });
    }
</script>

</body>
</html>