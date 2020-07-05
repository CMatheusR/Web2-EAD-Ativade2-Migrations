<div class="table-responsive" style="overflow-x: visible; overflow-y: visible;">
    <table class='table table-striped'>
        <thead>
        <tr style="text-align: center">
            @foreach ($header as $item)
                <th>{{ $item }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach ($data as $item)
            @if($tipo == '1')
                <tr style="text-align: center">
                    <td>{{ $item['nome'] }}</td>
                    <td>
                        <a href="{{ route('cliente.show', $item['id']) }}"><img class="small"
                                                                                src="{{ asset('img/icons/info.svg') }}"></a>
                        <a href="{{ route('cliente.edit', $item['id']) }}"><img class="small"
                                                                                src="{{ asset('img/icons/edit.svg') }}"></a>
                        <a href="javascript:form_{{$item['id']}}.submit()"><img class="small"
                                                                                src="{{ asset('img/icons/delete.svg') }}"></a>
                    </td>
                </tr>
                <form action="{{ route('cliente.destroy', $item['id']) }}"
                      method="POST" name="form_{{$item['id']}}">
                    @csrf
                    @method('DELETE')
                </form>
            @endif
            @if($tipo == '2')
                <tr style="text-align: center">
                    <td>{{ $item['nome'] }}</td>
                    <td>
                        <a href="{{ route('veterinario.show', $item['id']) }}"><img class="small"
                                                                                src="{{ asset('img/icons/info.svg') }}"></a>
                        <a href="{{ route('veterinario.edit', $item['id']) }}"><img class="small"
                                                                                src="{{ asset('img/icons/edit.svg') }}"></a>
                        <a href="javascript:form_{{$item['id']}}.submit()"><img class="small"
                                                                                src="{{ asset('img/icons/delete.svg') }}"></a>
                    </td>
                </tr>
                <form action="{{ route('veterinario.destroy', $item['id']) }}"
                      method="POST" name="form_{{$item['id']}}">
                    @csrf
                    @method('DELETE')
                </form>
            @endif
            @if($tipo == '3')
                <tr style="text-align: center">
                    <td>{{ $item['nome'] }}</td>
                    <td>
                        <a href="{{ route('especialidade.show', $item['id']) }}"><img class="small"
                                                                                src="{{ asset('img/icons/info.svg') }}"></a>
                        <a href="{{ route('especialidade.edit', $item['id']) }}"><img class="small"
                                                                                src="{{ asset('img/icons/edit.svg') }}"></a>
                        <a href="javascript:form_{{$item['id']}}.submit()"><img class="small"
                                                                                src="{{ asset('img/icons/delete.svg') }}"></a>
                    </td>
                </tr>
                <form action="{{ route('especialidade.destroy', $item['id']) }}"
                      method="POST" name="form_{{$item['id']}}">
                    @csrf
                    @method('DELETE')
                </form>
            @endif
        @endforeach
        </tbody>
    </table>
</div>

