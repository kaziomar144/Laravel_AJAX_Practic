<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Multi Step Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <style>
        section{
            padding-top: 100px;
        }
        .form-section{
            padding-left: 15px;
            display: none;
        }
        .form-section.current{
            display: inherit;
        }
        .parsley-errors-list{
            margin: 2px 0 3px;
            padding: 0;
            list-style-type: none;
            color: red;
        }
    </style>

</head>
<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header text-white bg-info">
                            <h5>Multi Stap Form</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{route('submit.form')}}" method="POST" class="contact-form">
                                @csrf
                                <div class="form-section">
                                    <lable>First Name</lable>
                                    <input type="text" name="firstname" class="form-control" required>

                                    <lable>Last Name</lable>
                                    <input type="text" name="lastname" class="form-control" required>
                                </div>

                                <div class="form-section">
                                    <lable>Email</lable>
                                    <input type="email" name="email" class="form-control" required>

                                    <lable>Phone</lable>
                                    <input type="text" name="phone" class="form-control" required>
                                </div>
                                <div class="form-section">
                                    <lable>Message</lable>
                                    <textarea name="msg" class="form-control" required></textarea>
                                </div>
                                <div class="form-navigation mt-2">
                                    <button type="button" class="next btn btn-info float-end">Next</button>
                                    <button  type="button" class="previous btn btn-info float-start">Previous</button>
                                    <button type="submit" class="mr-2 btn btn-success float-end">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(function(){
            let $sections = $('.form-section');

            function navigateTo(index){
                $sections.removeClass('current').eq(index).addClass('current');
                $('form-navigation .previous').toggle(index>0);

                let atTheEnd = index >= $sections.length - 1;
                $('.form-navigation .next').toggle(!atTheEnd);
                $('.form-navigation [type=submit]').toggle(atTheEnd);
            }
            function curIndex(){
                return $sections.index($sections.filter('.current'));
            }
            $('form-navigation .previous').click(function () { 
                navigateTo(curIndex()-1);
                
            });

            $('.form-navigation .next').click(function(){
                $('.contact-form').parsley().whenValidate({
                    group: 'block-' + curIndex()
                }).done(function(){
                    navigateTo(curIndex()+1);
                });
            });
            $sections.each(function(index,section){
                $(section).find(':input').attr('data-parsley-group', 'block-'+index);
            });
            navigateTo(0);
        });
    </script>
</body>
</html>