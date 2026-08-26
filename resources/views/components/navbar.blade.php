<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">ReVibe</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <div class="d-inline-flex justify-content-start">

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('homepage') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Annunci</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('post.create') }}">Crea Annuncio</a>
          </li>
        </ul>
    </div>
    

      <form class="d-flex me-4" role="search">
        <input class="form-control me-0" type="search" placeholder="Search" aria-label="Search"/>
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    
        <form class="d-flex-row justify-content-end">
          <button class="btn btn-outline-success me-2" type="button"><a href="{{ route('login') }}"> Login </a></button>
        </form>
      </div>
    </div>
  </div>
</nav>