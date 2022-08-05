<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>명함 관리 HOME</title>

  <style>

    @import url('https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Foundation&display=swap');

    body {
      background-image: url("<?=ASSET_URL?>/images/nightsky.png");
    }
    
    .main {
      position: absolute;
      height: 300px;
      width: 400px;
      margin: -90px 0px 20px -350px;
      top: 50%;
      left: 995px;
      padding: 5px;
    }

    p{
      font-size: 30px;
    }

    .home {
      margin-top: 80px;
      margin-right: 10px;
      font-family: 'Edu NSW ACT Foundation', cursive;
      text-align: center;
      font-size: 50px;
      color: silver;
    }

    div[name="modalpop"] {

      width: 90%;
      height: 90%;

      display: none;

      background-color: skyblue;
    }
    
    button:hover {
      background: palevioletred;
      color: white;
    }

    p:hover {
      color: white;
    }

  </style>

</head>
<body>
  <div class="home">
    <strong>BCM HOME</strong>
  </div>
  <div class="modal" name="modalpop">
    <div class="modalbody">명함 등록</div>
    <div class="modalcontents">
      <input type="text" placeholder="상호명">
      <input type="text" placeholder="회사 위치">
      <input type="text" placeholder="회사 번호">
      <button id="rgbtn" onclick="confirm()">등록</button>
    </div>
  </div>
  <div class="main">
    <div id="regbtn" style="text-align: center;">
      <button style="width: 160%; padding: 3px; margin-bottom:10px; border-radius: 5px;font-size: 30px;"
       onclick="showregist()">명함 등록</button>
      <button style="width: 160%; padding: 3px; margin-bottom:10px; border-radius: 5px; font-size: 30px;" 
       onclick="listcheck()">명함 리스트 확인</button>
    </div>
  </div>
  <div class="bakctxt">
      <p style="position: absolute; right: 100px; bottom: 50px; cursor: pointer;" onclick="backto();"><-이전화면으로</p>
  </div>

  <script type="text/javascript">

    // function regist(){
    //   showpopup('div[name="modalpop"]');
    // }

    // function showpopup(div) {
    //   $(div).css('display', 'block');
    // }

    function showregist() {
      location.href = "<?=BASE_URL?>/Regist";
    }

    function listcheck() {
      location.href = "<?=BASE_URL?>/Reglist";
    }

    function backto(){
      history.back();
    }
  </script>
</body>
</html>