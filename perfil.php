<?php include_once "views/userhead.php"; ?>
<?php include_once "php/queries.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
						<div class="well"><h1>Perfil</h1></div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-8">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th></th>
										<th></th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php 
								$resultado = GetPerfilByUser($_COOKIE["pkusuario"]);
								$row = mysqli_fetch_row($resultado); 
								?>
                                    <tr>
                                        <td>
										<div class="form-group">
										  <label for="usr">Nombre:</label>
										  <input type="text" class="form-control" id="nombre" value="<?php echo $row[0]; ?>" >
										</div>										
										</td>
                                    </tr>
                                    <tr>
                                        <td>
										<div class="form-group">
										  <label for="usr">Apellidos:</label>
										  <input type="text" class="form-control" id="apellidos" value="<?php echo $row[1]; ?>" >
										</div>										
										</td>
                                    </tr>
                                    <tr>
                                        <td>
										<div class="form-group">
										  <label for="usr">Usuario:</label>
										  <input type="text" class="form-control" id="usr" value="<?php echo $row[2]; ?>" >
										</div>										
										</td>
                                    </tr>
                                    <tr>
                                        <td>
										<div class="form-group">
										  <label for="usr">Tipo de Sangre:</label>
										  <input type="text" class="form-control" id="tiposangre" value="<?php echo $row[3]; ?>" >
										</div>										
										</td>
                                    </tr>
                                    <tr>
                                        <td>
										<div class="form-group">
										  <label for="usr">Puntos:</label>
										  <input type="text" class="form-control" id="puntos" value="<?php echo $row[4]; ?>" >
										</div>										
										</td>
                                    </tr>
								</tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->	
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
