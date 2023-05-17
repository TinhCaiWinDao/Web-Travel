<section class="ftco-section">
    <div class="container">
        <div class="row">

            <?php
            while ($row_price = mysqli_fetch_array($rs_price)) {
                $price_id = $row_price['price_id'];
            }
            $sql_sp = "SELECT * FROM `sanpham` INNER JOIN `price_limit` ON `sanpham`.`price_id` = `price_limit`.`price_id` ORDER BY `sp_id` ASC;";
            $rs_sp = mysqli_query($conn, $sql_sp);

            while ($row_sp = mysqli_fetch_array($rs_sp)) {
                $con = $row_sp['sp_con'];
            ?>
                <div class="col-md-4 ftco-animate">
                    <div class="project-wrap">
                        <a href="product.php?id=<?php echo $row_sp['sp_id'] ?>" class="img" style="background-image: url(images/<?php echo $row_sp['sp_img'] ?>);">
                            <span class="price"><?php

                                                if ($con > 0) {
                                                    echo number_format($row_sp['sp_gia'], 0, ',', '.') . '/VNĐ';
                                                } else {
                                                    echo 'Đã hết vé';
                                                }
                                                ?></span>
                        </a>
                        <div class="text p-4">
                            <span class="days"><?php echo 'Tour ' . $row_sp['sp_date'] . ' ngày' ?></span>
                            <h3><a href="product.php?id=<?php echo $row_sp['sp_id'] ?>"><?php echo $row_sp['sp_name'] ?></a></h3>
                            <p class="location"><span class="fa fa-map-marker"></span><?php echo $row_sp['sp_address'] ?></p>
                            <ul>
                                <li><span class="flaticon-shower"></span><?php echo $row_sp['sp_shower'] ?></li>
                                <li><span class="flaticon-king-size"></span><?php echo $row_sp['sp_king'] ?></li>
                                <li><span class="flaticon-mountains"></span><?php echo $row_sp['sp_sun_umbrella'] ?></li>
                            </ul>
                            <?php
                            if ($con > 0) {
                            ?>
                                <p class="location">Số lượng: <?php echo $row_sp['sp_con'] ?></p>

                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <li><a href="#">&lt;</a></li>
                        <li class="active"><span>1</span></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&gt;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>