<div>
<nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto ">
            <li class="nav-item dropdown no-arrow">
              <!-- <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a> -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-1 small" placeholder="What do you want to look for?"
                      aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            <li class="nav-item dropdown no-arrow mx-1" >
              <a class="nav-link dropdown-toggle " href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw stop-item"></i>
                @if($notifCount !== 0)
                <div id="refresh-content">
                <button class="badge badge-danger badge-counter" style="border:none;">{{ $notifCount }}</button>
                </div>
                @endif
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Notification
                </h6>
                <div id="refresh-item">
                @foreach($message as $row)
                <a class="dropdown-item d-flex align-items-center" href="/dashboard#anchor-remark">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">{{ date_format($row->created_at, "l, M Y d")}}</div>
                    <span class="font-weight-bold">{{ $row->message }}</span>
                    <div class="small text-gray-500">{{ $row->name}}</div>
                  </div>
                </a>
                @endforeach
              </div>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>
            <li class="nav-item dropdown no-arrow mx-1">
                @if($permission)
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                @if(!empty($permission->count()))
                <div id="refresh-notif">
                <span class="badge badge-warning badge-counter permission">{{ $permission->count( ) }}</span>
                </div>
                @endif
              </a>
              @endif
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header juduls">
                  Employee Permission
                </h6>
                <div id="refresh-item-permission"> 
                  @foreach($permission as $row)
                  <a class="dropdown-item d-flex align-items-center" href="/permission">
                    <div class="dropdown-list-image mr-3">
                      <img class="rounded-circle" src="{{ asset('img/man.png') }}" style="max-width: 60px" alt="">
                      <div class="status-indicator bg-success"></div>
                    </div>
                    <div class="font-weight-bold">
                      <div class="text-truncate remark"> {{ $row->remark }} </div>
                      <div class="small text-gray-500 hrd-notif">{{ $row->hrd }} · {{ $row->created_at->diffForHumans() }}</div>
                    </div>
                  </a>
                  @endforeach
                </div>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                @if($photos)
                <img class="img-profile rounded-circle" src="{{asset('storage/public/'.$photos->photo)}}" style="max-width: 60px">
                @else
                <img class="img-profile rounded-circle" src="{{ asset('img/avatar_kosong.jpg') }}" style="max-width: 60px">
                @endif
                <span class="ml-2 d-none d-lg-inline text-white small">{{ auth()->user()->name }}</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="/profile/{{auth()->user()->id}}">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
</div>
