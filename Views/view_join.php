<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">

  <title>회원가입</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script type="text/javascript" src="<?=COMMON_ASSET_URL?>/js/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="<?=COMMON_ASSET_URL?>/js/common.js"></script>


  <style>
    @import url('https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Foundation&display=swap');

    body {
      background-image: url("<?=ASSET_URL?>/images/nightsky.png");
    }

    div.title {
      font-family: 'Edu NSW ACT Foundation', cursive;
      font-size: 40px;
    }

    .contents {
      width: 800px;
      font-size: 30px;
      margin: -100px auto auto auto;
      text-align: center;
    }

    input {
      font-size: 25px;
    }

    button {
      font-size: large;
    }

    button:hover {
      background: palevioletred;
      color: white;
    }

  </style>
</head>
<body>
  <div class="title">
    <div><br><br><br></div>
    <div style="text-align: center">
      <strong>JOIN US!</strong>
    </div>
  </div>
  <div>
    <div class="contents">
      <td><br></td>
      <td><br></td>
      <td><br></td>
      <td><br></td>
      <td><br></td>
      <td><br></td>
      <table class="form">     
        <div>
          <input type="text" placeholder="아이디" id="id" style="width: 70%">
          <input type="text" placeholder="닉네임" id="nick" style="width: 70%">
          <input type="text" placeholder="이름" id="name" style="width: 70%">
          <input type="password" placeholder="비밀번호" id="password" style="width: 70%">
          <input type="password" placeholder="비밀번호 확인" id="pwdcheck" style="width: 70%">
        </div> 
      </table>
      <table class="form">
        <div>
          <button class="okbtn" style="width: 30%;" onclick="Joinok()">확인</button>
          <button class="backbtn" style="width: 30%;" onclick="Lgpage()">로그인 페이지로</button>
        </div>
      </table>
    </div>
  </div>


  <script type="text/javascript">

    function Joinok(){
      var id = $('#id').val();
      var nick = $('#nick').val();
      var name = $('#name').val();
      var password = $('#password').val();
      var pwdcheck = $('#pwdcheck').val();
      var url = "<?=BASE_URL?>/Join/join_check";

      if(id.length == 0){
        alert('아이디를 입력하세요.');
      }
      else if(nick.length == 0){
        alert('닉네임을 입력하세요.');
      }
      else if(name.length == 0){
        alert('이름을 입력하세요.');
      }
      else if(password.length == 0){
        alert('비밀번호를 입력하세요.');
      }
      else if(password != pwdcheck){
        alert('비밀번호가 일치하지 않습니다.');
      }
      else
      {
        reqAjax(url,
        {
          id: id, 
          nick: nick, 
          name: name, 
          password: password
        },
        function(res){
          if(res.return_code == 0){
            alert(res.msg);
            location.href = '<?=BASE_URL?>/Login';
          }
          else
          {
            alert(res.msg);
          }
        },
          function(err) {
            alert('err');
          });
      }

    }

    function Lgpage(){
      history.back();
    }

    $(document).ready(function() {
		});

  </script>
</body>
</html>