
<!doctype html>
<html lang="en">
  @include('layouts.utils.header')
  <body>
    @include('layouts.utils.navigationbar')

<div class="container-fluid">
  <div class="row">
    @include('layouts.utils.sidebar')
    @yield('content')
  </div>
</div>

@include('layouts.utils.others')
</body>
</html>
