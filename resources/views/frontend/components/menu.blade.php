<?php
  use App\Models\Menu;

  $menus = Menu::all();
?>

<header class=" navbar-default" style=" max-height: 39px;">    
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding: 0; ">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation" style="float: right;">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent" style="background-color: #1caf07;">
                
                <ul class="navbar-nav menu nav me-auto  " style="width: 100%;">
                    <li class="nav-item">
                      <a class="nav-link home " aria-current="page" href="{{ route('frontend.home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About iHCi 2022</a>
                    </li>
                              
                    @foreach($menus as $menu)
                      @if($menu->name == 'Home' || $menu->name == 'About iHCi 2022')
                        <?php continue; ?>
                      @endif
                       
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="{{ url('views/'.$menu->id.'/'.$menu->getSlug($menu->page_id)) }}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ $menu->name }}
                          </a>
        
                          @if( count($menu->submenus($menu->id)) > 0)
                            <ul class="dropdown-menu" style="background-color: #1caf07;">
                                @foreach($menu->submenus($menu->id) as $submenu)
                                <li>
                                  <a class="expanded dropdown-item" href="{{ url('views/'.$menu->id.'/'.$menu->getSlug($submenu->page_id)) }}">{{ $submenu->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                          @endif
                      </li>
                       @if($menu->name == 'Home' || $menu->name == 'Gallerya')
                        <?php continue; ?>
                      @endif 
                    @endforeach
                      <li class="nav-item">
                        <a class="nav-link" href="#">Gallery</a>
                    </li> 
                </ul>
            
                <div class="search-item">
                    <form action="">
                        <input class="form-control " type="search" placeholder="Search" aria-label="Search">
        
                    </form>
                    <button type="submit" class="btn "><img
                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Vector_search_icon.svg/1200px-Vector_search_icon.svg.png"
                            width="15px">
                    </button> 
                    
                </div>
            </div>
        </nav>
    </header>