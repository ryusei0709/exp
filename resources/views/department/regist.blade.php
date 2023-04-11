<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Document</title>
</head>

<body>

  <h3>テスト</h3>
  <form action="/department/add" method="POST">
    @csrf
    <div class="mb-3">
      属する部署を選択
      <select class="form-select" name="parentId" aria-label="Default select example">
        <option value="0">指定しない</option>
        <?php if(!$departMents->isEmpty()) : ?>
          <?php foreach($departMents as $departMent) : ?>
            <option value="<?php echo $departMent['id'] ?>"><?php echo $departMent['name'] ?></option>
          <?php endforeach; ?>
        <?php endif; ?>
      </select>
      <label class="form-label">部署名</label>
      <input type="text" name="name" class="form-control">
      <button type="sbumit" class="btn btn-primary">追加</button>
    </div>
  </form>


</body>

</html>