



<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="styles.css"> -->

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Home Page</title>
  </head>
  <body>

    <style media="screen">
    .card-2 {

        margin-bottom: 10px; /* Added */
        transition: all 0.3s ease 0.1s;
      }
      .card-2:hover{
          transform: scale(0.9);
          border-bottom: 1px solid rgb(112, 124, 110);
      }
      .card-body{
        font-size: 40px;
        position: absolute;
        text-align: center;
        left: 50px;
        top: 50px;
        margin: -25px 0 0 -25px;
      }




    </style>



<!-- Your profile styles -->

    <div class="container-fluid my-2 h-25 " id="parent-2">

      <div class="card bg-dark h-100">

        <div class="card-title text-justify mx-2 my-2 text-light">
          Hello, {{Auth::user()->name}}
        </div>
        <div class="card-subtitle text-muted  mx-2">
          Email, {{Auth::user()->email}}
        </div>

        <div class="card-body text-justify mx-2 my-4 text-white">
          Your daily tasks and todos are managed below.
        </div>

      </div>

    </div>


    <div class="container-fluid" id="parent-1" tabindex="-1">
      <!-- Content here -->

    <div class="row mx-auto py-5" >
      <div class="card-deck  p-3 mb-2 rounded col-xl-12 col-xg-10 col-md-10 col-sm-10 mx-auto text-monospace position-relative" style="height: 650px">



      <div class="card  card-2 text-white bg-danger danger-card" tabindex="-1">
        <div class="card-body float-none text-center text-">

          <a href="#" id="your-day" class="card-link text-white">Your Day</a>

          </div>

        </div>
        <div class="card card-2 text-white bg-info info-card" >
          <div class="card-body">

            <a href="#" id='tasks' class="card-link text-white">Tasks</a>

          </div>
        </div>
        <!-- card number 3 -->
        <div class="card card-2 text-white bg-warning list-card" >
          <div class="card-body">

            <a href="#" id="custom-list" class="card-link text-white">New List</a>

          </div>
        </div>
        <!-- end of card 3 -->
        </div>
      </div>


    </div>
    </div>


  </body>

<script type="text/javascript">


  $(".danger-card").hover(function(){
    $("#parent-1").addClass('bg-danger');
    $("#parent-1").removeClass('bg-info');
    $("#parent-1").removeClass('bg-warning');


  });
  $(".info-card").hover(function(){
    $("#parent-1").addClass('bg-info');
    $("#parent-1").removeClass('bg-danger');
    $("#parent-1").removeClass('bg-warning');

  });
  $(".list-card").hover(function(){
    $("#parent-1").addClass('bg-warning');
    $("#parent-1").removeClass('bg-info');
    $("#parent-1").removeClass('bg-danger');

  });


  $("#custom-list").click(function(event){
    event.preventDefault();
    $("#parent-2").remove();


    $(".row").remove();
    $("#parent-1").append("hello");








  });

  $("#tasks").click(function(event){
    event.preventDefault();
    $("#parent-2").remove();


    $(".row").remove();
    $("#parent-1").append("hello");

});


    $("#your-day").click(function(event){
      event.preventDefault();
      $("#parent-2").remove();


      $(".row").remove();
      $("#parent-1").append("hello");
});


</script>

</html>
