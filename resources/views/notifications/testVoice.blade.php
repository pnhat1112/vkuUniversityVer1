<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="">

    <title>Document</title>
    <style type="text/css">
        .voicebox {
          display: none; /* Hidden by default */
          position: fixed; /* Stay in place */
          z-index: 1; /* Sit on top */
          padding-top: 100px; /* Location of the box */
          left: 0;
          top: 0;
          width: 100%; /* Full width */
          height: 100%; /* Full height */
          overflow: auto; /* Enable scroll if needed */
          background-color: rgb(0,0,0); /* Fallback color */
          background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
      }

      .modal-content {
          background-color: #fefefe;
          margin: auto;
          padding: 20px;
          border: 1px solid #888;
          width: 50%;
      }
      .modal-content img {
        width: 10%;
    }

    .close {
      color: #aaaaaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
  }

  .close:hover,
  .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
  }
</style>
</head>
<body>
    <!-- Input area -->
    <form id="searchForm" method="POST" action="search">
        {{csrf_field()}}
    <div class="search">
        <label for="Speech Recognition">Speech Recognition</label>
        <input type="text" class="input-field" id="speechToText" placeholder="Speak Something" name="txtSearch">
        <i class="fa fa-microphone"></i>
        <button type="button" id="btnVoice" onclick="record()" >Voice</button></br>
        <button class="btnSearch" id="btnSeach" name="btnSeach" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        <!-- The Modal -->
    </div>
    </form>
    <h3 id="test"></h3>
    <div id="voicebox" class="voicebox">
      <div class="modal-content">
        <span class="close">&times;</span>
        <div style="text-align: center;">
            <h3>Say something...</h3>
            <img src="{{asset('./public/front-end/image/voice.gif')}}">
        </div>
    </div>

</div>
<script type="text/javascript" src="{{asset('./public/front-end/js/voice.js')}}"></script>
<script src="{{ asset('./public/back-end/admin/assets/js/core/jquery.3.2.1.min.js')}}"></script>
</body>

</html>