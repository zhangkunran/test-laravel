<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Only Checkboxes Allowed</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            max-width: 400px;
        }
        h1 {
            font-size: 24px;
        }
        .checkbox-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<h1>Only select Allowed</h1>
<p>Please use the checkboxes below. Touching anywhere else on the page will trigger an alert.</p>

<div class="checkbox-group">
    <label>
        <input type="checkbox" name="option1" value="Option 1"> Option 1
    </label><br>
    <label>
        <input type="checkbox" name="option2" value="Option 2"> Option 2
    </label><br>
    <label>
        <input type="checkbox" name="option3" value="Option 3"> Option 3
    </label><br>
</div>

<script>
    // 防止在复选框和提交按钮上触发警告
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('click', function(event) {
            event.stopPropagation(); // 阻止事件冒泡
        });
    });

    // 在文档的其他地方触发警告
    document.body.addEventListener('click', function() {
        alert("Only selectBox are allowed!");
    });
</script>
</body>
</html>
