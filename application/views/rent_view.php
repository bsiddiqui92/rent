<!doctype html>
<html class="no-js" lang="">
    <head>
    <style>
        #bookList {
           width: 90%;
            margin: 0 auto;
            padding: 20px;
        }

        #books {
           width: 90%;
            margin: 0 auto;
            padding: 20px;
        }

        .rPref {
          position: relative;
        }

        

        #booksTable {
          display: none;
          background: #fff;
        }

        tr:hover {
            background-color: #f5f5f5; 
        }

        #SBox {
          margin-left: 18%; 
        
        }

        #pref {
           width: 80%;
            margin: 60px 43%;
        }

        .tPref {
          color: black;
          font-weight: 400;
          font-size: 24px;
        }

        
 .sHeading {
         font-family: Gill Sans, Verdana;
        font-size: 11px;
         line-height: 14px;
         text-transform: uppercase;
         letter-spacing: 2px;
         font-weight: bold;
         margin-top: 12%; 
         margin-left: 21%;

 
     } 
        
  .lHeading {
     font-family: times, Times New Roman, times-roman, georgia, serif;
      color: #444;
      margin: 0;
       padding: 0px 0px 6px 0px;
      font-size: 51px;
      line-height: 44px;
      letter-spacing: -2px;
      font-weight: bold;
      margin-left: 22%;
    }




    </style>
            <!-- Latest compiled and minified CSS -->
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

    <?php echo print_r($_SESSION); ?>

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
    

   <div class="row">
      <h3 class="sHeading">Book Rental</h3>
      <h3 class="lHeading">Search for you book</h3>
   </div>
      
  <div class="row">
     <div class="container">
        <div class="search-box" id="SBox">
           <input id="search" placeholder="Search for Books by ISBN, Author, Title...." type="text">
          <div class="also search-link"  id="searchclick">Search</div>
      </div>
    </div>
  </div>

  <div class="row">
    <div id="pref">
    </div>
  </div>

    <div id="books" class="row">
    </div>

    <div id="bookList" class="row">

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

      

            // $.ajax({

            //     url: '<?php echo base_url("rent/getBooks") ?>', 
            //     type: 'POST', 
            //     dataType: 'JSON', 
            //     success: function(data) {

            //         $.each(data, function(index, value){
                       
            //            $('#booksTable tbody').append('<tr>'+
            //                                          '  <th scope="row">'+value.id+
            //                                          '  <td>'+value.isbn+'</td>'+
            //                                          '  <td>'+value.title+'</td>'+
            //                                          '  <td>'+value.author+'</td>'+
            //                                          '  <td>'+value.price+'</td>'+
            //                                          '  <td>'+value.quantity+'</td>'+
            //                                          '  <td><button type="button" '+
            //                                          '              class="rent btn btn-warning"'+
            //                                          '              data-price="'+value.price+'"'+
            //                                          '              id="'+value.id+'">Rent'+
            //                                          '      </button>'+
            //                                          '  </td></tr>'); 
   

            //         });

            //     },
            //     error: function(data) {

            //     }
            // });

            // $(document).on('change', 'input:checkbox[name="myPref"]', function() {

                  
            // });

            $.ajax({
              url: '<?php echo base_url() ?>rent/getBooksByPreference', 
              type: 'POST', 
              dataType: 'JSON', 
              success: function(data) {
                $('#books').append('<h2 class="tPref">Based on your preferences...</h2>'); 
                $.each(data, function(index, value) {
                  $('#books').append('<div class="cardTwo col-lg-3"><b><p class="truncate">'+value.title+'</p></b>'+
                                     '<p>'+value.isbn+'</p>'+
                                     '<p>'+value.author+'</p>'+
                                     '<p>$'+value.price+'</p><br />'+
                                     '<button type="button" '+
                                     '        class="rent btn btn-warning rPref"'+
                                     '        data-price="'+value.price+'"'+
                                     '        id="'+value.id+'">Rent'+
                                     '      </button></div>'); 
                }); 
              }, 
              error: function() {

              }
            });  

            $('#searchclick').on('click', function(){

                var term = $('#search').val();
                $.ajax({
                    url: '<?php echo base_url() ?>rent/search', 
                    type: 'POST', 
                    data: {search: term}, 
                    dataType: 'JSON', 
                    success: function(data) {

                      if(data == 'false') {
                        $('#booksTable tbody').empty();
                        $('#bookList p').empty(); 
                        $('#booksTable').hide();  
                          $('#bookList').append('<p style="color:red;">No Results found</p>');
                          $('#bookList').show(); 
                      } else {
                          $('#books').hide(); 
                            $('#bookList p').empty(); 
                          $('#booksTable tbody').empty(); 
                          $.each(data, function(index, value){

                            if(value.quantity !== '0' && value.quantity > 0)
                            {
                           
                              $('#bookList').append('<div class="cardTwo col-lg-3"><b><p class="truncate">'+value.title+'</p></b>'+
                                                             '<p>'+value.isbn+'</p>'+
                                                             '<p>'+value.author+'</p>'+
                                                             '<p>$'+value.price+'</p><br />'+
                                                             '<button type="button" '+
                                                             '        class="rent btn btn-warning rPref"'+
                                                             '        data-price="'+value.price+'"'+
                                                             '        id="'+value.id+'">Rent'+
                                                             '      </button></div>'); 
                            }
                          });

                                               }


                },
                    error: function() {
                      console.log('shittier'); 
                    }
                });
            });

            $(document).on('click', '.rent', function(){
                if(confirm('Are you sure you want to rent this book?')) {
                  go(50);

                  var book = $(this).attr('id');
                  var price = $(this).data('price');  
                  $.ajax({

                    url: '<?php echo base_url('rent') ?>/checkout', 
                    data: {book: book, price: price}, 
                    type: 'POST', 
                    dataType: 'JSON', 
                    success: function(data) {

                      $('#go').click(function(){go(50)});


                    },
                    error: function() {

                    }
                  }); 
                }
            }); 

            $('#ok').on('click', function(){
                location.reload(); 
            });
            // $('#ok').click(function(){go(500)});

            //setTimeout(function(){go(50)},700);
            //setTimeout(function(){go(500)},2000);

            function go(nr) {
              $('.bb').fadeToggle(200);
              $('.message').toggleClass('comein');
              $('.check').toggleClass('scaledown');
              $('#go').fadeToggle(nr);
            }

              </script>

    </body>
</html>
