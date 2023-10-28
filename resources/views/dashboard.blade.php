<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{route('dashboard')}}" method="post">
                    @csrf
                    <p>Date: <input type="text" name="choose_date" id="datepicker" value="{{$choose_date}}"> <button class="btn btn-success">Submit Date</button></p>
                </form>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">valute ID</th>
                        <th scope="col">Num Code</th>
                        <th scope="col">Char Code</th>
                        <th scope="col">Name</th>
                        <th scope="col">Value (Rates)</th>
                        <th scope="col">Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($datas as $data)
                    <tr>
                        <th scope="row">{{$loop->index+1}}</th>
                        <td>{{$data->valuteID}}</td>
                        <td>{{$data->charCode}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->value}}</td>
                        <td>{{$data->date}}</td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <x-slot name="js">
        <script>
            $( function() {
                $( "#datepicker" ).datepicker({

                    dateFormat: 'yy-mm-dd',
                });
            } );
        </script>
    </x-slot>
</x-app-layout>
