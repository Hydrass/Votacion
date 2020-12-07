<div class="container">
    <div class="form-group text-center"> 
        <h1>Sistema de votacion, elige tu partido</h1>
    </div>
    

    <?php 
        foreach($partido as $partidos){
            $url = $partidos->Id;
            echo "
                <div class='form-group col-md-4'>
                    <div class='card' style='width: 18rem;'>
                        <a  href='$url'><img src='$partidos->Logo_partido' class='card-img-top img-home' alt='$partidos->Nombre'></a>
                        <div class='card-body'>
                        <p class='card-text text-center'>$partidos->Nombre</p>
                        </div>
                    </div>
                </div>
            ";
        }
    
    ?>
    <div class="form-group">

    <div>
</div>
