<div class="">
    <table class="table table-bordered">
        <thead>
        <tr>
            @foreach ($headers as $header)
                <th>{{ $header }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach($model as $row)
            <tr>
                @foreach($fields as $field)
                    <td width="{{ $field === 'id' ? 20 : ''}}">{{ $row[$field] ?? '' }}</td>
                @endforeach
                @if ($action)
                    <td align="center" width="250">
                        @foreach($routes as $index => $route)

                            @if(Str::endsWith($route, 'show'))
                                <a href="{{ route($route, $row['id']) }}" class="badge bg-info p-2">
                                    <i class="fas {{ $icons[$index] }}"></i>
                                </a>
                            @endif
                            @if(Str::endsWith($route, 'edit'))
                                <a href="{{ route($route, $row['id']) }}" class="badge bg-warning p-2">
                                    <i class="fas {{ $icons[$index] }}"></i>
                                </a>
                            @endif
                            @if(Str::endsWith($route, 'delete'))
                                <form action="{{ route($route, $row['id']) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="badge bg-danger p-2" onclick="return confirm('Точно хотите удалить {{ $row[$field] }}')">
                                        <i class="fas {{ $icons[$index] }}"></i>
                                    </button>
                                </form>
                            @endif
                        @endforeach
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
