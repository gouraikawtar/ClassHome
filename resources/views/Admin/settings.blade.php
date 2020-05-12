<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ClassHome - Settings</title>
  <!-- Bootsrap CSS link -->
  <link rel="stylesheet" href="{{ mix('/css/theme.css') }}">
  <!-- Custom CSS link -->
<link rel="stylesheet" href="{{ mix('/css/mesThemes.css') }}">
  <!-- Fontawesome CSS link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

</head>

<body style="zoom:90%">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0 shadow">
        <div class="container">
            <a href="index.html" class="navbar-brand">ClassHome</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav">
                    <li class="nav-item px-2">
                        <a href="index.html" class="nav-link active">Dashboard</a>
                    </li>
                    <li class="nav-item px-2">
                        <a href="posts.html" class="nav-link">Classes</a>
                    </li>
                    <li class="nav-item px-2">
                        <a href="categories.html" class="nav-link">Teachers</a>
                    </li>
                    <li class="nav-item px-2">
                        <a href="users.html" class="nav-link">Students</a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown mr-3">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <i class="fas fa-user"></i> Welcome Selo
                        </a>
                        <div class="dropdown-menu">
                            <a href="settings.html" class="dropdown-item">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                            <a href="login.html" class="dropdown-item">
                                <i class="fas fa-user-times"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

  <!-- HEADER -->
  <header id="main-header" class="py-2 bg-primary text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h4>
            <i class="fas fa-cog"></i> Settings</h4>
        </div>
      </div>
    </div>
  </header>

  <!-- ACTIONS -->
  <section id="actions" class="py-4 mb-4 bg-light shadow-sm">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <a href="index.html" class="btn btn-light btn-block">
            <i class="fas fa-arrow-left"></i> Back To Dashboard
          </a>
        </div>
        <div class="col-md-3 offset-md-2">
          <a href="index.html" class="btn btn-success btn-block shadow">
            <i class="fas fa-check"></i> Save Changes
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- SETTINGS -->
  <section id="settings">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h4>Edit Settings</h4>
            </div>
            <div class="card-body">
              <form>
                <fieldset class="form-group">
                  <legend>Allow User Registration</legend>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" value="Yes" checked> Yes
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" value="No"> No
                    </label>
                  </div>
                </fieldset>

                <fieldset class="form-group">
                  <legend>Homepage Format</legend>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" value="posts" checked> Blog Page
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" value="page"> Homepage
                    </label>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  

<!-- FOOTER -->
<footer id="sticky-footer " class="py-4 bg-dark text-white-50 ">
  <div class="container text-center ">
      <small>Copyright &copy; Home Classroom <script type="text/JavaScript "> document.write(new Date().getFullYear()) </script></small>
  </div>
</footer>
<!-- END FOOTER -->

<script src="{{ mix('/js/theme.js') }}"></script>

</body>

</html>