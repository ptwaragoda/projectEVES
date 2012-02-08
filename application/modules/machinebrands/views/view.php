<?$this->load->view('header')?>

 <!-- User widget -->
<div class="widget">
    <div class="head">
        <div class="userWidget">
        <a href="#" title="" class="userLink" style="margin-left:0"><?=$machinebrands->machine_brand_name?></a>
        </div>
        <div class="num"><span>Number of Machines:</span><a href="#" class="greenNum"><?=$number_of_machines?></a></div>
    </div>
    
    <table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
        <tbody>
            <tr class="noborder">
                <td width="170">Machine Brand name:</td>
                <td align="right"><?=$machinebrands->machine_brand_name?></td>
            </tr>
            <tr>
                <td>machine_brand_serialnum</td>
                <td align="right"><?=$machinebrands->machine_brand_serialnum?></td>
            </tr>
            <tr>
                <td>Created on:</td>
                <td align="right"><?=date('F d, Y', strtotime($machinebrands->created_on))?></td>
            </tr>
            <tr>
                <td>Last updated on:</td>
                <td align="right"><?=date('F d, Y', strtotime($machinebrands->updated_on))?></td>
            </tr>
        </tbody>
    </table> 
                       
</div>

<p>
<a href="<?=site_url('machinebrands')?>" title="Machine Brand List" class="btnIconLeft"><img src="<?=base_url()?>public/images/icons/dark/arrowLeft.png" alt="" class="icon" /><span>Back to Machine Brand List</span></a>
</p>     


<?$this->load->view('footer')?>