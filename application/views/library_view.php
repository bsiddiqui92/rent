<!doctype html>
<html class="no-js" lang="">
    <head>
    <style>
        #bookList {
            width: 80%;
            margin: 0 auto;
            height: 450px;
            padding: 20px;
            margin-top: 160px;
        }

        #booksTable {
          background: #fff;
        }

        tr:hover {
            background-color: #f5f5f5; 
        }

        #library {
          margin-top: 180px;
        }



    </style>
            <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo base_url()?>/css/style.css">

        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

<!--         <link rel="apple-touch-icon" href="apple-touch-icon.png">
 -->        <!-- Place favicon.ico in the root directory -->
<!-- 
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script> -->
    </head>
    <body>

        <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="<?php echo base_url() ?>">Rent a Book</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="<?php echo base_url() ?>"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="<?php echo base_url('library') ?>">My Library</a>
                    </li>
                    <li class="page-scroll">
                        <a href="<?php echo base_url('account') ?>">Account</a>
                    </li>
                    <li class="page-scroll">
                        <a href="<?php echo base_url() ?>login/logout">Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    

  <div id="library">
  <div></div>
  </div>




    <!-- success message -->

      <div class='b'></div>
        <div class='bb'></div>
          <button id='go'>
          GO
          </button>
         <div class='message'>
          <div class='check'>
            &#10004;
        </div>
        <p>
        Success
      </p>
            <p>
        The book has been added to your library!
      </p>
      <button id='ok'>
        GOT IT
      </button>
</div>
    <!--end success message -->






      <!-- Latest compiled and minified JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    

      <script>

      $.ajax({
        url: '<?php echo base_url() ?>library/getUserBooks', 
        type: 'POST', 
        dataType: 'JSON', 
        success: function(data) {

          if(data == 'null')
          { 
             $('#library').append('<p style="text-align: center;" id="lNone">You currently do not have books in your library</p>');
          }
          else {
          $.each(data, function(index, values) {
           
            $('#library').append( '<div id="'+values.id+'" class="card">'+
                                  '   <div class="card-block">'+
                                  '     <h4 class="card-title">'+values.title+'</h4>'+
                                  '     <p class="card-text"><b>ISBN:</b> '+values.isbn+'</p>'+
                                  '     <p class="card-text"><b>Author:</b> '+values.author+'</p>'+
                                  '     <a  data-id="'+values.id+'" class="btn btn-primary return">Return</a>'+
                                  '   </div>'+
                                  '</div>'); 
          });

         }
        }
      });

      $(document).on('click', '.return', function() {
        //return book. carry out required function
        var id = $(this).data('id'); 
        $.ajax({
            url: '<?php echo base_url() ?>rent/giveBack', 
            type: 'POST', 
            dataType: 'JSON', 
            data: {id: id}, 
            success: function(data) {

                $('#'+id).remove(); 
                if($('#library .card').html() == undefined) {
                  $('#library').append('<p style="text-align: center;" id="lNone">You currently do not have books in your library</p>');
 
                } else {
                  $('#lNone').remove(); 

                }

            }, 
            error: function() {

            }
        });
      });


      </script>

    </body>
</html>