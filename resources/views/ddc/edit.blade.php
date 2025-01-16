@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit DDC</h1>
    <form action="{{ route('ddc.update', $ddc->id_ddc) }}" method="POST">
        @csrf
        @method('PUT')
        @include('ddc.form', ['ddc' => $ddc])
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('ddc.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
