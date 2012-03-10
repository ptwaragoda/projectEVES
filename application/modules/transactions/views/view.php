<?$this->load->view('header')?>

 <!-- User widget -->
<div class="widget">
    <div class="head">
        <div class="userWidget">
        <a href="#" title="" class="userLink" style="margin-left:0"><?=$title?></a>
        </div>
        <div class="num"><span>Line Items:</span><a href="#" class="greenNum"><?=count($lineItems->all)?></a></div>
    </div>
    
            Start Date  End Date    Created By     Draft   

    <table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
        <tbody>
            <tr class="noborder">
                <td width="170">Customer:</td>
                <td align="right"><?=$transaction->customer->get()->getFullName()?></td>
            </tr>
            <tr>
                <td>Transaction Date:</td>
                <td align="right"><?=date('F d, Y', strtotime($transaction->transaction_date))?></td>
            </tr>
            <tr>
                <td>Start Date:</td>
                <td align="right"><?=date('F d, Y', strtotime($transaction->start_date))?></td>
            </tr>
            <tr>
                <td>End Date:</td>
                <td align="right"><?=date('F d, Y', strtotime($transaction->end_date))?></td>
            </tr>
            <tr>
                <td>Total:</td>
                <td align="right"><?=formatPrice($transaction->final_total)?></td>
            </tr>
        </tbody>
    </table> 
                       
</div>

<p><a href="<?=site_url('customers')?>">Back to Transactions List</a></p>

<?$this->load->view('footer')?>