
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<nav class="navbar navbar-expand-lg navbar-light bg-dark ">
    <a class="navbar-brand text-white" href="#">Blog Contents</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link text-warning" href="{{ route('allblogs') }}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">logo</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
          <a class="nav-link disabled" href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a>
          <a class="nav-link disabled" href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
          <a class="nav-link disabled" href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
    </div>
</nav>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-5  mb-4">
            <div class="card h-100">
                <div class="card-body mb-2">
                    <h2 class="card-title text-success">{{ $blog->title }}</h2>
                    <p class="card-text">{{ $blog->content }}</p>
                </div>
                <img class="card-img-top" src="{{ asset($blog->header_img) }}" alt="Header Image">
            </div>
        </div>
    </div>
</div>

<button style="margin-left: 85px;" class="btn btn-dark">
    <a href="{{ route('allblogs') }}" class="text-white">İçeriklere dön</a>
</button>
