<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Profile Picture</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <?php require_once "header.php"; ?>
    
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="bg-white p-4 rounded shadow text-center w-50">
            <h2 class="text-primary">Upload Profile Picture</h2>
            <form action="update_profile.php" method="POST" enctype="multipart/form-data" class="mt-3">
                <div class="mb-3">
                    <label for="image_profil" class="form-label">Pilih Foto Profil:</label>
                    <input type="file" class="form-control" name="image_profil" id="image_profil" required>
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
