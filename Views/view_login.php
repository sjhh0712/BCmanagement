<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">

  <title>로그인</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1, user-scalable=no">

  <script type="text/javascript" src="<?=COMMON_ASSET_URL?>/js/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="<?=COMMON_ASSET_URL?>/js/common.js"></script>
  
  
  
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Foundation&display=swap');
    
    body {
      background-image: url("<?=ASSET_URL?>/images/nightsky.png");
      color: silver;
    }

    div.title{
      font-family: 'Edu NSW ACT Foundation', cursive;
      font-size: 60px;
    }
    /* .content {
      position: fixed;
      top: 40%;
      left: 30%;
      font-size: 20px;
    } */

    .content {
      font-size: 25px;
      width: 500px;
      margin: 100px auto auto auto;
      text-align: center;
    }

    .account {
      font-size: large;
    }
    table.form {
			padding: 5px;
		}

    .group_btn {
      margin-left: 740px;
      font-size: 20px;
    }

    button:hover {
      background: palevioletred;
      color: white;
    }

    button {  
      font-size: 20px;
    }

  </style>

</head>
<body>
  <div class="title">
    <div><br><br><br></div>
    <div style="text-align:center">
      <strong>BUSINESS CARD MANAGEMENT</strong>
    </div>
  </div>
  <div class="content">
    <div>
      <table class="form">
        <input type="text" id="id" placeholder="아이디" class="account" style="width: 100%; height:30px;">
        <input type="password" id="password" placeholder="비밀번호" class="account" style="width: 100%; height:30px;">
      </table>
    </div>
  </div>
  <div class="group_btn">
    <button onclick="Login()" style="width: 18%; padding: 3px; border-radius: 5px; height:40px;">로그인</button>
    <button onclick="Join()" style="width: 18%; padding: 3px; border-radius: 5px; height:40px;">회원가입</button>
  </div>

  <script type="text/javascript">

    function Login(){
      var id = $('#id').val();
      var password = $('#password').val();
      var url = "<?=BASE_URL?>/Login/login_check";

      if(id.length == 0) {
        alert('아이디를 입력하세요.');
      }
      else if(password.length == 0) {
        alert('비밀번호를 입력하세요.');
      }
      else
      {
        reqAjax(url,
        {
         id:id,
         password:password 
        },
        function(res){
          if(res.return_code == 0){
            alert(res.msg);
            location.href = '<?=BASE_URL?>/Mainhome';
          }
          else
          {
            alert(res.msg);
          }
        },
        function(err) {
          alert('에러!');
        }
        );
      }
      
    }

    function Join(){
      location.href = '<?=BASE_URL?>/Join';
    }

    $(document).ready(function() {
		});



  </script>
</body>
</html>