<!DOCTYPE html>
<html lang="fr">
    <head>
        <script src="../../resources/css/bootstrap.bundle.min.js" defer></script>
		<link href="../../resources/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="../../resources/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
		<script src="../../resources/css/jquery-3.3.1.slim.min.js" defer></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    </head>
    <body>
        <form action="">
            <div class="input-group mb-4 border rounded-pill p-1">
                <div class="input-group-prepend border-0">
                <button id="button-addon4" type="button" class="btn btn-link text-info"><i class="fa fa-search"></i></button>
                </div>
                <input type="search" placeholder="What're you searching for?" aria-describedby="button-addon4" class="form-control bg-none border-0">
            </div>
        </form>
    </body>
<style>
    /*
*
* ==========================================
* CUSTOM UTIL CLASSES
* ==========================================
*
*/

.form-control:focus {
  box-shadow: none;
}

.form-control-underlined {
  border-width: 0;
  border-bottom-width: 1px;
  border-radius: 0;
  padding-left: 0;
}

/*
*
* ==========================================
* FOR DEMO PURPOSE
* ==========================================
*
*/

body {
  background: #ffd89b;
  background: -webkit-linear-gradient(to right, #ffd89b, #19547b);
  background: linear-gradient(to right, #ffd89b, #19547b);
  min-height: 100vh;
}

.form-control::placeholder {
  font-size: 0.95rem;
  color: #aaa;
  font-style: italic;
}
</style>
</html>