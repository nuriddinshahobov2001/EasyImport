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
                        <a href="{{ route($routes[0], $row['id']) }}" class="badge bg-info p-2">
                            <i class="fas {{ $icons[0] }}"></i>
                        </a>
                        <a href="{{ route($routes[1], $row['id']) }}" class="badge bg-warning p-2">
                            <i class="fas {{ $icons[1] }}"></i>
                        </a>
                        <form action="{{ route($routes[2], $row['id']) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="badge bg-danger p-2" onclick="return confirm('Точно хотите удалить {{ $row[$field] }}')">
                                <i class="fas {{ $icons[2] }}"></i>
                            </button>
                        </form>
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
