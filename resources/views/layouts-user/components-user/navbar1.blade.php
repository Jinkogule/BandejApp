<!--Navbar-->
<nav class="navbar navbar1 navbar-expand-md fixed-top">
    <div class="container-fluid container-menu" style="position: relative;">
        <!-- Menu -->
        <div class="dropdown">
            <!-- dropdown menu-->
            <ul class="main">
                <li class="desplegable">
                    <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" class="curso">Menu</a>
                    <ul class="grupo-desplegable">
                    <h4>Sugestões ></h4>
                        <li><a class="dropdown-item" href="/">Cardápio</a></li>   
                        <li><a class="dropdown-item" href="/sugestaodemelhorias">Melhorias</a></li>
                    
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