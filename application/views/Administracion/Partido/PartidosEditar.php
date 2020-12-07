<div class="container">
    <div class="text-center">
        <h1>Listados de los Partidos</h1>
    </div>


    <div class="row">
        <form action="" method='post' enctype="multipart/form-data">
            <div class="form-group col-md-6">
                    <div class="form-group">
                          <label for="nombre">Nombre</label>
                         <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $ver_partido->Nombre; ?>" placeholder="Nombre del Partido">
                    </div>
                    
                    <div class="form-group">
                          <label for="descripcion">Descripción</label>
                         <textarea name="descripcion" id="descripcion" cols="20" rows="10" class="form-control" placeholder="Descripción del Partido"><?php echo $ver_partido->Descripcion; ?></textarea>
                    </div>
                    <!-- button -->
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm" name="edict_partido">Editar partido</button>
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
    </div>
</div>
