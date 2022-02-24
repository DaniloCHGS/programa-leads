<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="leads.php">Nosso Chope</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?=$pg == 'home' ? 'active' : ''?>">
                <a class="nav-link" href="leads.php">Leads</a>
            </li>
            <li class="nav-item <?=$pg == 'home' ? 'relatorios' : ''?>">
                <a class="nav-link" href="relatorios.php">Relatórios</a>
            </li>
            <li class="nav-item <?=$pg == 'home' ? 'relatorios' : ''?>">
                <a class="nav-link" href="sair.php">Sair</a>
            </li>
        </ul>
    </div>
</nav>