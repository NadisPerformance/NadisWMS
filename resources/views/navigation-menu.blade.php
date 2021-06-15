<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="bg-info max-w-10xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div style="margin-top: 2%">
                    <button  class="btn btn-link btn-sm order-1 order-lg-0 bg-dark" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
                </div>
                <div style="margin-left: 5%; width: 15%" class="flex-shrink-0 flex items-center">
                    <x-jet-nav-link  href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="navbar-brand">
                        <!--<h1 style="size: 100ch">maGistor® (WMS)</h1> -->
                        <img   src="{{asset('tamplet\assets\img\logo.png')}}" alt=""> 
                    </x-jet-nav-link>
                </div>
               

                <!-- Navigation Links -->
    
                
            </div>
           
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('msg.Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('msg.Team Settings') }}
                                    </x-jet-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('msg.Create New Team') }}
                                        </x-jet-dropdown-link>
                                    @endcan

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Team Switcher -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('msg.Switch Teams') }}
                                    </div>

                                    @foreach (Auth::user()->allTeams() as $team)
                                        <x-jet-switchable-team :team="$team" />
                                    @endforeach
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                @endif
               
               
                <div class="ml-3 relative bg-info" title="{{__('Plein écran')}}" id="full-view">
                    <i class="fa fa-crosshairs"></i>
                </div>
                
                <div  id="main" class="ml-3 relative bg-info" title="{{__('Setting')}}">
                    <button onclick="openNav()">
                       <i class="fa fa-cog"></i>
                    </button>
                </div>
                
                <div id="mySidebar" class="sidebar">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
                    <div class="form-check form-switch">
                        <label style="margin-left: 4%" class="form-check-label" for="s1">Setting 1</label>
                        <input style="margin-left: 40%"  class="form-check-input" type="checkbox" id="s1">
                    </div><br>
                    <div class="form-check form-switch">
                        <label style="margin-left: 4%" class="form-check-label" for="s2">Setting 2</label>
                        <input style="margin-left: 40%"  class="form-check-input" type="checkbox" id="s2">
                    </div><br>
                    <div class="form-check form-switch">
                        <label style="margin-left: 4%" class="form-check-label" for="s3">Setting 3</label>
                        <input style="margin-left: 40%" class="form-check-input" type="checkbox" id="s3">
                    </div><br>
                    <div class="form-check form-switch">
                        <label style="margin-left: 4%" class="form-check-label" for="s4">Setting 4</label>
                        <input style="margin-left: 40%" class="form-check-input" type="checkbox" id="s4">
                    </div><br>
                    <div class="form-check form-switch">
                        <label style="margin-left: 4%" class="form-check-label" for="s5">Setting 5</label>
                        <input style="margin-left: 40%" class="form-check-input" type="checkbox" id="s5">
                    </div>
                </div>
                <div  class="ml-3 relative bg-info">
                  
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="flag-icon flag-icon-{{Config::get('languages')[App::getLocale()]['flag-icon']}}"></span> {{ Config::get('languages')[App::getLocale()]['display'] }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @foreach (Config::get('languages') as $lang => $language)
                            @if ($lang != App::getLocale())
                                    <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"><span class="flag-icon flag-icon-{{$language['flag-icon']}}"></span> {{$language['display']}}</a>
                            @endif
                        @endforeach
                        </div>
                  
                </div>
                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('msg.Manage Account') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('msg.Profile') }}
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('msg.API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('msg.Log Out') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('msg.Dashboard') }}
            </x-jet-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="flex-shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('msg.Profile') }}
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('msg.API Tokens') }}
                    </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('msg.Log Out') }}
                    </x-jet-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('msg.Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('msg.Team Settings') }}
                    </x-jet-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('msg.Create New Team') }}
                        </x-jet-responsive-nav-link>
                    @endcan

                    <div class="border-t border-gray-200"></div>

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('msg.Switch Teams') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                        <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-info bg-secondary text-white" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">CŒUR</div>
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            {{ __('msg.Dashboard')}}
                        </a>
                        <a class="nav-link" href="{{ route('user.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                            {{ __('msg.Users')}}
                        </a>
                        <a class="nav-link" href="{{ route('groupe.index') }}">
                            <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                            {{ __('msg.Groupe')}}
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Pages
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    Articles
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse " id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested " >
                                        <x-jet-nav-link href="{{route('article.index')}}" :active="request()->routeIs('article.index')">
                                            {{ __('msg.Liste') }}
                                        </x-jet-nav-link>
                                        <x-jet-nav-link href="{{route('famille.index')}}" :active="request()->routeIs('famille.index')">
                                            {{ __('msg.Famille') }}
                                        </x-jet-nav-link>
                                        <x-jet-nav-link href="{{route('familleColisage.index')}}" :active="request()->routeIs('familleColisage.index')">
                                            {{ __('msg.Famille de colisage') }}
                                        </x-jet-nav-link> 
                                        <x-jet-nav-link href="{{route('familleQuarantaine.index')}}" :active="request()->routeIs('familleQuarantaine.index')">
                                            {{ __('msg.Famille de quarantaine') }}
                                        </x-jet-nav-link>       
                                        <x-jet-nav-link href="{{route('modeleStockage.index')}}" :active="request()->routeIs('modeleStockage.index')">
                                            {{ __('msg.Modele de stockages') }}
                                        </x-jet-nav-link>
                                        <x-jet-nav-link href="{{route('variant.index')}}" :active="request()->routeIs('variant.index')">
                                            {{ __('msg.Variant') }}
                                        </x-jet-nav-link>         
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesSite" aria-expanded="false" aria-controls="pagesSite">
                                    CARTOGRAPHIE
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesSite" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <x-jet-nav-link href="{{route('site.index')}}" :active="request()->routeIs('site.index')">
                                            {{ __('msg.Sites') }}
                                        </x-jet-nav-link>
                                        <x-jet-nav-link href="{{route('magasin.index')}}" :active="request()->routeIs('magasin.index')">
                                            {{ __('msg.Magasins') }}
                                        </x-jet-nav-link>
                                        <x-jet-nav-link href="{{route('emplacement.index')}}" :active="request()->routeIs('emplacement.index')">
                                            {{ __('msg.Emplacements') }}
                                        </x-jet-nav-link>
                                        <x-jet-nav-link href="{{route('secteur.index')}}" :active="request()->routeIs('secteur.index')">
                                            {{ __('msg.Secteurs') }}
                                        </x-jet-nav-link>
                                        <x-jet-nav-link href="{{route('familleSupport.index')}}" :active="request()->routeIs('familleSupport.index')">
                                            {{ __('msg.Familles de support') }}
                                        </x-jet-nav-link>
                                        <x-jet-nav-link href="{{route('adresse.index')}}" :active="request()->routeIs('adresse.index')">
                                            {{ __('msg.Adresses') }}
                                        </x-jet-nav-link>
                                        <x-jet-nav-link href="{{route('contacte.index')}}" :active="request()->routeIs('contacte.index')">
                                            {{ __('msg.Contactes') }}
                                        </x-jet-nav-link>
                                        
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="{{route('tier.index')}}" data-toggle="collapse" data-target="#pagesTier" aria-expanded="false" aria-controls="pagesTier">
                                    Tiers
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesTier" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <x-jet-nav-link href="{{route('tier.index')}}" :active="request()->routeIs('tier.index')">
                                            {{ __('msg.Liste') }}
                                        </x-jet-nav-link>
                                        <x-jet-nav-link href="{{route('fournisseur.index')}}" :active="request()->routeIs('fournisseur.index')">
                                            {{ __('msg.Fournisseurs') }}
                                        </x-jet-nav-link>
                                        <x-jet-nav-link href="{{route('client.index')}}" :active="request()->routeIs('client.index')">
                                            {{ __('msg.Clients') }}
                                        </x-jet-nav-link>
                                        <x-jet-nav-link href="{{route('transporteur.index')}}" :active="request()->routeIs('transporteur.index')">
                                            {{ __('msg.Transporteurs') }}
                                        </x-jet-nav-link>
                                        <x-jet-nav-link href="{{route('association.index')}}" :active="request()->routeIs('association.index')">
                                            {{ __('msg.Association Societé/Transporteur') }}
                                        </x-jet-nav-link>
                                        <x-jet-nav-link href="{{route('planTransport.index')}}" :active="request()->routeIs('planTransport.index')">
                                            {{ __('msg.Plans des transports') }}
                                        </x-jet-nav-link>
                                        <x-jet-nav-link href="{{route('lignePlanTransport.index')}}" :active="request()->routeIs('lignePlanTransport.index')">
                                            {{ __('msg.Lignes des plans') }}
                                        </x-jet-nav-link>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseCL" aria-expanded="false" aria-controls="pagesCollapseCL">
                                    Conditionnement Logistique
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseCL" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <x-jet-nav-link href="{{route('conditionnementLogistique.index')}}" :active="request()->routeIs('conditionnementLogistique.index')">
                                            {{ __('msg.Liste') }}
                                        </x-jet-nav-link>
                                        <x-jet-nav-link href="{{route('codeBarre.index')}}" :active="request()->routeIs('codeBarre.index')">
                                            {{ __('msg.Codes à barre') }}
                                        </x-jet-nav-link>
                                        <x-jet-nav-link href="{{route('modelePreparation.index')}}" :active="request()->routeIs('modelePreparation.index')">
                                            {{ __('msg.Modele de préparation') }}
                                        </x-jet-nav-link>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapsemns" aria-expanded="false" aria-controls="pagesCollapsemns">
                                    modèles de S/N
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapsemns" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <x-jet-nav-link href="{{route('modeleSN.index')}}" :active="request()->routeIs('modeleSN.index')">
                                            {{ __('msg.Liste') }}
                                        </x-jet-nav-link>
                                        <x-jet-nav-link href="{{route('ligneModeleSN.index')}}" :active="request()->routeIs('ligneModeleSN.index')">
                                            {{ __('msg.Lignes de modèle S/N') }}
                                        </x-jet-nav-link>
                                        <x-jet-nav-link href="{{route('familleSN.index')}}" :active="request()->routeIs('familleSN.index')">
                                            {{ __('msg.Famille de S/N') }}
                                        </x-jet-nav-link>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Additifs</div>
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Charts
                        </a>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseT" aria-expanded="false" aria-controls="pagesCollapseT">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tables
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseT" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <x-jet-nav-link href="{{route('marque.index')}}" :active="request()->routeIs('marque.index')">
                                    {{ __('msg.Marque') }}
                                </x-jet-nav-link>
                                <x-jet-nav-link href="{{route('categorie.index')}}" :active="request()->routeIs('categorie.index')">
                                    {{ __('msg.Categorie') }}
                                </x-jet-nav-link>
                                <x-jet-nav-link href="{{route('prix.index')}}" :active="request()->routeIs('prix.index')">
                                    {{ __('msg.Prix') }}
                                </x-jet-nav-link>
                                <x-jet-nav-link href="{{route('societe.index')}}" :active="request()->routeIs('societe.index')">
                                    {{ __('msg.Societe') }}
                                </x-jet-nav-link>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Connecté en tant que:</div>
                    {{ Auth::user()->name }}
                </div>
            </nav>
        </div>
       