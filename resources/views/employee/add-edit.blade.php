@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">

                    <div class="card-header d-flex justify-content-between align-items-center ">
                        <div>
                            {{ request()->is('employee/add') ? 'Add Employee' : 'Edit Employee' }}
                        </div>
                    </div>
                    <div class="card-body">

                        <form method="POST"
                              action="{{ request()->is('employee/add') ? url('employee') : url('employee/'.$employee->id) }}">
                            @if(!(request()->is('employee/add')))
                                @method('PATCH')
                            @endif

                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="underline">Employee Information</h5>
                                    @component('components.select', ['name' => 'company_id', 'label' => 'Company' , 'options' => $companySelectBox])@endcomponent
                                    @component('components.input', ['name' => 'first_name', 'label' => 'First Name', 'type' => 'text'])@endcomponent
                                    @component('components.input', ['name' => 'last_name', 'label' => 'Last Name', 'type' => 'text'])@endcomponent
                                    @component('components.input', ['name' => 'email', 'label' => 'Email', 'type' => 'email'])@endcomponent
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
