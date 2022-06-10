@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">

                    <div class="card-header d-flex justify-content-between align-items-center ">
                        <div>
                            {{ request()->is('company/add') ? 'Add Company' : 'Edit Company' }}
                        </div>
                    </div>
                    <div class="card-body">

                        <form method="POST" enctype="multipart/form-data"
                              action="{{ request()->is('company/add') ? url('company') : url('company/'.$company->id) }}">
                            @if(!(request()->is('company/add')))
                                @method('PATCH')
                            @endif

                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="underline">Company Information</h5>
                                    @component('components.input', ['name' => 'name', 'label' => 'Name', 'type' => 'text'])@endcomponent
                                    @component('components.input', ['name' => 'email', 'label' => 'Email', 'type' => 'email'])@endcomponent
                                    @component('components.input', ['name' => 'website', 'label' => 'Website', 'type' => 'text'])@endcomponent
                                    @component('components.input', ['name' => 'image', 'label' => 'Logo', 'type' => 'file'])@endcomponent

                                    @if(!request()->is('company/add'))
                                        <img src="/images/{{$company->image}}">
                                    @endif
                                </div>
                            </div>
                            <button class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
