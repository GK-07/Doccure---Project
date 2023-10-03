						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
							<div class="profile-sidebar">
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										<a href="#" class="booking-doc-img">
											<img src="<?=base_url('resources/user/images/'.$this->session->propic)?>" alt="User Image">
										</a>
										<div class="profile-det-info">
											<h3><?=$this->session->uname;?></h3>
											<div class="patient-details">
												<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i><?=$ldata->cityname?></h5>
											</div>
										</div>
									</div>
								</div>
								<div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
											<li>
												<a href="<?=site_url('labHome/loadLabHome')?>">
													<i class="fas fa-columns"></i>
													<span>Dashboard</span>
												</a>
											</li>
											<li>
												<a href="<?=site_url('labHome/getPendingRequest')?>">
													<i class="fas fa-money-check-alt"></i>
													<span>Pending Payments</span>
												</a>
											</li>
											<li>
												<a href="<?=site_url('labHome/loadLabPatient/'.$ldata->laboratoryid)?>">
													<i class="fas fa-user-injured"></i>
													<span>Patients</span>
												</a>
											</li> 	
											<li>
												<a href="<?=site_url('labHome/loadUploadReport')?>">
													<i class="fas fa-file"></i>
													<span>Uploaded Reports</span>
												</a>
											</li> 
											<li>
												<a href="<?=site_url('labProfile/loadLabProfile')?>">
													<i class="fas fa-user-cog"></i>
													<span>Profile Settings</span>
												</a>
											</li>
											<li>
												<a href="<?=site_url('labHome/loadChangePass')?>">
													<i class="fas fa-lock"></i>
													<span>Change Password</span>
												</a>
											</li>
											<li>
												<a href="<?=site_url('login/logout')?>">
													<i class="fas fa-sign-out-alt"></i>
													<span>Logout</span>
												</a>
											</li>
										</ul>
									</nav>
								</div>

							</div>
						</div>