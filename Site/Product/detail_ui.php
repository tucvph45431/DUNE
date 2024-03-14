<div class="detail title-product container">

    <div class="title-game">
        <ul style="display:inline-flex,">
            <li><a href="../Main/index.php">All Game >> </a></li>
            <li><a href=""><?= $name_commodity ?> >> </a></li>
            <li><a href=""><?= $name_product ?> >> </a></li>
            <li><a href=""></a></li>
        </ul>
        <h1 id="subtitle"><?= $name_product ?></h1>
    </div>

    <div class="detai-game">
        <div class="detail-poster">
            <img src="<?= $CONTENT_URL ?>/Images/product/<?= $img_product ?>" alt="">
        </div>
        <div class="content-game">
            <!-- ====================== CONTENT 1 ====================== -->
            <h2 id="description"><?= $description ?></h2>
            <!-- review -->
            <span>RECENT REVIEWS:
                <?php
                $numberOfViews = (int) $view;

                if ($numberOfViews > 30) {
                    $rateClass = 'rate-green';
                } elseif ($numberOfViews > 10) {
                    $rateClass = 'rate-yellow';
                } else {
                    $rateClass = 'rate';
                }
                ?>
                <span id="<?= $rateClass ?>">very positive:</span>
            </span>(<?= $view ?>)<br>

            <!-- rating -->
            <span>ALL RATINGS:
                <span id="<?= $rateClass ?>">very positive:</span>
            </span>(1,132)<br>

            <!-- date -->
            <span>RELEASE DATE: <?= $date_product ?></span><br>

            <!-- nomination -->
            <span>NOMINATIONS :
                <span id="special">
                    <?php echo $nominate = ($special == "special") ? "Game of the year" : "13 nominated";  ?>
                </span>
            </span><br>

            <!-- nomination -->
            <span>Popular user tags for this product:
                <span id="type">
                    <?= $name_commodity ?>
                </span>
            </span>
            <!-- ====================== END CONTENT 1 ====================== -->


            <!-- ====================== CONTENT 2 ====================== -->
            <div class="support-gamer ">
                <ul>
                    <li><i class='bx bxs-user'></i><span> Solo</span></li>
                    <li><i class='bx bxs-group'></i><span> Online PvP</span></li>
                    <li><i class='bx bxs-memory-card'></i><span> Steam Tradings Cards</span></li>
                    <li><i class='bx bxs-cloud'></i><span> SteamCloud</span></li>
                </ul>
            </div>


            <!-- ====================== END CONTENT 2 ====================== -->


            <!-- ====================== PRICE ====================== -->
            <div class="title-game price-box">
                <h2 style="color: black;"><span>Buy: </span><?= $name_product ?></h2>
                <div class="price-game">
                    <span id="price-product"><?= number_format($price_product, 2) ?>$</span>
                    <div class="sub-price">
                        <button id="add-to-card">ADD TO CARD</button>
                    </div>
                </div>
            </div>
            <!-- ====================== END PRICE ====================== -->

        </div>
    </div>

    <div class="colum-2">

        <!-- ====================== PRoDUCT SAME COMMODITY ====================== -->
        <div class="title-game price-box">
            <div class="same-product">
                <h2> MORE OF THE SAME</h2>
                <ul class="list-same">
                    <?php
                    foreach ($product_same_commodity as $same) {
                        extract($same);
                        $link = "../Product/detail.php?id_product=$id_product";

                        echo '<li><a href=' . $link . '>' . $name_product . '</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
        <!-- ====================== END PRoDUCT SAME COMMODITY ====================== -->

        <!-- ====================== COMMENT ====================== -->
        <div class="title-game comment">
            <h2 style="margin-bottom: 2rem;">Comment</h2>
            <?php
            foreach ($comment_list as $list) {
                extract($list);
                echo ' <div class="user-commneted">
                <div class="content">
                    <p  style="color:black">' . $content_comment . '</p>
                </div>
                <div class="date">
                    <span>' . $name_client . ':</span>
                    <span>' . $date_comment . '</span>
                </div>
                </div>';
            }
            ?>

            <?php
            if (isset($_SESSION['user'])) {
            ?>
                <form action="detail.php?id_product=<?= $id_product ?>" id="form-send" method="post">
                    <textarea rows="1" name="content" placeholder="Your opinion..."></textarea>
                    <button id="btn-send" name="btn_content" type="submit">Send</button>
                    <input type="hidden" name="id_product" value="<?= $_GET['id_product'] ?>">
                </form>
            <?php
            }
            ?>


        </div>
        <!-- ====================== END COMMENT ====================== -->



    </div>

</div>