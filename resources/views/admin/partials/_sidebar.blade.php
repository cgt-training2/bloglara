<aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="#">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

				  <li class="sub-menu">

                      <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Posts</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>

                      <ul class="sub">

                          <li><a class="" href="{{ route('admin.posts.index') }}">Index</a></li>                          
                          <li><a class="" href="{{ route('admin.posts.create') }}">Create Post</a></li>
                      
                      </ul>

          </li>       

          <li class="sub-menu">

                      <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>User</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>

                      <ul class="sub">

                          <li><a class="" href="#">Register</a></li>
                          <li><a class="" href="#">SetPermission</a></li>

                      </ul>

          </li>
                                               
                  <li class="sub-menu">

                      <a href="javascript:;" class="">
                          <i class="icon_table"></i>
                          <span>Tables</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>

                      <ul class="sub">

                          <li><a class="" href="#">Basic Table</a></li>

                      </ul>
                      
                  </li>
                  
                  <li class="sub-menu">

                      <a href="javascript:;" class="">

                          <i class="icon_documents_alt"></i>
                          <span>Pages</span>
                          <span class="menu-arrow arrow_carrot-right"></span>

                      </a>

                      <ul class="sub">

                          <li><a class="" href="#">Profile</a></li>
                          <li><a class="" href="#"><span>Login Page</span></a></li>
                          <li><a class="" href="#">Blank Page</a></li>
                          <li><a class="" href="#">404 Error</a></li>

                      </ul>

                  </li>
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>