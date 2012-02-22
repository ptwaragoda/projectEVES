<?$this->load->view('header')?>

 <!-- User widget -->
<div class="widget">
    <div class="head">
        <div class="userWidget">
        <a href="#" title="" class="userLink" style="margin-left:0"><?=$machines->machine_name?></a>
        </div>
        <div class="num">
       <?// <span>Number of Machines:</span><a href="#" class="greenNum"><?=count($machines->all)?><?//</a>?></div>
    </div>
    
    <table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
        <tbody>
            <tr class="noborder">
                <td width="170">Machine name:</td>
                <td align="right"><?=$machines->name?></td>
            </tr>
            <tr>
                <td>Square feet</td>
                <td align="right"><?=$machines->cover_square_feet?></td>
            </tr>
            <tr>
                <td>Purchase date</td>
                <td align="right"><?=date('F d, Y', strtotime($machines->purchase_date))?></td>
            </tr>
            <tr>
                <td>Serial number</td>
                <td align="right"><?=$machines->serial_num?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td align="right">
                   
                   <?=$machines->status_name?>
                </td>
            </tr>
            <tr>
                <td>Machine Model</td>
                <td align="right">
                    <?=$machines->machinemodel_name?>
                </td>
            </tr>
            <tr>
                <td>Created on:</td>
                <td align="right"><?=date('F d, Y', strtotime($machines->created_on))?></td>
            </tr>
            <tr>
                <td>Last updated on:</td>
                <td align="right"><?=date('F d, Y', strtotime($machines->updated_on))?></td>
            </tr>
        </tbody>
    </table> 
                       
</div>

<p>
<a href="<?=site_url('machines')?>" title="Machine List" class="btnIconLeft"><img src="<?=base_url()?>public/images/icons/dark/arrowLeft.png" alt="" class="icon" /><span>Back to Machine List</span></a>
</p>     


<?$this->load->view('footer')?>