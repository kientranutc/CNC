<aside class="fixed skin-6">
			<div class="sidebar-inner scrollable-sidebar">
				<div class="size-toggle">
					<a class="btn btn-sm" id="sizeToggle">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="btn btn-sm pull-right logoutConfirm_open"  href="#logoutConfirm">
						<i class="fa fa-power-off"></i>
					</a>
				</div><!-- /size-toggle -->
				<div class="user-block clearfix">
					<img src="img/user.jpg" alt="User Avatar">
					<div class="detail">
						<strong>John Doe</strong><span class="badge badge-danger m-left-xs bounceIn animation-delay4">4</span>

					</div>
				</div><!-- /user-block -->
				<div class="main-menu">
					<ul>
						<li class="{{ (Route::currentRouteName()== 'dashboard.index')?'active':''}}">
							<a href="{{URL::route('dashboard.index')}}">
								<span class="menu-icon">
									<i class="fa fa-desktop fa-lg"></i>
								</span>
								<span class="text">
									Dashboard
								</span>
								<span class="menu-hover"></span>
							</a>
						</li>
						<li class="{{ (Route::currentRouteName()== 'categories.index')
									|| (Route::currentRouteName()== 'categories.create')
									|| (Route::currentRouteName()== 'categories.update')
									?'active':''}}">
							<a href="{{URL::route('categories.index')}}">
								<span class="menu-icon">
									<i class="fa fa-tasks fa-lg"></i>
								</span>
								<span class="text">
									Danh mục
								</span>
								<span class="menu-hover"></span>
							</a>
						</li>
						<li class="{{ (Route::currentRouteName()== 'news.index')
									|| (Route::currentRouteName()== 'news.create')
									|| (Route::currentRouteName()== 'news.edit')
									?'active':''}}">
							<a href="{{URL::route('news.index')}}">
								<span class="menu-icon">
									<i class="fa fa-tasks fa-lg"></i>
								</span>
								<span class="text">
									Tin tức
								</span>
								<span class="menu-hover"></span>
							</a>
						</li>
						<li class="{{ (Route::currentRouteName()== 'banner.index')
									|| (Route::currentRouteName()== 'banner.create')
									|| (Route::currentRouteName()== 'banner.update')
									?'active':''}}">
							<a href="{{URL::route('banner.index')}}">
								<span class="menu-icon">
									<i class="fa fa-tasks fa-lg"></i>
								</span>
								<span class="text">
									Banner
								</span>
								<span class="menu-hover"></span>
							</a>
						</li>
						<li class="{{ (Route::currentRouteName()== 'products.index')
									||(Route::currentRouteName()== 'products.create')
									||(Route::currentRouteName()== 'products.update')
									?'active':''}}">
							<a href="{{URL::route('products.index')}}">
								<span class="menu-icon">
									<i class="fa fa-tasks fa-lg"></i>
								</span>
								<span class="text">
									Sản phẩm
								</span>
								<span class="menu-hover"></span>
							</a>
						</li>
						<li class="openable open">
							<a href="#">
								<span class="menu-icon">
									<i class="fa fa-file-text fa-lg"></i>
								</span>
								<span class="text">
									Page
								</span>
								<span class="menu-hover"></span>
							</a>
							<ul class="submenu">
								<li><a href="login.html"><span class="submenu-label">Sign in</span></a></li>
							</ul>
						</li>
						<li class="openable">
							<a href="#">
								<span class="menu-icon">
									<i class="fa fa-tag fa-lg"></i>
								</span>
								<span class="text">
									Component
								</span>
								<span class="badge badge-success bounceIn animation-delay5">9</span>
								<span class="menu-hover"></span>
							</a>
							<ul class="submenu">
								<li><a href="ui_element.html"><span class="submenu-label">UI Features</span></a></li>
								<li><a href="button.html"><span class="submenu-label">Button & Icons</span></a></li>
								<li><a href="tab.html"><span class="submenu-label">Tab</span></a></li>
								<li><a href="nestable_list.html"><span class="submenu-label">Nestable List</span></a></li>
								<li><a href="calendar.html"><span class="submenu-label">Calendar</span></a></li>
								<li><a href="table.html"><span class="submenu-label">Table</span></a></li>
								<li><a href="widget.html"><span class="submenu-label">Widget</span></a></li>
								<li><a href="form_element.html"><span class="submenu-label">Form Element</span></a></li>
								<li><a href="form_wizard.html"><span class="submenu-label">Form Wizard</span></a></li>
							</ul>
						</li>

						<li>
							<a href="timeline.html">
								<span class="menu-icon">
									<i class="fa fa-clock-o fa-lg"></i>
								</span>
								<span class="text">
									Timeline
								</span>
								<span class="menu-hover"></span>
							</a>
						</li>
						<li>
							<a href="gallery.html">
								<span class="menu-icon">
									<i class="fa fa-picture-o fa-lg"></i>
								</span>
								<span class="text">
									Gallery
								</span>
								<span class="menu-hover"></span>
							</a>
						</li>
						<li>
							<a href="inbox.html">
								<span class="menu-icon">
									<i class="fa fa-envelope fa-lg"></i>
								</span>
								<span class="text">
									Inbox
								</span>
								<span class="badge badge-danger bounceIn animation-delay6">4</span>
								<span class="menu-hover"></span>
							</a>
						</li>

						<li class="openable">
							<a href="#">
								<span class="menu-icon">
									<i class="fa fa-magic fa-lg"></i>
								</span>
								<span class="text">
									Multi-Level menu
								</span>
								<span class="menu-hover"></span>
							</a>
							<ul class="submenu">
								<li class="openable">
									<a href="#">
										<span class="submenu-label">menu 2.1</span>
										<span class="badge badge-danger bounceIn animation-delay1 pull-right">3</span>
									</a>
									<ul class="submenu third-level">
										<li><a href="#"><span class="submenu-label">menu 3.1</span></a></li>
										<li><a href="#"><span class="submenu-label">menu 3.2</span></a></li>
										<li class="openable">
											<a href="#">
												<span class="submenu-label">menu 3.3</span>
												<span class="badge badge-danger bounceIn animation-delay1 pull-right">2</span>
											</a>
											<ul class="submenu fourth-level">
												<li><a href="#"><span class="submenu-label">menu 4.1</span></a></li>
												<li><a href="#"><span class="submenu-label">menu 4.2</span></a></li>
											</ul>
										</li>
									</ul>
								</li>
								<li class="openable">
									<a href="#">
										<span class="submenu-label">menu 2.2</span>
										<span class="badge badge-success bounceIn animation-delay2 pull-right">3</span>
									</a>
									<ul class="submenu third-level">
										<li class="openable">
											<a href="#">
												<span class="submenu-label">menu 3.1</span>
												<span class="badge badge-success bounceIn animation-delay1 pull-right">2</span>
											</a>
											<ul class="submenu fourth-level">
												<li><a href="#"><span class="submenu-label">menu 4.1</span></a></li>
												<li><a href="#"><span class="submenu-label">menu 4.2</span></a></li>
											</ul>
										</li>
										<li><a href="#"><span class="submenu-label">menu 3.2</span></a></li>
										<li><a href="#"><span class="submenu-label">menu 3.3</span></a></li>
									</ul>
								</li>
							</ul>
						</li>
					</ul>


				</div><!-- /main-menu -->
			</div><!-- /sidebar-inner -->
		</aside>