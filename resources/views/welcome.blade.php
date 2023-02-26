<x-master>
    <div id="wrapper">
        <div class="container">
            <div class="col-md-12">
                <div class="row mt-5" style="text-transform:uppercase">

                    <center class="mt-5">

                        @auth
                            <h1>Hi there <span> {{ Auth::user()->name }}</span></h1>
                        @else
                            <img width="148" height="148" src="/assets/images/login.png" alt="">
                            <h1>please <span><a class="font-bold" href="{{ route('login') }}">Sign in</a></span></h1>
                        @endauth

                    </center>
                </div>
            </div>
        </div>
    </div>
</x-master>
