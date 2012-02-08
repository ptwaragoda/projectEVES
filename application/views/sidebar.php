<!-- Left navigation -->
<div class="leftNav">
	<ul id="menu">
    	<li class="dash"><a href="<?=base_url()?>" title="" class="active"><span>Dashboard</span></a></li>
        <li class="errors"><a href="#" title="" class="exp"><span>Customers</span></a>
                <ul class="sub">
                <li><a href="<?=site_url('customers')?>" title="">Manage Customers</a></li>
                <li><a href="<?=site_url('customers/create')?>" title="">Create Customer</a></li>
            </ul>
        </li>
        <li class="errors"><a href="#" title="" class="exp"><span>Machines</span></a>
                <ul class="sub">
                <li><a href="<?=site_url('machines')?>" title="">Manage Machines</a></li>
                <li><a href="<?=site_url('machines/create')?>" title="">Create a Machine</a></li>
                <li><a href="<?=site_url('machinemodels')?>" title="">Manage Machine Models</a></li>
                <li><a href="<?=site_url('machinebrands')?>" title="">Manage Machine Brands</a></li>                
                </ul>
        </li>
        <li class="errors"><a href="#" title="" class="exp"><span>Supplies</span></a>
                <ul class="sub">
                <li><a href="<?=site_url('supplies')?>" title="">Manage supplies</a></li>
                <li><a href="<?=site_url('supplies/create')?>" title="">Create Supply</a></li>
            </ul>
        </li>
        <?/*<li class="graphs"><a href="charts.html" title=""><span>Graphs and charts</span></a></li>
        <li class="forms"><a href="form_elements.html" title=""><span>Form elements</span></a></li>
        <li class="login"><a href="ui_elements.html" title=""><span>Interface elements</span></a></li>
        <li class="typo"><a href="typo.html" title=""><span>Typography</span></a></li>
        <li class="tables"><a href="tables.html" title=""><span>Tables</span></a></li>
        <li class="cal"><a href="calendar.html" title=""><span>Calendar</span></a></li>
        <li class="gallery"><a href="gallery.html" title=""><span>Gallery</span></a></li>
        <li class="widgets"><a href="widgets.html" title=""><span>Widgets</span></a></li>
        <li class="files"><a href="file_manager.html" title=""><span>File manager</span></a></li>
        <li class="pic"><a href="icons.html" title=""><span>Buttons and icons</span></a></li>*/?>
        <li class="contacts"><a href="<?=site_url('auth/logout')?>" title=""><span>Logout</span></a></li>
    </ul>
</div>