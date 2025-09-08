@extends('components.layouts.app')

@section('pageTitle', 'Create Permission')
@section('pageContent')
<form action="{{ route('permissions.store') }}" method="POST" class="max-w-lg mx-auto bg-white p-8 rounded shadow">
    @csrf
    <h2 class="text-2xl font-bold mb-6">Create New Permission</h2>
    <a href="{{ route('permissions.index') }}" class="btn btn-secondary mb-3">Back</a>
    <div class="mb-4">
        <label for="name" class="block text-gray-700 font-semibold mb-2">Permission Name <span class="text-red-500">*</span></label>
        <input type="text" id="name" name="name" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter permission name">
        <small class="text-gray-500">A unique name for the permission (e.g., 'edit-posts').</small>
    </div>
    <div class="mb-4">
        <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
        <input type="text" id="description" name="description" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Describe what this permission allows">
        <small class="text-gray-500">Briefly describe the purpose of this permission.</small>
    </div>
    <div class="flex justify-end">
        <button type="submit" class="bg-blue-600 text-white font-bold px-6 py-2 rounded hover:bg-blue-700 transition">Create Permission</button>
    </div>
</form>
@endsection