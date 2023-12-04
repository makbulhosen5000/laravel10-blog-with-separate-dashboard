<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en-us">
  @include('user.partials.head')
<body>
  @include('user.partials.header')
  @include('user.partials.banner')

  @yield('user-content')

  @include('user.partials.sidebar')
  @include('user.partials.footer')
  @include('user.partials.script')





  </body>
</html>