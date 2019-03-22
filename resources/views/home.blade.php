@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <span>
    <h1>
        <mark>
            Roles
        </mark>
    </h1>
    <h1>
        User has admin role : 
        @if(auth()->user() && auth()->user()->hasRole('admin'))
            true
        @else
            false
        @endif
    </h1>
    
    <h1>
        User has city manager role : 
        @if(auth()->user() && auth()->user()->hasRole('city manager'))
            true
        @else
            false
        @endif
    </h1>
</span>

<span>
    <h1>
        <mark>
            Permissions
        </mark>
    </h1>
    
    <h1>
        User has permission to add city manager: 
        @if(auth()->user() && auth()->user()->hasPermissionTo('add city manager'))
            true
        @else
            false
        @endif
    </h1>
    
    <h1>
        User can add gym manager: 
        @if(auth()->user() && auth()->user()->can('add gym manager'))
            true
        @else
            false
        @endif
    </h1>

    <h1>
        User has any of [add gym manager]:
        @if(auth()->user() && auth()->user()->hasAnyPermission(['add gym manager']))
            true
        @else
            false
        @endif
    </h1>
</span> --}}


@endsection
