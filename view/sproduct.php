<?php
$html_ds_comment_id = show_comment($ds_comment);
$html_dssp_splq = showsp($dssp_lienquan);
$html_chitietsp = showchitietsp($spchitiet);
?>
<style>
/* Các style đã có */
</style>

<section id="prodetails" class="section-p1">
    <?= $html_chitietsp ?>
</section>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
    <div class="be-comment-block">
        <?php 
        $count_comment = get_count_comment($id);
        echo '<h1 class="comments-title">Bình Luận (' . $count_comment['soluong_comment'] . ')</h1>';
        ?>
        <?= $html_ds_comment_id ?>
        <form class="form-block" action="index.php?pg=sproduct&id=<?= $id ?>" method="post">
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                        <textarea class="form-input" name="comment" required="" placeholder="<?php if (!is_user_logged_in()) { echo 'Bạn cần đăng nhập để bình luận!'; } else { echo 'Bình luận dưới tên ' . $user_profile['hoten'] . ''; } ?>"></textarea>
                        <button name="send" type="submit" class="btn btn-primary">Gửi</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<section id="product1" class="section-p1">
    <h2>Sản Phẩm Liên Quan</h2>
    <div class="pro-container">
        <?= $html_dssp_splq ?>
    </div>
</section>

<script>
var MainImg = document.getElementById("MainImg");
var smallimg = document.getElementsByClassName("small-img");

    smallimg[0].onclick = function() {
        MainImg.src = smallimg[0].src;
    }
    smallimg[1].onclick = function() {
        MainImg.src = smallimg[1].src;
    }
    smallimg[2].onclick = function() {
        MainImg.src = smallimg[2].src;
    }
    smallimg[3].onclick = function() {
        MainImg.src = smallimg[3].src;
    }
</script>
