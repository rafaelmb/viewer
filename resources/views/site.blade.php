<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sites') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Url</th>
                            <th>Last Update</th>
                            <th>Status Code</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($urls as $url)
                            <tr x-data=" { url: {{ $url }} }">
                                <td x-text="url.id"></td>
                                <td x-text="url.url"></td>
                                <td x-text="url.last_update"></td>
                                <td x-text="url.status_code"></td>
                                <td><a href="{{route('url.show', ['id' => $url->id])}}">See Body</a> / <a href="#" x-data="refreshItem(url)"  x-on:click=" submitData()  " x-text="message"></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
function refreshItem(item) {
    return {
        urlId: item.id,
        message: "Refresh",
        submitData() {
            this.message = "Refreshing...",
            fetch('/api/url/refresh', {
                method: 'PUT',
                headers: { 'Content-Type': 'application/json'},
                body: JSON.stringify({id: this.urlId})
            }).then( async (response) => {
                this.url = await response.json();
                this.message = "Refresh"
            }).catch(() => {
                alert('erro');
            })
        }
    };
}
</script>