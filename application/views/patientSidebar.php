<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
							<div class="profile-sidebar">
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										<a href="#" class="booking-doc-img">
											<img src="<?=base_url('resources/shared/patient/'.$this->session->propic)?>" alt="User Image">
										</a>
										<div class="profile-det-info">
											<h3><?=$this->session->uname;?></h3>
											<div class="patient-details">
												<h5><i class="fas fa-birthday-cake"></i> <?php echo date('d M Y',strtotime($pdata->dob));?>, <?php echo date('Y')-date('Y',strtotime($pdata->dob))?> years</h5>
												<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> <?=$pdata->cityname?>, <?=$pdata->statename?></h5>
											</div>
										</div>
									</div>
								</div>
								<div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
											<li>
												<a href="<?=site_url('patDashboard/loadPatDashboard')?>">
													<i class="fas fa-columns"></i>
													<span>Dashboard</span>
												</a>
											</li> 
											<li>
												<a href="<?=site_url('patMeeting/loadMeeting')?>">
													<i class="fas fa-video"></i>
													<span>Join Meeting</span>
												</a>
											</li>
											<li>
												<a href="<?=site_url('patProfile/loadPatProfile')?>">
													<i class="fas fa-user-cog"></i>
													<span>Profile Settings</span>
												</a>
											</li>
											<li>
												<a href="<?=site_url('patDashboard/loadChangePass')?>">
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