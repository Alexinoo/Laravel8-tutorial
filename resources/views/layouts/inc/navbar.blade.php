<nav class="navbar navbar-expand-lg navbar-light bg-info text-white">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/')}}">Coding Pro</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ url('/')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('send-email')}}">Send Email</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Topics
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{ url('books')}}">AJAX CRUD</a></li>        
            <li><a class="dropdown-item" href="{{ url('members')}}">AJAX CRUD II  (Yajra datatabe)</a></li>        
            <li><a class="dropdown-item" href="{{ url('post')}}">Posts</a></li>        
            <li><a class="dropdown-item" href="{{ url('comments')}}">Comments</a></li>        
            <li><a class="dropdown-item" href="{{ url('students')}}">Students</a></li>        
            <li><a class="dropdown-item" href="{{ url('phones')}}">Phone</a></li>        
            <li><a class="dropdown-item" href="{{ url('upload')}}">File Upload</a></li>        
            <li><a class="dropdown-item" href="{{ url('employees')}}">Employees (Export Excel/Csv)</a></li>        
            <li><a class="dropdown-item" href="{{ url('resize-image')}}">Resize Image</a></li>        
            <li><a class="dropdown-item" href="{{ url('dropzone')}}">DropZone</a></li>        
            <li><a class="dropdown-item" href="{{ url('gallery')}}">LazyLoad</a></li>        
            <li><a class="dropdown-item" href="{{ url('editor')}}">WYSWIG EDITOR</a></li>        
            <li><a class="dropdown-item" href="{{ url('search-product')}}">Autocomplete Search</a></li>        
            <li><a class="dropdown-item" href="{{ url('form')}}">Multistep Form</a></li>

            <li><a class="dropdown-item" href="{{ route('all.workers')}}">Image CRUD (Toastr / sweet-alert)</a></li>   
               <li><a class="dropdown-item" href="{{ route('all.movies')}}">Infinite Scroll</a></li>         
          </ul>
        </li>

          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Charts
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            
               <li><a class="dropdown-item" href="{{ route('high.chart')}}">High Charts</a></li>      
               <li><a class="dropdown-item" href="{{ route('bar.chart')}}">Bar Charts</a></li>     
            
          </ul>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="{{ url('contact')}}">Contact Us</a>
        </li>   
      </ul>
    
    </div>
  </div>
</nav>