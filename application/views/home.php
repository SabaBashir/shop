<?php
$this->load->library('cart');
$this->load->view('layouts/header');?>
<!-- Header End====================================================================== -->
<?php $this->load->view('homeBanner'); ?>
            <!-- Sidebar ================================================== -->
<?php $this->load->view('layouts/sidebar'); ?>
            <!-- Sidebar end=============================================== -->
            <div class="span9">
                <div class="well well-small">
                    <h4>Featured Products <small class="pull-right">200+ featured products</small></h4>
                    <div class="row-fluid">
                        <div id="featured" class="carousel slide">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <ul class="thumbnails">
                                        <?php foreach ($featuredProductsFirst as $product):
                                            $productDate = date('Y-m-d',strtotime($product->created_at));
                                            $todayDate = date('Y-m-d');
                                            ?>
                                        <li class="span3">
                                            <div class="thumbnail">
                                                <?php if($productDate==$todayDate):?>
                                                <i class="tag"></i>
                                                <?php endif;?>
                                                <a href="<?=base_url('product/productDetails/').$product->product_id?>"><img src="<?php echo base_url().$product->product_image; ?>" alt=""></a>
                                                <div class="caption">
                                                    <h5><?= $product->product_name;?></h5>
                                                    <h4><a class="btn" href="<?=base_url('product/productDetails').$product->product_id?>">VIEW</a> <span class="pull-right">$<?= $product->product_price;?></span></h4>
                                                </div>
                                            </div>
                                        </li>
                                        <?php endforeach;?>
                                    </ul>
                                </div>
                                <div class="item">
                                    <ul class="thumbnails">
                                        <?php foreach ($featuredProductsSecond as $product):
                                            $productDate = date('Y-m-d',strtotime($product->created_at));
                                            $todayDate = date('Y-m-d');
                                            ?>
                                        <li class="span3">
                                            <div class="thumbnail">
                                                <?php if($productDate==$todayDate):?>
                                                    <i class="tag"></i>
                                                <?php endif;?>
                                                <a href="<?=base_url('product/productDetails/').$product->product_id?>"><img src="<?php echo base_url().$product->product_image; ?>" alt=""></a>
                                                <div class="caption">
                                                    <h5><?= $product->product_name;?></h5>
                                                    <h4><a class="btn" href="<?=base_url('product/productDetails/').$product->product_id?>">VIEW</a> <span class="pull-right">$<?= $product->product_price;?></span></h4>
                                                </div>
                                            </div>
                                        </li>
                                        <?php endforeach;?>
                                    </ul>
                                </div>
                            </div>
                            <a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
                            <a class="right carousel-control" href="#featured" data-slide="next">›</a>
                        </div>
                    </div>
                </div>
                <h4>Latest Products </h4>
                <ul class="thumbnails">
                    <?php foreach ($latestProducts as $product):?>
                    <li class="span3">
                        <div class="thumbnail">
                            <a  href="product_details.html"><img src="<?php echo base_url().$product->product_image?>" alt=""/></a>
                            <div class="caption">
                                <h5><?=$product->product_name;?></h5>
                                <p>
                                    Lorem Ipsum is simply dummy text.
                                </p>

                                <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="<?= base_url('product/add_to_cart/').$product->product_id?>">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">$<?=$product->product_price;?></a></h4>
                            </div>
                        </div>
                    </li>
                    <?php endforeach;?>
                </ul>

            </div>
        </div>
    </div>
</div>
<?php $this->load->view('layouts/footer');?>
