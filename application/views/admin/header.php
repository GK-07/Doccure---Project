		<div class="header">
			
				<!-- Logo -->
                <div class="header-left">
                    <a href="<?=site_url('admin/Home')?>" class="logo">
						<img src="<?=base_url('resources/admin/')?>assets/img/logo.png" alt="Logo">
					</a>
					<a href="<?=site_url('admin/Home')?>" class="logo logo-small">
						<img src="<?=base_url('resources/admin/')?>assets/img/logo-small.png" alt="Logo" width="30" height="30">
					</a>
                </div>
				<!-- /Logo -->
				
				<a href="javascript:void(0);" id="toggle_btn">
					<i class="fe fe-text-align-left"></i>
				</a>
				
<!-- 				<div class="top-nav-search">
					<form>
						<input type="text" class="form-control" placeholder="Search here">
						<button class="btn" type="submit"><i class="fa fa-search"></i></button>
					</form>
				</div> -->
				
				<!-- Mobile Menu Toggle -->
				<a class="mobile_btn" id="mobile_btn">
					<i class="fa fa-bars"></i>
				</a>
				<!-- /Mobile Menu Toggle -->
				
				<!-- Header Right Menu -->
				<ul class="nav user-menu">

					<!-- User Menu -->
					<li class="nav-item dropdown has-arrow">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<span class="user-img"><img class="rounded-circle" src="<?=base_url('resources/admin/images/'.$this->session->apropic)?>" width="31" alt="Admin Name"></span>
						</a>
						<div class="dropdown-menu">
							<div class="user-header">
								<div class="avatar avatar-sm">
									<img src="<?=base_url('resources/admin/images/'.$this->session->apropic)?>" alt="User Image" class="avatar-img rounded-circle">
								</div>
								<div class="user-text">
									<h6><?=$this->session->aname?></h6>

								</div>
							</div>
							<a class="dropdown-item" href="<?=site_url("admin/ManageProfile/loadProfile")?>">My Profile</a>
							<a class="dropdown-item" href="<?=site_url("admin/login/logout")?>">Logout</a>
						</div>
					</li>
					<!-- /User Menu -->
					
				</ul>
				<!-- /Header Right Menu -->
				
            </div>