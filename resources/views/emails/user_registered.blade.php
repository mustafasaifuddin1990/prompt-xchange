<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Our Platform</title>


</head>
<body>
<section class="subscribe_sec" style="background:url('front/assets/img/playground_back.png');">
    <div class="container-fluid">
        <div class="row">
            <div class="subscribe_box" style="  color:#fff;   width: 50%;  margin: 0 auto;    text-align: center;    background: #5f32ac;    padding: 0;    border-radius: 16px;    position: relative;    overflow: hidden;">
                <div class="subscribe_cont">
                    <div class="icon" style=" font-size: 100px;    color: #fff;    padding: 50px;    background: #3b2eb0;    position: relative;    margin-bottom: 20px;">
                        <img src="https://dev-prompt-xchange.staging.designinternal.com/front/assets/img/email-icon.png" style="border-radius:30px;width: 100px; height: 100px; background: #fff;" class="email-icon">
                    </div>
                    <div class="cont" style="    padding: 50px;">
                        <h2 class="text-center" style="  color:#fff; font-weight: 700;margin-bottom: 20px;">User Registration Notification !</h2>
                        <p class="" style="  width: 90%;    margin: 10px auto;       font-size: 18px;    line-height: 2;">Hello, {{ $user->name }}!</p>
                        <p class="" style="  color: #fff; width: 90%;    margin: 10px auto;     font-size: 18px;    line-height: 2;">Thank you for registering on our platform. We are excited to have you on board!</p>
                        <p class="" style="  color: #fff; width: 90%;    margin: 10px auto;        font-size: 18px;    line-height: 2;">Feel free to explore and make the most out of your experience.</p>
                        <p class="" style=" color: #fff;  width: 90%;    margin: 10px auto;    margin-bottom: 30px;    font-size: 18px;    line-height: 2;">Best Regards,<br> The Team</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
