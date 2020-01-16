@extends('layout.web.web')

@section('content')
<br><br><br><br><br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><font color='black'><b>Profile Dashboard</b></font></div>
                
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href class="btn btn-primary"> Welcome , <b>{{Auth::user()->name}}</b></a><br><br>
                    <a href class="btn btn-primary"> Your Email: <b>{{Auth::user()->email}}</b></a>

                    <br><br>
                    <a href class="btn btn-warning">  You are logged in! </a> 


                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
