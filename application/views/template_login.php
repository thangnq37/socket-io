<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

<style type="text/css">
	
	body{background: #eee url(<?php echo base_url(); ?>/public/images/login/sativa.png);}
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
    background-image: url(<?php echo base_url(); ?>/public/images/login/telescope.png);
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
}

.form-box input[type="password"],.form-box input[type="confirmPassword"]{
    border-top: 0;
}


.form-box input[name="email"],.form-box input[name="password_login"]{
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

.languagepicker {
    background-color: #FFF;
    display: inline-block;
    padding: 0;
    height: 40px;
    overflow: hidden;
    transition: all .3s ease;
    margin-top:10px;
    vertical-align: top;
    float: right;
}

.languagepicker:hover {
    /* don't forget the 1px border */
    height: 81px;
}

.languagepicker a{
    color: #000;
    text-decoration: none;
}

.languagepicker li {
    display: block;
    padding: 0px 20px;
    line-height: 40px;
    border-top: 1px solid #EEE;
}

.languagepicker li:hover{
    background-color: #EEE;
}

.languagepicker a:first-child li {
    border: none;
    background: #FFF !important;
}

.languagepicker li img {
    margin-right: 5px;
}

.roundborders {
    border-radius: 5px;
}

.large:hover {
    /* 
    don't forget the 1px border!
    The first language is 40px heigh, 
    the others are 41px
    */
    height: 126px;
}

.hide-show{
	display: none;
}
</style>
</head>
<body>
<div class="container">
    <div>
        <ul class="languagepicker roundborders large">
            <a href="#"><li><img src="<?php echo base_url(); ?>/public/images/login/translate.png"/><?=lang('LANGUAGE')?></li></a>
            <a href="<?php echo base_url("index.php/LanguageSwitcher/switchLang/VI"); ?>"><li><img src="<?php echo base_url(); ?>/public/images/login/vietnam.png"/>Việt Nam</li></a>
            <a href="<?php echo base_url("index.php/LanguageSwitcher/switchLang/EN"); ?>"><li><img src="<?php echo base_url(); ?>/public/images/login/united-states-of-america.png"/>English</li></a>
        </ul>
    </div>
	<div class="login-container">
            <div id="output"></div>
            <div class="avatar"></div>
            <div class="form-box">
            	<div class="div-login">
	                <?php echo form_open(''); ?>
                        <input type="hidden" name="type-post">
	                    <input name="username_login" type="text" placeholder="<?=lang('USERNAME')?>">
	                    <input type="password" name="password_login" placeholder="<?=lang('PASSWORD')?>">
	                    <button class="btn btn-info btn-block login" type="submit" name="submit" value="login"><?=lang('LOGIN')?></button>
	                    <a class="textRightMouse"><?=lang('SIGN_UP')?></a>
	                </form>
                </div>

                <div class="div-sigin-up">
                    <?php echo form_open(''); ?>
	                    <input name="username" type="text" placeholder="<?=lang('USERNAME')?>">
                        <input type="password" name="password" placeholder="<?=lang('PASSWORD')?>">
	                    <input type="password" name="confirmPassword" placeholder="<?=lang('CONF_PASSWORD')?>">
                        <input type="email" name="email" placeholder="<?=lang('EMAIL')?>">
	                    <button class="btn btn-success btn-block login" type="submit" name="submit" value="signup"><?=lang('SIGN_UP')?></button>
	                    <a class="textRightMouse"><?=lang('LOGIN')?></a>
	                </form>
                </div>
            </div>
        </div>
        
</div>

<script>
var test;
$(function(){

    const errTextfield = "<?=lang('ERROR_USERNAME_EMPTY')?>";
    const errTextPassword = "<?=lang('ERROR_PASSWORD_EMPTY')?>";
    const errTextConfirmPassword = "<?=lang('ERROR_CONF_PASSWORD')?>";
    const errPasswordTextConfirmPassword = "<?=lang('ERROR_PASSWORD_NOT_CF_PASS')?>";

    var textErrorForm ='<?=form_error('username')?>';
    var textErrorFormLogin ='<?=form_error('username_login');?>';
    if(textErrorForm !== "" ){
        $('.div-login').toggle('hide-show');
        alertOutputDanger(textErrorForm);
    }else if(textErrorFormLogin === "" && textErrorForm === ""){
        $('.div-sigin-up').toggle('hide-show');
        
    }else {
        if(textErrorFormLogin !== ""){
            $('.div-sigin-up').toggle('hide-show');
            alertOutputDanger(textErrorFormLogin);
        }else{
            $('.div-login').toggle('hide-show');
        }
    }

    
    
	

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

	
    $('button[type="submit"]').click(function(e) {
        var textfield = $("input[name=username]");
        var textPassword = $("input[name=password]");
        var textConfirmPassword = $("input[name=confirmPassword]");
        var textfieldLogin = $("input[name=username_login]");
        var textPasswordLogin = $("input[name=password_login]");
    
        //little validation just to check username
        let valueButton = $(e.target).val();
        if(valueButton === "signup"){
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
        }else if(valueButton === "login"){
            if (textfieldLogin.val() == "") {
                alertOutputDanger(errTextfield);
                e.preventDefault();
            } else if (textPasswordLogin.val() == "") {
                alertOutputDanger(errTextPassword);
                e.preventDefault();   
            }
        }
        

    });
});

</script>

</body>
</html>
