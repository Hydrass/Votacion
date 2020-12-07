<div class="container">
    <div class="text-center">
        <h1>Listados de los Candidatos</h1>
    </div>

    <div class="row">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group col-md-6">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre_candidatos" id="nombre"class="form-control">
                </div>

                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" name="apellido_candidatos" id="apellido"class="form-control">
                </div>

                <div class="form-group">
                <label for="estado">Partidos</label>
                    <select name="partidos_candidato" id="estado" class="form-control">
                        <option value="">Estado del puesto</option>
                        <?php 

                            foreach($mostrar_partido as $mostrar_partidos){ 
                                echo "
                                    <option value='$mostrar_partidos->Id'>$mostrar_partidos->Nombre</option>
                                ";
                            }

                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group col-md-6">
                <div class="form-group">
                    <label for="puesto">Puesto</label>
                    <input type="number" name="puesto_candidatos" id="puesto"class="form-control">
                </div>

                <div class="form-group">
                    <label for="puesto">Foto</label>
                    <input type="file" name="foto_candidatos" id="foto"class="form-control">
                </div>

                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select name="estado_candidato" id="estado" class="form-control">
                        <option value="">Estado del puesto</option>
                        <option value="1">Habilitado</option>
                        <option value="0">Desabilitado</option>
                    </select>
                </div>

    
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-sm" name="add_candidato">Agrear Candidato</button>
            </div>

        </form>


        <div class="row">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Partido</th>
                    <th>Puesto</th>
                    <th>Foto</th>
                    <th>Estado</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody class='img-pequena'>
                <?php 
                    foreach($mostrar_condidato as $mostrar_condidatos){
                        $del = 'delete_candidato/'.$mostrar_condidatos->id_candidato.'/'.$mostrar_condidatos->Nombre_candidatos;
                        $edit = 'edict/'.$mostrar_condidatos->Id.'/'.$mostrar_condidatos->Nombre;

                        echo "
                            <tr>
                                <td>$mostrar_condidatos->Nombre_candidatos</td>
                                <td>$mostrar_condidatos->Apellido_candidatos</td>
                                <td>$mostrar_condidatos->Partido_pertenece</td>
                                <td>$mostrar_condidatos->Puesto_aspira</td>
                                <td><img src='$mostrar_condidatos->Foto_perfil' alt='$mostrar_condidatos->Nombre_candidatos' ></td>
                                <td>$mostrar_condidatos->Estado_candidatos</td>

                                <td>
                                    <form action='' method='post'>
                                        <a type='button'class='btn btn-success btn-sm' href='$edit' name='editar_candidato'>Edict</a>
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