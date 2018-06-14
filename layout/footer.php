</div>
<div class="container">
    <div class="col-md-4 bottom-content">
        <a href=""><img src="public/frontend/images/free-shipping.png"></a>
    </div>
    <div class="col-md-4 bottom-content">
        <a href=""><img src="public/frontend/images/guaranteed.png"></a>
    </div>
    <div class="col-md-4 bottom-content">
        <a href=""><img src="public/frontend/images/deal.png"></a>
    </div>
</div>
<div class="container-pluid">
    <section id="footer">
        <div class="container">
            <div class="col-md-3" id="shareicon">
                <ul>
                    <li>
                        <a href=""><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-google-plus"></i></a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-youtube"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-8" id="title-block">
                <div class="pull-left">
                </div>
                <div class="pull-right">
                </div>
            </div>
        </div>
    </section>
    <section id="footer-button">
        <div class="container-pluid">
            <div class="container">
                <div class="col-md-3" id="ft-about">
                    <p>Chi nhánh hiện tại :  45 Nguyễn Khắc Nhu, phường Cô Giang, Quận 1, Hồ Chí Minh City&nbsp;
                        <br>Cửa hàng nằm trên lầu 7 khoa CNTT của trường ĐH VL nhé các bạn ^.^</p>
                    </div>
                    <div class="col-md-3 box-footer" >
                        <h3 class="tittle-footer">Chính sách</h3>
                        <ul>
                            <li>
                                <i class="fa fa-angle-double-right"></i>
                                <a href="bao-hanh.php"><i></i> Quy định bảo hành</a>
                            </li>
                            <li>
                                <i class="fa fa-angle-double-right"></i>
                                <a href="doi-hang.php"><i></i> Quy định đổi hàng </a>
                            </li>
                            <li>
                                <i class="fa fa-angle-double-right"></i>
                                <a href="thanh-toan-giao-hang.php"><i></i>  Thanh toán và giao hàng </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 box-footer">
                        <h3 class="tittle-footer">Tài khoản của bạn</h3>
                        <ul>
                            <li>
                                <i class="fa fa-angle-double-right"></i>
                                <a href="info-us.php"><i></i> Hồ sơ cá nhân</a>
                            </li>
                            <li>
                                <i class="fa fa-angle-double-right"></i>
                                <a href="cart.php"><i></i> Giỏ hàng </a>
                            </li>   
                        </ul>
                    </div>
                    <div class="col-md-3" id="footer-support">
                        <h3 class="tittle-footer"> Liên hệ</h3>
                        <ul>
                            <li>
                                <p><i class="fa fa-home" style="font-size: 16px;padding-right: 5px;"></i> 45 Nguyễn Khắc Nhu, Cô Giang, Hồ Chí Minh</p>
                                <p><i class="fa fa-graduation-cap" style="font-size: 16px;padding-right: 5px;"></i> Virtue - Strong Will - Creativeness</p>
                                <p><i class="sp-ic fa fa-mobile" style="font-size: 22px;padding-right: 5px;"></i> 028 3836 7933</p>
                                <p><i class="sp-ic fa fa-envelope" style="font-size: 13px;padding-right: 5px;"></i> t163806@vanlanguni.vn</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section id="ft-bottom">
            <p class="text-center">Copyright © 2018 . Design by  Storm !!! </p>
        </section>
    </div>
</div>
</div>
</div>      
</div>
<script  src="public/frontend/js/slick.min.js"></script>
</body>
</html>
<script type="text/javascript">
    $(function() {
        $hidenitem = $(".hidenitem");
        $itemproduct = $(".item-product");
        $itemproduct.hover(function(){
            $(this).children(".hidenitem").show(100);
        },function(){
            $hidenitem.hide(500);
        })
    })
    $(function(){
        $updatecart = $(".updatecart");
        $updatecart.click(function(e){
            e.preventDefault();
            $sl = $(this).parents("#tbody").find("#sl").val();
            $key = $(this).attr("data-key");
            $.ajax({
                url: 'updatecart.php',
                type: 'GET',
                data: {'sl':$sl, 'key':$key},
                success:function(data){
                    if (data == 1 ) {
                        alert("cập nhật giỏ hàng thành công");
                        location.href = 'cart.php';
                    }
                }
            })
        })
    })
</script>
