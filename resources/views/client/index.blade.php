@extends('layouts.app')

@section('template_title')
    Client
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Client') }}
                            </span>



                             <div class="float-right">
                                <a href="{{ route('clients.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Cod</th>
										<th>Name</th>
										<th>City Name</th>

                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th>{{ Form::select('city_id', $cities, '',['class' => 'form-select', 'placeholder' => 'Todos', 'id'=> 'cityFilter']) }}</th>
                                        <script>
                                            let element = document.getElementById('cityFilter');

                                            element.value = getParameterByName('filterByCityId');

                                            element.addEventListener('change', (event) => {
                                                window.location.replace(`/clients?filterByCityId=${event.target.value}`)
                                            });

                                            function getParameterByName(name, url = window.location.href) {
                                                name = name.replace(/[\[\]]/g, '\\$&');
                                                var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                                                    results = regex.exec(url);
                                                if (!results) return null;
                                                if (!results[2]) return '';
                                                return decodeURIComponent(results[2].replace(/\+/g, ' '));
                                            }

                                        </script>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clients as $client)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $client->cod }}</td>
											<td>{{ $client->name }}</td>
											<td>{{ $client->city->name }}</td>

                                            <td>
                                                <form action="{{ route('clients.destroy',$client->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('clients.show',$client->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('clients.edit',$client->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <style>
                    svg.w-5.h-5 {
                        width: 20px;
                    }
                </style>
                {!! $clients->links() !!}
            </div>
        </div>
    </div>
@endsection
