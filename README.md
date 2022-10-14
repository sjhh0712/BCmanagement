# 명함관리시스템

> xampp와 php 코드이그나이터를 사용한 명함 관리 시스템

+ Model
+ Controller
+ View


  - < Model >

     Model에서는 sql문을 실행시키기 위한 기본적인 함수들이 들어가있다.
    
  - < Controller >
     
     Controller에서는 클라이언트의 요청을 처리하는 함수들이 들어가있다.
     
  - < View >

     View는 기본적으로 HTML과 JavaScript,jquery로 이루어진 파일들의 집합으로 브라우저 부분을 표시한다.
  ----------------------------------------------------------------------------------------------------------------------
     
    
  ### 로그인(Log In)
    ![php1](https://user-images.githubusercontent.com/49848867/187021994-6482195e-2d23-45cc-ac42-1e5147c94422.png)
    
  - 로그인 성공 (ID정보를 세션에 저장한다)
    ![loginok](https://user-images.githubusercontent.com/49848867/187021961-e7cc9d8a-e1a9-4fce-af7b-2bb775457ab3.png)
  
  ### 회원가입(Join)
    ![phpjoin](https://user-images.githubusercontent.com/49848867/187021957-acb967ab-8624-4315-b436-3e3d1f2da3f7.png)
    
  ### 메인 홈(Mainhome)
  ▶ 명함을 등록하거나 등록된 리스트를 볼 수 있다.
    ![phpmain](https://user-images.githubusercontent.com/49848867/187022021-85c80c20-9711-4aed-b803-260d85a2f26e.png)
  <br></br>
  - <p>명함 등록(Regist)</p>
  ![regist](https://user-images.githubusercontent.com/49848867/187022032-55324b64-3c16-4e2b-acff-5e02b1fabb7c.png)
    
  - <p>명함 리스트 보기(RegList)</p>
   >jq그리드를 통해 <명함 등록>에서 등록한 자신의 명함을 확인할 수 있다.
   
  ![listshow](https://user-images.githubusercontent.com/49848867/187022060-fa54bbc6-199f-4ed5-aae6-f7efece030ac.png)
    
  - <p>리스트 클릭 시</p>
   >수정 및 삭제하고자 하는 리스트를 마우스 클릭시 모달창이 나타난다.
    
  ![listclick](https://user-images.githubusercontent.com/49848867/187022077-4e0870f0-55e6-4c61-94f0-a39d8b4307e6.png)
  
  
  - <p>명함 수정 및 삭제</p>
   >수정 및 삭제 작업은 AJAX를 통한 비동기 방식으로 이루어진다.
    
    + 수정
![updatelist](https://user-images.githubusercontent.com/49848867/187022089-73b77a09-1bf8-4f4a-bd1f-1f1af19152d5.png)
    + 삭제
![deletelist](https://user-images.githubusercontent.com/49848867/187022130-c87e2572-e3ff-4be6-80ec-05ae93362567.png)
  
