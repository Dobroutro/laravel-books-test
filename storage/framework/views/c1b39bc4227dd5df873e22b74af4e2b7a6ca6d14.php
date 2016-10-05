<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Error 404</title>



    <style type="text/css">
      a,
      a:focus,
      a:hover {
        color: #fff;
      }

      .btn-default,
      .btn-default:hover,
      .btn-default:focus {
        color: #333;
        text-shadow: none;
        background-color: #fff;
        border: 1px solid #fff;
      }

      html,
      body {
        height: 90%;
        background-color: #333;
      }
      body {
        color: #fff;
        text-align: center;
        text-shadow: 0 1px 3px rgba(0,0,0,.5);
      }

      .site-wrapper {
        display: table;
        width: 100%;
        height: 90%; /* For at least Firefox */
        min-height: 90%;
        -webkit-box-shadow: inset 0 0 100px rgba(0,0,0,.5);
                box-shadow: inset 0 0 100px rgba(0,0,0,.5);
      }
      .site-wrapper-inner {
        display: table-cell;
        vertical-align: top;
      }
      .cover-container {
        margin-right: auto;
        margin-left: auto;
      }
      .btn-lg {
        padding: 10px 20px;
        font-weight: bold;
        text-decoration: none;
      }

    </style>
  </head>

  <body>

    <div class="site-wrapper">
      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div>
            <h1 >Page not found</h1>
            <p>
              <a href="<?php echo e(url('/home')); ?>" class="btn btn-lg btn-default">Home</a>
            </p>
          </div>

        </div>

      </div>

    </div>


  </body>
</html>
