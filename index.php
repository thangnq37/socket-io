<!DOCTYPE html>
<html>
<head>
	<title>Socket IO</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js"></script>


	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script type="text/javascript">
		var socket = io("http://113.165.167.146:4949");

        //client nhận dữ liệu từ server
		socket.on("Server-sent-data", function(data)
		{
			alert(data);
		});

		socket.on("Server-sent-data-change-color", function(data)
		{
			$('body').css("background-color", data);
		});

		function ChangeColorBackground(color){
			socket.emit("Client-sent-data", color);
		}
		
	</script>
	<style type="text/css">
		.container{max-width:1170px; margin:auto;}
		img{ max-width:100%;}
		.inbox_people {
		  background: #f8f8f8 none repeat scroll 0 0;
		  float: left;
		  overflow: hidden;
		  width: 40%; border-right:1px solid #c4c4c4;
		}
		.inbox_msg {
		  border: 1px solid #c4c4c4;
		  clear: both;
		  overflow: hidden;
		}
		.top_spac{ margin: 20px 0 0;}


		.recent_heading {float: left; width:40%;}
		.srch_bar {
		  display: inline-block;
		  text-align: right;
		  width: 60%; padding:
		}
		.headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

		.recent_heading h4 {
		  color: #05728f;
		  font-size: 21px;
		  margin: auto;
		}
		.srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
		.srch_bar .input-group-addon button {
		  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
		  border: medium none;
		  padding: 0;
		  color: #707070;
		  font-size: 18px;
		}
		.srch_bar .input-group-addon { margin: 0 0 0 -27px;}

		.chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
		.chat_ib h5 span{ font-size:13px; float:right;}
		.chat_ib p{ font-size:14px; color:#989898; margin:auto}
		.chat_img {
		  float: left;
		  width: 11%;
		}
		.chat_ib {
		  float: left;
		  padding: 0 0 0 15px;
		  width: 88%;
		}

		.chat_people{ overflow:hidden; clear:both;}
		.chat_list {
		  border-bottom: 1px solid #c4c4c4;
		  margin: 0;
		  padding: 18px 16px 10px;
		}
		.inbox_chat { height: 550px; overflow-y: scroll;}

		.active_chat{ background:#ebebeb;}

		.incoming_msg_img {
		  display: inline-block;
		  width: 6%;
		}
		.received_msg {
		  display: inline-block;
		  padding: 0 0 0 10px;
		  vertical-align: top;
		  width: 92%;
		 }
		 .received_withd_msg p {
		  background: #ebebeb none repeat scroll 0 0;
		  border-radius: 3px;
		  color: #646464;
		  font-size: 14px;
		  margin: 0;
		  padding: 5px 10px 5px 12px;
		  width: 100%;
		}
		.time_date {
		  color: #747474;
		  display: block;
		  font-size: 12px;
		  margin: 8px 0 0;
		}
		.received_withd_msg { width: 57%;}
		.mesgs {
		  float: left;
		  padding: 30px 15px 0 25px;
		  width: 60%;
		}

		 .sent_msg p {
		  background: #05728f none repeat scroll 0 0;
		  border-radius: 3px;
		  font-size: 14px;
		  margin: 0; color:#fff;
		  padding: 5px 10px 5px 12px;
		  width:100%;
		}
		.outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
		.sent_msg {
		  float: right;
		  width: 46%;
		}
		.input_msg_write input {
		  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
		  border: medium none;
		  color: #4c4c4c;
		  font-size: 15px;
		  min-height: 48px;
		  width: 100%;
		}

		.type_msg {border-top: 1px solid #c4c4c4;position: relative;}
		.msg_send_btn {
		  background: #05728f none repeat scroll 0 0;
		  border: medium none;
		  border-radius: 50%;
		  color: #fff;
		  cursor: pointer;
		  font-size: 17px;
		  height: 33px;
		  position: absolute;
		  right: 0;
		  top: 11px;
		  width: 33px;
		}
		.messaging { padding: 0 0 50px 0;}
		.msg_history {
		  height: 516px;
		  overflow-y: auto;
		}
	</style>
</head>
<body>
	<div class="row">
		<div class="container">
			<button type="button" onClick="ChangeColorBackground('red')" class="btn btn-danger">Red</button>
			<button type="button" onClick="ChangeColorBackground('green')" class="btn btn-success">Green</button>
			<button type="button" onClick="ChangeColorBackground('orange')" class="btn btn-warning">Orange</button>
		</div>
	</div>
<div class="row">
	<div class="container">
	<h3 class=" text-center">Messaging</h3>
	<div class="messaging">
	      <div class="inbox_msg">
	        <div class="inbox_people">
	          <div class="headind_srch">
	            <div class="recent_heading">
	              <h4>Recent</h4>
	            </div>
	            <div class="srch_bar">
	              <div class="stylish-input-group">
	                <input type="text" class="search-bar"  placeholder="Search" >
	                <span class="input-group-addon">
	                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
	                </span> </div>
	            </div>
	          </div>
	          <div class="inbox_chat">
	            <div class="chat_list active_chat">
	              <div class="chat_people">
	                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
	                <div class="chat_ib">
	                  <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
	                  <p>Test, which is a new approach to have all solutions 
	                    astrology under one roof.</p>
	                </div>
	              </div>
	            </div>
	            <div class="chat_list">
	              <div class="chat_people">
	                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
	                <div class="chat_ib">
	                  <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
	                  <p>Test, which is a new approach to have all solutions 
	                    astrology under one roof.</p>
	                </div>
	              </div>
	            </div>
	            <div class="chat_list">
	              <div class="chat_people">
	                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
	                <div class="chat_ib">
	                  <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
	                  <p>Test, which is a new approach to have all solutions 
	                    astrology under one roof.</p>
	                </div>
	              </div>
	            </div>
	            <div class="chat_list">
	              <div class="chat_people">
	                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
	                <div class="chat_ib">
	                  <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
	                  <p>Test, which is a new approach to have all solutions 
	                    astrology under one roof.</p>
	                </div>
	              </div>
	            </div>
	            <div class="chat_list">
	              <div class="chat_people">
	                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
	                <div class="chat_ib">
	                  <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
	                  <p>Test, which is a new approach to have all solutions 
	                    astrology under one roof.</p>
	                </div>
	              </div>
	            </div>
	            <div class="chat_list">
	              <div class="chat_people">
	                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
	                <div class="chat_ib">
	                  <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
	                  <p>Test, which is a new approach to have all solutions 
	                    astrology under one roof.</p>
	                </div>
	              </div>
	            </div>
	            <div class="chat_list">
	              <div class="chat_people">
	                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
	                <div class="chat_ib">
	                  <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
	                  <p>Test, which is a new approach to have all solutions 
	                    astrology under one roof.</p>
	                </div>
	              </div>
	            </div>
	          </div>
	        </div>
	        <div class="mesgs">
	          <div class="msg_history">
	            <div class="incoming_msg">
	              <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
	              <div class="received_msg">
	                <div class="received_withd_msg">
	                  <p>Test which is a new approach to have all
	                    solutions</p>
	                  <span class="time_date"> 11:01 AM    |    June 9</span></div>
	              </div>
	            </div>
	            <div class="outgoing_msg">
	              <div class="sent_msg">
	                <p>Test which is a new approach to have all
	                  solutions</p>
	                <span class="time_date"> 11:01 AM    |    June 9</span> </div>
	            </div>
	            <div class="incoming_msg">
	              <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
	              <div class="received_msg">
	                <div class="received_withd_msg">
	                  <p>Test, which is a new approach to have</p>
	                  <span class="time_date"> 11:01 AM    |    Yesterday</span></div>
	              </div>
	            </div>
	            <div class="outgoing_msg">
	              <div class="sent_msg">
	                <p>Apollo University, Delhi, India Test</p>
	                <span class="time_date"> 11:01 AM    |    Today</span> </div>
	            </div>
	            <div class="incoming_msg">
	              <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
	              <div class="received_msg">
	                <div class="received_withd_msg">
	                  <p>We work directly with our designers and suppliers,
	                    and sell direct to you, which means quality, exclusive
	                    products, at a price anyone can afford.</p>
	                  <span class="time_date"> 11:01 AM    |    Today</span></div>
	              </div>
	            </div>
	          </div>
	          <div class="type_msg">
	            <div class="input_msg_write">
	              <input type="text" class="write_msg" placeholder="Type a message" />
	              <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
	            </div>
	          </div>
	        </div>
	      </div>
	      
	      
	      <p class="text-center top_spac"> Design by <a target="_blank" href="#">Sunil Rajput</a></p>
	      
	    </div>
	</div>
</div>	

</body>
</html>