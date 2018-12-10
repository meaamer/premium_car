
    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <!-- main menu-->
    <div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
      <!-- main menu header-->
      <div class="main-menu-header">
        
      </div>
      <!-- / main menu header-->
      <!-- main menu content-->
      <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
          <li class=" nav-item"><a href="<?php echo base_url('#');?>"><i class="icon-home3"></i><span data-i18n="nav.dash.main" class="menu-title">Dashboard</span></a></li>
          
           <li class=" nav-item"><a href="<?php echo base_url('Booking');?>"><i class="icon-briefcase4"></i><span data-i18n="nav.dash.main" class="menu-title">Bookings</span></a>
           	<ul class="menu-content">
              
              <li><a href="<?php echo base_url();?>Booking/NewBooking" data-i18n="nav.dash.main" class="menu-item">New Bookings</a></li>
              <li><a href="<?php echo base_url();?>Booking/UnSettledBooking" data-i18n="nav.dash.main" class="menu-item">Unsettled Booking</a></li>
              <li><a href="<?php echo base_url();?>Booking/SettledBooking" data-i18n="nav.dash.main" class="menu-item">Settled Booking</a></li>
            </ul>
           
           </li>
          
         <!-- <li class=" nav-item"><a href="#">
          <i class="icon-briefcase4"></i><span data-i18n="nav.dash.main" class="menu-title">Booking</span></a>
            <ul class="menu-content">
              
              <li><a href="<?php echo base_url('Booking/Outstation');?>" data-i18n="nav.dash.main" class="menu-item">Outstation</a></li>
              <li><a href="<?php echo base_url('Booking/Local');?>" data-i18n="nav.dash.main" class="menu-item">Local</a></li>
              <li><a href="<?php echo base_url('Booking/Transfer');?>" data-i18n="nav.dash.main" class="menu-item">Transfer</a></li>
            </ul>
          </li>-->
          
          <!-- <li class=" nav-item"><a href="#"><i class="icon-bar-graph-2"></i><span data-i18n="nav.dash.main" class="menu-title">Reports</span></a>
            <ul class="menu-content">
              
              <li><a href="<?php echo base_url();?>Reports/Outstation" data-i18n="nav.dash.main" class="menu-item">Outstation</a></li>
              <li><a href="<?php echo base_url();?>Reports/Local" data-i18n="nav.dash.main" class="menu-item">Local</a></li>
              <li><a href="<?php echo base_url();?>Reports/Transfer" data-i18n="nav.dash.main" class="menu-item">Transfer</a></li>
            </ul>
          </li> -->
           <li class=" nav-item"><a href="<?php echo base_url();?>Login/Update"><i class="icon-cog3"></i><span data-i18n="nav.dash.main" class="menu-title">Settings</span></a></li>
           <li class=" nav-item"><a href="<?php echo base_url('Login/Logout');?>"><i class="icon-power3"></i><span data-i18n="nav.dash.main" class="menu-title">Logout</span></a></li>
          
        </ul>
      </div>
      <!-- /main menu content-->
      <!-- main menu footer-->
      <!-- include includes/menu-footer-->
      <!-- main menu footer-->
    </div>
    <!-- / main menu-->
