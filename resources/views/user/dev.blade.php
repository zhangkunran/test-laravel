<!-- resources/views/dev.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dev</title>
</head>
<body>
<h1>SQL Executor</h1>

<!-- 显示任何错误信息 -->
@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- SQL 输入表单 -->
<form action="/dev" method="POST">
    @csrf
    <label for="sql">Enter SQL:</label><br>
    <textarea name="sql" rows="4" cols="50">{{ old('sql') }}</textarea><br><br>
    <button type="submit">Execute</button>
</form>

<!-- 显示查询结果 -->
@isset($results)
    <h2>Results:</h2>
    <table border="1">
        <tr>
            @foreach ($results[0] as $key => $value)
                <th>{{ $key }}</th>
            @endforeach
        </tr>
        @foreach ($results as $row)
            <tr>
                @foreach ($row as $value)
                    <td>{{ $value }}</td>
                @endforeach
            </tr>
        @endforeach
    </table>
@endisset
</body>
</html>
