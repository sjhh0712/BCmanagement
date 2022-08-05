<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script type="text/javascript" src="<?=COMMON_ASSET_URL?>/js/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="<?=COMMON_ASSET_URL?>/js/common.js"></script>
  <title>명함 등록</title>

  <style>

    @import url('https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Foundation&display=swap');

    body {
      background-image: url("<?=ASSET_URL?>/images/nightsky.png");
    }
    
    .title {
      font-family: 'Edu NSW ACT Foundation', cursive;
      margin-top: 80px;
      font-size: 45px;
      text-align: center;
      color: silver;
    }

    .contents {
      text-align: center;
    }

    .contents {
      position: absolute;
      margin: auto;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      width: 600px;
      height: 200px;
    }

    p{
      font-size: 30px;
    }

    p:hover {
      color: white;
    }

    button:hover {
      background: palevioletred;
      color: white;
    }

  </style>
</head>
<body>
  <div class="title">
    <strong>Regist your Business Card</strong>
  </div>
  <div class="contents">
    <input type="text" id="bcname" placeholder="상호명" style="width: 90%; font-size:30px;">
    <input type="text" id="officelocation" placeholder="회사 위치" style="width: 90%; margin-top: 5px; font-size:30px;">
    <input type="text" id="officenumber" placeholder="회사 전화번호" style="width: 90%; margin-top: 5px; font-size:30px;">
    <input type="text" id="cellphone" placeholder="휴대폰 번호" style="width: 90%; margin-top: 5px; font-size:30px">
    <button style="width:30%; margin-top: 30px; font-size:large; border-radius:3px; font-size: 22px;" onclick="registbtn()">등록</button>
  </div>
  <div class="bakctxt">
      <p style="position: absolute; right: 100px; bottom: 50px; cursor: pointer;" onclick="backto();"><-이전화면으로</p>
  </div>

  <script type="text/javascript">

    function registbtn() {  // 명함 등록 버튼
      var bcname = $('#bcname').val();
      var officelocation = $('#officelocation').val();
      var officenumber = $('#officenumber').val();
      var cellphone = $('#cellphone').val();
      var url = "<?=BASE_URL?>/Regist/regist_check";

      if(bcname.length == 0) {
        alert('상호명을 입력하세요.');
        return;
      }
      else if(officelocation.length == 0) {
        alert('회사 위치를 입력하세요.');
        return;
      }
      else if(officenumber.length == 0) {
        alert('회사 전화번호를 입력하세요.');
        return;
      }
      else if(cellphone.length == 0) {
        alert('휴대폰 번호를 입력하세요.');
        return;
      }
      else
      {
        reqAjax(url,
        {
          bcname: bcname,
          officelocation: officelocation,
          officenumber: officenumber,
          cellphone: cellphone
        },
        function(res){
          if(res.return_code == 0){
            alert(res.msg);
          }
          else
          {
            alert(res.msg);
          }
        },
        function(err) {
          alert('에러');
        });
      }

    }

    function backto() {
      history.back();
    }

    $(document).ready(function() {
		});
  </script>
</body>
</html>