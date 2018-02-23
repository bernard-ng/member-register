<!--=============== NAVBAR ===================-->
<header style="margin-bottom: 50px !important;">
    <div class="navbar-fixed z-depth-2">
        <nav class="ng-menu-reset">
            <div class="nav-wrapper ng-menu shrink">
                <div class="row container">
                    <a href="/" class="brand-logo left ng-menu-title">
                        SCS
                    </a>
                    <a href="#" data-activates="mobile-side-nav" class="button-collapse btn primary-c right">
                        <i class="social social-menu"></i>
                    </a>
                    <ul class="right hide-on-med-and-down links">
                        <li class="left">
                            <form action="/search" method="get">
                                <input class="default-form" type="search" placeholder="recherche..." name="q" id="q">
                                <button class="btn" type="submit" ><i class="icon icon-search"></i></button>
                            </form>
                        </li>
                        <li>&nbsp;</li>
                        <li id="add"><a href="/add" class="ng-menu-item"><i class="social social-th"></i>&nbsp;&nbsp;Ajouter</a></li>
                        <li id="register"><a href="/register" class="ng-menu-item"><i class="social social-users"></i>&nbsp;&nbsp;Membres</a></li>

                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
