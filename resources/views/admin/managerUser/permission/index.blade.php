@extends('layouts.basic')

@section('content-index')

<body>
    <div class="main-login">
        <div class="right-login">
            <div class="list">
                <table>
                    <thead>
                        <tr>
                            <th>Usuário</th>
                            <th>Admin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>
                                <form action="{{route('manager.update', $user->id)}}" method="post">
                                    @csrf
                                    <input name="Admin" type="checkbox" id="{{$user->id}}" class="toggle" value="{{$user->id}}" {{$user->Admin == 1 ? "checked='checked'" : ""}}>
                                    <label for="{{$user->id}}"></label>
                                    <button type="submit" class="btn-login"> confirm </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
@endsection