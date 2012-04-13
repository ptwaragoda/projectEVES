<?$this->load->view('header')?>

 <!-- User widget -->
<div class="widget">
    <div class="head">
        <div class="userWidget">
        <a href="#" title="" class="userLink" style="margin-left:0"><?=$title?></a>
        </div>
        <div class="num"><span>Line Items:</span><a href="#" class="greenNum"><?=count($lineItems->all)?></a></div>
    </div>
    
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
                <td>Created By:</td>
                <td align="right"><?=$transaction->user->get()->username?></td>
            </tr>
            <tr>
                <td>Draft:</td>
                <td align="right"><?=$transaction->is_draft?'Yes':'No'?></td>
            </tr>
            <tr>
                <td>Total:</td>
                <td align="right"><?=formatPrice($transaction->final_total)?></td>
            </tr>
        </tbody>
    </table>
</div>

<?if($this->session->flashdata('success')):?>
     <!-- Notification messages -->
        <div class="pt20">
            <div class="nNote nSuccess hideit">
                <p><strong>SUCCESS: </strong><?=$this->session->flashdata('success')?></p>
            </div>  
        </div>
<?endif?>

<?if($lineItems->exists()):?>
<div class="widget">
    <div class="head">
        <div class="userWidget">
        <a href="#" title="" class="userLink" style="margin-left:0">Machine Line Items</a>
        </div>
    </div>
    
    <table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
        <thead>
            <tr>
                <td width="50%">Machine Name</td>
                <td width="20%">Created Date</td>
                <td width="20%">Price</td>
                <?if($transaction->is_draft):?>
                    <td width="10%">Actions</td>
                <?endif?>
            </tr>
        </thead>
        <tbody>
            <?foreach($lineItems->all as $l):?>
            <tr class="noborder">
                <td width="170">
                    <?
                        /*$machine = $l->machine->get();
                        echo $machine->name.' (';
                        $model = $machine->machinemodel->get();
                        echo $model->name.'/';
                        $brand = $model->machinebrand->get();
                        echo $brand->name.')';*/
                    ?>
                    <?=$l->machine_name?> (<?=$l->machine_machinemodel_name?>/<?=$l->machine_machinemodel_machinebrand_name?>)
                </td>
                <td><?=date('F d, Y', strtotime($l->created_on))?></td>
                <td>$<?=number_format($l->price,2)?></td>
                <?if($transaction->is_draft):?>
                    <td><a href="<?=site_url('transactions/deleteLineItem/'.$l->id)?>">Delete</a></td>
                <?endif?>
                <?/*<td><?=anchor('transactions/deleteLineItem','Delete')?></td>*/?>
            </tr>
            <?endforeach?>
        </tbody>
    </table>                       
</div>
<?else:?>
    <div class="pt20">
        <div class="nNote nWarning hideit">
            <p><strong>WARNING: </strong>There are currently no line items in this transaction</p>
        </div>
    </div>
<?endif?>

<?if($transaction->is_draft):?>
    <div class="pt20">
        <?/*<input type="button" class="greenBtn" value="Finalise transaction" onclick="window.location.href='<?=site_url('')?>';return false;"/>*/?>
        <a style="float:right" href="<?=site_url('transactions/finalize/'.$transaction->id)?>" title="" class="btnIconLeft mr10 mt5"><img src="<?=base_url()?>public/images/icons/dark/adminUser.png" alt="" class="icon" /><span>Finalize Transaction</span></a>
        <div class="fix"></div>
    </div>
<?else:?>
    <?if($transaction->is_paid):?>
        <div class="nNote nSuccess">
            <p><strong>Note: </strong>This transaction has already been paid for</p>
        </div>
    <?else:?>
        <div class="pt20">
            <?/*<a style="float:right" href="<?=site_url('')?>" title="" class="btnIconLeft mr10 mt5"><img src="<?=base_url()?>public/images/icons/dark/adminUser.png" alt="" class="icon" /><span>Process Payment</span></a>*/?>


            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post"> 
     
             <!-- Identify your business so that you can collect the payments. --> 
             <input type="hidden" name="business" value="ptwara_1331931707_biz@learn.senecac.on.ca"> 
             
             <!-- Specify a Buy Now button. --> 
             <input type="hidden" name="cmd" value="_xclick"> 
             
             <!-- Specify details about the item that buyers will purchase. --> 
             <input type="hidden" name="item_name" value="Transaction Order: <?=$transaction->id?>"> 
             <input type="hidden" name="amount" value="<?=$transaction->final_total?>">  
             <input type="hidden" name="currency_code" value="CAD"> 
             
             <!-- Display the payment button. --> 
             <input type="image" name="submit" border="0" 
             src="https://www.paypal.com/en_US/i/btn/btn_buynow_LG.gif" 
             alt="PayPal - The safer, easier way to pay online"> 
             <img alt="" border="0" width="1" height="1" 
             src="https://www.paypal.com/en_US/i/scr/pixel.gif" > 
            </form>


            <div class="fix"></div>
            <a style="float:right" href="<?=site_url('transactions/processPayment/'.$transaction->id)?>" title="" class="btnIconLeft mr10 mt5"><img src="<?=base_url()?>public/images/icons/dark/adminUser.png" alt="" class="icon" /><span>Mark as Paid</span></a>
            <div class="fix"></div>
        </div>
    <?endif?>
<?endif?>

<?if($transaction->is_draft):?>
    <?=isset($errors)?$errors:''?>
    <?=$this->session->flashdata('errors')?$this->session->flashdata('errors'):''?>

    <?=form_open(current_url(),array('class'=>'mainForm'))?>
        <fieldset>
            <div class="widget">    
                <div class="head"><h5 class="iRecord">Add Line Item</h5></div>
                <div class="rowElem noborder">
                    <label>Machine:</label>
                    <div class="formRight">
                        <div class="floatleft">
                            <select name="machine" >
                                <option value="">Select Machine</option>
                                <?foreach($machines->all as $m):?>
                                    <option value="<?=$m->id?>"><?=$m->name?></option>
                                <?endforeach?>
                            </select>
                        </div>
                    </div>
                    <div class="fix"></div>
                </div>

                <div class="rowElem noborder"><label>Price:</label><div class="formRight"><input style="width:100px" type="text" value="<?=$this->input->post('price')?>" name="price"/></div><div class="fix"></div></div>
                                    
                <input type="submit" value="Add Line Item" class="greyishBtn submitForm" />
                <div class="fix"></div>
            </div>
        </fieldset>
    <?=form_close()?>
<?endif?>

<p><a href="<?=site_url('transactions')?>" class="btnIconLeft"><img src="<?=base_url()?>public/images/icons/dark/arrowLeft.png" alt="" class="icon" /><span>Back to Transactions List</span></a></p>

<?$this->load->view('footer')?>