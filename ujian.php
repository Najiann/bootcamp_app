<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$course_id = $_GET['course_id'] ?? 0;
$passing_score = 70; // Nilai minimal untuk lulus

// Ambil soal dan pilihan jawaban dari database
$sql = "SELECT exams.id AS exams_id, exams.pertanyaan, eo.option_id, eo.opsi, eo.benar 
        FROM exams
        JOIN exam_options eo ON exams.id = eo.ujian_id 
        WHERE exams.course_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $course_id);
$stmt->execute();
$result = $stmt->get_result();

$questions = [];
while ($row = $result->fetch_assoc()) {
    $questions[$row['exams_id']]['pertanyaan'] = $row['pertanyaan'];
    $questions[$row['exams_id']]['options'][] = [
        'option_id' => $row['option_id'],
        'opsi' => $row['opsi'],
        'benar' => $row['benar']
    ];
}

// Jika submit jawaban
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correct = 0;
    foreach ($questions as $question_id => $question) {
        $selected_option = $_POST['answer'][$question_id] ?? '';

        // Cek apakah jawaban benar
        foreach ($question['options'] as $option) {
            if ($option['option_id'] == $selected_option && $option['benar'] == 1) {
                $correct++;
                break;
            }
        }
    }

    $total_questions = count($questions);
    $score = ($total_questions > 0) ? ($correct / $total_questions) * 100 : 0;

    if ($score >= $passing_score) {
        // Update progress menjadi 100% dan status menjadi 'completed'
        $sql = "UPDATE user_courses SET progress = 100, status = 'completed' WHERE user_id = ? AND course_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $user_id, $course_id);
        $stmt->execute();

        $_SESSION['message'] = "Selamat! Anda lulus dengan skor $score%.";
        header("Location: dashboard.php");
        exit();
    } else {
        $message = "Maaf, Anda gagal. Skor Anda: $score%. Coba lagi.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ujian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Ujian Kursus</h2>
    <?php if (isset($message)) echo "<div class='alert alert-danger'>$message</div>"; ?>
    <form method="post">
        <?php foreach ($questions as $question_id => $q): ?>
            <div class="mb-3">
                <p><strong><?= htmlspecialchars($q['pertanyaan']) ?></strong></p>
                <?php foreach ($q['options'] as $option): ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="answer[<?= $question_id ?>]" value="<?= $option['option_id'] ?>">
                        <label class="form-check-label"> <?= htmlspecialchars($option['opsi']) ?> </label>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
        <button type="submit" class="btn btn-primary">Kirim Jawaban</button>
    </form>
</div>
</body>
</html>