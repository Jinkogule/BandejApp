<!--Navbar-->
<nav class="navbar navbar1 navbar-expand-md fixed-top">
    <div class="container-fluid container-menu" style="position: relative;">
        <!-- Menu -->
        <div class="dropdown">
            <!-- dropdown menu-->
            <ul class="main">
                <li class="desplegable">
                    <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="" class="curso">Menu</a>
                    <ul class="grupo-desplegable">
                        <li><a class="dropdown-item" href="/admin/dashboard">Calendário de Refeições</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/admin/sugestoesdecardapio">Sugestões de cardápio</a></li>
                        <li><a class="dropdown-item" href="/admin/sugestoesdemelhorias">Sugestões de melhorias</a></li>                              
                    </ul>
                </li> 
            </ul>
        </div>

        <!-- Brand -->
        <a class="navbar-brand navbar-brand-dashboard logo" href="/dashboard">
            <img src="/images/favicons/talheres-icon.png">
            Bem vindo, {{ session('nome')}}!
        </a> 
            
        <a class="nav-link" href="{{ route('sair') }}" style="color: #fff !important;">Sair</a>
        
    </div>

</nav>
<!--Navbar-->