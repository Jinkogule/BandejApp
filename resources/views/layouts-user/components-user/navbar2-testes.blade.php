<nav class="navbar navbar2 navbar-expand-md fixed-top">
    <div class="row" style="width: 100%; height: 45px; padding: 0; margin: 0; position: relative;">
        <?php
        if (DB::table('refeicaos')->select('*')->where('id_usuario', '=', $user_id)->exists() == 1){
        ?>
            <div class="col botoes-menu border position-relative" style="background-color: #44832d !important;">
                <p class="centraliza" style="color: #fff;"> Próxima etapa</p>
                <a href="/dashboard" class="stretched-link"></a>
            </div>
        <?php
        }
        else{
        ?>
         <div class="col botoes-menu border position-relative">
            <p disabled class="centraliza" style="color: #fff;"> Próxima etapa</p>
            <a disabled href="" class="stretched-link"></a>
        </div>
        <?php
        }
        ?>
    </div>
</nav>