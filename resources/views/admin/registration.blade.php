@extends('app')

@section('content')
    @include('components.header')
    <section class="admin-registration">
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <form method="POST" action="{{ route('admin.registration') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input class="form-control" name="username" type="text" placeholder="Username" />
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="password" type="password" placeholder="Password" />
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="password_again" type="password" placeholder="Password again" />
                        </div>
                        <input class="btn btn-primary" value="Registration" type="submit" />
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection