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

         #account {
          margin-top: 180px;
        }
        #account h3{
          margin-left: 25%;
        }

        .sub {
          padding: 7px; 
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
    

      <div id="account">
        <h3>Account Overview</h3>
        <hr>
        <div class="card">
          <div class="card-block" id="personal">
            <h5>Personal Info</h5>
          </div>
        </div>

        <div class="card">
          <div class="card-block" id="billing">
            <h5>Billing Info</h5>
            <p id="bNone">No billing info availabe for this month</p>
          </div>
        </div>

            <form action="<?php echo base_url()?>account/updatePreference" method="POST">

        <div class="card">
          <div class="card-block" id="preference">
            <h5>Preferences</h5>

          </div>
        </div>
</form>

      <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3>Update Your profile info</h3>
      </div>
      <div class="modal-body">
        <form class="form-horizontal col-sm-12" action="<?php echo base_url() ?>users/update" method="POST">
          <div class="form-group"><label>Name</label><input class="form-control required" placeholder="Your name" data-placement="top" data-trigger="manual" name="name" type="text"></div>
          <div class="form-group"><label>Address 1</label><input class="form-control required" placeholder="Address 1" data-placement="top" data-trigger="manual" name="address1" type="text"></div>
          <div class="form-group"><label>Address 2</label><input class="form-control required" placeholder="Address 2" data-placement="top" data-trigger="manual" name="address2" type="text"></div>
          <div class="form-group"><label>City</label><input class="form-control required" placeholder="City" data-placement="top" data-trigger="manual" name="city" type="text"></div> 
          <div class="form-group"><label>State</label><input class="form-control required" placeholder="State" data-placement="top" data-trigger="manual" name="state" type="text"></div> 
          <div class="form-group"><label>Zip</label><input class="form-control email" placeholder="Zip" data-placement="top" data-trigger="manual" name="zip" type="text"></div>
          <div class="form-group"><label>Email</label><input class="form-control phone" placeholder="example@email.com" data-placement="top" name="email" data-trigger="manual" type="text"></div>
          <div class="form-group"><button type="submit" class="btn btn-success pull-right">Update</button> </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
      </div>
    </div>
  </div>
</div>








      <!-- Latest compiled and minified JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    

      <script>

      $.ajax({
        url: '<?php echo base_url() ?>account/getUserInfo', 
        type: 'POST', 
        dataType: 'JSON', 
        success: function(data) {

          $.each(data, function(index, values) {
            
              $('#personal').append('<p>'+values.name_first+' '+values.name_last+'&emsp;&emsp;&emsp;'+values.email+'</p>'+
                                    '<p>'+values.address1+' '+values.address2+'</p>'+
                                    '<p>'+values.city+' '+values.state+' '+values.zip+'</p>'+
                                    '<p><a href="#myModal" data-toggle="modal" id="openBtn">Update my info</a></p>'); 
         
          });
        }
      }); 

      $('#openBtn').click(function(){
        $('#myModal').modal({show:true})
      });


      $.ajax({
        url: '<?php echo base_url() ?>account/getBillingInfo', 
        type: 'POST', 
        dataType: 'JSON', 
        success: function(data) {

          $('#billing').append('<p>This Month<p>'); 
          $.each(data, function(index, values) {
              $('#bNone').remove(); 
              $('#billing').append('<p><span style="text-align: right;">$'+values.charge+'&ensp;&ensp;-&ensp;&ensp;</span>'+values.title+'</p>'); 
         
          });
        }
      });

      $.ajax({
          url: '<?php echo base_url() ?>account/getSubjects', 
          type: 'POST', 
          dataType: 'JSON', 
          success: function(data) {

              
              $.each(data, function(index, value) {

                  $('#preference').append('<div class="sub"><input id="input'+value.id+'" type="checkbox" name="subject[]" value="'+value.id+'" > '+value.subject+'</div>');

              }); 

              $('#preference').append('<button type="submit" class="btn btn-primary pref">Save Preferences</button>'); 

              <?php if(isset($pref)): ?>
                $.each(<?= $pref ?>, function(indexOne, valueOne){

                  $(document).find('#input'+valueOne.id).prop('checked', true);
                }); 
              <?php endif; ?>

          },
          error: function() {

          }
      });  


    $(document).on('click', '.pref', function(){


    }); 


      </script>

    </body>
</html>