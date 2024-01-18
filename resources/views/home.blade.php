@extends('layouts.app')

@section('content')
<div class="container">
  
    <div class="row justify-content-center">
        <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Profile Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Email Verified At</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key=> $user)
                        <tr>
                            <td>{{ $data->firstItem() + $key}}</td>
                            <td>
                                @if($user->profile_image)
                                    {{-- <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile Image" style="max-width: 50px;"> --}}
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->email_verified_at }}</td>
                            
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $data->links('vendor.pagination.bootstrap-4') }}
            </div>
            </div>
        </div>
</div>
@endsection
