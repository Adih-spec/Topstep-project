 @extends('components.layouts.app')

@section('pageTitle', 'Edit Permission')

@section('pageContent')
<div class="container mx-auto max-w-2xl mt-12">
    <div class="bg-white shadow-lg rounded-xl p-8 border border-gray-100">
        <!-- Page Header -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-900">Edit Permission</h2>
            <p class="mt-2 text-sm text-gray-600">Update the details of this permission below.</p>
        </div>

        <!-- Form -->
        <form action="{{ route('permissions.update', $permission->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-semibold text-gray-700">Permission Name</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    value="{{ old('name', $permission->name) }}" 
                    required
                    class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                >
                @error('name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-semibold text-gray-700">Description</label>
                <textarea 
                    id="description" 
                    name="description" 
                    rows="4"
                    class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                >{{ old('description', $permission->description) }}</textarea>
                @error('description')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end gap-4 pt-6 border-t border-gray-100">
                <a 
                    href="{{ route('permissions.index') }}" 
                    class="px-5 py-2 text-gray-600 font-medium rounded-lg hover:text-blue-600 transition"
                >
                    Cancel
                </a>
                <button 
                    type="submit" 
                    class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-1 transition"
                >
                    Update Permission
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
