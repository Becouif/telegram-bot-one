<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Bootstrap Form</title>
</head>
<body>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        @if (Session::has('message'))
          <div class="alert alert-secondary">
            {{ Session::get('message') }}
          </div>
        @endif
      </div>
    </div>
  </div>
  <div class="container">
    <h1>Message Me</h1>
    <form action="{{route('telegram.home')}}" method="post">@csrf
      <div class="form-group">
        <label for="message">Message:</label>
        <textarea class="form-control @error('name') is-invalid @enderror" name="message" id="message" rows="5" placeholder="Enter your message"></textarea>
        @error('message')
          <span class="invalid-feedback" role="alert">
            <strong>
              {{ $message }}
            </strong>
          </span>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
