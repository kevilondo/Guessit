@extends('layout.app')

@section('content')
    <div class="container mt-4">
        @if (isset($rank) && isset($score))
            <p> You are <b> the number {{$rank}} </b> on the leaderboard with <b> {{$score}} points </b>  </p>
        @endif
        
        <table class="mb-5" style="width:100%">
            <tr>
                <th>Rank</th>
                <th>Username</th>
                <th>Score</th>
            </tr>
            
            @foreach ($users as $user)
                
                <tr>
                    <td>{{$user_rank++}}</td>
                    <td>{{$user->name}}</td> 
                    <td>{{$user->score}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection