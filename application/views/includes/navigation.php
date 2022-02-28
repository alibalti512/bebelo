
<div class="header">
  <a href="#" id="menu-action">
    <i class="fa fa-bars"></i>
    <span>Close</span>
  </a>
  <div class="d-flex">
  <div class="logo d-flex align-items-center" style="margin-top: 1.5%;">
    Bebelo 
  </div>

  
  
  <div class="bell-gold d-flex ml-auto align-items-center">
    
    <div class="d-flex dropdown pt-1 show flex-row user-profile-dropdown pr-2">
      <a class="d-flex text-decoration-none" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     
      <img style="display:none;" class="rounded-circle" src="<?php echo base_url() . 'assets/'; ?>images/25.png" height="50px" width="50px">
      <div class="d-flex flex-column justify-content-start ml-3">
        <span class="d-block text-white font-weight-bold username-comment">
       <?php 
       //echo $this->session->userdata('name');
       ?></span>
        <span class="date user-date text-white">
          <?php 
          //echo $this->session->userdata('login_type');
          ?> </span>
      </div>
    </a>
      <div class="dropdown-menu shadow custom-dropdown-menu" aria-labelledby="dropdownMenuLink">
          <!--
        <a class="dropdown-item" href="#"><img class="img-fluid" src="<?php echo base_url() . 'assets/'; ?>images/settings-icon.png" alt=""> Settings</a>
        <a class="dropdown-item" href="#"><img class="img-fluid" src="<?php echo base_url() . 'assets/'; ?>images/help-icon.png" alt=""> Help</a>
        -->
        <a class="dropdown-item" href="<?php echo base_url() . 'site/logout'; ?>"><img class="img-fluid" src="<?php echo base_url() . 'assets/'; ?>images/log-icon.png" alt=""> Logout</a>
      </div>
    </div>

  </span>

</div>

</div>

</div>

<div class="sidebar">
  <ul>
       <li><a href="<?php echo base_url() . 'site/analytics'; ?>"><i class="fa fa-bar-chart"></i><span>Analytics</span></a></li>
      <li><a href="<?php echo base_url() . 'site/bar'; ?>"><i class="fa fa-cubes"></i><span>Bars</span></a></li>
      <li><a href="<?php echo base_url() . 'site/filter'; ?>"><i class="fa fa-filter"></i><span>Filter</span></a></li>
       <li><a href="<?php echo base_url() . 'site/logout'; ?>"><i class="fa fa-user"></i><span>Logout</span></a></li>

    </ul>
</div>
