


<!DOCTYPE html>
<html lang="en">

 @include('templates/partials/_head')

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
    
       @yield('contenu')
          
    </div>
    <!-- end: Content -->
    <br><br><br>
    
    @include('templates/partials/_footer_ckeditor')
    
  
</body>
</html>