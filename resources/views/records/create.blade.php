@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mt-4 mb-4">Form Pendaftaran Umroh</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="form-container p-4 shadow-sm bg-light rounded">
        <form action="{{ route('records.store') }}" method="POST">
            @csrf
            <div class="form-group mb-4">
                <label for="field1" class="form-label fw-bold">Field 1</label>
                <input type="text" name="field1" class="form-control" id="field1" placeholder="Enter Field 1" required>
            </div>

            <div class="form-group mb-4">
                <label for="field2" class="form-label fw-bold">Paket</label>
                <select name="field2" id="field2" class="form-select" required>
                    <option value="">-- Select Paket --</option>
                    @foreach($paketUmroh as $paket)
                        <option value="{{ $paket->id }}">{{ $paket->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-4">
                <label for="field3" class="form-label fw-bold">Field 3</label>
                <textarea name="field3" class="form-control" id="field3" rows="4" placeholder="Enter Field 3 details" required></textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary px-4 py-2">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
