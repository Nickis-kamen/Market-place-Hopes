<x-admin.layout-admin title="Creation">
    {{-- <x-sidebar-vendor /> --}}
      {{-- Contenu principal --}}
      <main class="py-10 px-8 md:ml-64 h-screen mt-15">
        <div class="bg-white shadow-md rounded-xl py-10 px-15 w-150 mx-auto mb-5">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Créer une categorie</h2>
            <form action="{{ route('admin.categories.store') }}" method="POST">
              @csrf
              <div class="mb-4">
                  <label class="block text-sm font-medium">Titre</label>
                  <x-error-input name="title" />
                  <input type="text" name="title" class="w-full border rounded p-2">
              </div>
              <div class="mb-4">
                  <label class="block text-sm font-medium">Description</label>
                  <x-error-input name="description" />
                  <textarea name="description" class="w-full border rounded p-2"></textarea>
              </div>
              <button type="submit" class="bg-blue-600 text-white px-4 py-2 cursor-pointer rounded">Créer</button>
          </form>
        </div>
      </main>
</x-admin.layout-admin>
