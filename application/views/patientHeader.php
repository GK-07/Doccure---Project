		<header class="header">
				<nav class="navbar navbar-expand-lg header-nav">
					<div class="navbar-header">
						<a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
						</a>
						<a href="<?=site_url('patHome')?>" class="navbar-brand logo">
							<img src="<?=base_url('resources/user/')?>assets/img/logo.png" class="img-fluid" alt="Logo">
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="<?=site_url('patHome')?>" class="menu-logo">
								<img src="<?=base_url('resources/user/')?>assets/img/logo.png" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">	
							<li>
								<a href="<?=site_url('patHome')?>">Home<i></i></a>
							</li>
							<li class="has-submenu">
								<a href="<?=site_url('patDoctor')?>">Doctors <i></i></a>
							</li>
							<li class="has-submenu">
								<a href="<?=site_url('patMeeting/loadMeeting')?>">Video Call <i></i></a>
							</li>
							<li class="has-submenu">
								<a href="<?=site_url('patDashboard/loadPatDashboard')?>">Dashboard <i></i></a>
							</li>
							<li class="has-submenu">
								<a href="<?=site_url('docHome/loadAboutUs')?>">About Us <i></i></a>
							</li>
							<li class="has-submenu">
								<a href="<?=site_url('docHome/loadContactUs')?>">Contact Us <i></i></a>
							</li>
							
							<li class="login-link">
								<a href="login.html">Login / Signup</a>
							</li>
						</ul>		 
					</div>		 
					<ul class="nav header-navbar-rht">
						<li class="nav-item contact-item">
							<div class="header-contact-img">
								<i class="far fa-hospital"></i>							
							</div>
							<div class="header-contact-detail">
								<p class="contact-header">Contact</p>
								<p class="contact-info-header"> +91 0261-2325566</p>
							</div>
						</li>
						<?php
							if(isset($this->session->uname))
							{
						?>
						<!-- User Menu -->
						<li class="nav-item dropdown has-arrow logged-item">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
								<span class="user-img">
									<img class="rounded-circle" src="<?=base_url('resources/shared/patient/'.$this->session->propic)?>" width="31" alt="">
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="user-header">
									<div class="avatar avatar-sm">
										<img src="<?=base_url('resources/shared/patient/'.$this->session->propic)?>" alt="User Image" class="avatar-img rounded-circle">
									</div>
									<div class="user-text">
										<h6><?=$this->session->uname;?></h6>
										<p class="text-muted mb-0">Patient</p>
									</div>
								</div>
								<a class="dropdown-item" href="<?=site_url('patDashboard/loadPatDashboard')?>">Dashboard</a>
								<a class="dropdown-item" href="<?=site_url('patProfile/loadPatProfile')?>">Profile Settings</a>
								<a class="dropdown-item" href="<?=site_url('login/logout')?>">Logout</a>
							</div>
						</li>
						<!-- /User Menu -->
						<?php
							}
							else
							{
								?>
								<li class="nav-item">
									<a class="nav-link header-login" href="<?=site_url('login')?>">login / Signup </a>
								</li>
							<?php
							}
						?>
					</ul>
				</nav>
			</header>