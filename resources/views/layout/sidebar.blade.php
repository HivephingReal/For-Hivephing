<!-- /. NAV TOP  -->
     <nav class="navbar-default navbar-side" role="navigation">
 <div class="sidebar-collapse">
     <ul class="nav" id="main-menu">
        <li class="text-center">
                 <!--img src="{{asset('img/find_user.png')}}" class="user-image img-responsive"/-->
        </li>

         @if(auth()->guard('admin')->user()->role=='admin')
         <li>
             <a  href="{{url('adminDashboard')}}"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
         </li>

         <li>
             <a  href="{{url('register_fee')}}"><i class="fa fa-registered fa-2x"></i> Register fee</a>
         </li>

             {{--<li>--}}
             {{--<a  href="{{url('plans')}}">--}}
             {{--<i class="fa fa-balance-scale" aria-hidden="true" style="font-size:35px;"></i>--}}
             {{--<i class="fa fa-credit-card" aria-hidden="true" style="font-size:35px;"></i>--}}
             {{--Plans--}}
             {{--</a>--}}
             {{--</li>--}}
         <li>
             <a  href="{{url('construct_plan')}}">
                {{--<i class="fa fa-balance-scale" aria-hidden="true" style="font-size:35px;"></i>--}}
                <i class="fa fa-credit-card" aria-hidden="true" style="font-size:35px;"></i>
                 Plans
             </a>
         </li>
         <li>
             <a  href="{{url('cities')}}">
                 <i class="fa fa-users" aria-hidden="true" style="font-size:35px;"></i>
               Cities
             </a>
         </li>

         <li>
             <a  href="{{url('countries')}}"><i class="fa fa-flag" aria-hidden="true" style="font-size:35px;"></i>
               Countries </a>
         </li>

         <li>
             <a  href="{{url('businessgroup')}}"><i class="fa fa-suitcase" aria-hidden="true" style="font-size:35px;"></i>
               Business Group</a>
         </li>

         <li>
             <a  href="{{url('businesshub')}}"><i class="fa fa-sitemap" aria-hidden="true" style="font-size:35px;"></i>
               Business Hub </a>
         </li>

         <li>
             <a  href="{{url('events')}}"><i class="fa fa-tablet" aria-hidden="true" style="font-size:35px;"></i>
                 Events</a>
         </li>
         <li>
             <a  href="{{url('companies')}}"><i class="fa fa-tablet" aria-hidden="true" style="font-size:35px;"></i>
                     Companies</a>
         </li>

         <li>
             <a  href="{{url('newsCategory')}}"><i class="fa fa-rss-square" aria-hidden="true" style="font-size:35px;"></i>
               News Category</a>
         </li>

         <li>
             <a href="{{ url('maincategory') }}">
                 <i class="fa fa-server" aria-hidden="true" style="font-size: 35px;"></i>
                 Main Category
             </a>
         </li>

         <li>
             <a href="{{ url('operation') }}">
                 <i class="fa fa-users" aria-hidden="true" style="font-size:35px;"></i>
                 Operation Members
             </a>
         </li>

         <li>
             <a href="{{ url('construct') }}">
                 {{--<i class="fa fa-modx" aria-hidden="true" style="font-size: 35px;"></i>--}}
                 <i class="fa fa-building" aria-hidden="true" style="font-size: 35px;"></i>
                 Construct
             </a>
         </li>
             <li>
                 <a href="{{ url('get_project') }}">
                     {{--<i class="fa fa-modx" aria-hidden="true" style="font-size: 35px;"></i>--}}
                     <i class="fa fa-building" aria-hidden="true" style="font-size: 35px;"></i>
                    Get Construct Projects
                 </a>
             </li>
         <li>
             <a href="{{ url('design') }}">
                 <i class="fa fa-paint-brush" aria-hidden="true" style="font-size: 35px"></i>
                 Design
             </a>
         </li>

         <li>
             <a  href="{{url('free_plan')}}">
                 <i class="fa fa-envelope" aria-hidden="true" style="font-size:35px;"></i>
                 Free Plan
             </a>
         </li>

         @endif
         <li>
             <a  href="{{url('dashboard')}}"><i class="fa fa-heart" aria-hidden="true" style="font-size:35px;"></i>
                 Dashboard
             </a>
         </li>
         <li>
             <a href="{{ url('pending_service') }}">
                 <i class="fa fa-paint-brush" aria-hidden="true" style="font-size: 35px"></i>
                 Pending Service
             </a>
         </li>
         <li>
             <a href="{{ url('confirmed_service') }}">
                 <i class="fa fa-paint-brush" aria-hidden="true" style="font-size: 35px"></i>
                 Confirmed Service
             </a>
         </li>
         <li>
             <a href="{{ url('view_deletedProjects') }}">
                 <i class="fa fa-trash" aria-hidden="true" style="font-size: 35px"></i>
                 Deleted Projects
             </a>
         </li>
           <li>
             <a  href="{{url('companies')}}"><i class="fa fa-tablet" aria-hidden="true" style="font-size:35px;"></i>
                 Companies</a>
         </li>
         <li>
             <a  href="{{url('news')}}"><i class="fa fa-rss" aria-hidden="true" style="font-size:35px;"></i>
                 News</a>
         </li>

         <li>
             <a  href="{{url('tenders')}}"><i class="fa fa-envelope" aria-hidden="true" style="font-size:35px;"></i>
                 Tenders
             </a>
         </li>

         <li>
             <a href="{{ url('/logout') }}"
                     onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                 <i class="fa fa-sign-out" aria-hidden="true" style="font-size:35px;"></i>
                 Log Out
             </a>


             <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                     style="display: none;">
                 {{ csrf_field() }}
             </form>
         </li>

          <!--li>
             <a  href="ui.html"><i class="fa fa-desktop fa-3x"></i> UI Elements</a>
         </li>
         <li>
             <a  href="tab-panel.html"><i class="fa fa-qrcode fa-3x"></i> Tabs & Panels</a>
         </li>
    <li  >
             <a   href="chart.html"><i class="fa fa-bar-chart-o fa-3x"></i> Morris Charts</a>
         </li>
           <li  >
             <a  href="table.html"><i class="fa fa-table fa-3x"></i> Table Examples</a>
         </li>
         <li  >
             <a  href="form.html"><i class="fa fa-edit fa-3x"></i> Forms </a>
         </li>


         <li>
             <a href="#"><i class="fa fa-sitemap fa-3x"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
             <ul class="nav nav-second-level">
                 <li>
                     <a href="#">Second Level Link</a>
                 </li>
                 <li>
                     <a href="#">Second Level Link</a>
                 </li>
                 <li>
                     <a href="#">Second Level Link<span class="fa arrow"></span></a>
                     <ul class="nav nav-third-level">
                         <li>
                             <a href="#">Third Level Link</a>
                         </li>
                         <li>
                             <a href="#">Third Level Link</a>
                         </li>
                         <li>
                             <a href="#">Third Level Link</a>
                         </li>

                     </ul>

                 </li>
             </ul>
           </li>
       <li  >
             <a  href="blank.html"><i class="fa fa-square-o fa-3x"></i> Blank Page</a>
         </li-->
     </ul>

 </div>

</nav>
<!-- /. NAV SIDE  -->
