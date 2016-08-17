<aside class="main-aside"><a href="/"><img src="/img/logo.png" class="logo"/></a>
    <ul class="menu ed-menu">
        @if(Auth::user()->profile_id != 3)
            <li class="menu__item"><a href="/system/pago-inscripcion" class="menu__link icon-money">Cobro de Inscripción</a></li>
            <li class="menu__item"><a href="/system/mensualidad" class="menu__link icon-tag">Cobro de Mensualidad</a></li>
            <li class="menu__item"><a href="/system/ventas" class="menu__link icon-line-chart">Ventas</a></li>
        @endif
        <li class="menu__item"><a href="/system/fichas" class="menu__link icon-file-text-o">Fichas</a></li>
        <li class="menu__item"><a href="/system/representante" class="menu__link icon-male">Representantes</a></li>
        <li class="menu__item"><a href="/system/deportista" class="menu__link icon-futbol-o">Deportistas</a></li>
        @if(Auth::user()->profile_id != 3)
            <li class="menu__item"><a href="/system/productos" class="menu__link icon-file-add">Productos</a></li>
            <li class="menu__item"><a href="#" class="menu__link icon-cog">Configuración</a></li>
        @endif
    </ul>
</aside>