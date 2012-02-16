<?$this->load->view('header')?>

 <!-- User widget -->
<div class="widget">
    <div class="head">
        <div class="userWidget">
        <a href="#" title="" class="userLink" style="margin-left:0"><?=$machines->machine_name?></a>
        </div>
        <div class="num"><span>Number of Machines:</span><a href="#" class="greenNum"><?=count($machines->all)?></a></div>
    </div>
    
    <table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
        <tbody>
            <tr class="noborder">
                <td width="170">Machine name:</td>
                <td align="right"><?=$machines->machine_name?></td>
            </tr>
            <tr>
                <td>Machine square feet</td>
                <td align="right"><?=$machines->cover_square_feet?></td>
            </tr>
            <tr>
                <td>Machine purchase date</td>
                <td align="right"><?=date('F d, Y', strtotime($machines->purchase_date))?></td>
            </tr>
            <tr>
                <td>Machine serial number</td>
                <td align="right"><?=$machines->serial_num?></td>
            </tr>
            <tr>
                <td>Machine Status</td>
                <td align="right">
                    <?$status = $machine->status->get()?>
                    <?=($status->exists())?$status->name:'No Status'?>
                </td>
            </tr>
            <tr>
                <td>Machine Model id</td>
                <td align="right">
                    <?$machinemodel = $machine->machinemodel->get()?>
                    <?=($machinemodel->exists())?$machinemodel->name:'No Status'?>
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