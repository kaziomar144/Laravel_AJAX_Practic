<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>post </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
 <section>
     <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h2 class="text-center">Infinite Scroll Pagination</h2>
             </div>
             <div class="col-md-12" id="post-data">
                 @include('data')
             </div>
         </div>
     </div>
 </section>
    <div class="ajax-load text-center" style="display: none">
        <p><img src="{{asset('img')}}/loader.gif" alt="" width="50px">
            Loading More Post
        </p>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
        function loadMoreData(page){
            $.ajax({
                type: "get",
                url: "?page="+page ,
                beforeSend: function(){
                    $(".ajax-load").show();
                }
            })
            .done(function(data){
                if(data.html == " "){
                  $('.ajax-load').html('No more record found');
                  return;
                }
                $('.ajax-load').hide();
                $('#post-data').append(data.html);
                console.log(data.html);

            })
            .fail(function(jqXHR,ajaxOptions,thrownError){
                alert("Server not responding");
            });
        }
        let page = 1;
        $(window).scroll(function () {  
            if($(window).scrollTop() + $(window).height() >= $(document).height()){
                page++;
                loadMoreData(page);
            };
        });
    </script>
</body>
</html>