<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="<?=COMMON_ASSET_URL?>/jquery-ui/jquery-ui.min.css">
  <link rel="stylesheet" href="<?=COMMON_ASSET_URL?>/jqgrid/css/ui.jqgrid.min.css">
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"> 


  <script type="text/javascript" src="<?=COMMON_ASSET_URL?>/js/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="<?=COMMON_ASSET_URL?>/jqgrid/jquery.jqgrid.min.js"></script>
  <script type="text/javascript" src="<?=COMMON_ASSET_URL?>/js/common.js"></script>
  
  <title>명함 리스트</title>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Foundation&display=swap');

    body {
      background-image: url("<?=ASSET_URL?>/images/nightsky.png");
    }

    .title {
      font-family: 'Edu NSW ACT Foundation', cursive;
      margin-top: 90px;
      text-align: center;
      color: silver;
    }

    .modalpop {
      position: fixed;
      top: -15%;
      left: 22%;
      border: solid 1px;
      border-radius: 5px;
      text-align: center;
      background-color: white;
      height: 200px;
      width: 500px;
      display: none;
      background: linear-gradient(45deg, white 60%, silver);
    }

    .udtpop {
      position: fixed;
      top: -100%;
      left: 16%;
      border: solid 1px;
      border-radius: 5px;
      text-align: center;
      background-color: white;
      height: 400px;
      width: 700px;
      display: none;
    }

    .contents {
      position: static;
      margin-left: 460px;
      margin-top: 250px;
    }
    
    th, tr {
      width: 220px;
      height: 50px;
      text-align: center;
      border-bottom: 1px solid;
    }

    #bktxt{
      font-size: 30px;
    }

    #x {
      font-size: 30px;
      position: absolute;
      right: 2px;
      top: -43px;
    }

    #closeudt {
      font-size: 30px;
      position: absolute;
      right: 2px;
      top: -43px;
    }

    #updbt, #delbtn {
      margin-top: 40px;
      font-size: larger;
    }
    input {
      margin-top: 13px;
      font-size: 22px;
      width: 600px;
    }

    button:hover {
      background: palevioletred;
      color: white;
    }

    div[class="backtxt"] :hover {
      color: white;
    }

    #brname {
      font-size: larger;
    }


  </style>
