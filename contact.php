<?php require_once __DIR__. "/autoload/autoload.php"; ?><?php require_once __DIR__. "/layout/header.php"; ?>
<div class="col-md-9">
    <section class="box-main1">
        <h3 class="title-main"><a href=""> Liên hệ</a> </h3>
        <p>&nbsp;</p>
        <div class="col-md-8">
            <div class="well well-sm">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Tên</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter name" required="required" />
                            </div>
                            <div class="form-group">
                                <label for="email"> Địa chỉ Email</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" required="required" /></div>
                            </div>
                            <div class="form-group">
                                <label for="subject">
                                Dịch vụ</label>
                                <select id="subject" name="subject" class="form-control" required="required">
                                    <option value="na" selected="">Choose One:</option>
                                    <option value="service">General Customer Service</option>
                                    <option value="suggestions">Suggestions</option>
                                    <option value="product">Product Support</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Tin nhắn</label>
                                <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="Message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">Gửi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <form>
                <legend><span class="glyphicon glyphicon-globe"></span> Văn phòng công ty</legend>
                <address>
                    <strong>ĐH VL, Inc.</strong><br>45 Nguyễn Khắc Nhu, phường Cô Giang,<br>Q1, TP HCM<br><abbr title="Phone">Phone: </abbr>028 3836 7933
                </address>
                <address>
                    <strong>Admin</strong><br><a href="#">t163806@vanlanguni.vn</a>
                </address>
            </form>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.6320571824044!2d106.69108531418249!3d10.762814262389336!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f16ae2cc46f%3A0xbbc7484836e09cf7!2zNDUgTmd1eeG7hW4gS2jhuq9jIE5odSwgQ8O0IEdpYW5nLCBRdeG6rW4gMSwgSOG7kyBDaMOtIE1pbmgsIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1513705201074" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </section>
</div>
<?php require_once __DIR__. "/layout/footer.php"; ?>             
