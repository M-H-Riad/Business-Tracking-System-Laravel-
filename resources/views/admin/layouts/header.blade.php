<header>

	<!-- Logo starts -->
	<a href="/home" class="logo">
		<img class="im-responsive" src="{{asset('admin/img/logo.png')}}" alt="Arise Admin Dashboard Logo" />
	</a>
	<!-- Logo ends -->

	<!-- Header actions starts -->
	<ul id="header-actions" class="clearfix">
		<li class="list-box user-admin hidden-xs dropdown">
			<div class="admin-details">
				<div class="name">{{ Auth::user()->name }}</div>
				<div class="designation">System Admin</div>
			</div>
			<a id="drop4" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
				<i class="icon-user"></i>
			</a>
			<ul class="dropdown-menu sm">
				<li class="dropdown-content">
					<a href="{{action('userController@edit',Auth::user()->id)}}">Edit Profile</a>
						<a class="dropdown-item" href="{{ route('logout') }}"
						   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
							{{ __('Logout') }}
						</a>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
				</li>
			</ul>
		</li>
		<li>
			<button type="button" id="toggleMenu" class="toggle-menu">
				<i class="collapse-menu-icon"></i>
			</button>
		</li>
	</ul>


</header>