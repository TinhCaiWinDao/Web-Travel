<section class="ftco-section ftco-no-pb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="search-wrap-1 ftco-animate">
                    <form action="#" class="search-property-1">
                        <div class="row no-gutters">
                            <div class="col-lg d-flex">
                                <div class="form-group p-4 border-0">
                                    <label for="#">Destination</label>
                                    <div class="form-field">
                                        <div class="icon"><span class="fa fa-search"></span></div>
                                        <input type="text" class="form-control" placeholder="Search place">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg d-flex">
                                <div class="form-group p-4">
                                    <label for="#">Check-in date</label>
                                    <div class="form-field">
                                        <div class="icon"><span class="fa fa-calendar"></span></div>
                                        <input type="text" class="form-control checkin_date" placeholder="Check In Date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg d-flex">
                                <div class="form-group p-4">
                                    <label for="#">Check-out date</label>
                                    <div class="form-field">
                                        <div class="icon"><span class="fa fa-calendar"></span></div>
                                        <input type="text" class="form-control checkout_date" placeholder="Check Out Date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg d-flex">
                                <div class="form-group p-4">
                                    <label for="#">Price Limit</label>
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="fa fa-chevron-down"></span></div>
                                            <select name="" id="" class="form-control">
                                                <?php
                                                $sql_price = "SELECT * FROM `price_ht` ORDER BY `pht_id` ASC;";
                                                $rs_price = mysqli_query($conn, $sql_price);
                                                while ($row_price = mysqli_fetch_array($rs_price)) {
                                                ?>
                                                    <option value=""><?php echo $row_price['pht_price'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg d-flex">
                                <div class="form-group d-flex w-100 border-0">
                                    <div class="form-field w-100 align-items-center d-flex">
                                        <input type="submit" value="Search" class="align-self-stretch form-control btn btn-primary">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>