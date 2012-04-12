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
                <td>Created By:</td>
                <td align="right"><?=$order->user->get()->username?></td>
            </tr>
            <tr>
                <td>Draft:</td>
                <td align="right"><?=$order->is_draft?'Yes':'No'?></td>
            </tr>
            <tr>
                <td>Total:</td>
                <td align="right"><?=formatPrice($order->final_total)?></td>
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
        <a href="#" title="" class="userLink" style="margin-left:0">Line Items</a>
        </div>
    </div>
    
    <table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
        <thead>
            <tr>
                <td width="50%">Supply</td>
                <td width="20%">Price</td>
                <?if($order->is_draft):?>
                    <td width="10%">Actions</td>
                <?endif?>
            </tr>
        </thead>
        <tbody>
            <?foreach($lineItems->all as $l):?>
            <tr class="noborder">
                <td width="170">
                    <?=$l->supply_name?>
                </td>
                <td>$<?=number_format($l->price,2)?></td>
                <?if($order->is_draft):?>
                    <td><a href="<?=site_url('purchasesupplyorders/deleteLineItem/'.$l->id)?>">Delete</a></td>
                <?endif?>
            </tr>
            <?endforeach?>
        </tbody>
    </table>                       
</div>
<?else:?>
    <div class="pt20">
        <div class="nNote nWarning hideit">
            <p><strong>WARNING: </strong>There are currently no line items in this purchase supply order</p>
        </div>
    </div>
<?endif?>

<?if($order->is_draft):?>
    <div class="pt20">
        <?/*<input type="button" class="greenBtn" value="Finalise transaction" onclick="window.location.href='<?=site_url('')?>';return false;"/>*/?>
        <a style="float:right" href="<?=site_url('purchasesupplyorders/finalize/'.$order->id)?>" title="" class="btnIconLeft mr10 mt5"><img src="<?=base_url()?>public/images/icons/dark/adminUser.png" alt="" class="icon" /><span>Finalize Order</span></a>
        <div class="fix"></div>
    </div>
<?else:?>
    <?if($order->is_paid):?>
        <div class="nNote nSuccess">
            <p><strong>Note: </strong>This order has been processed</p>
        </div>
    <?else:?>

        <?if($user->is_agent()):?>
            <?if(!$order->final_total):?>
                <p>This order is currently being processed</p>
            <?else:?>
                <div class="pt20">
                    <?/*<a style="float:right" href="<?=site_url('')?>" title="" class="btnIconLeft mr10 mt5"><img src="<?=base_url()?>public/images/icons/dark/adminUser.png" alt="" class="icon" /><span>Process Payment</span></a>*/?>


                    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post"> 
             
                     <!-- Identify your business so that you can collect the payments. --> 
                     <input type="hidden" name="business" value="ptwara_1331931707_biz@learn.senecac.on.ca"> 
                     
                     <!-- Specify a Buy Now button. --> 
                     <input type="hidden" name="cmd" value="_xclick"> 
                     
                     <!-- Specify details about the item that buyers will purchase. --> 
                     <input type="hidden" name="item_name" value="Purchase supply Order: <?=$order->id?>"> 
                     <input type="hidden" name="amount" value="<?=$order->final_total?>">  
                     <input type="hidden" name="currency_code" value="CAD"> 
                     
                     <!-- Display the payment button. --> 
                     <input type="image" name="submit" border="0" 
                     src="https://www.paypal.com/en_US/i/btn/btn_buynow_LG.gif" 
                     alt="PayPal - The safer, easier way to pay online"> 
                     <img alt="" border="0" width="1" height="1" 
                     src="https://www.paypal.com/en_US/i/scr/pixel.gif" > 
                    </form>


                    <div class="fix"></div>
                    
                </div>
            <?endif?>
        <?elseif($user->is_admin() || $user->is_manager()):?>
            <a style="float:right" href="<?=site_url('purchasesupplyorders/processPayment/'.$order->id)?>" title="" class="btnIconLeft mr10 mt5"><img src="<?=base_url()?>public/images/icons/dark/adminUser.png" alt="" class="icon" /><span>Mark as Paid</span></a>
        <?endif?>

        <div class="fix"></div>
    <?endif?>

    
<?endif?>

<?if($order->is_draft):?>
    <?=isset($errors)?$errors:''?>
    <?=$this->session->flashdata('errors')?$this->session->flashdata('errors'):''?>

    <?=form_open(current_url(),array('class'=>'mainForm'))?>
        <fieldset>
            <div class="widget">    
                <div class="head"><h5 class="iRecord">Add Line Item</h5></div>
                <div class="rowElem noborder">
                    <label>Supply:</label>
                    <div class="formRight">
                        <div class="floatleft">
                            <select name="supply" >
                                <option value="">Select Supply</option>
                                <?foreach($supplies->all as $s):?>
                                    <option value="<?=$s->id?>"><?=$s->name?> &raquo; <?=$s->getPrice()?></option>
                                <?endforeach?>
                            </select>
                        </div>
                    </div>
                    <div class="fix"></div>
                </div>
                                    
                <input type="submit" value="Add Line Item" class="greyishBtn submitForm" />
                <div class="fix"></div>
            </div>
        </fieldset>
    <?=form_close()?>
<?endif?>

<?if($user->is_agent()):?>
    <?if($order->is_draft):?>
        <p><a href="<?=site_url('purchasesupplyorders/drafts')?>">Back to draft Purchase Supply Orders List</a></p>
    <?endif?>
<?endif?>


<?if($order->is_paid):?>
    <p><a href="<?=site_url('purchasesupplyorders/archive')?>">Back to old Purchase Supply Orders List</a></p>
<?else:?>
    <p><a href="<?=site_url('purchasesupplyorders')?>">Back to Purchase Supply Orders List</a></p>
<?endif?>


<?$this->load->view('footer')?>