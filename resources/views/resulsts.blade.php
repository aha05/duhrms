<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Content</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($notices as $notice)
            <tr>
                <td>{{ $notice->title }}</td>
                <td>{{ $notice->content }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
