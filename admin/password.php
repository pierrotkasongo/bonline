@extends('/admin/layout',['title'=>'Profils'])
@section('content')
@include('admin/nav')
@if(Session::get('save'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <div class="alert-icon">
            <i class="las la-save"></i>
        </div>
        <div class="alert-message">
            <strong>Profils!</strong> {{Session::get("save") }}
        </div>
    </div>
@endif
@if(Session::get('update'))
    <div class="alert alert-success alert-dismissible"  role="alert">
        <div class="alert-icon">
            <i class="las la-pen"></i>
        </div>
        <div class="alert-message">
            <strong>Profils!</strong> {{Session::get("update") }}
        </div>
    </div>
@endif
@if(Session::get('delete'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <div class="alert-icon">
            <i class="las la-trash-alt"></i>
        </div>
        <div class="alert-message">
            <strong>Profils!</strong> {{Session::get("delete") }}
        </div>
    </div>
@endif
@if(Session::get('fail'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <div class="alert-icon">
            <i class="las la-warning"></i>
        </div>
        <div class="alert-message">
            <strong>Profils!</strong> {{Session::get("fail") }}
        </div>
    </div>
@endif
<div class="row">
    <div class="col-md-3 col-xl-2">

        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Profile Settings</h5>
            </div>

            <div class="list-group list-group-flush" role="tablist">
                <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="{{ route('update_profils') }}" role="tab" aria-selected="true">
                    Account
                </a>
                <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="{{ route('password') }}" role="tab" aria-selected="false">
                    Password
                </a>
                <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#" role="tab" aria-selected="false">
                    Privacy and safety
                </a>

            </div>
        </div>
    </div>

    <div class="col-md-9 col-xl-10">
        <div class="tab-content">
            <div class="tab-pane fade active show" id="password" role="tabpanel">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Password</h5>

                        <form action="{{ route('update_password') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="inputPasswordCurrent">Ancien mot de passe</label>
                                <input type="text" name="password" class="form-control" id="inputPasswordCurrent">
                                <input type="hidden" value="{{ Session::get('adminEmail') }}" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="inputPasswordNew">Nouveau mot de passe</label>
                                <input type="text" name="newpassword" class="form-control" id="inputPasswordNew">
                            </div>
                            <div class="mb-3">
                                <label for="inputPasswordNew2">Confirmer mot de passe</label>
                                <input type="text" name="confirmpassword" class="form-control" id="inputPasswordNew2">
                            </div>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
