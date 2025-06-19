<x-admin.layout-admin title="Modification">
    {{-- <x-sidebar-vendor /> --}}
      {{-- Contenu principal --}}
      <main class="py-10 md:px-8 md:ml-64 h-screen mt-15">
        <div class="bg-white shadow-md rounded-xl py-10 px-15 md:w-150 mx-auto mb-5">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Modification d'une categorie</h2>
            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="mb-4">
                  <label class="block text-sm font-medium">Titre</label>
                  <x-error-input name="title" />
                  <input type="text" name="title" value="{{ $category->title }}" class="w-full border rounded p-2">
              </div>
              <div class="mb-4">
                  <label class="block text-sm font-medium">Description</label>
                  <x-error-input name="description" />
                  <textarea name="description" rows="6" class="w-full border rounded p-2">{{ $category->description }}</textarea>
              </div>
              <button type="submit" class="bg-blue-600 text-white px-4 py-2 cursor-pointer rounded">Modifier</button>
          </form>
        </div>
      </main>
</x-admin.layout-admin>
