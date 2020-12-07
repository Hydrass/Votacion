<div class="container">
    <div class="form-group text-center"> 
        <h1>Sistema de votacion, elige tu partido</h1>
    </div>
    

    <?php 
        foreach($candidato_elegir as $candidato_elegirs){

            echo "
                <div class='form-group col-md-4'>
                    <div class='card' style='width: 18rem;'>
                        <img src='$candidato_elegirs->Foto_perfil' class='card-img-top img-home' alt='$candidato_elegirs->Nombre_candidatos'>
                        <div class='card-body'>
                        <p class='card-text text-center'>$candidato_elegirs->Nombre_candidatos</p>
                        </div>
                    </div>
                </div>
            ";
        }
    
    ?>
    <div class="form-group">

    <div>
</div>
