


<!DOCTYPE html>
<html lang="en">

 @include('templates/partials/_head')
<style type="text/css">
  <style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
</style>
<body>
  <!-- start: Header -->
  @include('templates/partials/_menu_haut')
  <!-- end: Header -->
  
  <div class="container-fluid content">
  
    <div class="row">
        
      <!-- start: Main Menu -->
      @include('templates/partials/_menu_principale')
      <!-- end: Main Menu -->
    
    <!-- start: Content -->
    <div class="main">
    <div class="loader"></div>

    @if(session()->has('success'))
      <div class="row">
     <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Succés!</strong> {{session()->get('success')}}.
              </div>
              </div>
              @endif

       @if(session()->has('error'))
      <div class="row">
     <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Attention!</strong> {{session()->get('error')}}.
              </div>
              </div>
              @endif
       @yield('contenu')
          
    </div>
    <!-- end: Content -->
    <br><br><br>
    
    @include('templates/partials/_footer')
    
  
</body>
</html>