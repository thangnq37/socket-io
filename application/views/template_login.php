<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style type="text/css">
	
	body{background: #eee url(public/images/login/sativa.png);}
html,body{
    position: relative;
    height: 100%;
}

.login-container{
    position: relative;
    width: 300px;
    margin: 80px auto;
    padding: 20px 40px 40px;
    text-align: center;
    background: #fff;
    border: 1px solid #ccc;
}

#output{
    position: absolute;
    width: 300px;
    top: -75px;
    left: 0;
    color: #fff;
}

#output.alert-success{
    background: rgb(25, 204, 25);
}

#output.alert-danger{
    background: rgb(228, 105, 105);
}


.login-container::before,.login-container::after{
    content: "";
    position: absolute;
    width: 100%;height: 100%;
    top: 3.5px;left: 0;
    background: #fff;
    z-index: -1;
    -webkit-transform: rotateZ(4deg);
    -moz-transform: rotateZ(4deg);
    -ms-transform: rotateZ(4deg);
    border: 1px solid #ccc;

}

.login-container::after{
    top: 5px;
    z-index: -2;
    -webkit-transform: rotateZ(-2deg);
     -moz-transform: rotateZ(-2deg);
      -ms-transform: rotateZ(-2deg);

}

.avatar{
    width: 100px;height: 100px;
    margin: 10px auto 30px;
    border-radius: 100%;
    border: 2px solid #aaa;
    background-size: cover;
    background-image: url(public/images/login/telescope.png);
}

.form-box input{
    width: 100%;
    padding: 10px;
    text-align: center;
    height:40px;
    border: 1px solid #ccc;;
    background: #fafafa;
    transition:0.2s ease-in-out;

}

.form-box input:focus{
    outline: 0;
    background: #eee;
}

.form-box input[type="text"]{
    border-radius: 5px 5px 0 0;
    text-transform: lowercase;
}

.form-box input[type="password"]{
    border-radius: 0 0 5px 5px;
    border-top: 0;
}

.form-box button.login{
    margin-top:15px;
    padding: 10px 20px;
}

.animated {
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}

@-webkit-keyframes fadeInUp {
  0% {
    opacity: 0;
    -webkit-transform: translateY(20px);
    transform: translateY(20px);
  }

  100% {
    opacity: 1;
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }
}

@keyframes fadeInUp {
  0% {
    opacity: 0;
    -webkit-transform: translateY(20px);
    -ms-transform: translateY(20px);
    transform: translateY(20px);
  }

  100% {
    opacity: 1;
    -webkit-transform: translateY(0);
    -ms-transform: translateY(0);
    transform: translateY(0);
  }
}

.fadeInUp {
  -webkit-animation-name: fadeInUp;
  animation-name: fadeInUp;
}

.textRightMouse{
	cursor: pointer;
}

.hide-show{
	display: none;
}
</style>
</head>
<body>

<div class="container">
	<div class="login-container">
            <div id="output"></div>
            <div class="avatar"></div>
            <div class="form-box">
            	<div class="div-login">
	                <form action="" method="">
	                    <input name="user" type="text" placeholder="username">
	                    <input type="password" placeholder="password">
	                    <button class="btn btn-info btn-block login" type="submit">Login</button>
	                    <a class="textRightMouse">Sign Up</a>
	                </form>
                </div>

                <div class="div-sigin-up">
	                <form action="index.php/LoginController/CreateUserLogin" method="post">
	                    <input name="username" type="text" placeholder="username">
	                    <input type="password" name="password" placeholder="password">
	                    <input type="password" name="confirmPassword" placeholder="confirm password">
	                    <button class="btn btn-success btn-block login" type="submit">Sign Up</button>
	                    <a class="textRightMouse">Login</a>
	                </form>
                </div>
            </div>
        </div>
        
</div>

<script>
$(function(){
	$('.div-sigin-up').toggle('hide-show');

	$('.textRightMouse').on('click',function(){
		$('.div-login').toggle('hide-show');
		$('.div-sigin-up').toggle('hide-show');
	})

	function alertOutputDanger(string){
		$("#output").removeClass(' alert alert-success');
        $("#output").addClass("alert alert-danger animated fadeInUp").html(string);
	}

	function alertOutputSuccess(string){
		$("#output").addClass("alert alert-success animated fadeInUp").html("Welcome back " + "<span style='text-transform:uppercase'>" + string + "</span>");
        $("#output").removeClass(' alert-danger');
        $("input").css({
        "height":"0",
        "padding":"0",
        "margin":"0",
        "opacity":"0"
        });
	}

	var textfield = $("input[name=username]");
	const errTextfield = "Vui lòng nhập tài khoảng";
	const errTextPassword = "Vui lòng nhập mật khẩu";
	const errTextConfirmPassword = "Vui lòng nhập xác nhận mật khẩu";
	const errPasswordTextConfirmPassword = "Mật khẩu xác nhận không trùng khớp";
	var textPassword = $("input[name=password]");
	var textConfirmPassword = $("input[name=confirmPassword]");
    $('button[type="submit"]').click(function(e) {
        //little validation just to check username
        if (textfield.val() == "") {
            alertOutputDanger(errTextfield);
            e.preventDefault();
        } else if (textPassword.val() == "") {
            alertOutputDanger(errTextPassword);
            e.preventDefault();
            
        } else if (textConfirmPassword.val() == ""){
        	alertOutputDanger(errTextConfirmPassword);
        	e.preventDefault();
        } else if (textConfirmPassword.val() != textPassword.val()){
        	alertOutputDanger(errPasswordTextConfirmPassword);
        	e.preventDefault();
        }

    });
});

</script>

</body>
</html>
