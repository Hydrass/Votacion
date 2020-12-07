<div class="container">
    <div class="text-center">
        <h1>Listados de los Ciudadanos</h1>
    </div>

    <div class="row">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group col-md-6">
                <div class="form-group">
                    <label for="identidad">Documento de identidad</label>
                    <input type="text" name="cocumento_identidad" id="identidad"class="form-control">
                </div>

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre_ciudadano" id="nombre"class="form-control">
                </div>

                <div class="form-group">
                     <label for="apellido">Apellido</label>
                    <input type="text" name="apellido_ciudadano" id="apellido"class="form-control">
                </div>
            </div>

            <div class="form-group col-md-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email_ciudadano" id="email"class="form-control">
                </div>

                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select name="estado_ciudadano" id="estado" class="form-control">
                        <option value="">Estado del puesto</option>
                        <option value="1">Habilitado</option>
                        <option value="0">Desabilitado</option>
                    </select>
                </div>

    
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-sm" name="add_cidadanos">Agrear Ciudadano</button>
            </div>

        </form>


        <div class="row">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Identidad</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody class='img-pequena'>
                <?php 
                    foreach($mostrar_ciudadano as $mostrar_ciudadanos){
                        $del = 'delete_ciudadano/'.$mostrar_ciudadanos->Id.'/'.$mostrar_ciudadanos->Nombre;
                        $edit = 'edict/'.$mostrar_ciudadanos->Id.'/'.$mostrar_ciudadanos->Nombre;

                        echo "
                            <tr>
                                <td>$mostrar_ciudadanos->Documento_identidad</td>
                                <td>$mostrar_ciudadanos->Nombre</td>
                                <td>$mostrar_ciudadanos->Apellido</td>
                                <td>$mostrar_ciudadanos->Email</td>
                                <td>$mostrar_ciudadanos->Estado</td>

                                <td>
                                    <form action='' method='post'>
                                        <a type='button'class='btn btn-success btn-sm' href='$edit' name='delete_ciudadano'>Edict</a>
                                        <a type='button' class='btn btn-danger btn-sm' href='$del'>Eliminar</a>
                                    </form>
                            </td>
                                
                            </tr>   
                        ";
                        // echo $mostrar_condidatos->Logo_perfil;
                    }
                ?>
            </tbody>
        </table>
    </div>
    </div>

</div>