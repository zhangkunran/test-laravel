<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <style>
        table td,th {
            border: 1px solid #e5e5e5;
            padding: 8px;
        }
        .table{
            width: 100%;
            margin-left: 20%;
        }
        .table th,td {
            width: 100px;
        }
    </style>
</head>
<body>
<h1>Page</h1>
<form id="filter-form" action="/page" method="POST">
    @csrf
    <button type="submit">Execute</button>
</form>
@isset($results)
<div >
    <div class="table">
        <h1>用户列表</h1>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>姓名</th>
                <th>手机号</th>
            </tr>
            </thead>
            <tbody>
            @foreach($results as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->mobile}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$results->links('pagination::bootstrap-4')}}
    </div>
</div>
@endisset
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const paginationLinks = document.querySelectorAll('.pagination a');
        paginationLinks.forEach(link => {
            link.addEventListener('click', function (event) {
                event.preventDefault();

                // 获取点击的分页链接URL，并将其作为表单action提交
                const url = new URL(this.href);
                const page = url.searchParams.get('page');

                // 创建隐藏的分页参数字段
                const pageInput = document.createElement('input');
                pageInput.type = 'hidden';
                pageInput.name = 'page';
                pageInput.value = page;

                // 将分页参数添加到表单
                const form = document.getElementById('filter-form');
                form.appendChild(pageInput);

                // 提交表单
                form.submit();
            });
        });
    });
</script>
</body>
</html>
