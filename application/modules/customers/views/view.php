<?$this->load->view('header')?>

 <!-- User widget -->
<div class="widget">
    <div class="head">
        <div class="userWidget">
        <a href="#" title="" class="userLink" style="margin-left:0"><?=$customer->getFullName()?></a>
        </div>
        <div class="num"><span>Orders:</span><a href="#" class="greenNum"><?=$transactions?></a></div>
    </div>
    
    <table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
        <tbody>
            <tr class="noborder">
                <td width="170">Company:</td>
                <td align="right"><?=$customer->company?></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td align="right"><?=safe_mailto($customer->email)?></td>
            </tr>
            <tr>
                <td>Phone:</td>
                <td align="right"><?=$customer->phone?></td>
            </tr>
            <tr>
                <td>Created on:</td>
                <td align="right"><?=date('F d, Y', strtotime($customer->created_on))?></td>
            </tr>
            <tr>
                <td>Last updated on:</td>
                <td align="right"><?=date('F d, Y', strtotime($customer->updated_on))?></td>
            </tr>
        </tbody>
    </table> 
                       
</div>

<p><a href="<?=site_url('customers')?>" class="btnIconLeft"><img src="<?=base_url()?>public/images/icons/dark/arrowLeft.png" alt="" class="icon" /><span>Back to Customers List<span></a></p>

<?$this->load->view('footer')?>