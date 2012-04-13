Purchase order id <?=$order->id?> created.


Id: <?=$order->id?>

Total: <?=formatPrice($order->final_total)?>

Link: <?=site_url('purchasesupplyorders/view/'.$order->id)?>