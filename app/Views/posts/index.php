<!DOCTYPE html>
<html>
<head>
    <title>블로그 글 목록</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>블로그 글 목록</h1>
            <div>
                <a href="/posts/create" class="btn btn-primary">글쓰기</a>
                <a href="/logout" class="btn btn-danger">로그아웃</a>
            </div>
        </div>

        <?php foreach ($posts as $post): ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="/posts/<?= $post['id'] ?>" class="text-decoration-none">
                            <?= esc($post['title']) ?>
                        </a>
                    </h5>
                    <p class="card-text">
                        <small class="text-muted">
                            작성자: <?= esc($post['username']) ?> | 
                            작성일: <?= date('Y-m-d H:i', strtotime($post['created_at'])) ?>
                        </small>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html> 