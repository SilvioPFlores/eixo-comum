<nav class="navbar navbar-expand-sm navbar-light" style="background-color: #eeeeee;">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home')}}">Início</a>
                </li>
                
                @if ($nivel >= 1) 
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Turmas
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="area.php">Montar Turmas</a></li>
                            @if ($nivel == 3) 
                                <li><a class="dropdown-item" href="sintoma.php">Duplicar Turmas</a></li>
                            @endif
                            <li><a class="dropdown-item" href="unidade.php">Consultar Turmas</a></li>
                        </ul>
                    </li>
                    @if ($nivel >= 2) 
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Alunos
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="area.php">Aluno - Transferência</a></li>
                                <li><a class="dropdown-item" href="sintoma.php">Aluno - Requerimento</a></li>
                                <li><a class="dropdown-item" href="unidade.php">Consultar Aluno</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Opções
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="background-color: #eeeeee;">
                                <li><a class="dropdown-item" href="{{route('ucs')}}">UC's</a></li>
                                <li><a class="dropdown-item" href="{{route('cursos')}}">Cursos</a></li>
                                <li><a class="dropdown-item" href="{{route('termos')}}">Termos</a></li>
                                <li><a class="dropdown-item" href="{{route('turnos')}}">Turnos</a></li>
                                <li><a class="dropdown-item" href="{{route('eixos')}}">Eixos</a></li>
                            </ul>
                        </li>
                    
                    @else 
                        <li><a class="nav-link" href="unidade.php">Consultar Aluno</a></li>
                    @endif
                    @if ($nivel == 3) 
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Acessos
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="acesso.php?novo">Novo Acessos</a></li>
                                <li><a class="dropdown-item" href="acesso.php">Consultar Acessos</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="nivel.php">Níveis</a></li>
                            </ul>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Sair</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="#">Consultar Turmas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>