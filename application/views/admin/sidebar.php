

        <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Main</span>
							</li>
							<li> 
								<a href="<?=site_url("admin/Home")?>"><i class="fe fe-home"></i> <span>Dashboard</span></a>
							</li>
							<li>  
								<a href="<?=site_url('admin/appointment/loadAppointment')?>"><i class="fe fe-layout"></i> <span>Appointments</span></a>
							</li>
							<li> 
								<a href="<?=site_url('admin/category/loadCategory')?>"><i class="fe fe-users"></i> <span>Categories</span></a>
							</li>
							<li> 
								<a href="<?=site_url("admin/doctor/loadDoctor")?>"><i class="fal fa-user-md"></i> <span>Doctors</span></a>
							</li>
							<li> 
								<a href="<?=site_url("admin/patient/loadPatient")?>"><i class="fe fe-user"></i> <span>Patients</span></a>
							</li>
							<li> 
								<a href="<?=site_url('admin/rating/loadRating')?>"><i class="fe fe-star-o"></i> <span>Reviews</span></a>
							</li>
							<li>  
								<a href="<?=site_url('admin/state/loadState')?>"><i class="far fa-building"></i> <span>State</span></a>
							</li>
							<li> 
								<a href="<?=site_url("admin/laboratory/loadLabList")?>"><i class="fal fa-dna"></i> <span>Laboratories</span></a>
							</li>
							<li class="submenu">
								<a href="#"><i class="fal fa-check-circle"></i><span> Verifications </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="<?=site_url('admin/pending/loadPendingLabs')?>"><i class="fal fa-dna"></i> <span>&nbsp;&nbsp;&nbsp;&nbsp;Laboratory</span></a></li>
									<li><a href="<?=site_url('admin/pending/loadPendingDoctor')?>"><i class="fal fa-user-md"></i> <span>&nbsp;&nbsp;&nbsp;&nbsp;Doctor</span></a></li>
									
								</ul>
							</li>
							<li class="submenu">
								<a href="#"><i class="fal fa-file"></i> <span> Complaints</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="<?=site_url('admin/complaint/loadLabComplaint')?>"><i class="fal fa-dna"></i> <span>&nbsp;&nbsp;&nbsp;&nbsp;Laboratory</span></a></li>
									<li><a href="<?=site_url('admin/complaint/loadDoctorComplaint')?>"><i class="fal fa-user-md"></i><span>&nbsp;&nbsp;&nbsp;&nbsp;Doctor</span></a></li>
								</ul>
								</li>
								<li> 
								<a href="<?=site_url('admin/Home/loadAddAdmin')?>"><i class="fe fe-user-plus"></i> <span>Add New Admin</span></a>
								</li>
								<li> 
									<a href="<?=site_url('admin/Home/getAllCaseFiles')?>"><i class="fe fe-document"></i> <span>Case Files</span></a>
								</li>
								<li> 
									<a href="<?=site_url('admin/Home/loadAdmin')?>"><i class="fe fe-user"></i> <span>Admins</span></a>
								</li>
								</ul>
							</li>
						</ul>
					</div>
                </div>
            </div>