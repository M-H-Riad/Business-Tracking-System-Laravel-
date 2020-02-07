<div class="vertical-nav">

			<!-- Collapse menu starts -->
			<button class="collapse-menu">
				<i class="icon-menu2"></i>
			</button>
			<!-- Collapse menu ends -->

			<!-- Current user starts -->
			<div class="user-details clearfix">
				<a href="" class="user-img">
					<img src="{{asset('admin/img/thumbs/user1.png')}}" alt="User Info">
				</a>
				<h5 class="user-name">Sean</h5>
			</div>
			<!-- Current user ends -->

			<!-- Sidebar menu starts -->
			<ul class="menu clearfix">
				<li>
					<a href="/home">
						<i class="icon-air-play"></i>
						<span class="menu-item"><b>Dashboard</b></span>
					</a>
				</li>

                <li class="">
                    <a href="#">
                        <i class="icon-coin-dollar"></i>
                        <span class="menu-item"><b>Billing Info</b></span>
                        <span class="down-arrow"></span>
                    </a>
                    <ul>
                        <li>
                            <a href='{{url('billing/create')}}'>Create Bill</a>
                        </li>
						<li>
                            <a href='{{url('billing')}}'>View Billing List</a>
                        </li>
                    </ul>
                </li>

				<li class="">
                    <a href="#">
                        <i class="icon-head"></i>
                        <span class="menu-item"><b>Agency Info</b></span>
                        <span class="down-arrow"></span>
                    </a>
                    <ul>
                        <li>
                            <a href='{{url('agency/create')}}'>Add Agency</a>
                        </li>
                        <li>
                            <a href='{{url('/agency')}}'>View Agency List</a>
                        </li>
						<li>
							<a href='{{url('viewAgentReport')}}'>View Agency Report</a>
						</li>
                    </ul>
                </li>
				<li class="">
					<a href="#">
						<i class="icon-profile"></i>
						<span class="menu-item"><b>Client Info</b></span>
						<span class="down-arrow"></span>
					</a>
					<ul>
						<li>
							<a href='{{url('client/create')}}'>Add Client</a>
						</li>
						<li>
							<a href='{{url('client')}}'>View Client List</a>
						</li>
						<li>
							<a href='{{url('viewClientReport')}}'>View Client Report</a>
						</li>
					</ul>
				</li>

				<li class="">
					<a href="#">
						<i class="icon-coin-dollar"></i>
						<span class="menu-item"><b>Payment Info</b></span>
						<span class="down-arrow"></span>
					</a>
					<ul>
						<li>
							<a href='{{url('payment/create')}}'>Create Payment</a>
						</li>
						<li>
							<a href='{{url('payment')}}'> Payment List</a>
						</li>

					</ul>
				</li>

				<li class="">
					<a href="#">
						<i class="icon-equalizer4"></i>
						<span class="menu-item"><b>Product Type</b></span>
						<span class="down-arrow"></span>
					</a>
					<ul>
						<li>
							<a href='{{url('type/create')}}'>Add Type</a>
						</li>
						<li>
							<a href='{{url('type')}}'>View All Type</a>
						</li>
						<li>
							<a href='{{url('typeReport')}}'>View Type Details</a>
						</li>

					</ul>
				</li>
			</ul>

			<!-- Sidebar menu ends -->
		</div>
