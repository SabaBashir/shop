<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Bootshop online Shopping cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--Less styles -->
    <!-- Other Less css file //different less files has different color scheam
     <link rel="stylesheet/less" type="text/css" href="<?php echo base_url()?>/assets/themes/less/simplex.less">
     <link rel="stylesheet/less" type="text/css" href="<?php echo base_url()?>/assets/themes/less/classified.less">
     <link rel="stylesheet/less" type="text/css" href="<?php echo base_url()?>/assets/themes/less/amelia.less">  MOVE DOWN TO activate
     -->
    <!--<link rel="stylesheet/less" type="text/css" href="<?php echo base_url()?>/assets/themes/less/bootshop.less">
    <script src="<?php echo base_url()?>/assets/themes/js/less.js" type="text/javascript"></script> -->

    <!-- Bootstrap style -->
    <link id="callCss" rel="stylesheet" href="<?php echo base_url()?>/assets/themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="<?php echo base_url()?>/assets/themes/css/base.css" rel="stylesheet" media="screen"/>
    <!-- Bootstrap style responsive -->
    <link href="<?php echo base_url()?>/assets/themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url()?>/assets/themes/css/font-awesome.css" rel="stylesheet" type="text/css">
    <!-- Google-code-prettify -->
    <link href="<?php echo base_url()?>/assets/themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
    <!-- fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo base_url()?>/assets/themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url()?>/assets/themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url()?>/assets/themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url()?>/assets/themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url()?>/assets/themes/images/ico/apple-touch-icon-57-precomposed.png">
    <style type="text/css" id="enject"></style>
</head>
<body>
<div id="header">
    <div class="container">
        <div id="welcomeLine" class="row">
            <div class="span6">Welcome!<strong>
                <?php if($this->session->userdata('user_name')){
                    echo $this->session->userdata('user_name');
                }else{
                    echo "User";
                }?>
                </strong></div>
            <div class="span6">
                <div class="pull-right">
                    <a href="product_summary.html"><span class="">Fr</span></a>
                    <a href="product_summary.html"><span class="">Es</span></a>
                    <span class="btn btn-mini">En</span>
                    <a href="product_summary.html"><span>&pound;</span></a>
                    <span class="btn btn-mini">$155.00</span>
                    <a href="product_summary.html"><span class="">$</span></a>
                    <a href="<?= base_url('cart')?>"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [ <?=$this->cart->total_items();?> ] Itemes in your cart </span> </a>
                </div>
            </div>
        </div>
        <!-- Navbar ================================================== -->
        <div id="logoArea" class="navbar">
            <a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-inner">
                <a class="brand" href=""><img src="<?php echo base_url()?>/assets/themes/images/logo.png" alt="Bootsshop"/></a>
                <form class="form-inline navbar-search" method="post" action="<?=base_url('product/searchProduct')?>" >
                    <input id="srchFld" class="srchTxt" name="search_pro" type="text"/>
                    <select class="srchTxt" name="cat_id">
                        <option value="">All</option>
                        <?php foreach ($getAllCat as $cat):?>
                        <option value="<?=$cat->cat_id;?>"><?=$cat->cat_name;?></option>
                        <?php endforeach;?>
                    </select>
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                    <button type="submit" id="submitButton" class="btn btn-primary">Go</button>
                </form>
                <ul id="topMenu" class="nav pull-right">
                    <li class=""><a href="special_offer.html">Specials Offer</a></li>
                    <li class=""><a href="normal.html">Delivery</a></li>
                    <li class=""><a href="contact.html">Contact</a></li>
                    <?php if(!$this->session->userdata('user_name')):?>
                    <li class="">
                        <a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Login</span></a>
                        <div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3>Login Block</h3>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal loginFrm">
                                    <div class="control-group">
                                        <input type="text" id="user_name" placeholder="User Name">
                                    </div>
                                    <div class="control-group">
                                        <input type="password" id="password" placeholder="Password">
                                    </div>
                                    <div class="control-group">
                                        <label class="checkbox">
                                            <input type="checkbox"> Remember me
                                        </label>
                                        <div id="error" class="help-block"></div>
                                    </div>
                                </form>
                                <button type="button" class="btn btn-success" id="loginBtn">Sign in</button>
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                            </div>
                        </div>
                    </li>
                    <?php else:?>
                    <li><a href="<?php echo base_url('login/logout')?>" role="button" style="padding-right:0"><span class="btn btn-large btn-success">Logout</span></a></li>
                    <?php endif;?>
                </ul>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
    $('#loginBtn').click(function (event) {
        //event.preventDefault();
        var user_name = $('#user_name').val();
        var password = $('#password').val();
        var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
          csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
        $.ajax({
            type:'POST',
            url:"<?php echo base_url('login')?>",
            dataType:'json',
            data:{[csrfName]: csrfHash,'username':user_name,'password':password},
            success:function (res) {
                console.log(res);
                if(res=='success'){
                    window.location.href="<?php echo base_url('home');?>";
                }else if(res=="failed"){
                    $('#error').html('wrong credentail');
                }else if(res=="blank"){
                    $('#error').html('Please fill all the fields');
                }else{
                    console.log('something worng');
                }
            }
        });
    });
});
</script>
