@extends('layouts.app')

@section('content')
@csrf

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">

                    <div class="card-header d-flex justify-content-between align-items-center ">
                        <div>
                            Companies
                        </div>
                        <div>
                            <a type="button" class="btn btn-success text-white" href="{{url('company/add')}}"><i class="fas fa-plus-circle pr-2" aria-hidden="true"></i>Add Company</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Website</th>
                                <th scope="col">Logo</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @isset($companies)
                                @foreach($companies as $company)
                                    <tr company="{{$company->id}}">
                                        <th scope="row">{{$company->id}}</th>
                                        <td>{{$company->name}}</td>
                                        <td>{{$company->email}}</td>
                                        <td>{{$company->website}}</td>
                                        <td><img src="/images/{{$company->image}}"></td>
                                        <td>
                                            <div class="dropdown">

                                                <!--Trigger-->

                                                <a type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>


                                                <!--Menu-->
                                                <div class="dropdown-menu dropdown-primary">
                                                    <a class="dropdown-item" href="{{url('company/edit/'.$company->id)}}"><i class="fas fa-edit mr-2"></i><span>Edit</span></a>
                                                    <button class="dropdown-item delete-button" title="Delete" id ="{{$company->id}}"><i class="fas fa-trash mr-2"></i><span>Delete</span></button>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endisset
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @push('body-scripts')
        <script>
            $('.delete-button').on('click', function() {
                var id = $(this).attr('id');
                var token = $("[name='_token']").val();

                $.ajax(
                    {
                        url: "api/company/"+id,
                        type: 'DELETE',
                        dataType: 'JSON',
                        data: {
                            "id": id,
                            "_token": token,
                        },
                        success: function (){
                            $("tr[company='" + id + "']").remove();
                        }
                    });
            });
        </script>
    @endpush

@endsection
