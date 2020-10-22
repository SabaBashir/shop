<?php ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="<?php echo base_url()?>/assets/themes/css/font-awesome.css" rel="stylesheet" type="text/css">

</head>
<body>
<?php echo form_open(base_url().'cart/update'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div>Shopping Cart (<?php echo $this->cart->total_items();?>)</div>
                </div>
            </div>
            <div class="card-body">
                <table cellpadding="6" cellspacing="1" style="width:100%" border="0">

                    <tr>
                        <th>QTY</th>
                        <th>Item Description</th>
                        <th style="text-align:right">Item Price</th>
                        <th style="text-align:right">Sub-Total</th>
                        <th style="text-align: center">Action</th>
                    </tr>

                    <?php $i = 1; ?>

                    <?php foreach ($this->cart->contents() as $items): ?>

                        <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

                        <tr>
                            <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5' , 'type'=>'number')); ?></td>
                            <td>
                                <?php echo $items['name']; ?>

                                <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

                                    <p>
                                        <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                                            <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

                                        <?php endforeach; ?>
                                    </p>

                                <?php endif; ?>

                            </td>
                            <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                            <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                            <td style="text-align: center;"><a href="<?=base_url('cart/delete/').$items['rowid']?>"><i class="fa fa-trash-o"></i>Delete</a></td>
                        </tr>

                        <?php $i++; ?>

                    <?php endforeach; ?>

                    <tr>
                        <td colspan="2"> </td>
                        <td class="right"><strong>Total</strong></td>
                        <td class="right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
                    </tr>

                </table>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                <p><?php echo form_submit('', 'Update your Cart'); ?></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
