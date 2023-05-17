<section class="ftco-section">
    <div class="container">
        <div class="row">
            <?php
            $sql_hotel = "SELECT * FROM `hotel` INNER JOIN `price_ht` ON `hotel`.`hotel_id` = `price_ht`.`pht_id` ORDER BY `hotel_id` ASC;";
            $rs_hotel = mysqli_query($conn, $sql_hotel);

            while ($row_hotel = mysqli_fetch_array($rs_hotel)) {
            ?>
                <div class="col-md-4 ftco-animate">
                    <div class="project-wrap hotel">
                        <a href="#" class="img" style="background-image: url(images/<?php echo $row_hotel['hotel_img'] ?>);">
                            <span class="price"><?php echo number_format($row_hotel['pht_price'], 0, ',', '.') . '/VNĐ' ?></span>
                        </a>
                        <div class="text p-4">
                            <p class="star mb-2">
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </p>
                            <span class="days"><?php echo $row_hotel['hotel_date'] ?></span>
                            <h3><a href="#"><?php echo $row_hotel['hotel_name'] ?></a></h3>
                            <p class="location"><span class="fa fa-map-marker"></span><?php echo $row_hotel['hotel_address'] ?></p>
                            <ul>
                                <li><span class="flaticon-shower"></span><?php echo $row_hotel['hotel_shower'] ?></li>
                                <li><span class="flaticon-king-size"></span><?php echo $row_hotel['hotel_king'] ?></li>
                                <li><span class="flaticon-mountains"></span><?php echo $row_hotel['hotel_sun_umbrella'] ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php } ?>
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