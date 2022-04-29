@extends('layouts.basic')

@section('content-index')

<body>
    <form action="{{route('manager.update', $user->id)}}" method="post">
        <div class="main-login">

            <div class="right-login">

                <div class="list">
                    <table>
                        <thead>
                            <tr>
                                <th>Nome</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>
                                    

                                </td>
                            </tr>
                            <button type="submit"> Atualizar </button>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </form>
</body>
@endsection