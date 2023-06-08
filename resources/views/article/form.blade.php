<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- Use 'Edit' for edit mode and create for non-edit/create mode --}}
            {{ isset($article) ? 'Edit' : 'Create' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- don't forget to add multipart/form-data so we can accept file in our form --}}
                    <form method="post" action="{{ isset($article) ? route('article.update', $article->id) : route('article.store') }}" class="mt-6 space-y-6">
                        @csrf
                        @if(isset($article))
                            @method('patch')
                        @endif
                        <div>
                            <x-input-label for="title" value="title" />
                           <x-text-input id="title" name="title" class="mt-1 block w-full" required autofocus>{{ $post->title ?? old('title') }}</x-text-input>
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <div>
                            <x-input-label for="description" value="description" />
                            <x-textarea-input id="description" name="description" type="text" class="mt-1 block w-full" :value="$article->description ?? old('description')" autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>
                
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>