@if ($errors->any())
    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>
@endif

@if(session()->has('flash'))
    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('flash') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            </div>
        </div>
    </div>
@endif
