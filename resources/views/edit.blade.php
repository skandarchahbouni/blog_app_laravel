@extends('layouts.layout')

@section('content')
<div class="mx-4">
    <div
        class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
    >
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Update a Gig
            </h2>
        </header>

        <form method="POST" action="{{ route('gigs.update', ['gig'=> $gig->id ]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label
                    for="company_name"
                    class="inline-block text-lg mb-2"
                    >Company Name</label
                >
                <input
                    type="text"
                    class="@error('company_name') border-red-400 @enderror border border-gray-200 rounded p-2 w-full"
                    name="company_name"
                    {{-- value="{{old('company_name')}}" --}}
                    value="{{old('company_name', $gig->company_name)}}"
                />
                @error('company_name')
                    <x-error :message="$message"/>
                @enderror
            </div>

            <div class="mb-6">
                <label for="job_title" class="inline-block text-lg mb-2"
                    >Job Title</label
                >
                <input
                    type="text"
                    class="@error('job_title') border-red-400 @enderror border border-gray-200 rounded p-2 w-full"
                    name="job_title"
                    value="{{old('job_title', $gig->job_title)}}"
                    placeholder="Example: Senior Laravel Developer"
                />
                @error('job_title')
                    <x-error :message="$message"/>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="job_location"
                    class="inline-block text-lg mb-2"
                    >Job Location</label
                >
                <input
                    type="text"
                    class="@error('job_location') border-red-400 @enderror border border-gray-200 rounded p-2 w-full"
                    name="job_location"
                    value="{{old('job_location', $gig->job_location)}}"
                    placeholder="Example: Remote, Boston MA, etc"
                />
                @error('job_location')
                    <x-error :message="$message"/>
                @enderror
            </div>

            <div class="mb-6">
                <label for="company_email" class="inline-block text-lg mb-2"
                    >Contact Email</label
                >
                <input
                    type="text"
                    class="@error('company_email') border-red-400 @enderror border border-gray-200 rounded p-2 w-full"
                    name="company_email"
                    value="{{old('company_email', $gig->company_email)}}"
                />
                @error('company_email')
                    <x-error :message="$message"/>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="company_website"
                    class="inline-block text-lg mb-2"
                >
                    Website/Application URL
                </label>
                <input
                    type="text"
                    class="@error('company_website') border-red-400 @enderror border border-gray-200 rounded p-2 w-full"
                    name="company_website"
                    value="{{old('company_website', $gig->company_website)}}"
                />
                @error('company_website')
                    <x-error :message="$message"/>     
                @enderror
            </div>

            <div class="mb-6">
                <label class="inline-block text-lg mb-2">
                    Choose tags :
                </label>
                <br/>
                <select class="inline-block text-lg mb-2 w-100" name="tags" >
                    <option>Select a tag</option>
                    @foreach ($tags as $id => $name)
                        <option class="inline-block text-lg mb-2" value={{ $id }}>{{ $name }}</option>
                    @endforeach
                </select>
                @error('tags')
                    <x-error :message="$message"/>
                @enderror
            </div>

            <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">
                    Company Logo
                </label>
                <input
                    type="file"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="company_logo"
                />
            </div>
            
            <div class="mb-6">
                <label
                    for="job_description"
                    class="inline-block text-lg mb-2"
                >
                    Job Description
                </label>
                <textarea
                    class="@error('job_description') border-red-400 @enderror border border-gray-200 rounded p-2 w-full"
                    name="job_description"
                    rows="10"
                    placeholder="Include tasks, requirements, salary, etc"
                >{{ old("job_description", $gig->job_description) }}</textarea>
                @error('job_description')
                    <x-error :message="$message"/>   
                @enderror
            </div>

            <div class="mb-6">
                <button
                    type="submit"
                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                >
                    Update Gig
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </div>
</div>
@endsection