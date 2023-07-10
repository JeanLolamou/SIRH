@extends('../templates/default')
         @section('contenu')
         <div class="row">
            <div id="content" class="col-sm-12 full">
            
                <div class="row box-error">
                
                    <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class="text-center">
                        <h1>404</h1>
                        <h2>Oops! Bad request ...</h2>
                        <p>The request cannot be fulfilled due to bad syntax.</p>
                        <a href="javascript: history.go(-1)">
                            <button class="btn btn-default"><span class="fa fa-chevron-left"> Go Back</span></button>
                        </a>
                        <a href="page-login.html">
                            <button class="btn btn-default"><span class="fa fa-lock"> Login</span></button>
                        </a>
                        <a href="#">
                            <button class="btn btn-default"><span class="fa fa-envelope"> Contact Admin</span></button> 
                        </a>
                    </div>
                    
                    </div><!--/col-->
                
                </div><!--/row-->
        
            </div><!--/content-->   
                
        </div><!--/row-->
      
         @stop