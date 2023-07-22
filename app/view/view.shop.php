<!--Not using anymore-->
<div class="container">
    <div class="row">
        <?php
        if($this->searched != null)
        {
            $price_min = 0;
            $price_max = 999999999999;
            $name = "";
            if($this->name != null) {
                $name = $this->name;
            }
            if($this->min_price != null){
                $price_min = $this->min_price;
            }
            if($this->max_price != null){
                $price_max = $this->max_price;
            }
            $sql = "SELECT * FROM `tbl_products` WHERE `product_name` LIKE '%$name%' AND `price` <= $price_max AND `price` >= $price_min ";
            //var_dump($sql);
        }
        else {
            $products = Products::getProducts();
            for ($i = 0; $i < count($products); $i++) {
                $product = $products[$i];
                ?>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <img src="<?php Util::link('uploads/' . $product['product_image']); ?>" alt=""
                             class="img-responsive">
                        <div class="caption">
                            <h4 class="pull-right">TK.<?php echo ' ' . $product['price']; ?></h4>
                            <h4><a href="#"><?php echo $product['product_name']; ?></a></h4>
                            <p><?php echo $product['description'] ?></p>
                        </div>
                        <div class="space-ten"></div>
                        <div class="btn-ground text-center">
                            <a href="<?php Util::link('cart/add/' . $product['product_id']); ?>">
                                <button type="button" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add To
                                    Cart
                                </button>
                            </a>
                            <a href="<?php Util::link('product/view/' . $product['product_id']); ?>">
                                <button type="button" class="btn btn-primary"><i class="fa fa-search"></i>View Details
                                </button>
                            </a>
                        </div>
                        <div class="space-ten"></div>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>
</div>


