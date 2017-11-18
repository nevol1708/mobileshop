@extends('master')
@section('content')
<div class="clear"> </div>
<div class="wrap">
    <div class="content">
        <div class="section group">
            <div class="col span_1_of_3">
                <div class="contact_info">
                    <h2>Find Us Here</h2>
                    <div class="map">
                        <iframe width="100%" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.122735744808!2d105.80064111480631!3d21.02777449318821!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab424a50fff9%3A0xbe3a7f3670c0a45f!2sUniversity+of+Communications+and+Transport!5e0!3m2!1sen!2s!4v1510979734859"></iframe>
                        <br><small><a href="https://www.google.com/maps/place/University+of+Communications+and+Transport/@21.0277745,105.8006411,17z/data=!3m1!4b1!4m5!3m4!1s0x3135ab424a50fff9:0xbe3a7f3670c0a45f!8m2!3d21.0277695!4d105.8028298" style="color:#666;text-align:left;font-size:12px">View Larger Map</a></small>
                    </div>
                </div>
                <div class="company_address">
                    <h2>Thông tin cửa hàng :</h2>
                    <p>Số 3 Cầu Giấy, Láng Thượng,</p>
                    <p>Đống Đa, Hà Nội</p>
                    <p>VN</p>
                    <p>Điện thoại:(+84) 168 313 5028</p>
                    <p>Fax: (+84) 168 313 5028</p>
                    <p>Email: <span><a href="mailto:thanhpt1708@gmail.com">thanhpt1708@gmail.com</a></span></p>
                    <p>Follow on: <span><a href="#">Facebook</a></span>, <span><a href="#">Twitter</a></span></p>
                </div>
            </div>
            <div class="col span_2_of_3">
                <div class="contact-form">
                    <h2>Contact Us</h2>
                    <form>
                        <div>
                            <span><label>NAME</label></span>
                            <span><input type="text" value=""></span>
                        </div>
                        <div>
                            <span><label>E-MAIL</label></span>
                            <span><input type="text" value=""></span>
                        </div>
                        <div>
                            <span><label>MOBILE.NO</label></span>
                            <span><input type="text" value=""></span>
                        </div>
                        <div>
                            <span><label>SUBJECT</label></span>
                            <span><textarea> </textarea></span>
                        </div>
                        <div>
                            <span><input type="submit" value="Submit"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="clear"> </div>
    </div>
    <div class="clear"> </div>
</div>
@endsection