</head>
<body>
  <div class="title">
    
  </div>
  <div class="contents" style="position: relative; margin-left: 350px;">
    <table id="gridlist"></table>
    <div class="modalpop" style="position:absolute;">
      <p style="font-size: 30px; margin-top:55px;">작업을 선택하세요</p>
      <p id="x" style="cursor: pointer;" onclick="xbtn()">x</p>
      <button id="updbt" onclick="updatelist()">수정</button>
      <button id="delbtn" onclick="dellist()">삭제</button>
    </div>
    <div class="udtpop" style="position: absolute; background-color: rgba(213 218 247);">
      <h1>원하는 항목을 수정하세요</h1>
      <p id="closeudt" style="cursor: pointer;" onclick="udtclose()">x</p>
      <input id="nameid" type="text" placeholder="이름" style="margin-top: 30px;" readonly>
      <input id="bcid" type="text" placeholder="회사명">
      <input id="cellid" type="text" placeholder="휴대폰 번호">
      <input id="bcnumid" type="text" placeholder="회사 번호">
      <input id="bclcid" type="text" placeholder="회사 위치">
      <br>
      <button onclick="Cofirmudt()" style="margin-top: 20px;">완료</button>
    </div>
  </div>
  <div class="backtxt">
      <p id="bktxt" style="position: absolute; right: 100px; bottom: 50px; cursor: pointer;" 
      onclick="backto();"><-이전화면으로</p>
  </div>


  <script type="text/javascript">
    var userinfo = [];
    var colNames = ['이름', '회사명', '휴대폰 번호', '회사 위치', '회사 번호'];
    var rdata = []; 

    var nick = '<?=$nickname?>';

    $('div[class="title"]').html("<strong style='font-size: 40px; font-family: 굴림;'>" + nick + "'s Business Card" +"</strong>");

    var url = '<?=BASE_URL?>/Reglist/infouser';

      reqAjax(url,
      {
        
      },
      function(res){
        if(res.return_code == 0){
          var i;

          for(i = 0; i < res.info.length; i++){
            userinfo.push(
              {
                name: res.info[i].name,
                bcname: res.info[i].bcname,
                cellphone: res.info[i].cellphone,
                officelocation: res.info[i].officelocation,
                officenumber: res.info[i].officenumber
              }
            );
          }

          for(i in userinfo){
            $("#gridlist").jqGrid('addRowData', i+1, userinfo[i]);
          }
        }
        else
        {
          alert(res.msg);
        }
      },
      function(err){
        alert('오류발생.');
      });


    $("#gridlist").jqGrid({
            height: $('#contents').height(),
            width: "1200px",
            colNames: colNames,
            colModel: [
              {name: 'name', align: 'center'},
              {name: 'bcname', align: 'center'},
              {name: 'cellphone', align: 'center'},
              {name: 'officelocation', align: 'center'},
              {name: 'officenumber', align: 'center'}
          ],
          onSelectRow: function(rowid, status, e){
            var selrow = $(this).jqGrid('getGridParam','selrow');
            //rdata에 선택된 row의 값들을 삽입.
            rdata = $("#gridlist").jqGrid('getRowData', selrow);
            //selrow값이 정상적으로 받아졌으면 모달창 실행.
            if(selrow){
              $(".modalpop").fadeIn();
            }
          }
        });

        function dellist() {
          // 현재 그리드의 row값
          var curbcname = rdata.bcname;
          var curbcnum = rdata.officenumber;
          var curbclc = rdata.officelocation;

          var url = '<?=BASE_URL?>/Reglist/deleteinfo';
          

          reqAjax(url,
          {
            bcname: curbcname,
            officenumber: curbcnum,
            officelocation: curbclc  
          },
          function(res) 
          {
            if(res.return_code == 0){
              alert(res.msg);
              location.reload();
            }
            else
            {
              alert(res.msg);
            }
          },
          function(err)
          {
            alert('error');
          });
        }

        //수정 모달창에 현재 선택된 row값을 가져옴.
        function updatelist() {
          var gname = $('#nameid').val(rdata.name);
          var gbcname = $('#bcid').val(rdata.bcname);
          var gcell = $('#cellid').val(rdata.cellphone);
          var gbcnum = $('#bcnumid').val(rdata.officenumber);
          var gbclc = $('#bclcid').val(rdata.officelocation);

          $(".udtpop").fadeIn();
        }

        function Cofirmudt() {
          
          var cname = $('#nameid').val();
          var cbcname = $('#bcid').val();
          var ccell = $('#cellid').val();
          var cbcnum = $('#bcnumid').val();
          var cbclc = $('#bclcid').val();
          var url = '<?=BASE_URL?>/Reglist/updateinfo';

          //현재 그리드의 row값. 컨트롤러에서 수정을 원하는 row와 비교하여 수정하기위해 선언됨.(PK)
          var curbcname = rdata.bcname;
          var curbcnum = rdata.officenumber;
          var curbclc = rdata.officelocation;

          reqAjax(url,
          {
            name: cname,
            bcname: cbcname,
            cellphone: ccell,
            officenumber: cbcnum,
            officelocation: cbclc,
            curbcname: curbcname,
            curbcnum: curbcnum,
            curbclc: curbclc
          },
          function(res) {
            if(res.return_code == 0){
              alert(res.msg);
              location.reload();
            }
            else {
              alert('오류 발생.');
            }
          },
          function(err) {
            alert('error');
          });
        }

    function backto() {
      history.back();
    }

    function udtclose() {
      $(".udtpop").fadeOut();
    }

    function xbtn() {
      $(".modalpop").fadeOut();
    }

    $(document).ready(function() {
      
		});
  </script>
  
</body>
</html>