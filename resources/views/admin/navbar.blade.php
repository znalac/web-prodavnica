<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                
                  
                  

                   
                    @hasrole('admin')
                    
                    
                    <a class="nav-link {{ Request::path() == 'admin/banners' ? 'active' :'' }} " href="/admin/banners">
                       Banner
                      </a>
                        
                        <a class="nav-link {{ Request::path() == 'admin/products' ? 'active' :'' }} " href="/admin/products">
                             Products
                         </a>
                        
                         <a class="nav-link {{ Request::path() == 'admin/categories' ? 'active' :'' }} " href="/admin/categories">
                           Categories
                        </a>
                        <a class="nav-link {{ Request::path() == 'admin/clothes/sizes' ? 'active' :'' }} " href="/admin/clothes/sizes">
                           Clothes size
                         </a>
                      
                         <a class="nav-link {{ Request::path() == 'admin/henna-tatoo' ? 'active' :'' }} " href="/admin-henna-tatoo">
                           Henna tatoo galllery
                          </a>

                          <a class="nav-link {{ Request::path() == 'admin/orders' ? 'active' :'' }} " href="/admin-orders">
                           Unshipped orders
                           </a>
                           <a class="nav-link {{ Request::path() == 'admin/shipped-orders' ? 'active' :'' }} " href="/admin/shipped-orders">
                           Shipped orders
                            </a>
                            <a class="nav-link {{ Request::path() == 'admin/dj' ? 'active' :'' }} " href="/admin/dj">
                              Dj banner
                                 </a>
                                 <a class="nav-link {{ Request::path() == 'admin/dj' ? 'active' :'' }} " href="/admin/parcel_size">
                                        Parcel size
                                       </a>
                    @endhasrole
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
               @if (Auth::check())
                  {{Auth::user()->name}} 
               @endif
            </div>
        </nav>
    </div>