<!-- Top navigation bar -->
<div id="topNav">
    <div class="fixed">
        <div class="wrapper">
            <div class="welcome"><a href="<?=site_url('profile')?>" title=""><img src="<?=base_url()?>public/images/userPic.png" alt="" /></a><span>Welcome <?=$this->tank_auth->get_username()?>!</span></div>
            <div class="userNav">
                <ul>
                    
                    <li class="dd"><img src="<?=base_url()?>public/images/icons/topnav/messages.png" alt="" /><span>Profile</span>
                        <ul class="menu_body">
                           
                            <li><a href="<?=site_url('auth/change_password')?>" title="">Change Password</a></li>
                            <li><a href="<?=site_url('auth/change_email')?>" title="">Change Email</a></li>
                            <li><a href="<?=site_url('auth/logout')?>" title="">Logout</a></li>
                        </ul>
                    </li>
                   
                    <li><a href="<?=site_url('auth/logout')?>" title=""><img src="<?=base_url()?>public/images/icons/topnav/logout.png" alt="" /><span>Logout</span></a></li>
                </ul>
            </div>
            <div class="fix"></div>
        </div>
    </div>
</div>