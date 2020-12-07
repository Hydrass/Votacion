<div class="container">
    <div class="text-center">
        <h1>Listados de los Partidos</h1>
    </div>


    <div class="row">
        <form action="" method='post' enctype="multipart/form-data">
            <div class="form-group col-md-6">
                    <div class="form-group">
                          <label for="nombre">Nombre</label>
                         <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre del Partido">
                    </div>
                    
                    <div class="form-group">
                          <label for="descripcion">Descripción</label>
                         <textarea name="descripcion" id="descripcion" cols="20" rows="10" class="form-control" placeholder="Descripción del Partido"></textarea>
                    </div>
                    <!-- button -->
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm" name="add_partido">Agrear partido</button>
                    </div>

                </div>

                <div class="form-group col-md-6">
                    <div class="form-group">
                        <label for="logo">Agregar logo</label>
                        <input type="file" id="logo" name="logo" class="form-control">
                    </div>

                    <div class="form-group">
                    <label for="estado">Estado</label>
                        <select name="estado" id="estado" class="form-control">
                            <option value="">Estado del partido</option>
                            <option value="1">Habilitar</option>
                            <option value="0">Desabilitar</option>
                        </select>
                    </div>

                </div>
            
        </form>
    </div>



    <div class="row">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Logo</th>
                    <th>Estado</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody class='img-pequena'>
                <?php 
                    foreach($partido as $partidos){
                        $del = 'delete_partidos/'.$partidos->Id.'/'.$partidos->Nombre;
                        $edit = 'edict/'.$partidos->Id.'/'.$partidos->Nombre;

                        echo "
                            <tr>
                                <td>$partidos->Nombre</td>
                                <td><img src='$partidos->Logo_partido'alt='$partidos->Nombre' ></td>
                                <td>$partidos->Estado</td>
                                
                                <td>
                                     <form action='' method='post'>
                                        <a type='button'class='btn btn-success btn-sm' href='$edit' name='editar_partido'>Edict</a>
                                        <a type='button' class='btn btn-danger btn-sm' href='$del'>Eliminar</a>
                                    </form>
                                </td>
                            </tr>   
                        ";
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
